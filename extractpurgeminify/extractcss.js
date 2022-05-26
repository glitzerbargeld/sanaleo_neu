const puppeteer = require("puppeteer");
const URL = require("url").URL;
const https = require("https");
const xml2js = require("xml2js");
const parser = new xml2js.Parser();
const { PurgeCSS } = require("purgecss");
const fs = require("fs");
const CleanCSS = require("clean-css");

const user = "admin";
const pass = "spass";

const headers = new Map();
headers.set(
  "Authorization",
  `Basic ${new Buffer.from(`${user}:${pass}`).toString("base64")}`
);

let options = {
  host: "sanaleo.com",
  port: 443,
  path: "/sitemap.xml",
  headers: {
    Authorization:
      "Basic " + new Buffer.from(user + ":" + pass).toString("base64")
  }
};

let docs = [];

parser.on("error", function (err) {
  console.log("Parser error", err);
});
function getUrls() {
  let data = "";
  console.log("get xml extract urls");
  https.get(options, function (res) {
    if (res.statusCode >= 200 && res.statusCode < 400) {
      res.on("data", function (data_) {
        data += data_.toString();
      });
      res.on("end", async function () {
        parser.parseString(data, function (err, result) {
          result["urlset"]["url"].forEach(element => {
            if (!element["loc"][0].includes(".pdf")) {
              docs.push(element["loc"][0]);
            }
          });
        });
        // gatherFromUrls([docs[0], docs[1]]);
        // gatherFromUrls([docs[0]]);
        gatherFromUrls(docs);
      });
    } else {
      console.log("ERROR", res, options.headers);
    }
  });
}

async function gatherFromUrls(urls) {
  vp = {
    executablePath: '/run/current-system/sw/bin/chromium',
    defaultViewport: {
      width: 375,
      height: 667,
      isMobile: true
    }
  };
  dt = {
    executablePath: '/run/current-system/sw/bin/chromium',
    defaultViewport: {
      width: 1024,
      height: 768,
      isMobile: false
    }
  };
  let mob = await getHtmlAndCss(urls, vp, true, true);
  let des = await getHtmlAndCss(urls, dt, true, true);
  // console.log(mob.htmlList.length)
  // console.log(mob.cssList.length)
  mob.htmlList = des.htmlList.concat(mob.htmlList);
  mob.cssList = des.cssList.concat(mob.cssList);
  let unique = [...new Map(mob.cssList.map(item => [item['raw'], item])).values()]
  mob.cssList = unique
  postProcessData(mob);
}

async function getCssFile(options, nameOfCss) {
  let data;
  return new Promise(resolve => {
    https.get(options, res => {
      res.on("data", chunk => {
        data += chunk;
      });
      res.on("end", () => {
        data = data.replace("undefined", "")
        data = data.replace(/\/t/g,'')
        resolve({ raw: data, name: nameOfCss });
      });
    });
  });
}
async function autoScroll(page) {
  await page.evaluate(async () => {
    await new Promise((resolve, reject) => {
      var totalHeight = 0;
      var distance = 100;
      var timer = setInterval(() => {
        var scrollHeight = document.body.scrollHeight;
        window.scrollBy(0, distance);
        totalHeight += distance;

        if (totalHeight >= scrollHeight) {
          clearInterval(timer);
          resolve();
        }
      }, 100);
    });
  });
}
async function getHtmlAndCss(urls, vp, css = false, inline = false) {
  try {
    const browser = await puppeteer.launch(vp);
    const [page] = await browser.pages();
    await page.authenticate({ username: "admin", password: "spass" });

    let listOfHtml = new Array(urls.length);
    let listCSStemp = [];
    let listOfCssHref = [];
    for (let i = 0; i < listOfHtml.length; i++) {
      console.log("crawl page: " + urls[i]);
      await page.goto(urls[i], { waitUntil: "networkidle0" });
      await autoScroll(page);

      listOfHtml[i] = await page.evaluate((elem) => {
        return {
          raw: document.querySelector("*").outerHTML.replace(/\/t/g,''),
          extension: "html",
          name: elem
        };
      }, urls[i]);
      listCSStemp = await page.evaluate(inline => {
        let elems;
        let cont = {
          style: [],
          href: []
        };
        if (inline) {
          elems = Array.from(
            document.querySelectorAll("style,link[rel=stylesheet]")
          );
        } else {
          elems = Array.from(document.querySelectorAll("link[rel=stylesheet]"));
        }
        for (let i = 0; i < elems.length; i++) {
          const element = elems[i];
          if ("href" in element) {
            cont.href.push({href: element.href, name: element.id+""+i});
          } else {
            cont.style.push({raw: element.innerHTML, name: element.id+""+i});
          }
        }
        return cont;
      }, inline);
      for (let j = 0; j < listCSStemp.href.length; j++) {
        listOfCssHref.push(listCSStemp.href[j]);
      }
    }
    // const unique = new Set(listOfCssHref);
    // listOfCssHref = [...unique];
    await browser.close();

    let cssRawList = [];

    listCSStemp.style.forEach(element => {
      cssRawList.push(element);
    });

    if (css) {
      for (let i = 0; i < listOfCssHref.length; i++) {
        try {
          options.path =
            new URL(listOfCssHref[i].href).pathname +
            new URL(listOfCssHref[i].href).search;
          options.host = new URL(listOfCssHref[i].href).hostname;

          console.log(
            "css requested: " + listOfCssHref[i].href,
            options.host,
            options.path
          );
          cssRawList.push(await getCssFile(options, listOfCssHref[i].name));
        } catch (_) {
          console.log("url is wrong");
        }
      }
    }
    return {
      htmlList: listOfHtml,
      cssList: cssRawList
    };
  } catch (err) {
    console.error(err);
  }
}

async function postProcessData(data) {
  console.log("write files to disk");
  let pathHtmlList = []
  let pathCssList = []
  for (let i = 0; i < data.htmlList.length; i++) {
    const element = data.htmlList[i];
    console.log(typeof element.name)
    console.log(element.name.replace(/\//g, ""))
    pathHtmlList.push("./html/" + element.name.replace(/\//g, "") + ".html")
    fs.writeFileSync("./html/" + element.name.replace(/\//g, "") + ".html", element.raw);
  }
  // console.log(data.cssList)

  // console.log(data.cssList.length)
  for (let i = 0; i < data.cssList.length; i++) {
    const element = data.cssList[i];
    console.log(element.name)
    pathCssList.push("./css/" + element.name.replace(/\//g, "") + ".css")
    fs.writeFileSync("./css/" + element.name.replace(/\//g, "") + ".css", element.raw);
  }
  console.log("purge css");
  console.log(pathHtmlList)
  const purgeCSSResult = await new PurgeCSS().purge({
    content: pathHtmlList,
    css: pathCssList,
    safelist: []
  });
  console.log("purged file to disk");
  let purgeArray = []
  for (let i = 0; i < purgeCSSResult.length; i++) {
    const element = purgeCSSResult[i].css;
    purgeArray.push("./css/" + data.cssList[i].name + "p.css")
    fs.writeFileSync("./css/" + data.cssList[i].name + "p.css", element);
  }

  input = "a{font-weight:bold;}";
  options = {
    level: {
      2: {
        mergeAdjacentRules: true, // controls adjacent rules merging; defaults to true
        mergeIntoShorthands: true, // controls merging properties into shorthands; defaults to true
        mergeMedia: true, // controls `@media` merging; defaults to true
        mergeNonAdjacentRules: true, // controls non-adjacent rule merging; defaults to true
        mergeSemantically: false, // controls semantic merging; defaults to false
        overrideProperties: true, // controls property overriding based on understandability; defaults to true
        removeEmpty: true, // controls removing empty rules and nested blocks; defaults to `true`
        reduceNonAdjacentRules: true, // controls non-adjacent rule reducing; defaults to true
        removeDuplicateFontRules: true, // controls duplicate `@font-face` removing; defaults to true
        removeDuplicateMediaBlocks: true, // controls duplicate `@media` removing; defaults to true
        removeDuplicateRules: true, // controls duplicate rules removing; defaults to true
        removeUnusedAtRules: false, // controls unused at rule removing; defaults to false (available since 4.1.0)
        restructureRules: false, // controls rule restructuring; defaults to false
        skipProperties: [] // controls which properties won't be optimized, defaults to `[]` which means all will be optimized (since 4.1.0)
      }
    }
  };
  console.log("minify")
  let minima = new CleanCSS(options).minify(purgeArray);
  console.log("beautify")
  let beauti = new CleanCSS({
    format: "beautify" // formats output in a really nice way
  }).minify(purgeArray);
  console.log(minima.error, minima.inlinedStylesheets, minima.warnings)
  console.log("min / beauti to disk")
  fs.writeFileSync("./css/unified.min.css", minima.styles);
  fs.writeFileSync("./css/beautiful.min.css", beauti.styles);
  console.log("from "+ data.cssList.length+" css files")

}

getUrls();

// karusell replacement
let r_doit;
let r_pixelPerSecond = 100;
let r_array = [
    "https://sanaleo.com/wp-content/uploads/2021/05/tonline-1-200x66.png",
    "https://sanaleo.com/wp-content/uploads/2021/04/MZ_grey.png",
    "https://sanaleo.com/wp-content/uploads/2021/04/hanfmag_grey.png",
    "https://sanaleo.com/wp-content/uploads/2021/04/FP_grey.png",
    "https://sanaleo.com/wp-content/uploads/2021/04/rewe-logo.png"
  ];

window.onresize = function () {
  clearInterval(r_doit);
  r_doit = setTimeout(r_main, 1000, r_array, "r-slider1", r_pixelPerSecond);
};

function getTemplate(url) {
  let template = document.createElement("div");
  template.classList.add("r-slider-item");
  template.style.backgroundImage = "url(" + url + ")";
  return template;
}

let template = document.createElement("div");

function r_main(uri, contID, pPs, iJc = 0) {
  let elem = document.getElementById(contID);
  let elemWidth = elem.getBoundingClientRect().width;
  let parentWidth = elem.parentElement.getBoundingClientRect().width;
  let times = calcWidthAndSpeed(parentWidth, elemWidth, elem, pPs);
  injectImagesAgainNTimes(times, uri, elem, iJc);
}

function calcWidthAndSpeed(p, e, elem, pPs) {
  let times = 1;
  let eS = e / 2;
  while (p / e > 0.5) {
    times *= 2;
    e *= 2;
  }
  elem.style.animationDuration = e / pPs + "s";
  return times;
}

function injectImagesAgainNTimes(x, arr, elem, iJc = 0) {
  x = x - iJc;
  for (let i = 0; i < x; i++) {
    for (let j = 0; j < arr.length; j++) {
      const element = arr[j];
      elem.appendChild(getTemplate(element));
    }
  }
}
r_main(r_array, "r-slider1", r_pixelPerSecond);
let animationArray = [
  {
    id: "r-header-image",
    delay: 0
  },
  {
    id: "r-header-headline",
    delay: 0
  },
  {
    id: "r-header-subline",
    delay: 0
  },
  {
    id: "r-header-button",
    delay: 0
  }
];

// Guteslider replacement
let headEle = document.getElementById("r-container-header");
headEle.addEventListener("touchstart", init_rota, false);
headEle.addEventListener("mousedown", init_rota, false);
let sXc = 0;

function init_rota(e) {
  if (e.type == "touchstart") {
    sXc = e.touches[0].screenX;
  } else {
    e.preventDefault();
    sXc = e.screenX;
  }
  headEle.addEventListener("mousemove", process_move, false);
  headEle.addEventListener("touchmove", process_move, false);
  document.addEventListener("mouseup", end_rota, false);
  document.addEventListener("touchend", end_rota, false);
}
function end_rota(e) {
  headEle.removeEventListener("mousemove", process_move);
  headEle.removeEventListener("touchmove", process_move);
  document.removeEventListener("mouseup", end_rota);
  document.removeEventListener("touchend", end_rota);
  jump_back();
}
function jump_back() {
  headEle.style.transform =
    "translate3d(0px, 0px, 0px) rotateX(0deg) rotateY(0deg)";
  headEle.style.transitionDuration = "700ms";
}
function process_move(e) {
  let move = 0;
  if (e.type == "touchmove") {
    move = e.touches[0].screenX;
  } else {
    move = e.screenX;
  }
  let dist = move - sXc;
  headEle.style.transform =
    "translate3d(0px, 0px, 0px) rotateX(0deg) rotateY(" +
    (dist / window.innerWidth) * 180 +
    "deg)";
  headEle.style.transitionDuration = "0ms";
}

function triggerAnimationArray(cssArray) {
  cssArray.forEach(element => {
    setTimeout(
      id => {
        document.getElementById(id).classList.add("r-transform-back");
      },
      element.delay,
      element.id
    );
  });
}
triggerAnimationArray(animationArray);
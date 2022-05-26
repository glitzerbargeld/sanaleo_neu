document.addEventListener("DOMContentLoaded",
function() {
    var a, n,
        v = document.getElementsByClassName("video");
    for (n = 0; n < v.length; n++) {
        a = document.createElement("div");
        a.setAttribute("data-id", v[n].dataset.id);
        a.innerHTML = videoThumb(v[n].dataset.id);
        a.onclick = videoIframe;
        v[n].appendChild(a);
    }
});

function videoThumb(id) {
    var thumb = '<img src="https://i.ytimg.com/vi/ID/hqdefault.jpg">',
        playBtn = '<span></span>';
    return thumb.replace("ID", id) + playBtn;
}

function videoIframe() {
    var iframe = document.createElement("iframe");
    iframe.setAttribute("src", "https://www.youtube.com/embed/" + this.dataset.id + "?autoplay=1");
    iframe.setAttribute("allowfullscreen", "1");
    iframe.setAttribute("frameborder", "0");
    this.parentNode.replaceChild(iframe, this);
}

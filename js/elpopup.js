
$(document).ready(function () {


    function closePopUp() {
        setTimeout(() => { elPopUp.style.display = "block"; }, 1000)
        setTimeout(() => { elPopUp.style.opacity = "0"; }, 500)
        setTimeout(() => { presentsImg.style.bottom = "-9999px"; }, 0)
    }

    function setCookie() {
        document.cookie = "popUpValentine = true"
    }

    let elPopUp = document.getElementById("el-popup-wrapper");
    let presentsImg = document.getElementById("presents");
    let countdown = document.getElementById("el-countdown");
    let close = document.getElementById("el-close-btn");

    close.addEventListener("click", () => {
        closePopUp();
        setCookie();
    })

    // Set the date we're counting down to
    var countDownDate = new Date("Feb 10, 2022 12:00:00").getTime();


    // Update the count down every 1 second
    var x = setInterval(function () {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        document.getElementById("el-countdown").innerHTML = hours + "std "
            + minutes + "m " + seconds + "s ";

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("el-countdown").innerHTML = "Aktion beendet";
        }
    }, 1000);


    console.log(presentsImg);

    
    if (!document.cookie.split('; ').find(row => row.startsWith('popupdisplayed'))) {
        // Note that we are setting `SameSite=None;` in this example because the example
        // needs to work cross-origin.
        // It is more common not to set the `SameSite` attribute, which results in the default,
        // and more secure, value of `SameSite=Lax;`
        document.cookie = "popupdisplayed=true; expires=Fri, 31 Dec 9999 23:59:59 GMT; SameSite=None; Secure";
    
        setTimeout(() => { elPopUp.style.display = "block"; }, 4900)
        setTimeout(() => { elPopUp.style.opacity = "1"; }, 5000)
        setTimeout(() => { presentsImg.style.bottom = "0"; }, 5001)
      }

    
    

});




/*Menu Button*/
jQuery( document ).ready(function() {
  let menuBtn = document.getElementsByClassName('menu-btn');
  let astraMenu = document.getElementsByClassName('ast-mobile-header-content');


  
  for (let i = 0; i < menuBtn.length; i++) {
    menuBtn[i].onclick = () => {
      menuBtn[i].classList.contains('open') ? menuBtn[i].classList.remove('open') : menuBtn[i].classList.add('open');
      for(let j=0; j < astraMenu.length; j++){
        console.log(astraMenu[j].style.display, astraMenu[j].style.display != "block");
        astraMenu[j].style.display != "block" ?  astraMenu[j].style.display = "block" : astraMenu[j].style.display = "none"; 
      }
    };
  }


  


});

// menuBtn.onclick = () => {
  /*ast-mobile-header-content -> displayblock*/

//   if(!menuOpen){
//       menuBtn.classList.add('open');
//       menuOpen = true;
//       console.log(menuOpen);

//   }else{
//       menuBtn.classList.remove('open');
//       menuOpen = false;
//       console.log(menuOpen);

//   }

// };




/* Main Menu */

function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}


/*PRODUCT VARIATIONS SLIDER CBD ÖLE*/


jQuery( document ).ready( function() {
    var select = jQuery( "#anteil-cbd" );
    var slider
    if(select[0]) {
      slider = jQuery( "#variations-slider" ).slider({
        min: 1,
        max: 3,
        range: false,
        animate:"fast",
        value: select[ 0 ].selectedIndex + 1,
        slide: function( event, ui ) {
          select[ 0 ].selectedIndex = ui.value - 1;
          select.trigger("change");
        }
      });
    }
    jQuery( "#anteil-cbd" ).on( "change", function() {
      slider.slider( "value", this.selectedIndex + 1 );
      console.log("Value Passed: " + this.selectedIndex + 1)
      
    });
  } );


  jQuery( document).ready( function() {
    var select = jQuery( "#anteil-cbd" );
    var slider
    if(select[0]) {
    slider = jQuery( "#variations-slider-small" ).slider({
      min: 1,
      max: 2,
      range: false,
      animate:"fast",
      value: select[ 0 ].selectedIndex + 1,
      slide: function( event, ui ) {
          select[ 0 ].selectedIndex = ui.value - 1;
          select.trigger("change");
        }
      });
    }
    jQuery( "#anteil-cbd" ).on( "change", function() {
      slider.slider( "value", this.selectedIndex + 1 );
      console.log("Value Passed: " + this.selectedIndex + 1)
      
    });
  } );


  /* DECKEL CBD BLÜTEN*/

  function openPopUp(popupbutton, popupid) {


    var popup = document.getElementById(popupid);
    var popbtn = document.getElementById(popupbutton);
    var logo = popbtn.children[0];
    
    var pop_btn_array = document.getElementsByClassName("popup_btn");
    var otherpopups = document.getElementsByClassName("info-popup");
    

    Array.prototype.forEach.call(otherpopups, function(p) {
    if(p.id != popupid){
        p.classList.remove("show");
    }
    });

    Array.prototype.forEach.call(pop_btn_array, function(p) {
    console.log(p.id);
    if(p.id == popupbutton){
        p.classList.toggle("btn_active");

    }
    else{
        p.classList.toggle("hide_btn");
    }

    });

    logo.classList.toggle("infologo_active");
    popup.classList.toggle("show"); 
    document.getElementById("outer-circle").classList.toggle("outer-circle_spin");
    document.getElementById("inner-circle").classList.toggle("inner-circle_spin");
    document.getElementById("circle-shadow").classList.toggle("inner-circle_spin");
    document.getElementById("logogrid").classList.toggle("grid-transform");
    
}

//Accordion


var acc = document.getElementsByClassName("faq-accordion-archive");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
}

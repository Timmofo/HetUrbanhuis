/* Variables*/
var current_url = window.location.href; //used in breadcrumbs and single-product page hoover

/* Navbar for frontpage changes on scroll */

$(function () {
  $(document).scroll(function () {
    var $nav = $("#navbarfrontpage__brand");
    $nav.toggleClass('navbarfrontpage__brand--scrolled', $(this).scrollTop() > 1);

    var $nav = $("#navbarfrontpage");
    $nav.toggleClass('navbarfrontpage__background--scrolled', $(this).scrollTop() > 1);

    var $nav = $(".navbarfrontpage__link");
    $nav.toggleClass('navbarfrontpage__link--scrolled', $(this).scrollTop() > 1);

    var $nav = $(".navbarfrontpage__icon");
    $nav.toggleClass('navbarfrontpage__icon--scrolled', $(this).scrollTop() > 1);

    var $nav = $(".navbarfrontpage__container");
    $nav.toggleClass('navbarfrontpage__container--scrolled', $(this).scrollTop() > 1);

    var $nav = $(".frontpage__shoppingcart1");
    $nav.toggleClass('frontpage__shoppingcart1--scrolled', $(this).scrollTop() > 1);

    var $nav = $(".frontpage__shoppingcart2");
    $nav.toggleClass('frontpage__shoppingcart2--scrolled', $(this).scrollTop() > 1);
  });
});

/* single-product page hover effect */
//Add listeners to product image 2,3,4
if(current_url.search('/product/')>=0){
  var original_src = document.getElementById("product__image1").getAttribute('src');

  document.getElementById("product__image2").addEventListener("mouseover", function(){
    var src = document.getElementById("product__image2").getAttribute('src');
    document.getElementById("product__image1").src = src;

    document.getElementById("product__image2").classList.add("product__image--selector");   
    document.getElementById("product__image3").classList.add("product__image--deselector");
    document.getElementById("product__image4").classList.add("product__image--deselector");
  });

  document.getElementById("product__image2").addEventListener("mouseout", function(){
    document.getElementById("product__image1").src = original_src;

    document.getElementById("product__image2").classList.remove("product__image--selector");
    document.getElementById("product__image3").classList.remove("product__image--deselector");
    document.getElementById("product__image4").classList.remove("product__image--deselector");
  });

  document.getElementById("product__image3").addEventListener("mouseover", function(){
    var src = document.getElementById("product__image3").getAttribute('src');
    document.getElementById("product__image1").src = src;
 
    document.getElementById("product__image3").classList.add("product__image--selector");
    document.getElementById("product__image2").classList.add("product__image--deselector");
    document.getElementById("product__image4").classList.add("product__image--deselector");
  });

  document.getElementById("product__image3").addEventListener("mouseout", function(){
    document.getElementById("product__image1").src = original_src;
    
    document.getElementById("product__image3").classList.remove("product__image--selector");
    document.getElementById("product__image2").classList.remove("product__image--deselector");
    document.getElementById("product__image4").classList.remove("product__image--deselector");
  });

  document.getElementById("product__image4").addEventListener("mouseover", function(){
    var src = document.getElementById("product__image4").getAttribute('src');
    document.getElementById("product__image1").src = src;
    
    document.getElementById("product__image4").classList.add("product__image--selector");
    document.getElementById("product__image2").classList.add("product__image--deselector");
    document.getElementById("product__image3").classList.add("product__image--deselector");
  });

  document.getElementById("product__image4").addEventListener("mouseout", function(){
    document.getElementById("product__image1").src = original_src;
    
    document.getElementById("product__image4").classList.remove("product__image--selector");
    document.getElementById("product__image2").classList.remove("product__image--deselector");
    document.getElementById("product__image3").classList.remove("product__image--deselector");
  });
}

/* Makes footer callapsible */

var coll = document.getElementsByClassName("collapsiblefooter");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("activefooter");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}

/* Product page input button */
/* Clicking buttons increase/decrease volume */
(function() {
 
  window.inputNumber = function(el) {

    var min = el.attr('min') || false;
    var max = el.attr('max') || false;

    var els = {};

    els.dec = el.prev();
    els.inc = el.next();

    el.each(function() {
      init($(this));
    });

    function init(el) {

      els.dec.on('click', decrement);
      els.inc.on('click', increment);

      function decrement() {
        var value = el[0].value;
        value--;
        if(!min || value >= min) {
          el[0].value = value;
        }
      }

      function increment() {
        var value = el[0].value;
        value++;
        if(!max || value <= max) {
          el[0].value = value++;
        }
      }
    }
  }
})();

inputNumber($('.input-number'));

/*Breadcrumbs*/
if(current_url.search('/winkel/')>=0 || current_url.search('/product/')>=0 || current_url.search('/product-category/')>=0){
  document.getElementById("navmain__shoplink").classList.add("activenav");
}

if(current_url.search('/blog/')>=0 || current_url.search('/category/')>=0){
  document.getElementById("navmain__bloglink").classList.add("activenav");
}

if(current_url.search('/about/')>=0){
  document.getElementById("navmain__aboutlink").classList.add("activenav");
}

if(current_url.search('/contact/')>=0){
  document.getElementById("navmain__contactlink").classList.add("activenav");
}

if(current_url.search('/cart/')>=0){
  document.getElementById("shoppingcarticon1").classList.add("activenav");
  document.getElementById("shoppingcarticon2").classList.add("activenav");
}

//Normalizes front-page carousel height
function normalizeSlideHeights() {
  $('.carousel').each(function(){
    var items = $('.carousel-item', this);
    // reset the height
    items.css('min-height', 0);
    // set the height
    var maxHeight = Math.max.apply(null, 
        items.map(function(){
            return $(this).outerHeight()}).get() );
    items.css('min-height', maxHeight + 'px');
  })
}

$(window).on(
  'load resize orientationchange', 
  normalizeSlideHeights);
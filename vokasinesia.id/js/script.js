//LOADER
$(window).load(function() {
	$(".se-pre-con").fadeOut("slow");
});

//DARKMODE KEEPER
const themeSwitch = document.querySelector('.toggle');
themeSwitch.checked = localStorage.getItem('switchedTheme') === 'true';

themeSwitch.addEventListener('change', function (e) {
  if(e.currentTarget.checked === true) {
    // Add item to localstorage
    localStorage.setItem('switchedTheme', 'true');
  } else {
    // Remove item if theme is switched back to normal
    localStorage.removeItem('switchedTheme');
  }
});

//TOPMENU
$(function() {
	$('nav ul li a:not(:only-child)').click(function(e) {
	  $(this).siblings('.nav-dropdown').toggle('fast');
	  $('.nav-dropdown').not($(this).siblings()).hide();
	  e.stopPropagation();
	});
	$('html').click(function() {
	  $('.nav-dropdown').hide();
	});
	$('#nav-toggle').click(function() {
	  $('nav ul').slideToggle();
	});
	$('#nav-toggle').on('click', function() {
	  this.classList.toggle('active');
	});
});
  
  
//DISPLAY SLIDE
$(".banner-slide").slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 5000,
  arrows: true,
  dots: true,
  infinite: true
});

//INFOGRAFIS SLIDE
$(".infografis-slide").slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2500,
  arrows: true,
  dots: false,
  infinite: true,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
  		arrows: true,
        dots: false
      }
    }
  ]
});

//COMPANY SLIDE
$(".company-slide").slick({
  slidesToShow: 6,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2500,
  arrows: true,
  dots: false,
  infinite: true,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
  		arrows: true,
        dots: false
      }
    }
  ]
});

$('.infografis-slide').slickLightbox({
  itemSelector: 'a',
  navigateByKeyboard: true
});

$('.details-whitearea-img').slickLightbox({
  itemSelector: 'a',
  navigateByKeyboard: true
});

//SCROLL TO TOP
var btn = $('.scrolltop');
$(window).scroll(function() {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});
btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});
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


$(document).ready(function() {
    $('#tabelbidang').DataTable( {
		"order": [[ 0, "asc" ]],
		"columnDefs": [ {
			"targets": 'no-sort',
			"orderable": false
			} ],
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );

//DISPLAY SLIDE
$(".display-content").slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
  arrows: true,
  dots: false,
  infinite: true,
  fade: true,
  speed: 2000,
  cssEase: 'ease',
  pauseOnHover: false
});

//VIDEO SLIDE
$(".video-content").slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 5000,
  arrows: true,
  dots: false,
  infinite: true,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});
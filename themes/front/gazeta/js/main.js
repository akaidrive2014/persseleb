jQuery(document).ready(function($) {
    "use strict";

    /* Search */
    $(".search-trigger").on('click', function() {
        $(".search").slideToggle("slow", function() {});
	   $("i").toggleClass( "fa-times" , "fa-search");
    });

    /* NewsTicker */
    $('#news-ticker').slick({
        dots: false,
        arrows: true,
        speed: 800,
        autoplay: true,
        vertical: true,
        autoplaySpeed: 5000,
        centerMode: false,
        slidesToShow: 1,
        slidesToScroll: 1
    });

    /* Popular News */
    $('#pnews-slider').slick({
        arrows: true,
        speed: 300,
        centerMode: false,
        autoplay: true,
        autoplaySpeed: 2000,
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: false,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true
            }
        }, {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }]
    });

    /* Nicescroll */
    $("html").niceScroll();

});

/* Simple tabs */
$('#tabs li a').on('click', function(e) {
    $('#tabs li, #content .current').removeClass('current').removeClass('fadeInLeft');
    $(this).parent().addClass('current');
    var currentTab = $(this).attr('href');
    $(currentTab).addClass('current fadeInLeft');
    e.preventDefault();

});

/* Responsive Menu */
$(".menu-trigger").on('click', function() {
    $("header nav").slideToggle("slow", function() {});
});

/* Backtotop */
$('.copy1 a').on('click', function() {
    $('html, body').animate({
        scrollTop: 0
    }, 'slow');
});



$(document).ready(function(){

	// HEADER NAV
	$('nav ul li').hover(function(){
		$(this).find('.sub-nav-one').addClass('--visible');
	}, function() {
		$(this).find('.sub-nav-one').removeClass('--visible');
	});

	$('.sub-nav-one li').hover(function(){
		$(this).find('.sub-nav-two').addClass('--visible');
	}, function() {
		$(this).find('.sub-nav-two').removeClass('--visible');
	});

	$('.sub-nav-two li').hover(function(){
		$(this).find('.sub-nav-three').addClass('--visible');
	}, function() {
		$(this).find('.sub-nav-three').removeClass('--visible');
	});

	// HEADER FIXED
	$(window).scroll(function() {
        if ($(document).scrollTop() > 60) {
            $('header').addClass('--sticky');
        }
        else {
            $('header').removeClass('--sticky');
        }
    });

});
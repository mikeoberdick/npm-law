jQuery(function($){

//Automatically generate filler content height to ensure footer is on bottom of the page
$(document).ready(function() {
	$('#js-heightControl').css('height', $(window).height() - $('html').height() +'px');
});

//Dropdown on hover
$('ul.navbar-nav li.dropdown').hover(function() {
	$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
	$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});

//end of file
});
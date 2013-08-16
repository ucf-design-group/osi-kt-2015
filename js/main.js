


////////////////
// Navigation //
////////////////

// Use this variable to set the breakpoint at which the menu changes.
var breakPoint = 700;


// This function uses CSS classes to change the appearance of the menu.
function adjustNav() {

	if ($(document).width < breakPoint) {

		$("nav.main-menu").removeClass("full").addClass("compact");
		$("nav.main-menu ul").hide();
	}

	else {

		$("nav.main-menu").removeClass("compact").addClass("full");
		$("nav.main-menu ul").show();
	}
}

// When the document loads, adjust the nav and add click handlers for the
// mobile view of the menu.

$(document).ready(function () {

	adjustNav();

	$(".menu-toggle").click(function (evt) {

		$("nav.main-menu ul").slideToggle();
		evt.preventDefault();
	})
});


// On window resize, reevaluate the view of the navigation.
$(window).resize(function () {

	adjustNav();
});


//Countdown Timer

var target_date = new Date("April 5, 2014").getTime();
 
var days, hours, minutes, seconds;
 
var countdown = document.getElementById("countdown");
 
setInterval(function () {
 
    var current_date = new Date().getTime();
    var seconds_left = (target_date - current_date) / 1000;
 
    days = parseInt(seconds_left / 86400);
    seconds_left = seconds_left % 86400;
     
    hours = parseInt(seconds_left / 3600);
    seconds_left = seconds_left % 3600;
     
    minutes = parseInt(seconds_left / 60);
    seconds = parseInt(seconds_left % 60);
     
    countdown.innerHTML = days + " " + hours + " "
    + minutes + " " + seconds + " ";  
 
}, 1000);

 
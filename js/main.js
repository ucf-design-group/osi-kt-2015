


////////////////
// Navigation //
////////////////


// This function uses CSS classes to change the appearance of the menu.
function adjustNav() {

	if ($(window).width() < 700) {

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
	countdownTimer();

	$(".menu-toggle").click(function (evt) {

		$("nav.main-menu ul").slideToggle();
		evt.preventDefault();
	});


	$("div.fancybox").hide();
	$("a.fancybox").fancybox();

	$("#become-dancer").fancybox({type: 'ajax'});
	$("#start-team").fancybox({type: 'ajax'});

	$("a.fancybox").fancybox();

	setInterval(function() { countdownTimer(); }, 1000);
});


// On window resize, reevaluate the view of the navigation.
$(window).resize(function () {

	adjustNav();
});


$(document).ready(function () {

	adjustNav();

	//Start Timer Countdown on Splash Page
	countdownTimer();

	// Adjust video bg for mobile styles

	allowDesktopBGVidLoad();
	responsiveBgVideo();

});


// On window resize, reevaluate the view of the navigation.
$(window).resize(function () {

	adjustNav();
	responsiveBgVideo();

});




 
function timer() {

	var target_date = new Date("October 19, 2015").getTime();
 
	var days, hours, minutes, seconds;
 
	var countdown = document.getElementById("countdown");
 
    var current_date = new Date().getTime();
    var seconds_left = (target_date - current_date) / 1000;
 
    days = parseInt(seconds_left / 86400);
    seconds_left = seconds_left % 86400;
     
    hours = parseInt(seconds_left / 3600);
    seconds_left = seconds_left % 3600;
     
    minutes = parseInt(seconds_left / 60);
    seconds = parseInt(seconds_left % 60);
    
	if (seconds_left > 0){
    	countdown.innerHTML = days + " " + hours + " "
    	+ minutes + " " + seconds + " ";  
	}
	else{
		countdown.innerHTML = "0" + " " + "0" + " "
    	+ "0" + " " + "0" + " ";  
	}
 
}

function allowDesktopBGVidLoad () {

	// Check if .bgvideo is on the page, if not don't run this function
	if ($(".bgvid").length > 0){

		// If screen resolution is Greater then 600 create source element
		if ( $(window).width() > 600) { 
			     

			// Add source 1 from array on Splash.php
			var source = document.createElement('source');
				source.src = sourceArray[0].source;
				source.type = sourceArray[0].type;

			// Add source 2 from array on Splash.php
			var source2 = document.createElement('source');
				source2.src = sourceArray[1].source;
				source2.type = sourceArray[1].type;

			// Append source elements to HTML5 bg video tag
			document.getElementById("bgvid").appendChild(source);
			document.getElementById("bgvid").appendChild(source2);

		}
	}
}

function responsiveBgVideo () {

	$(".bgvid").each(function () {

		width = $(this).width();
		totalWidth = $(this.parentElement).width();

		$(this.parentElement).scrollLeft((width - totalWidth) / 2);
	});
}


function countdownTimer() {

	var endTime = new Date("22 April 2016"); // 28 March 2015			
	endTime = (Date.parse(endTime) / 1000);

	var now = new Date();
	now = (Date.parse(now) / 1000);

	var timeLeft = endTime - now;

	var days = Math.floor(timeLeft / 86400); 
	var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
	var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
	var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

	if (hours < "10") { hours = "0" + hours; }
	if (minutes < "10") { minutes = "0" + minutes; }
	if (seconds < "10") { seconds = "0" + seconds; }

	if (days < 0)
		$("#days").html("0" + "<span class='countdown-label'>Days</span>");
	else
		$("#days").html(days + "<span class='countdown-label'>Days</span>");

	if (days < 0)
		$("#hours").html("0" + "<span class='countdown-label'>Hours</span>");
	else
		$("#hours").html(hours + "<span class='countdown-label'>Hours</span>");

	if (days<0)
		$("#minutes").html("0" + "<span class='countdown-label'>Minutes</span>");
	else
		$("#minutes").html(minutes + "<span class='countdown-label'>Minutes</span>");

	if (days<0)
		$("#seconds").html("0" + "<span class='countdown-label'>Seconds</span>");	
	else
		$("#seconds").html(seconds + "<span class='countdown-label'>Seconds</span>");		

}

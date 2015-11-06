console.log("poruka");

$("#headerImage2").slideUp();
$("#headerImage3").slideUp();

$("#mainHeaderImage").addClass("activePicture");


//slider
window.setInterval(function pictureToggle() {
	if ($("#headerImage3").is(".activePicture")) {
		$(".activePicture").slideToggle(2000).removeClass("activePicture");
		$("#mainHeaderImage").slideToggle(2000).addClass("activePicture");
	} else {
		$(".activePicture").slideToggle(2000).removeClass("activePicture").next($(".headerImage")).slideToggle(2000).addClass("activePicture");
	}
}, 10000);

$("#header1").on("click", function() {
	if($("#mainHeaderImage").is(".activePicture")){
		console.log("showing 1");
	} else {
		$(".activePicture").slideToggle(1000).removeClass("activePicture");
		$("#mainHeaderImage").slideToggle(1000).addClass("activePicture");
	}
});
$("#header2").on("click", function () {
	if($("#headerImage2").is(".activePicture")){
		console.log("showing 2");
	} else {
		$(".activePicture").slideToggle(1000).removeClass("activePicture");
		$("#headerImage2").slideToggle(1000).addClass("activePicture");
	}
});
$("#header3").on("click", function () {
	if($("#headerImage3").is(".activePicture")){
		console.log("showing 3");
	} else {
		$(".activePicture").slideToggle(1000).removeClass("activePicture");
		$("#headerImage3").slideToggle(1000).addClass("activePicture");
	}
});

//boje za main menu


$(".headerBtn").on("mouseenter", function() {
	$(this).addClass("headerBtnP");
	$(this).removeClass("headerBtn");
});
$(".headerBtn").on("mouseleave", function() {
	$(this).removeClass("headerBtnP");
	$(this).addClass("headerBtn");
});


//vrijeme
for (var i = 1; i<25; i++){
$("#customersHour").append("<option>"+ i +" </option>");
}
for (var i = 0; i<60; i++){
$("#customersMinute").append("<option>"+ i +" </option>");
}
$(document).ready(function() {
	$('.nav-trigger').click(function() {
		$('.side-nav').toggleClass('visible');
	});
});
$("a[href*='" + location.pathname + "']").addClass("current");

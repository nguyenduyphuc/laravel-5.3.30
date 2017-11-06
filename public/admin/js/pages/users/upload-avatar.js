$(document).ready(function() {
	$('.imgHover').hover(
		function() {
            $(this).children("img").fadeTo(200, 0.85).end().children(".form-avatar").show('slow');
        },
        function() {
            $(this).children("img").fadeTo(200, 1).end().children(".form-avatar").hide();
        });
});
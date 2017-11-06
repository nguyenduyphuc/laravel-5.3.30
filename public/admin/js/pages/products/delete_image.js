$(document).ready(function() {
	$('.imgHover').hover(
		function() {
            $(".delete-image").show('fast');
        },
        function() {
            $(".delete-image").hide();
        });

	$('.delete-image').on('click', function(event) {
		event.preventDefault();
		/* Act on the event */
		var r = confirm("Are you sure delete image !");
		if (r == false) {
			return false;
		}
		var id = $(this).attr('id');
		var token = $(this).attr('token');
		var url = $(this).attr('href');
		var parent_a =  $(this).parent();


		$.ajax({
			url: url,
			type: 'GET',
			dataType: 'json',
			data: {'id': id,
					'_token':token,
					'_method':'DELETE'
			},
			success: function ()
				{
					console.log("it Work");
					parent_a.remove();
					
				} 
		});
		
	});

});
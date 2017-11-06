jQuery(document).ready(function($) {
	$( ".alert-success" ).hide( 7000 );

	$(document).on('change', '#post-status', function(){
		var id = $(this).data('id'),
			value = $(this).val();
		
			// send ajax to change 

		$.ajax(
			{
				url: 'editstt',
				type: 'GET',
				dataType: 'JSON',
				data: {
					"id":id,
					"value":value
					
				},
				success: function ()
				{
					console.log("edit success");
					
				}

			});
	});
});
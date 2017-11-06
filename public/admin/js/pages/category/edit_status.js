$(document).ready(function() {
	$(document).on('change', '#category-status', function(){
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
	// Event ajax loading

});

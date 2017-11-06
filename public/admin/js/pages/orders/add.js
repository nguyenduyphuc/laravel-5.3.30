$(document).ready(function() {

		$('.add-order').on('click', function(event) {
			
			if($(this).attr('user-id')){
				var r = alert("you ordered!");				
				var user_id = $(this).attr('user-id');
				var addon_id = $(this).attr('addon-id');
				var status = 0;
				//var parent = $(this).parents('tr');
				//var token = $(this).data('token');
				$.ajax(
					{
						url: 'delete',
						type: 'GET',
						dataType: 'JSON',
						data: {
							"id": id
						},
						success: function(){
							parent.remove();
						}
					});
			}

		});

});

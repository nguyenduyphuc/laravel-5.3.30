$(document).ready(function() {

	$('.delete-category').on('click', function(event) {
		var r = confirm("Are you sure delete category ?");
		if (r == false) {
			return false;
		}
		event.preventDefault();
		var id = $(this).attr('category-id');
		var parent = $(this).parents('tr');
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
	});

});

jQuery(document).ready(function($) {
	$('.state').change(function(event) {
	
		/* Act on the event */
		var selectedState = $(".state option:selected").val();
		$.ajax({
			url: '/admin/customer/get-district',
			type: 'get',
			data: {'selectedState': selectedState},
		})
		.done(function(data) {
			console.log(data);
	
			$('#district')
		    .find('option')
		    .remove()
		    .end();
		   var district = jQuery.parseJSON(JSON.stringify(data));

		    console.log("LOL "+district); 
		    $('#district').append("<option>--- Chọn thành phố ---</option>"); 
			$.each(district, function(index, val) {  
			console.log("LOL "+val.value); 

     			$('#district').append($("<option></option>").attr("value",val.value).text(val.name)); 
			});
			
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});

		
		
	});
});
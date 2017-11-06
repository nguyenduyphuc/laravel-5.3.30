$(document).ready(function() {

	$('.delete-product').on('click', function(event) {
		var r = confirm("Are you sure delete item !");
		if (r == false) {
			return false;
		}
		event.preventDefault();
		var product_id = $(this).attr('product-id');
		var token = $(this).data("token");

		$.ajax(
			{
				url: "/admin/product/delete",
				type: 'GET',
				data: {
					id: product_id,
					"_method": 'DELETE',
					"_token": token,
				},
				success: function (data)
				{
					console.log(data);
					$('.item'+product_id).remove();
				}
			});
	});


	//Change status Product
	$('.edit-status').on('change', function(event) {
		event.preventDefault();
		/* Act on the event */
		var url = $('option:selected', this).attr('href');
        var status = $('option:selected', this).attr('value');

        $.ajax({
        	url: url,
        	type: 'GET',
        	dataType: 'json',
        	data: {'status': status},
        })
        .done(function() {
        	console.log("success");
        })
        .fail(function() {
        	console.log("error");
        })
        .always(function() {
        	console.log("complete");
        });
        
	});

//detail product
    $('.show-modal').on('click', function(event) {
        event.preventDefault();
        $("#image").html("");
		/* Act on the event */
        var url = $(this).attr('url');

        $.ajax({
            url: url,
            type: 'GET',
        })
            .done(function(data) {
                console.log(data.media);
                
                $('#largeModalLabel').text(data.name);
                $('#category').html('<b>Danh mục</b> : '+data.category.name);
                $('#price').html('<b>Giá sản phẩm</b> : '+data.price);
                $('#quantity').html('<b>Số lượng</b> : '+data.quantity);
                $('#weight').html('<b>Khối lượng</b> : '+data.weight +"g");
                $('#content').html(data.description);
                $.each(data.media, function(index, val) {
                     /* iterate through array or object */
                    console.log(val.disk+"/"+val.file_name);
                    // $('#image').attr('src', '/'+data_media[0].disk+'/'+data_media[0].id+'/'+data_media[0].file_name);
                    $("#image").append("<div class='col-sm-4' style='padding-bottom:20px;'><img height='250px' width='250px' src='/"+val.disk+"/"+val.id+"/"+val.file_name+"' /></div>");
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

jQuery(document).ready(function($) {

	$('.update-cart').on('click', function(event) {
		event.preventDefault();
		/* Act on the event */
		var rowId = $(this).attr('rowId');
		var pId = $(this).attr('pId');
		var quantity = $('.input-quantity-'+pId).val();
		console.log(rowId , pId, quantity);
		$.ajax({
			url: 'update-item-cart',
			type: 'GET',
			data: {'rowId': rowId, 'pId':pId, 'quantity':quantity},
		})
		.done(function(data) {
			if (data[1]=='mac') {window.location = "";alert('Sản phẩm này số lượng có hạn !');}
			$('.total').html("<strong>"+data[0]+"</strong>");
			console.log("success");
			
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	});

	
	$('.state').change(function(event) {
		var weight = $("#weight").val();
		// console.log(weight);
		$('#fee-ship').html("");
		/* Act on the event */
		var selectedState = $(".state option:selected").val();
		$.ajax({
			url: 'get-city',
			type: 'get',
			data: {'selectedState': selectedState},
		})
		.done(function(data) {
			// console.log(data);
	
			$('#city')
		    .find('option')
		    .remove()
		    .end();
		   var district = jQuery.parseJSON(JSON.stringify(data));

		    // console.log("LOL "+district); 
		    $('#city').append($("<option></option>").attr("value","").text("--- Chọn Quận (Huyện) ---")); 
			$.each(district, function(index, val) {  
			// console.log("LOL "+val.value); 
     			$('#city').append($("<option></option>").attr("value",val.value).text(val.name)); 
			});


			$('#city').change(function(event) {
				var fee_ship = 0;
				/* Act on the event */
				if ($(".state option:selected").val()=='thainguyen') {
					if ($('#city option:selected').val() == "thanhphothainguyen") {
						$('#fee-ship').html("Miễn Phí");
						$("#value-fee-ship").val(fee_ship);
					}else{
						if (weight<50) {
							fee_ship= 8000;
						}else
						if (weight> 50 && weight <= 100) {
							fee_ship= 8000;
						}else
						if (weight> 100 && weight <= 250) {
							fee_ship= 10000;
						}else
						if (weight> 250 && weight <= 1500) {
							fee_ship= 12500;
						}else
						if (weight> 500 && weight <= 1000) {
							fee_ship= 16000;
						}else
						if (weight> 1000 && weight <= 1500) {
							fee_ship= 19000;
						}else
						if (weight> 1500 && weight <= 2000) {
							fee_ship= 21000;
						}else{

							fee_ship= 21000+((Math.round((weight-2000))/500)*1700);
						}
						$('#fee-ship').html(fee_ship+" VNĐ");
						$("#value-fee-ship").val(fee_ship);
					}
				}
				
			});


			var distance = $(".state option:selected").attr('distance');
			console.log(distance);
				if ( distance >50 && distance <= 100) {
					if (weight >0 && weight <= 50) {
							fee_ship= 8000;
						}else
						if (weight> 50 && weight <= 100) {
							fee_ship = 11800;
						}else
						if (weight> 100 && weight <=250) {
							fee_ship= 16500;
						}else
						if (weight> 250 && weight<=500) {
							fee_ship= 23900;
						}else
						if (weight> 500 && weight<=1000) {
							fee_ship= 33200;
						}else
						if (weight> 1000 && weight<=1500) {
							fee_ship= 40000;
						}else
						if (weight> 1500 && weight<=2000) {
							fee_ship= 48000;
						}else{

							fee_ship= 48000+(Math.ceil((Math.round((weight-2000))/500)*3500));
						}
						$('#fee-ship').html(fee_ship+" VNĐ");
						$("#value-fee-ship").val(fee_ship);
				}
				if ( distance >100 && distance <= 300) {
					if (weight >0 && weight <= 50) {
							fee_ship= 8500;
						}else
						if (weight> 50 && weight <= 100) {
							fee_ship = 12500;
						}else
						if (weight> 100 && weight <=250) {
							fee_ship= 18200;
						}else
						if (weight> 250 && weight<=500) {
							fee_ship= 25300;
						}else
						if (weight> 500 && weight<=1000) {
							fee_ship= 34000;
						}else
						if (weight> 1000 && weight<=1500) {
							fee_ship= 41800;
						}else
						if (weight> 1500 && weight<=2000) {
							fee_ship= 51700;
						}else{

							fee_ship= 51700+(Math.ceil((Math.round((weight-2000))/500)*3500));
						}
						$('#fee-ship').html(fee_ship+" VNĐ");
						$("#value-fee-ship").val(fee_ship);
				}
				if ( distance > 300) {
					if (weight >0 && weight <= 50) {
							fee_ship= 10000;
						}else
						if (weight> 50 && weight <= 100) {
							fee_ship = 14000;
						}else
						if (weight> 100 && weight <=250) {
							fee_ship= 23000;
						}else
						if (weight> 250 && weight<=500) {
							fee_ship= 29900;
						}else
						if (weight> 500 && weight<=1000) {
							fee_ship= 43700;
						}else
						if (weight> 1000 && weight<=1500) {
							fee_ship= 56400;
						}else
						if (weight> 1500 && weight<=2000) {
							fee_ship= 68500;
						}else{

							fee_ship= 68500+(Math.ceil((Math.round((weight-2000))/500)*3500));
						}
						$('#fee-ship').html(fee_ship+" VNĐ");
						$("#value-fee-ship").val(fee_ship);
				}
			
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});

		
		
	});
	// if ($("#cod").checked == true) {
	// 	$("show-cod").html('Là dịch vụ sử dụng kèm theo một trong các dịch vụ chuyển phát trong nước. Thay người bán giao hàng đến tận tay người mua .');
	// }
	$('input:radio[name="methodpayment"]').change(
    function(){
        if ($(this).is(':checked') && $(this).val() == 'cod') {
            // append goes here
            console.log('cod');
            $("#show-cod").show();
            
        }else{
        	$("#show-cod").hide();
        }
        
    });

    $('input:radio[name="methodpayment"]').change(
    function(){
    	
        if ($(this).is(':checked') && $(this).val() == 'ctnh') {
            // append goes here
            $("#show-ctnh").show();
            $("#show-ctnh").html("<i>Khách hàng chuyển khoản số tiền tương ứng vào tài khoản ngân hàng của chúng tôi, sau khi nhận được chúng tôi sẽ gửi hàng cho các bạn bằng dịch vụ chuyển phát nhanh của Viettel</i>")
        }else{$("#show-ctnh").hide();}
    });
	
	
$("#filter-price").click(function(){

       var price_min = $(".min-price").val();
       var price_max = $(".max-price").val();
       
       var parameter = [];
       parameter=getUrlVars();
       parameter['filter-price']=price_min+"-"+price_max;

       var result=$.param(parameter);
       var url = "?"+result;
       window.location.href=url;
   });

    $('.remove-filter').click(function(){

        var parameter = getUrlVars();

        delete parameter['filter-price'];
        var result=$.param(parameter);
        var url = "?"+result;
        window.location.href=url;

    });

    function getUrlVars()
  {
      var vars = {}, hash;
      var search = window.location.search;
      if(search.indexOf('?')==-1){
      }else{
        search=search.substring(1,search.length);
        hashes=search.split('&');
          console.log(hashes);
        for(var i=0;i<hashes.length;i++){
          hash=hashes[i].split('=');
          vars[hash[0]]=hash[1];
        }

      }
      return vars;
  }

});
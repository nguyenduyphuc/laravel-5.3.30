$(document).ready(function() {
	$('.colorpicker').colorpicker({
		align:'left'
	});
	$(document).on('click','.preview-delete',function(event) {
        event.preventDefault();
        $(this).parents('.form-group').find('input[type=file]').val('');
		$(this).parents('tr').remove();
	});
});

$('input[type=file]').on('change', function() {
    if(this.files[0].size/1024/1024> 200){
        alert('File too large !!!');
        $('#image-file').val('');
    }
    readURL($(this),this);

});


function readURL(obj,input) {
    if (input.files && input.files[0]) {
        file = input.files[0];
        var reader = new FileReader();
        reader.onload = function (e) {
            obj.parents('.form-group').find('.preview-image').html( "<tr><td><img src='"+e.target.result+"' height='50' width='100'></td><td>"+file.name+"</td><td><a class='preview-delete btn btn-danger'>Delete</a></td></tr>" );
        }
        reader.readAsDataURL(file);
    }
}   
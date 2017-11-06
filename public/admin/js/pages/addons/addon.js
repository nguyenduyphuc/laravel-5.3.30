$(document).ready(function() {
    // change Status Addon
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
            success: function (data)
            {
                console.log('ok');
            }
        });
    });
    //delete addon
    $('.delete-addon').on('click', function(event) {
        var r = confirm("Are you sure delete item !");
        if (r == false) {
            return false;
        }
        event.preventDefault();
        var addon_id = $(this).attr('addon-id');
        var token = $(this).data("token");

        $.ajax(
            {
                url: "/admin/addon/delete",
                type: 'GET',
                data: {
                    id: addon_id,
                    "_method": 'DELETE',
                    "_token": token,
                },
                success: function (data)
                {
                    console.log(data);
                    $('.item'+addon_id).remove();
                }
            });
    });

});
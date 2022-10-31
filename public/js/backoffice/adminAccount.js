$(document).ready(function() {

    $('.edit-account').on('click', function(){
        console.log($(this).closest('tr').find('input').val());

        var temp = $(this).closest('tr').children();
        console.log(temp.eq(2).text())
        $('#id').val($(this).closest('tr').attr('id'));
        $('#username').val(temp.eq(1).text());
        $('#role_id').val(temp.eq(3).text());
        // $('#phone').val(temp.eq(3).text());
        // $('#address').val(temp.eq(4).text());
        $('#modal-master').modal('show');

    });
    $('.delete-account').on('click', function(){
        var temp = $(this);
        console.log($(this).parent().parent());
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type: "delete",
            url: "/admin/account/"+$(this).closest('tr').attr('id'),
            beforeSend: function(){
            },
            success: function(res) {
                console.log(res);
                temp.closest('tr').detach()
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    });
});

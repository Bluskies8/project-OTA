$(document).ready(function() {
    if ($('#table-tag').length) {
        $('#table-tag').DataTable();
    }
    $('#table-tag tbody').on('dblclick', '.tag-name', function() {
        $(this).hide();
        $(this).next().show();
    });
    $('.save-tag').on('click', function(){
        console.log($(this).closest('tr').find('input').val());
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type: "post",
            url: "/backoffice/tag/update",
            data:{
                'id' : $(this).closest('tr').attr('id'),
                'name' :$(this).closest('tr').find('input').val()
            },
            beforeSend: function(){
            },
            success: function(res) {
                console.log(res);
                if(res = "success"){
                    alert('success');
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    });
    $('.delete-tag').on('click', function(){
        var temp = $(this);
        console.log($(this).parent().parent());
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type: "delete",
            url: "/backoffice/tag/"+$(this).closest('tr').attr('id'),
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

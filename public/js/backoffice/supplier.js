$(document).ready(function() {
    if ($('#table-supplier').length) {
        $('#table-supplier').DataTable();
    }
    $('.edit-supplier').on('click', function(){
        var temp = $(this).closest('tr').children();
        $('#id').val($(this).closest('tr').attr('id'));
        $('#name').val(temp.eq(1).text());
        $('#email').val(temp.eq(2).text());
        $('#phone').val(temp.eq(3).text());
        $('#address').val(temp.eq(4).text());
        $('#modal-master').modal('show');
    });
    $('.delete-supplier').on('click', function(){
        // console.log($(this).closest('tr').detach());
        var temp = $(this);
        console.log($(this).parent().parent());
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type: "delete",
            url: "/backoffice/supplier/"+$(this).closest('tr').attr('id'),
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

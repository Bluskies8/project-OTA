$(document).ready(function() {
    if ($('#table-referal').length) {
        $('#table-referal').DataTable({
            columns: [
                null,
                null,
                null,
                null,
                null,
                { orderable: false }
            ],
        });
    }

    $('.edit-referal').on('click', function(){
        var temp = $(this).closest('tr').children();
        $('#id').val($(this).closest('tr').attr('id'));
        $('#tipe').val(temp.eq(1).text());
        $('#kode').val(temp.eq(2).text());
        $('#amount').val(temp.eq(3).text());
        $('#limit').val(temp.eq(4).text());
        $('#modal-master').modal('show');
    });
    $('.delete-referal').on('click', function(){
        // console.log($(this).closest('tr').detach());
        var temp = $(this);
        console.log($(this).parent().parent());
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type: "delete",
            url: "/backoffice/referral/"+$(this).closest('tr').attr('id'),
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
    $('.detail-referal').on('click', function(){
        var id = $(this).closest('tr').attr('id');
        console.log(id)
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type: "get",
            url: "/backoffice/referral/detail/"+id,
            beforeSend: function(){
            },
            success: function(res) {
                console.log(res);
                if ($('#table-detail').css('display') == 'none') {
                    $('#table-detail').show();
                    $(this).find('i').addClass('fa-flip-vertical');
                } else {
                    $('#table-detail').hide();
                    $(this).find('i').removeClass('fa-flip-vertical');
                }
                res.forEach(function(e,index) {

                    console.log(e)
                    $('#table-referal-detail tbody').append(
                        "<tr id = '" + e.id+"'>" +
                            "<td>"+ (index+1)+"</td>"+
                            "<td>"+ e.nama +"</td>"+
                        "</tr>"
                    );
                });
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    });
});

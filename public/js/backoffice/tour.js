$(document).ready(function() {
    var btnIndex = -1;
    var btnID = 0;
    $('.btn-show-action').on('click', function() {
        btnIndex = $(this).index('.btn-show-action') + 1;
        btnId = $(this).parent().parent().attr('id');
    });

    // Tour

    $('#add-tour').on('click', function() {
        $(this).parent().next().toggle('fast');
    });

    // $('#table-tours').DataTable({
    //     order: [[2, 'asc']],
    // });

    $('#section-tour #action-detail').on('click', function() {
        window.location.href = "/cms/tour/" + btnId;
    });


});

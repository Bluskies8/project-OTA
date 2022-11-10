$(document).ready(function() {
    if ($('#table-Customers').length) {
        $('#table-Customers').DataTable();
    }
    $('.detail').on('click',function(){
        window.location.href = "/backoffice/user/detail/"+$(this).closest('tr').attr('id');
    });
});

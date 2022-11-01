$(document).ready(function() {

    var selectedData;
    $('.cell-aksi').on('click', '.btn', function() {
        selectedData = $(this).closest('tr');

        $('#form-update').prop('action',"/backoffice/tour/passanger/update/"+selectedData.attr('id'));
        $('#select-title').val(selectedData.children().eq(0).html());
        $('#input-name').val(selectedData.children().eq(1).html());
        $('#input-nik').val(selectedData.children().eq(2).html());
        $('#input-nomor-hp').val(selectedData.children().eq(3).html());
        if (selectedData.children().eq(4).html() == 'Adult') {
            $('#formCheck-adult').prop('checked', true);
        } else if (selectedData.children().eq(4).html() == 'Child') {
            $('#formCheck-child').prop('checked', true);
        } else {
            console.log(selectedData.children().eq(4).html());
        }
        $('#modal-edit-booking').modal('show');
    });
});

$(document).ready(function() {

    $('.form-check-input').on('change', function() {
        if($(this).val() == 1){
            $('#return-date').prop('disabled', true);
        }else{
            $('#return-date').prop('disabled', false);
        }
    });
    
});

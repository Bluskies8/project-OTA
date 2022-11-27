$(document).ready(function() {

    $('.form-check-input').on('change', function() {
        if($(this).val() == 1){
            $('#return-date').prop('disabled', true);
        }else{
            $('#return-date').prop('disabled', false);
        }
    });

    $('#show-hide-password').on('click', function() {
        var x = $('.password');
        console.log(x)
        var show_eye = document.getElementById("show_eye");
        var hide_eye = document.getElementById("hide_eye");
        hide_eye.classList.remove("d-none");
        if (x.attr('type') === "password") {
            x.prop('type',"text");
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
        } else {
            x.prop('type',"password");
            show_eye.style.display = "block";
            hide_eye.style.display = "none";
        }
    });

    $('#btn-login').on('click', function(){
        $('#modal-login').modal('show');
    });
    
    var separatorInterval = setInterval(setThousandSeparator, 10);
    function setThousandSeparator () {
        let length = $('.thousand-separator').length;
        if (length != 0) {
            $('.thousand-separator').each(function(index, element) {
                let val = $(element).text();
                if (val != ''){
                    while(val.indexOf('.') != -1){
                        val = val.replace('.', '');
                    }
                    let number = parseInt(val);
                    $(element).text(number.toLocaleString(['ban', 'id']));
                }
            });
            clearInterval(separatorInterval);
        }
    };
});

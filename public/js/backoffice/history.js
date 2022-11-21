$(document).ready(function() {
    $('.btn-show-detail').on('click', function() {
        $(this).closest('.row').next().toggle();
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

    $('.btn-cancel-order').on('click',function () {
        // console.log($(this).closest('.card-body').attr('id'))
        var id = $(this).closest('.card-body').attr('id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type: "get",
            url: "/Flights/cancel/"+id,
            beforeSend: function(){
            },
            success: function(res) {
                console.log(res);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    });
});

$(document).ready(function() {
    $('#btn-pencarian').on('click', function() {
        $('#modal-pencarian').modal('show');
    });

    $('#input-kota-asal').on('click', function() {
        $('#menu-kota-asal').show();
    });

    $('#input-kota-tujuan').on('click', function() {
        $('#menu-kota-tujuan').show();
    });

    $('#modal-pencarian').on('click', function(e) {
        if (!e.target.closest('#data-kota-asal') && $('#menu-kota-asal').css('display') == 'block') {
            $('#menu-kota-asal').hide();
        } else if (!e.target.closest('#data-kota-tujuan') && $('#menu-kota-tujuan').css('display') == 'block') {
            $('#menu-kota-tujuan').hide();
        }
    });

    // $('#btn-filter-transit').on('click', function() {
    //     if ($('#menu-transit').css('display') == 'none') {
    //         $('#menu-transit').show();
    //         $(this).find('i').addClass('fa-flip-vertical');
    //     } else {
    //         $('#menu-transit').hide();
    //         $(this).find('i').removeClass('fa-flip-vertical');
    //     }
    // });

    // $('#btn-filter-waktu').on('click', function() {
    //     if ($('#menu-waktu').css('display') == 'none') {
    //         $('#menu-waktu').show();
    //         $(this).find('i').addClass('fa-flip-vertical');
    //     } else {
    //         $('#menu-waktu').hide();
    //         $(this).find('i').removeClass('fa-flip-vertical');
    //     }
    // });

    // $('#btn-filter-maskapai').on('click', function() {
    //     if ($('#menu-maskapai').css('display') == 'none') {
    //         $('#menu-maskapai').show();
    //         $(this).find('i').addClass('fa-flip-vertical');
    //     } else {
    //         $('#menu-maskapai').hide();
    //         $(this).find('i').removeClass('fa-flip-vertical');
    //     }
    // });

    $('.btn-filter').on('click', function() {
        if ($('#menu-filter').css('display') == 'none') {
            $('#menu-filter').show();
            $(this).find('i').addClass('fa-flip-vertical');
        } else {
            $('#menu-filter').hide();
            $(this).find('i').removeClass('fa-flip-vertical');
        }
    });



    $('.btn-detail').on('click', function() {
        let detail = $(this).next().next();
        if (detail.css('display') == 'none') {
            detail.show();
            $(this).css('border-bottom', '2px solid #FF9142');
        } else {
            detail.hide();
            $(this).css('border-bottom', 'none');
        }
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

    $('#reset-filter').on('click',function () {
        $('input:checked').each(function(){
            $(this).prop('checked', false);
        });
    })

    var type = $('meta[name="type"]').attr('content');
    var depart_date = $('meta[name="depart_date"]').attr('content');
    var return_date = $('meta[name="return_date"]').attr('content');
    var cabin = $('meta[name="cabin"]').attr('content');
    var pass_count = $('meta[name="pass_count"]').attr('content');
    var departure = $('meta[name="departure"]').attr('content');
    var destination = $('meta[name="destination"]').attr('content');
    var passid = $('meta[name="passid"]').attr('content');
    $('.btn-pilih').on('click', function(){
        var data = {
            'type' : type,
            'depart_date' : depart_date,
            'return_date' : return_date,
            'cabin' : cabin,
            'pass_count' : pass_count,
            'departure' : departure,
            'destination' : destination,
            'flight1' : $(this).attr('id'),
            'passid1' : passid
        };

        // console.log(data);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type: "post",
            url: "/setCookie",
            data:{
                data:data,
                name: "dataFlight1"
            },
            beforeSend: function(){
                // console.log(this.data);
            },
            success: function(res) {
                if(res == 'success'){
                    if($('input[name="auth"]').val()){
                        window.location.href = "/Flights/datadiri";
                    }else{
                        $('#modal-login').modal('show');
                    }
                }
                console.log(res);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    });
});

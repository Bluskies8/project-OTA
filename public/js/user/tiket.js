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

    $('#btn-filter-transit').on('click', function() {
        if ($('#menu-transit').css('display') == 'none') {
            $('#menu-transit').show();
            $(this).find('i').addClass('fa-flip-vertical');
        } else {
            $('#menu-transit').hide();
            $(this).find('i').removeClass('fa-flip-vertical');
        }
    });

    $('#btn-filter-waktu').on('click', function() {
        if ($('#menu-waktu').css('display') == 'none') {
            $('#menu-waktu').show();
            $(this).find('i').addClass('fa-flip-vertical');
        } else {
            $('#menu-waktu').hide();
            $(this).find('i').removeClass('fa-flip-vertical');
        }
    });

    $('#btn-filter-maskapai').on('click', function() {
        if ($('#menu-maskapai').css('display') == 'none') {
            $('#menu-maskapai').show();
            $(this).find('i').addClass('fa-flip-vertical');
        } else {
            $('#menu-maskapai').hide();
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

    function setCookie(cname, cvalue, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays * 60 * 1000));
        let expires = "expires="+d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        let name = cname + "=";
        let ca = document.cookie.split(';');
        console.log(document.cookie)
        for(let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
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
                    if(type == 1){
                        window.location.href = "/Flight/datadiri";
                    }else if(type == 2){
                        window.location.href = "/Flight/searchFlight2";
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

    $('.btn-pilih2').on('click', function(){
        window.location.href = "data diri";
        console.log($(this).attr('id'));
    });
});

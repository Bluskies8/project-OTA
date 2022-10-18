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

    var type = $('meta[name="type"]').attr('content');
    var depart_date = $('meta[name="depart_date"]').attr('content');
    var return_date = $('meta[name="return_date"]').attr('content');
    var cabin = $('meta[name="cabin"]').attr('content');
    var pass_count = $('meta[name="pass_count"]').attr('content');
    var departure = $('meta[name="departure"]').attr('content');
    var destination = $('meta[name="destination"]').attr('content');
    var passid = $('meta[name="passid"]').attr('content');
    $('.btn-pilih').on('click', function(){
        console.log(departure);
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
        console.log(data);
        if(type == 1){
            window.location.href = "data diri";
        }else if(type == 2){
            window.location.href = "/Flight/searchFlight2?type="+data['type']+"&flight1="+data['flight1']+"&departure="+data['departure']+"&return_date="+data['return_date']+"&cabin="+data['cabin']+"&pass_count="+data['pass_count']+"&destination="+data['destination']+"&passid1="+data['passid1'];
        }
        console.log($(this).attr('id'));
    });
    $('.btn-pilih2').on('click', function(){
        if(type == 1){
            window.location.href = "data diri";
        }else if(type == 2){
            window.location.href = "/Flight/searchFlight2?type="+data['type']+"&flight1="+data['flight1']+"&departure="+data['departure']+"&return_date="+data['return_date']+"&cabin="+data['cabin']+"&pass_count="+data['pass_count']+"&destination="+data['destination']+"&passid1="+data['passid1'];
        }
        console.log($(this).attr('id'));
    });
});

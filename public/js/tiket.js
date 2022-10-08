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
    $('.btn-pilih').on('click', function(){
        console.log($(this).attr('id'));
    });
});

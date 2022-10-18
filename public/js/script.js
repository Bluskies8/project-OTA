$(document).ready(function() {
    $('.menu-item').on('click', function() {
        if(!$(this).hasClass('disabled')) {
            $('.menu-item').removeClass('active');
            $(this).addClass('active');
        }
    });

    $('.menu-item.disabled').on('click', function() {
        $(this).data('open', !$(this).data('open'));
        let current = $(this).next();
        if ($(this).data('open')) {
            $(this).children('i:nth-child(2)').addClass('fa-rotate-180');
            while(current.hasClass('ps-5')) {
                current.removeClass('d-none');
                current = current.next();
            }
        } else {
            $(this).children('i:nth-child(2)').removeClass('fa-rotate-180');
            while(current.hasClass('ps-5')) {
                current.addClass('d-none');
                current = current.next();
            }
        }
    });

    var flag = false;
    $('.btn-show-action').on('click', function() {
        let lebarList = 150;
        let lebarBtn = $(this).css('width');
        let lebarTambahan = 2;
        lebarBtn = parseInt(lebarBtn.substr(0, lebarBtn.indexOf('px')));
        $('#list-action').css('left', $(this).offset().left - $(this).closest('.card').offset().left - lebarList + lebarBtn + lebarTambahan);

        let tinggiBtn = $(this).css('height');
        let tinggiHeader = 0;
        tinggiBtn = parseInt(tinggiBtn.substr(0, tinggiBtn.indexOf('px')));
        $('#list-action').css('top', $(this).offset().top - $(this).closest('.card').offset().top + tinggiBtn + tinggiHeader);

        $('#list-action').show();
        flag = true;
    });

    $(document).on('click', function() {
        setTimeout(function (){
            if (flag) {
                flag = !flag;
            } else {
                if ($('#list-action').css('display') == 'block') {
                    $('#list-action').hide();
                }
            }
        }, 10);
    });
});

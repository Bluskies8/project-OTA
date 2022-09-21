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
});
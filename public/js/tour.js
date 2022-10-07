$(document).ready(function() {
    $('.room').on('click', function(e) {
        let temp;
        if ($(e.target).hasClass('fa-minus-square')) {
            console.log();
            temp = parseInt($(e.target).next().text());
            if (temp > 0) {
                temp--;
                if ($(e.target).next().hasClass('number-adult') && temp == 0) {
                    temp++;
                }
            }
            $(e.target).next().text(temp);
        } else if ($(e.target).hasClass('fa-plus-square')) {
            temp = parseInt($(e.target).prev().text());
            if (temp < 3) {
                temp++;
                if (parseInt($(this).find('.number-adult').text()) + parseInt($(this).find('.number-child').text()) == 3) {
                    temp--;
                }
            }
            $(e.target).prev().text(temp);
        }
    });

    $("#to-photos").click(function() {
        $('#content').animate({
            scrollTop: $("#section-photos").offset().top - 100
        }, 1000);
    });
});

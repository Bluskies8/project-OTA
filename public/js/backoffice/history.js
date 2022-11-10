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
});

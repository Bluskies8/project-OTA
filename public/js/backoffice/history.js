$(document).ready(function() {
    $('.btn-show-detail').on('click', function() {
        $(this).closest('.row').next().toggle();
    });
});

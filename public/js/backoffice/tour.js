$(document).ready(function() {
    $('.show-tags').on('click', function() {
        if ($(this).hasClass('fa-rotate-180')) {
            $(this).next().hide();
            $(this).removeClass('fa-rotate-180');
        } else {
            $(this).next().show();
            $(this).addClass('fa-rotate-180');
        }
    });

    var tags = '';
    $('#tag-list input[type="checkbox"]').on('change', function() {
        tags = '';
        $('#tag-list input[type="checkbox"]').each(function() {
            if ($(this).is(':checked')) {
                if (tags == '') {
                    tags += $(this).val();
                } else {
                    tags += ', ' + $(this).val();
                }
            }
        });
        $('#input-tags').val(tags);
    });

    var countryTags = '';
    $('#country-tag-list input[type="checkbox"]').on('change', function() {
        countryTags = '';
        $('#country-tag-list input[type="checkbox"]').each(function() {
            if ($(this).is(':checked')) {
                if (countryTags == '') {
                    countryTags += $(this).val();
                } else {
                    countryTags += ', ' + $(this).val();
                }
            }
        });
        $('#input-country-tags').val(tags);
    });
});

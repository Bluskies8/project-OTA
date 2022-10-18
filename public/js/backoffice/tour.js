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
    var idtags = '';
    $('#tag-list input[type="checkbox"]').on('change', function() {
        tags = '';
        idtags = '';
        $('#tag-list input[type="checkbox"]').each(function() {
            if ($(this).is(':checked')) {
                if (tags == '') {
                    tags += $(this).val();
                } else {
                    tags += ', ' + $(this).val();
                }
                if(idtags == '') {idtags += $(this).attr('id').split('-')[1];}
                else{idtags += ', ' + $(this).attr('id').split('-')[1];}
            }
        });
        $('#input-tags').val(tags);
        $('#tag').val(idtags);
    });

    var countryTags = '';
    var idcountryTags = '';
    $('#country-tag-list input[type="checkbox"]').on('change', function() {
        countryTags = '';
        idcountryTags = '';
        $('#country-tag-list input[type="checkbox"]').each(function() {
            if ($(this).is(':checked')) {
                if (countryTags == '') {
                    countryTags += $(this).val();
                } else {
                    countryTags += ', ' + $(this).val();
                }
                if(idcountryTags == '') {idcountryTags += $(this).attr('id').split('-')[1];}
                else{idcountryTags += ', ' + $(this).attr('id').split('-')[1];}
            }
        });
        $('#input-country-tags').val(countryTags);
        $('#countrytag').val(idcountryTags);
    });

    $('#add-highlight').on('click', function() {
        let temp = $('#highlight-clone').clone();
        let count = $('#table-highlight tbody').children().length;
        temp.children().eq(0).html(count + '.');
        temp.appendTo($('#table-highlight tbody'));
        temp.show();
    });

    $('.save-highlight').on('click', function() {
        console.log($('input[name="highlight"]').val());
        $('input[name="highlight"]').each(function() {
            console.log($(this).attr('id'));
        });
    });

    $('#add-itinetary').on('click', function() {
        let temp = $('#itinetary-clone').clone();
        let count = $('#table-itinetary tbody').children().length;
        temp.children().eq(0).html(count + '.');
        temp.appendTo($('#table-itinetary tbody'));
        temp.show();
    });

    $('#add-inclusion').on('click', function() {
        let temp = $('#inclusion-clone').clone();
        let count = $('#table-inclusion tbody').children().length;
        temp.children().eq(0).html(count + '.');
        temp.appendTo($('#table-inclusion tbody'));
        temp.show();
    });

    $('#add-exclusion').on('click', function() {
        let temp = $('#exclusion-clone').clone();
        let count = $('#table-exclusion tbody').children().length;
        temp.children().eq(0).html(count + '.');
        temp.appendTo($('#table-exclusion tbody'));
        temp.show();
    });

    $('#add-terms-conditions').on('click', function() {
        let temp = $('#terms-conditions-clone').clone();
        let count = $('#table-terms-conditions tbody').children().length;
        temp.children().eq(0).html(count + '.');
        temp.appendTo($('#table-terms-conditions tbody'));
        temp.show();
    });

    $('#add-photo').on('click', function() {
        let temp = $('#photo-clone').clone();
        let count = $('#table-photo tbody').children().length;
        temp.children().eq(0).html(count + '.');
        temp.appendTo($('#table-photo tbody'));
        temp.show();
    });
});

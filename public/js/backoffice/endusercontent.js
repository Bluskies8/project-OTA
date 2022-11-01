$(document).ready(function() {
    $('.carouselDetail').on('click', function(){
        var temp = $(this).closest('tr').children();
        $("#link").val(temp.eq(1).html());
        $('#form-update-carousel').prop('action',"/cms/content/carousel/update/"+$(this).closest('tr').attr('id'));
        $('#modal-detail-carousel').modal('show');

    });
    $('.carouselDelete').on('click', function(){
        var temp = $(this);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type: "post",
            url: "/cms/content/carousel/delete/"+$(this).closest('tr').attr('id'),
            beforeSend: function(){
            },
            success: function(res) {
                console.log(res);
                temp.closest('tr').detach()
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    });
    $('.displayBannerDetail').on('click', function(){
        // console.log($(this).closest('tr').children())
        var temp = $(this).closest('tr').children();
        $('#form-update-displaybanner').prop('action',"/cms/content/displaybanner/update/"+$(this).closest('tr').attr('id'));

        $('#db-index').val(temp.eq(1).html());
        $('#db-title').val(temp.eq(2).html());
        $('#db-description').val(temp.eq(3).html());
        $('#input-tags2').val(temp.eq(4).html());
        var tag = temp.eq(4).html().split(', ');
        var tagid = "";
        $('#radio input[value="'+temp.eq(5).html()+'"]').prop('checked', true);
        tag.forEach(element => {
            console.log($('#tag-list2 input[value="' + element + '"]'))
            $('#tag-list2 input[type="checkbox"]').each(function() {
                if(element == this.value){
                    $(this).prop('checked',true);
                    console.log($(this).attr('id'))
                    if(tagid == '') {tagid += $(this).attr('id').split('-')[1];}
                    else{tagid += ',' + $(this).attr('id').split('-')[1];}
                }else{
                    $(this).prop('checked',false);
                }
            });
        });
        $('#tag2').val(tagid);
        // tag.each(function(){
        // });
        $('#modal-displayedit').modal('show');
    });

    $('.displayBannerDelete').on('click', function(){
        var temp = $(this);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type: "delete",
            url: "/cms/content/displaybanner/"+$(this).closest('tr').attr('id'),
            beforeSend: function(){
            },
            success: function(res) {
                console.log(res);
                temp.closest('tr').detach()
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    });

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
                else{idtags += ',' + $(this).attr('id').split('-')[1];}
            }
        });
        $('#input-tags').val(tags);
        $('#tag').val(idtags);
    });

    $('#tag-list2 input[type="checkbox"]').on('change', function() {
        tags = '';
        idtags = '';
        $('#tag-list2 input[type="checkbox"]').each(function() {
            if ($(this).is(':checked')) {
                if (tags == '') {
                    tags += $(this).val();
                } else {
                    tags += ', ' + $(this).val();
                }
                if(idtags == '') {idtags += $(this).attr('id').split('-')[1];}
                else{idtags += ',' + $(this).attr('id').split('-')[1];}
            }
        });
        $('#input-tags2').val(tags);
        $('#tag2').val(idtags);
    });
})

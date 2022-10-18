$(document).ready(function() {
    var btnIndex = -1;
    var btnID = 0;

    // Tour Detail
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

    var path = window.location.pathname;
    $('#add-highlight').on('click', function() {
        let temp = $('#highlight-clone').clone(true);
        let count = $('#table-highlight tbody').children().length;
        temp.children().eq(0).html(count + '.');
        temp.appendTo($('#table-highlight tbody'));
        temp.show();
    });

    $('.save-highlight').on('click', function() {
        var data = [];
        $('input[name="highlight"]').each(function(ctr) {
            if(ctr>0){
                data[ctr-1] = {
                    'id': $(this).attr('id'),
                    'value' : (this).value
                }
            }
        });
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type: "post",
            url: "/cms/tour/Highlight/update/"+$('input[name="id"]').val(),
            data:{
                "data":data
            },
            // status: '200', function(res){
            // },
            beforeSend: function(){
                // console.log(this.data);
            },
            success: function(res) {
                console.log(res);
                $('#table-highlight').children('tr').remove();
                $( "#table-highlight" ).load(path+" #table-highlight");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
        // console.log(data)
    });
    $('.delete-highlight').on('click', function() {
        var thiss = $(this);
        var td = $(this).parent().parent().children()[1];
        var id = $(td).children().attr('id');
        if(id == ''){
            $(this).parent().parent().detach();
        }else{
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                type: "delete",
                url: "/cms/tour/Highlight/delete/"+id,
                beforeSend: function(){
                    // console.log(this.data);
                },
                success: function(res) {
                    console.log(res);
                    thiss.parent().parent().detach();
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    console.log(thrownError);
                }
            });
        }
    });

    $('#add-itinetary').on('click', function() {
        let temp = $('#itinetary-clone').clone(true);
        let count = $('#table-itinetary tbody').children().length;
        temp.children().eq(0).html(count + '.');
        temp.appendTo($('#table-itinetary tbody'));
        temp.show();
    });
    $('.save-itinetary').on('click', function() {
        var data = [];
        $('input[name="itinetary"]').each(function(ctr) {
            if(ctr>0){
                data[ctr-1] = {
                    'id': $(this).attr('id'),
                    'value' : (this).value
                }
            }
        });
        console.log(data);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type: "post",
            url: "/cms/tour/Itinetary/update/"+$('input[name="id"]').val(),
            data:{
                "data":data
            },
            // status: '200', function(res){
            // },
            beforeSend: function(){
                // console.log(this.data);
            },
            success: function(res) {
                console.log(res);
                $('#table-itinetary').children('tr').remove();
                $( "#table-itinetary" ).load(path+" #table-itinetary");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
        // console.log(data)
    });
    $('.delete-itinetary').on('click', function() {
        var thiss = $(this);
        var td = $(this).parent().parent().children()[1];
        var id = $(td).children().attr('id');
        console.log(id)
        if(id == ''){
            $(this).parent().parent().detach();
        }else{
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                type: "delete",
                url: "/cms/tour/Itinetary/delete/"+id,
                beforeSend: function(){
                    // console.log(this.data);
                },
                success: function(res) {
                    console.log(res);
                    thiss.parent().parent().detach();
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    console.log(thrownError);
                }
            });
        }
    });

    $('#add-inclusion').on('click', function() {
        let temp = $('#inclusion-clone').clone(true);
        let count = $('#table-inclusion tbody').children().length;
        temp.children().eq(0).html(count + '.');
        temp.appendTo($('#table-inclusion tbody'));
        temp.show();
    });
    $('.save-include').on('click', function() {
        var data = [];
        $('input[name="include"]').each(function(ctr) {
            if(ctr>0){
                data[ctr-1] = {
                    'id': $(this).attr('id'),
                    'value' : (this).value
                }
            }
        });
        console.log(data);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type: "post",
            url: "/cms/tour/Include/update/"+$('input[name="id"]').val(),
            data:{
                "data":data
            },
            // status: '200', function(res){
            // },
            beforeSend: function(){
                // console.log(this.data);
            },
            success: function(res) {
                console.log(res);
                $('#table-inclusion').children('tr').remove();
                $( "#table-inclusion" ).load(path+" #table-inclusion");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
        // console.log(data)
    });
    $('.delete-include').on('click', function() {
        var thiss = $(this);
        var td = $(this).parent().parent().children()[1];
        var id = $(td).children().attr('id');
        console.log(id)
        if(id == ''){
            $(this).parent().parent().detach();
        }else{
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                type: "delete",
                url: "/cms/tour/Include/delete/"+id,
                beforeSend: function(){
                    // console.log(this.data);
                },
                success: function(res) {
                    console.log(res);
                    thiss.parent().parent().detach();
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    console.log(thrownError);
                }
            });
        }
    });
    $('#add-exclusion').on('click', function() {
        let temp = $('#exclusion-clone').clone(true);
        let count = $('#table-exclusion tbody').children().length;
        temp.children().eq(0).html(count + '.');
        temp.appendTo($('#table-exclusion tbody'));
        temp.show();
    });
    $('.save-exclude').on('click', function() {
        var data = [];
        $('input[name="exclude"]').each(function(ctr) {
            if(ctr>0){
                data[ctr-1] = {
                    'id': $(this).attr('id'),
                    'value' : (this).value
                }
            }
        });
        console.log(data);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type: "post",
            url: "/cms/tour/Exclude/update/"+$('input[name="id"]').val(),
            data:{
                "data":data
            },
            // status: '200', function(res){
            // },
            beforeSend: function(){
                // console.log(this.data);
            },
            success: function(res) {
                console.log(res);
                $('#table-exclusion').children('tr').remove();
                $( "#table-exclusion" ).load(path+" #table-exclusion");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
        // console.log(data)
    });
    $('.delete-exclude').on('click', function() {
        var thiss = $(this);
        var td = $(this).parent().parent().children()[1];
        var id = $(td).children().attr('id');
        console.log(id)
        if(id == ''){
            $(this).parent().parent().detach();
        }else{
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                type: "delete",
                url: "/cms/tour/Exclude/delete/"+id,
                beforeSend: function(){
                    // console.log(this.data);
                },
                success: function(res) {
                    console.log(res);
                    thiss.parent().parent().detach();
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status);
                    console.log(thrownError);
                }
            });
        }
    });
    $('#add-terms-conditions').on('click', function() {
        let temp = $('#terms-conditions-clone').clone(true);
        let count = $('#table-terms-conditions tbody').children().length;
        temp.children().eq(0).html(count + '.');
        temp.appendTo($('#table-terms-conditions tbody'));
        temp.show();
    });

    $('#add-photo').on('click', function() {
        let temp = $('#photo-clone').clone(true);
        let count = $('#table-photo tbody').children().length;
        temp.children().eq(0).html(count + '.');
        temp.appendTo($('#table-photo tbody'));
        temp.show();
    });
});

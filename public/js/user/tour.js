$(document).ready(function() {
    var roomcount = 1;
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
            console.log(temp)
        }
    });

    $("#to-photos").click(function() {
        $('#content').animate({
            scrollTop: $("#section-photos").offset().top - 100
        }, 1000);
    });

    $('.btn-pilih').on('click', function(){
        window.location.href = "/tour/"+$(this).closest('.card').attr('id');
    });
    $('.add-room').on('click', function(){
        roomcount++;
        let temp = $('#room-1').clone().prop('id', 'room-' + roomcount).appendTo(".room");
        temp.children('.roomcount').text('Room '+roomcount);
        // temp.children('.number-adult').prop('id', 'adult-'+roomcount);
        // temp.children('.roomcount').text('Room '+roomcount);
        temp.children('.btn-remove-room').show();
        let btnRemoveForm = $('#room-' + roomcount).children('.btn-remove-room');
        $(btnRemoveForm).on('click', function() {
            // roomcount--;
            console.log(btnRemoveForm.parent().detach())
            btnRemoveForm.parent().detach()
            // $(this).parent().parent().detach();
        });
        console.log(roomcount)
        temp.show();
    });

    var pathh = window.location.pathname;
    $('#quote').on('click', function(){
        // console.log($('#adult'))
        path = pathh.split('/');

        var adult = $('span[id="adult"]');
        var child = $('span[id="child"]');
        var tour = $('input[name="id-tour"]').val();
        var date = $('select[name="availdate"]').val();
        var room = [];
        for (let index = 0; index < adult.length; index++) {
            room.push({
                adult: adult[index].innerHTML,
                child: child[index].innerHTML
            })
        }
        var data = {
            'id':tour,
            'room': room,
            'date':date
        }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type: "post",
            url: "/setCookie",
            data: {
                data:data,
                name:"QuoteTour"
            },
            statusCode: {
                404: function() {
                    alert( "page not found" );
                },
                200: function(data){
                    console.log($('input[name="auth"]').val());
                    if($('input[name="auth"]').val()){
                        window.location.href = "/tours/datadiri";
                    }else{
                        $('#modal-login').modal('show');
                    }
                    console.log(data);
                }
            },
            beforeSend: function(){
                // console.log(this.data);
            },
            success: function(data,xhr) {

                //pindah ke halaman stock dan data masuk ke tabel
                // if(data == "Success") {
                //     window.location.href = 'stock';
                // }else{
                //     $('.alert-confirm').html(data);
                //     $('#check-confirm').show();
                // }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                // JSON.parse(undefined);
                console.log(xhr.status);
                console.log(thrownError);
                // console.log(ajaxOptions);
            }
        });
    });
    $('#btn-submit-tour').on('click', function(){
        var cp_nama = $('input[name="cp-nama"]').val();
        var cp_email = $('input[name="cp-email"]').val();
        var cp_nohp = $('input[name="cp-nohp"]').val();
        var cp_birth = $('input[name="cp-birth"]').val();
        var referal = $('input[name="kode_referral"]').val();
        var cp_title = $('#cp-title').val();
        var room = [];
        for (let index = 0; index < $('#dataroom').children('div').length; index++) {
            var bedtype = $('input[name="bed_type-'+(index+1)+'"]:checked').val();
            var passanger = [];
            for (let j = 0; j < $('#container-form-dewasa'+(index+1)).children('div').children().length; j++) {
                let temp = $('#container-form-dewasa'+(index+1)).find('.col-4').eq(j).find('input');
                let temp2 = $('#container-form-dewasa'+(index+1)).find('.adult-title').eq(j).val();
                let adult_nama = temp.eq(0);
                let adult_email = temp.eq(1);
                let adult_nohp = temp.eq(2);
                let adult_birth = temp.eq(3);
                passanger.push({
                    'title' :$('#container-form-dewasa'+(index+1)).find('.adult-title').eq(j).val(),
                    'nama':adult_nama.val(),
                    'email':adult_email.val(),
                    'birth':adult_birth.val(),
                    'nohp':adult_nohp.val(),
                    'paxType' : "ADT"
                });
            }

            // console.log($('#container-form-anak'+(index+1)).children('div').children())
            for (let j = 0; j < $('#container-form-anak'+(index+1)).children('div').children().length; j++) {
                let temp = $('#container-form-anak'+(index+1)).find('.col-4').eq(j).find('input');
                let temp2 = $('#container-form-anak'+(index+1)).find('.adult-title').eq(j).val();
                let child_nama = temp.eq(0);
                let child_email = temp.eq(1);
                let child_nohp = temp.eq(2);
                let child_birth = temp.eq(3);
                passanger.push({
                    'title' :$('#container-form-anak'+(index+1)).find('.adult-title').eq(j).val(),
                    'nama':child_nama.val(),
                    'email':child_email.val(),
                    'birth':child_birth.val(),
                    'nohp':child_nohp.val(),
                    'paxType' : "CHD"
                });
            }
            // data['room'] = {
            //     'bedType':bedtype,
            //     'data':passanger
            // }
            room.push({
                'bedType':bedtype,
                'data':passanger
            });
            console.log(room);
        }
        var data = {
            'referal' : referal,
            'cp':{
                'title':cp_title,
                'nama':cp_nama,
                'email':cp_email,
                'birth':cp_birth,
                'nohp':cp_nohp,
            },
            'room' :room
        };
        console.log(data);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            url: "/tours/cp-submit",
            method: 'post',
            data: {
                'data': data,
            },
            beforeSend: function(){
                // console.log(data)
            },
            success: function(response){
                console.log(response)
                if(response == "kode not found"){
                    $('#error-kode').show();
                }else{
                    $('#modal-notice').modal('show');
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                // JSON.parse(undefined);
                console.log(xhr.status);
                console.log(thrownError);
                // console.log(ajaxOptions);
            }
        });
    });
    $('#modal-notice').on('hidden.bs.modal', function () {
        window.location.replace('/');
    });

    $('#btn-submit-flight').on('click', function(){
        var cp_nama = $('input[name="cp-nama"]').val();
        var cp_email = $('input[name="cp-email"]').val();
        var cp_nohp = $('input[name="cp-nohp"]').val();
        var cp_birth = $('input[name="cp-birth"]').val();
        var referal = $('input[name="kode_referral"]').val();
        var passanger = [];
        for (let j = 0; j < $('#container-form-dewasa').children('div').children().length; j++) {
            console.log($('#title'+(j+1)).val())
            let temp = $('#container-form-dewasa').find('.col-4').eq(j).find('input');
            let adult_nama = temp.eq(0);
            let adult_email = temp.eq(1);
            let adult_nohp = temp.eq(2);
            let adult_birth = temp.eq(3);
            passanger.push({
                'title': $('#title'+(j+1)).val(),
                'nama':adult_nama.val(),
                'email':adult_email.val(),
                'birth':adult_birth.val(),
                'nohp':adult_nohp.val(),
                'paxType' : "ADT"
            });
        }
        var data = {
            'referal' : referal,
            'cp':{
                'title': $('#cp-title').val(),
                'nama': cp_nama,
                'email':cp_email,
                'birth':cp_birth,
                'nohp':cp_nohp,
            },
            'passanger' :passanger
        };
        console.log(data)
        if($('input[name="auth"]').val()){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                url: "/Flight/cp-submit",
                method: 'post',
                data: {
                    'data': data,
                },
                beforeSend: function(){
                    console.log(data)
                },
                success: function(response){
                    console.log(response)
                    if(response == "kode not found"){
                        $('#error-kode').show();
                    }else{
                        $('#frame').prop('src',response);
                        $('#payment').modal('show');
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    // JSON.parse(undefined);
                    console.log(xhr.status);
                    console.log(thrownError);
                    // console.log(ajaxOptions);
                }
            });
        }else{
            $('#modal-login').modal('show');
        }

    });

    $('.close-modal').on('click', function() {
        window.location.href = "/";
    });
        $('.btn-filter').on('click', function() {
        if ($('#menu-filter').css('display') == 'none') {
            $('#menu-filter').show();
            $(this).find('i').addClass('fa-flip-vertical');
        } else {
            $('#menu-filter').hide();
            $(this).find('i').removeClass('fa-flip-vertical');
        }
    });
});

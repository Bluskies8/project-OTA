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
                    window.location.href = "/tour/datadiri";
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
    $('#btn-submit').on('click', function(){
        var fd = new FormData();
        var room = [];
        var child = [];
        var cp_nama = $('input[name="cp-nama"]').val();
        var cp_email = $('input[name="cp-email"]').val();
        var cp_nohp = $('input[name="cp-nohp"]').val();
        var cp_birth = $('input[name="cp-birth"]').val();
        for (let index = 0; index < $('#dataroom').children('div').length; index++) {
            var adult = [];
            // var thiss =$('#droom-'+(index+1));
            var adult_nama = $('input[name="adult-nama'+(index+1)+'"]');
            var adult_email = $('input[name="adult-email'+(index+1)+'"]');
            var adult_nohp = $('input[name="adult-nohp'+(index+1)+'"]');
            var adult_birth = $('input[name="adult-birth'+(index+1)+'"]');
            var child_nama = $('input[name="child-nama'+(index+1)+'"]');
            var child_email = $('input[name="child-email'+(index+1)+'"]');
            var child_nohp = $('input[name="child-nohp'+(index+1)+'"]');
            var child_birth = $('input[name="child-birth'+(index+1)+'"]');
            for (let j = 0; j < $('#container-form-dewasa'+(index+1)).children('div').children().length; j++) {
                    adult.push({
                        'nama':adult_nama[j].value,
                        'email':adult_email[j].value,
                        'birth':adult_birth[j].value,
                        'nohp':adult_nohp[j].value,
                    });
            }
            console.log($('#container-form-anak'+(index+1)).children('div').children())
            for (let j = 0; j < $('#container-form-anak'+(index+1)).children('div').children().length; j++) {
                    child.push({
                        'nama':child_nama[j].value,
                        'email':child_email[j].value,
                        'birth':child_birth[j].value,
                        'nohp':child_nohp[j].value,
                    })
            }
            room.push({
                'adult':adult,
                'child':child
            });
            console.log(room);
        }
        var data = {
            'cp':{
                'nama':cp_nama,
                'email':cp_email,
                'birth':cp_birth,
                'nohp':cp_nohp,
            },
            'room' : room
        };
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            url: "/tour/cp-submit",
            method: 'post',
            data: {
                'data': data,
            },
            beforeSend: function(){
                console.log(data)
            },
            success: function(response){
                console.log(response)
            },
            error: function (xhr, ajaxOptions, thrownError) {
                // JSON.parse(undefined);
                console.log(xhr.status);
                console.log(thrownError);
                // console.log(ajaxOptions);
            }
        });
    });
});

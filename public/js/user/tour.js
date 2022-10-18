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

    $('#quote').on('click', function(){
        // console.log($('#adult'))
        var adult = $('span[id="adult"]');
        var child = $('span[id="child"]');
        var tour = $('input[name="id-tour"]').val();
        var room = [];
        for (let index = 0; index < adult.length; index++) {
            room.push({
                adult: adult[index].innerHTML,
                child: child[index].innerHTML
            })
        }
        console.log(room);
        $.ajax({

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type: "get",
            url: "/tour/quote/"+tour,
            data: {
                room:room
            },
            statusCode: {
                404: function() {
                    alert( "page not found" );
                },
                200: function(data){
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
});

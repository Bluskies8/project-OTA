
$(document).ready(function() {
    var tour;
    $('.data-tour').on('change', function(){
        var date = $('#tour-date');
        tour = $('option[value="'+$(this).val()+'"]').attr('id');
        // console.log($('option[value="'+$(this).val()+'"]').attr('id'));
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type: "get",
            url: "/backoffice/tour/getDate/"+tour,
            beforeSend: function(){
            },
            success: function(res) {
                console.log(res);
                res.forEach(element => {
                    console.log(element.date_start)
                    date.append('<option value="'+element.date_start +' S/D '+element.date_end+'" id = "'+element.id+'">')
                });
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    });
    $('.data-date').on('change', function(){
        var date = $('option[value="'+$(this).val()+'"]').attr('id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type: "get",
            url: "/backoffice/tour/getPass/"+tour+"/"+date,
            beforeSend: function(){
            },
            success: function(res) {
                console.log(res);
                res.forEach(function(e,index) {

                    console.log(e)
                    $('#table-tours tbody').append(
                        "<tr id = '" + e.id+"'>" +
                            "<td>"+ (index+1)+"</td>"+
                            "<td>"+ e.bookingCode +"</td>"+
                            "<td>"+ e.customer.guest_name +"</td>"+
                            "<td>"+ e.total +"</td>"+
                            "<td>"+ e.payment_url +"</td>"+
                            "<td>"+ e.payment_status +"</td>"+
                            "<td><i class='fas fa-exclamation-circle text-primary detail-booking'></i> <i class='fas fa-link text-primary create-link'></i></td>"+
                        "</tr>"
                    );
                });
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    });
    $('#table-tours tbody').on('click','.detail-booking',function (){
        console.log($(this).closest('tr').children().eq(1).html());
        window.location.href = "/backoffice/tour/detailBooking/"+$(this).closest('tr').children().eq(1).html();
    });
    $('#table-tours tbody').on('click','.create-link',function (){
        console.log($(this).closest('tr').find('td').eq(4).text());
        var payment = $(this).closest('tr').find('td').eq(4);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type: "get",
            url: "/backoffice/tour/generatePayment/"+$(this).closest('tr').attr('id'),
            beforeSend: function(){
            },
            success: function(res) {
                console.log(res);
                payment.text(res)
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    });
});

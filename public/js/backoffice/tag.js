$(document).ready(function() {
    if ($('#table-tag').length) {
        $('#table-tag').DataTable({
            columns: [
                null,
                null,
                { orderable: false }
            ],
        });
    }

    $('#table-tag tbody').on('click', '.tag-name', function() {
        $(this).hide();
        $(this).next().show();
    });

    $('#table-tag tbody').on('blur', '.input-tag-name', function() {
        $(this).hide();
        $(this).prev().text($(this).val());
        $(this).prev().show();
    });

    $('.save-tag').on('click', function(){
        console.log($(this).closest('tr').find('input').val());
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type: "post",
            url: "/backoffice/tag/update",
            data:{
                'id' : $(this).closest('tr').attr('id'),
                'name' :$(this).closest('tr').find('input').val()
            },
            beforeSend: function(){
            },
            success: function(res) {
                console.log(res);
                if(res = "success"){
                    alert('success');
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
    });

    $('.delete-tag').on('click', function(){
        var temp = $(this);
        console.log($(this).parent().parent());
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type: "delete",
            url: "/backoffice/tag/"+$(this).closest('tr').attr('id'),
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

    if (getCookie('transaksi-intro_halaman') != 'done') {
        introHalaman();
    }
    function introHalaman() {
        introJs().setOptions({
            showBullets: false,
            showProgress: true,
            disableInteraction: true,
            steps: [
                {
                    title: "Tutorial",
                    intro: "Berikut adalah tutorial cara menggunakan halaman ini"
                }, {
                    title: "Tutorial Tags",
                    element: document.querySelector('#add-tag'),
                    intro: "Bagian ini digunakan untuk membuat tag baru",
                }, {
                    title: "Tutorial Tags",
                    element: document.querySelector('.table-responsive'),
                    intro: "Bagian ini berisikan tag-tag yang ada",
                }, {
                    title: "Tutorial Tags",
                    element: document.querySelector('.tag-name:nth-child(1)'),
                    intro: "Klik pada bagian ini untuk merubah nama tag",
                }, {
                    title: "Tutorial Tags",
                    element: document.querySelector('.save-tag:nth-child(1)'),
                    intro: "Klik tombol ini untuk menyimpan perubahan",
                },
            ]
        }).start();
        setCookie('transaksi-intro_halaman', 'done', 7);
    }

    function setCookie(cname, cvalue, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        let expires = "expires="+d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        let name = cname + "=";
        let ca = document.cookie.split(';');
        for(let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
});

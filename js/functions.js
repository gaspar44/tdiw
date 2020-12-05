$(document).ready(function () {
    $(document).on('click', '.category_nav', function () {
        let dataToUse = $(this).data('value'), httpMethod = $(this).data("httpMethod");
        console.log('Hi, Renzo!')
        $.ajax({
            url: "index.php",
            type: httpMethod,
            data: dataToUse,
            success: function (html) {
                if(html['error']){
                    $('body').html(html);
                }else{
                    $('#content').html(html);
                }
            },
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.Message);
            }
        })
    });

    $(document).on('click', '.button_detail_add_cart', function () {
        let dataToUse = $(this).data('value');
        console.log('Hi, Renzo!')
        $.ajax({
            url: "index.php",
            type: "POST",
            data: dataToUse,
            success: function (html) {
                console.log("producto agregado");
                $('#content').html(html);
            },
            error: function() {
                window.location.replace("/index.php?action=login&async=false");
            }
        })
    });
});
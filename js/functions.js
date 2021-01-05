$(document).ready(function () {
    $(document).on('click', '.category_nav', function (e) {
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
        e.stopImmediatePropagation();
        return false;
    });

    $(document).one('click',".button_detail_add_cart",function (e) {
        let dataToUse = $(this).data('value');
        let cantity = document.getElementById("amount").value;
        dataToUse = dataToUse + "&amount=" + cantity;

        console.log('Hi, Renzo!')
        $.ajax({
            url: "index.php",
            type: "POST",
            data: dataToUse,
            success: function (html) {
                alert("producto agregado");
            },
            error: function() {
                window.location.replace("/index.php?action=login&async=false");
            }
        })
        e.stopImmediatePropagation();
        return false;
    });
});
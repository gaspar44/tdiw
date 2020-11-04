$(document).ready(function () {
    $(document).on('click', '.category_nav', function () {
        let dataToUse = $(this).data('value'), httpMethod = $(this).data("httpMethod");
        console.log('Hi, Renzo!')
        $.ajax({
            url: "index.php",
            type: httpMethod,
            data: dataToUse,
            success: function (html) {
                // document.write(html);
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
});

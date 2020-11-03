$(document).ready(function () {
    $("a").click(function () {
         var dataToUse = $(this).attr('value');
         var httpMethod = $(this).attr("httpMethod");
        $.ajax({
            url: "index.php",
            type: httpMethod,
            data: dataToUse,
            success: function (html){
                document.write(html);
            }
            })
    });
});

$(document).ready(function () {
    $("#password, #newPassword").keyup(checkPassword);
});

function checkPassword() {
    var password = $("#password").val();
    var newPassword = $("#newPassword").val();

    if (password != newPassword){
        console.log("Hola");
    }
    else {
        console.log("Adios");
    }
}
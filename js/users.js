function checkPassword(form) {
    let password = form.password.value;
    let newPassword = form.newPassword.value;

    if (password != newPassword){
        alert("Las contraseñas no coinciden");
        return false;
    }
    return true;
}

function emptyBuyingCar() {
    let  getUrl = window.location
    let baseUrl = getUrl .protocol+ "//" + getUrl.host + "/"  +getUrl.pathname.split('/')[1];
    var httpRequest = new XMLHttpRequest();

    httpRequest.open("GET",baseUrl + "?async=false&action=emptyBuyingCar"),false;
    httpRequest.send(null);
    location.reload();
}
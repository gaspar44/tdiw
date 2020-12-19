function checkPassword(form) {
    let password = form.password.value;
    let newPassword = form.newPassword.value;

    if (password === "" && newPassword === "" && form.action.includes("/controller/User_Profile.php") )
        return true;


    if (password !== newPassword){
        alert("Las contraseñas no coinciden");
        return false;
    }
    return true;
}

function getUrl() {
    let ServerUrl = window.location
    return ServerUrl .protocol + "//" + ServerUrl.host + "/"  +ServerUrl.pathname.split('/')[1];
}

function makeHttpRequest(url,httpMethod) {
    console.log(url);
    var httpRequest = new XMLHttpRequest();

    httpRequest.open(httpMethod,url,false);
    httpRequest.send(null);
    console.log(httpRequest.responseText);

    httpRequest.status !== 200 ? this.body = httpRequest.responseText: location.reload();
}

function emptyBuyingCar() {
    let baseUrl = getUrl();
    const URL_ACTION = "?async=false&action=emptyBuyingCar";
    const HTTP_METHOD = "GET"

    makeHttpRequest(baseUrl + URL_ACTION,HTTP_METHOD);
}

function finishShopping() {
    let baseUrl = getUrl();
    const URL_ACTION = "?async=false&action=finishShopping";
    const HTTP_METHOD = "GET";

    makeHttpRequest(baseUrl + URL_ACTION,HTTP_METHOD);
}
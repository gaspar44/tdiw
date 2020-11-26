function checkPassword(form) {
    let password = form.password.value;
    let newPassword = form.newPassword.value;

    if (password != newPassword){
        alert("Las contraseñas no coinciden");
        return false;
    }

    return true;
}

function checkIfUserIsLogged() {
    var cookie = document.cookie;
    if (cookie.includes("userName")) {
        document.getElementById("userSesion").innerHTML = `<p>er Huevo </p>` + cookie;
    }
}
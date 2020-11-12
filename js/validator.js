function checkPassword(form) {
    let password = form.password.value;
    let newPassword = form.newPassword.value;

    if (password != newPassword){
        alert("Incorrect Password");
        return false;
    }

    return true;
}
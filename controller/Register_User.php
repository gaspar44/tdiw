<?php
require_once __DIR__. "/../model/User.php";

$userName = $_POST["mail"];
$address = $_POST["direccion"];
$poblation = $_POST["poblacion"];
$postalCode = $_POST["codigo_postal"];
$userRealNames = $_POST["nombres"];
$password = $_POST["password"];

$user = new User($userName,$password,$address,$poblation,$postalCode,$userRealNames);
$exists = $user->exists();

if ($exists) {
    require_once __DIR__.'/../view/userExists.html';
    return;
}
else {
    $isOk = $user->registerUser();

    if ($isOk) {
        require_once __DIR__. '/../view/userCreateSuccess.html';
        return;
    }

    else {
        require_once  __DIR__. '/../view/userCreateError.html';
    }
}
?>
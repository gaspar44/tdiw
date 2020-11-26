<?php
require_once __DIR__. "/../model/User_Factory.php";

$userName = $_POST["mail"];
$address = $_POST["direccion"];
$poblation = $_POST["poblacion"];
$postalCode = $_POST["codigo_postal"];
$userRealNames = $_POST["nombres"];
$password = $_POST["password"];

$factory = new UserFactory();
$user = $factory->getUser($userName,$password,$address,$poblation,$postalCode,$userRealNames);
$exists = $user->exists();

if ($exists) {
    require_once __DIR__.'/../view/userExists.html';
    return;
}

$isOk = $user->registerUser();

if ($isOk) {
    require_once __DIR__. '/../view/userCreateSuccess.html';
    return;
}

require_once  __DIR__. '/../view/userCreateError.html';
?>
<?php
require_once __DIR__. "/../model/User_Factory.php";
require_once __DIR__ . "/../model/Message.php";

$userName = $_POST["mail"] ?? null;
$address = $_POST["direccion"] ?? null;
$poblation = $_POST["poblacion"] ?? null;
$postalCode = $_POST["codigo_postal"] ?? null;
$userRealNames = $_POST["nombres"] ?? null;
$password = $_POST["password"] ?? null;
$repitPassword = $_POST["newPassword"] ?? null;

if (is_null($userName) || is_null($address) || is_null($poblation) || is_null($postalCode) || is_null($userRealNames) || is_null($password) || is_null($repitPassword)) {
    http_response_code(400);
    die();
}

if (filter_var($userName,FILTER_VALIDATE_EMAIL) == false) {
    echo "error en corrreo";
    require_once __DIR__ . '/../view/RegistroUsuario.html';
    return;
}

if (!preg_match('/\d{5}/',$postalCode)) {
    require_once __DIR__ . '/../view/RegistroUsuario.html';
    return;
}

if ($repitPassword != $password) {
    echo "contraseñas no coinciden";
    require_once  __DIR__ . '/../view/RegistroUsuario.html';
    return;
}

$factory = new UserFactory();
$user = $factory->getUser($userName,$password,$address,$poblation,$postalCode,$userRealNames);
$exists = $user->exists();

if ($exists) {
    $message = new Message("El usuario ya existe","Ya existe");
    require_once __DIR__.'/../view/userMessage.php';
    return;
}

$isOk = $user->registerUser();

if ($isOk) {
    $message = new Message("Usuario creado con éxito","SUCCESS");
    require_once __DIR__ . '/../view/userMessage.php';
    return;
}

$message = new Message("Hubo error","ERROR");

require_once __DIR__ . '/../view/userMessage.php';
?>
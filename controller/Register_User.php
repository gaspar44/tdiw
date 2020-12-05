<?php
require_once __DIR__. "/../model/User_Factory.php";
require_once __DIR__ . "/../model/Message.php";

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
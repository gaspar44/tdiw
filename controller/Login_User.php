<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    return;
}

require_once __DIR__ . '/../model/User_Factory.php';
$userName = $_POST["usuario"] ?? null;

if (!is_null($userName)) {
    $userName = filter_var($userName,FILTER_VALIDATE_EMAIL);
}

$password = $_POST["password"];

$factory = new UserFactory();
$user = $factory->getUserByName($userName,$password);

if (!$user->exists()) {
    require_once __DIR__ . '../view/userCreateError.html';
}

$user =$user->getUser();

if (is_null($user)) {
    require_once __DIR__ .'/../view/userCreateError.html';
}
print_r($user->getUserRealNames());

?>
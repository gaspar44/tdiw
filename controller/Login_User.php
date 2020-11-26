<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    return;
}

require_once __DIR__ . '/../model/User_Factory.php';
$userName = $_POST["usuario"] ?? null;

if (!is_null($userName)) {
    $userName = filter_var($userName,FILTER_VALIDATE_EMAIL);
    $userName = htmlentities($userName,ENT_QUOTES | ENT_HTML5,'UTF-8');
}

$password = $_POST["password"];

$userFactory = new UserFactory();

$userToLog = $userFactory->getUserByName($userName,$password);

$userToLog->getUser();
?>
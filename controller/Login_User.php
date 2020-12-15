<?php

require_once __DIR__ . '/../model/User_Factory.php';
require_once  __DIR__ . '/../model/Message.php';
require_once __DIR__ . '/../model/Shopping_Car.php';

function sessionStart($user) {
    session_start();

    $sessionID = md5(uniqid(rand(),true));
    $_SESSION["sessionID"] = $sessionID;
    $_SESSION["realName"] = $user->getUserRealNames();
    $_SESSION["userID"] = $user->getId();
    $_SESSION["shoppingCar"] = serialize(new ShoppingCar());

    setcookie("realName",$user->getUserRealNames(),time() + 3600,"/");
    setcookie("sessionID",$sessionID,time() + 3600,"/");
    session_regenerate_id(true);
    header("Location: ../index.php");
}

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    http_response_code(405);
    exit;
}

$userName = $_POST["usuario"] ?? null;
$title = "ERROR";

if (!is_null($userName)) {
    $userName = filter_var($userName,FILTER_VALIDATE_EMAIL);
    if ($userName == false){
        return;
    }
}

$password = $_POST["password"];

$factory = new UserFactory();
$user = $factory->getUserByLoginIt($userName,$password);

if (!$user->exists()) {
    $content = "Error in user or password";
    $message = new Message($content,$title);
    require_once __DIR__ . '/../view/userMessage.php';
    return;
}

$user = $user->getUser();

if (is_null($user)) {
    $content = "Error in user or password";
    $message = new Message($content,$title);
    require_once __DIR__ . '/../view/userMessage.php';
    return;
}

sessionStart($user);
exit();
?>
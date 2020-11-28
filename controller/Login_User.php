<?php
function sessionStart($user) {
    session_start();

    $sessionID = md5(uniqid(rand(),true));
    $_SESSION["sessionID"] = $sessionID;
    $_SESSION["realName"] = $user->getUserRealNames();

    setcookie("realName",$user->getUserRealNames(),time() + 3600,"/");
    session_regenerate_id(true);
    header("Location: ../index.php");
}

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
$user = $factory->getUserByLoginIt($userName,$password);

if (!$user->exists()) {
    require_once __DIR__ . '/../view/userCreateError.html';
    return;
}

$user =$user->getUser();

if (is_null($user)) {
    require_once __DIR__ .'/../view/userCreateError.html';
    return;
}

sessionStart($user);
exit();

?>
<?php
require_once __DIR__ . "/../model/Message.php";
require_once __DIR__ . '/../model/User_Factory.php';
require_once __DIR__ . '/../model/User.php';

function updateUserSessionData($user) {
    $_SESSION["realName"] = $user->getUserRealNames();
    $_SESSION["userCP"] = $user->getPostalCode();
    $_SESSION["userPoblation"] = $user->getPoblation();
    $_SESSION["userAddress"] = $user->getAddress();

    setcookie("realName",null,-1,"/");
    setcookie("realName",$user->getUserRealNames(),time() + 3600,"/");
}

$userID = $_SESSION["userID"];
if (isset($_FILES) && ($_FILES["profile_image"]["size"]) != 0){
    require_once __DIR__ . '/../model/Files_Helper.php';

    $helper = new FilesHelper($userID);
    $srcFile = $_FILES["profile_image"]["tmp_name"];
    $destFile = $_FILES["profile_image"]["name"];

    $success = $helper->saveFileToDiskAndDatabase($srcFile,$destFile);

    if (!$success){
        $message = new Message("Error actualizando al usuario","ERROR");
        require_once __DIR__.'/../view/userMessage.php';
        return;
    }

   $_SESSION["routeToPicture"] = $helper->getNewPictureName();
}

$userName = $_SESSION["userName"];
$address = $_POST["direccion"];
$poblation = $_POST["poblacion"];
$postalCode = $_POST["codigo_postal"];
$userRealNames = $_POST["nombres"];
$password = $_POST["password"] ?? null;

$factory = new UserFactory();
$user = $factory->getUserForUpdate($userName,$address,$poblation,$postalCode,$userRealNames);

$user->setId($userID);
$user->updateWithoutPassword();

updateUserSessionData($user);

if (!empty($password)) {
    $user->setPassword($password);
    $ok = $user->updatePassword();

    if (!ok) {
        $message = new Message("Error actualizando al usuario","ERROR");
        require_once __DIR__.'/../view/userMessage.php';
        return;
    }
}

$message = new Message("Usuario actualizado con éxito","SUCCESS");
require_once __DIR__.'/../view/userMessage.php';
?>
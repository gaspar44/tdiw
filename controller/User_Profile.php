<?php
require_once __DIR__ . '/../model/Http_codes.php';

if(!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION["shoppingCar"])) {
    http_response_code(HTTP_UNAUTHORIZED_CODE);
    die();
}


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    require_once __DIR__ . '/../view/UserProfile.php';
}

elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once __DIR__ . '/User_Profile_Updater.php';
}

else {
    http_response_code(HTTP_METHOD_NOT_ALLOWED_CODE);
    die();
}

?>
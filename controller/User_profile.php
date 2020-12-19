<?php
session_start();

if (!isset($_SESSION["shoppingCar"])) {
    http_response_code(401);
    die();
}


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    require_once __DIR__ . '/../view/UserProfile.php';
}

elseif ($_SERVER["REQUEST_METHOD"] == "POST") {

    print_r($_SESSION);
}

else {
    http_response_code(405);
    die();
}

?>
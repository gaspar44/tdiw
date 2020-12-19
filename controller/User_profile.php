<?php

if (!isset($_SESSION["shoppingCar"])) {
    http_response_code(401);
    die();
}

require_once __DIR__ . '/../view/UserProfile.php';

?>
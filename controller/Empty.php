<?php
require_once __DIR__ . '/../model/Shopping_Car.php';
require_once __DIR__ . '/../model/Http_codes.php';
if (isset($_SESSION["sessionID"]) && $_SESSION["realName"] && $_COOKIE["sessionID"] == $_SESSION["sessionID"]) {
    $_SESSION["shoppingCar"] = serialize(new ShoppingCar());
}

else {
    http_response_code(HTTP_UNAUTHORIZED_CODE);
    exit;
}

?>
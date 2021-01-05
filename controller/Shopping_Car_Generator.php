<?php
require_once __DIR__ . '/../model/Product.php';
require_once __DIR__ . '/../model/Shopping_Car.php';
require_once __DIR__ . '/../model/Http_codes.php';


if (!isset($_SESSION["shoppingCar"])) {
    http_response_code(HTTP_UNAUTHORIZED_CODE);
    die();
}

$actualBuyingCar = unserialize($_SESSION["shoppingCar"]);

require_once __DIR__. '/../view/shopping_user_car.php';

?>
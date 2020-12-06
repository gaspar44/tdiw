<?php
require_once __DIR__ . '/../model/Product.php';
require_once __DIR__ . '/../model/Shopping_Car.php';


if (!isset($_SESSION["shoppingCar"])) {
    http_response_code(401);
    die();
}

$actualBuyingCar = unserialize($_SESSION["shoppingCar"]);

require_once __DIR__. '/../view/shopping_user_car.php';

?>
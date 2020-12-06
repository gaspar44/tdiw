<?php
require_once __DIR__ . '/../model/Product.php';
require_once __DIR__ . '/../model/Shopping_Car.php';

if (!isset($_SESSION["shoppingCar"])) {
    http_response_code(401);
    return;
}

$actualBuyingCar = unserialize($_SESSION["shoppingCar"]);
$productToAddToCar = unserialize($_SESSION["actualProduct"]);

$actualBuyingCar->addProduct($productToAddToCar);

$_SESSION["shoppingCar"] = serialize($actualBuyingCar);

?>
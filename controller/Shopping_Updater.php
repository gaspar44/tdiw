<?php
require_once __DIR__ . '/../model/Product.php';
require_once __DIR__ . '/../model/Shopping_Car.php';


if (!isset($_SESSION["shoppingCar"])) {
    http_response_code(401);
    die();
}

$amountOfProductsToAdd = $_POST["amount"] ?? null;

if (! filter_var($amountOfProductsToAdd,FILTER_VALIDATE_INT) || $amountOfProductsToAdd <= 0) {
    http_response_code(400);
    die();
}

$actualBuyingCar = unserialize($_SESSION["shoppingCar"]);
$productToAddToCar = unserialize($_SESSION["actualProduct"]);

$actualBuyingCar->addProduct($productToAddToCar,$amountOfProductsToAdd);

$_SESSION["shoppingCar"] = serialize($actualBuyingCar);

?>
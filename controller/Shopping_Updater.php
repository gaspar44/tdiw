<?php
require_once __DIR__ . '/../model/Product.php';

if (!isset($_SESSION["shoppingCar"])) {
    http_response_code(401);
    return;
}



$actualBuyingCar = unserialize($_SESSION["shoppingCar"]);
$productToAddToCar = unserialize($_SESSION["actualProduct"]);

array_push($actualBuyingCar,$productToAddToCar);

$_SESSION["shoppingCar"] = serialize($actualBuyingCar);
//print_r($actualBuyingCar);


?>
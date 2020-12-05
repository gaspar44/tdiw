<?php
require_once __DIR__ . '/../model/Product.php';
if (!isset($_SESSION["shoppingCar"])) {
    http_response_code(401);
    return;
}

$actualBuyingCar = $_SESSION["shoppingCar"];
$productToAddToCar = $_SESSION["actualProduct"];
//array_push($actualBuyingCar,$productToAddToCar);
print_r( unserialize($productToAddToCar)->getPrice() );
print_r($_SESSION["shoppingCar"][0]->getName());

?>
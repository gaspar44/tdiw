<?php
require_once __DIR__ . '/../model/Products.php';
require_once __DIR__ . '/../model/Shopping_Car.php';

$products = new Products();
$categories = $products->getCategories();

if (isset($_SESSION["shoppingCar"])) {
    $shoppingCar = unserialize($_SESSION["shoppingCar"]);
}

require_once __DIR__.'/../view/base.php';

?>
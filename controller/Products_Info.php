<?php
require_once __DIR__ . '/../model/Products.php';
require_once __DIR__ . '/../model/Product.php';

$categoryID = $_GET["category_id"] ?? null;

if (is_null($categoryID)) {
    require_once __DIR__.'../view/404.html';
    return;
}

$products = new Products();
$productsList = $products->getProductsInCategory($categoryID);

$productToDisplay = $productsList[$productID];

if (is_null($productToDisplay)) {
    require_once __DIR__. '/../view/404.html';
    return;
}

require_once __DIR__ . '/../view/product_display.php';
?>


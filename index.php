<?php
require __DIR__.'/controller/Products.php';
$http_action = $_GET["action"] ?? null;

switch ($http_action) {
    case 'listProduct':
        $productID = $_GET["category_id"] ?? null;
        $products->getProductsInCategory($productID);
        break;
    default :
        break;
}
?>
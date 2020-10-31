<?php
require_once __DIR__.'/controller/List_Products.php';
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
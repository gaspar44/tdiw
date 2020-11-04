<?php


$http_action = $_GET["action"] ?? null;
if (!$_GET['async']) {
    require_once __DIR__ . '/controller/List_Categories.php';
}
switch ($http_action) {
    case 'listProduct':
        $categoryID = $_GET["category_id"] ?? null;
        require_once __DIR__ . '/controller/List_Products.php';
        break;
    case 'getProductInfo':
        $productID = $_GET["product_id"] ?? null;
        require_once __DIR__ . '/controller/Products_Info.php';
        break;
    default :
        break;
}

?>
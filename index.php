<?php
$http_action = $_GET["action"] ?? null;

switch ($http_action) {
    case 'listProduct':
        $productID = $_GET["category_id"] ?? null;
        require_once __DIR__ . '/controller/List_Products.php';
        break;
    default :
        require __DIR__ . '/controller/List_Categories.php';
        break;
}
?>
<?php



$http_action = $_GET["action"] ?? null;

switch ($http_action) {
    case 'listProduct':
        require __DIR__.'/controller/list_products_in_category.php';
        break;
    default :
        require __DIR__.'/controller/list_products.php';
        break;
}
?>
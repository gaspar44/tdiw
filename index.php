<?php

$http_get_action = $_GET["action"] ?? null;
$isAsync = $_GET["async"] ?? null;

session_start();

if (!$isAsync) {
    require_once __DIR__ . '/controller/List_Categories.php';
}

switch ($http_get_action) {
    case 'listProduct':
        $categoryID = $_GET["category_id"] ?? null;
        require_once __DIR__ . '/controller/List_Products.php';
        break;
    case 'getProductInfo':
        $productID = $_GET["product_id"] ?? null;
        require_once __DIR__ . '/controller/Products_Info.php';
        break;
    case 'login':
        require_once __DIR__ . '/controller/Login.php';
        break;
    case 'userRegister':
        require_once __DIR__ . '/controller/Register.php';
        break;
    default :
        break;
}

$http_post_action = $_POST["action"] ?? null;


?>
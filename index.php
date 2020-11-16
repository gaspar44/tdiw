<?php


$http_action = $_GET["action"] ?? null;
$isAsync = $_GET["async"] ?? null;

if (!$isAsync) {
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
    case 'login':
        require_once __DIR__ . '/controller/iniciarSesion.php';
        break;
    case 'userRegister':
        require_once __DIR__ . '/controller/RegistroUsuario.php';
        break;
    default :
        break;
}

?>
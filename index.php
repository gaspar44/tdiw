<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $http_get_action = $_GET["action"] ?? null;
    $isAsync = $_GET["async"] ?? null;

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
        case 'logout':
            require_once __DIR__ . '/controller/Logout_User.php';
            break;
        case 'buyCar':
            require_once __DIR__ . '/controller/Shopping_Car_Generator.php';
            break;
        case 'emptyBuyingCar':
            require_once __DIR__ . '/controller/Empty.php';
        case 'finishShopping':
            require_once __DIR__ . '/controller/Shopping_Finisher.php';
            break;
        default :
            break;
    }
}

elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $http_post_action = $_POST["action"] ?? null;

    if (!is_null($http_post_action)) {
        switch ($http_post_action) {
            case 'updateShoppingCar':
                require_once __DIR__ . '/controller/Shopping_Updater.php';
                break;
            default:
                break;
        }
    }
}
?>
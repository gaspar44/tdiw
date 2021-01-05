<?php
require_once __DIR__ . '/../model/Shopping_Car.php';
require_once __DIR__ . '/../model/Order_Updater.php';
require_once __DIR__ . '/../model/Message.php';
require_once __DIR__ . '/../model/Http_codes.php';

function createCarError() {
    $title = "ERROR";
    $content = "Hubo un error al realizar su pedido";
    $message = new Message($content,$title);
    require_once __DIR__ .'/../view/userMessage.php';
    http_response_code(HTTP_INTERNAL_SERVER_ERROR);
    die();
}

if ( isset($_SESSION["sessionID"]) && isset($_SESSION["shoppingCar"]) ) {
    $actualCar = unserialize($_SESSION["shoppingCar"]);
    $userID = $_SESSION["userID"];

    $orderUpdater = new OrderUpdater($userID,$actualCar);
    $isSuccess = $orderUpdater->createComanda();

    if (!$isSuccess) {
        createCarError();
    }

    $isSuccess = $orderUpdater->createLineaComanda();
    $_SESSION["shoppingDone"] = "done";
    !$isSuccess ? createCarError() : $_SESSION["shoppingCar"] = serialize(new ShoppingCar());
}
?>
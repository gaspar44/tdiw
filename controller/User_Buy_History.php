<?php
require_once __DIR__ . '/../model/Http_codes.php';

if (!isset($_SESSION["userID"])) {
    http_response_code(HTTP_UNAUTHORIZED_CODE);
    die();
}

require_once __DIR__ . '/../model/Buying_History.php';
$userID = $_SESSION["userID"];

$history = new BuyingHistory($userID);

$orders = $history->getComanda();
$productsInOrders = $history->getLineaComanda();
$avoidRepitData = true;

require_once __DIR__ . '/../view/User_History.php';


?>
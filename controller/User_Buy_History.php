<?php

if (!isset($_SESSION["userID"])) {
    http_response_code(401);
    die();
}

require_once __DIR__ . '/../model/Buying_History.php';
$userID = $_SESSION["userID"];

$history = new BuyingHistory($userID);

$orders = $history->getComanda();
$productsInOrders = $history->getLineaComanda();
$avoidRepitData = true;

//foreach ($orders as $order){
//    echo $order[0] . "\n";
//}

//print_r($productsInOrders[2]);

require_once __DIR__ . '/../view/User_History.php';


?>
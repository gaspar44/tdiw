<?php

if (!isset($_SESSION["userID"])) {
    http_response_code(401);
    die();
}

require_once __DIR__ . '/../model/Buying_History.php';
$userID = $_SESSION["userID"];

$history = new BuyingHistory($userID);
$prueba = $history->getComanda();

print_r($prueba[0]["data"]);

?>
<?php
require_once __DIR__ . '/../model/Shopping_Car.php';
require_once __DIR__ . '/../model/Order_Updater.php';
if ( isset($_SESSION["sessionID"]) && isset($_SESSION["shoppingCar"]) ) {

    $actualCar = unserialize($_SESSION["shoppingCar"]);
    $userID = $_SESSION["userID"];

    $orderUpdater = new OrderUpdater($userID,$actualCar);
    $isSuccess = $orderUpdater->createComanda();

}
//$_SESSION["DEBUG"] = "";
?>
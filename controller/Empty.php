<?php
require_once __DIR__ . '/../model/Shopping_Car.php';
if (isset($_SESSION["sessionID"]) && $_SESSION["realName"] && $_COOKIE["sessionID"] == $_SESSION["sessionID"]) {
    $_SESSION["shoppingCar"] = serialize(new ShoppingCar());
}

?>
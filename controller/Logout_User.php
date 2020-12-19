<?php

if (isset($_SESSION["sessionID"]) && $_SESSION["realName"]) {
    unset($_SESSION["sessionID"]);

    unset($_SESSION["realName"]);
    unset($_SESSION["actualProduct"]);
    unset($_SESSION["userID"]);
    unset($_SESSION["userCP"] );
    unset($_SESSION["userPoblation"]);
    unset($_SESSION["userAddress"] );
    unset( $_SESSION["shoppingCar"]);

    unset($_COOKIE["PHPSESSID"]);
    unset($_COOKIE["realName"]);
    unset($_COOKIE["sesionID"]);

    setcookie("realName",null,-1,"/");
    setcookie("sessionID",null,-1,"/");
    setcookie("PHPSESSID",null,-1,"/");

    header("Location: index.php");
    exit();
}
?>
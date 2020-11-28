<?php

if (isset($_SESSION["sessionID"]) && $_SESSION["realName"]) {
    unset($_SESSION["sessionID"]);
    unset($_SESSION["realName"]);
    header("Location: index.php");
    exit();
}
?>
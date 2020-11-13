<?php
print_r($_POST);
$userName = $_POST["mail"];
require_once __DIR__. "/../model/User.php";
$user = new User();
$user->exists($userName);

?>
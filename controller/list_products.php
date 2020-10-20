<?php
require __DIR__.'/../model/connection.php';
$connectionToUse = new Connection();

$categories = $connectionToUse->getCategoriesElements();

require __DIR__.'/../view/menu.php';


?>
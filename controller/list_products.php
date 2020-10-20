<?php
require __DIR__.'/../model/connection.php';
$connectionToUse = new Connection();

$categories = $connectionToUse->getCategories();

require __DIR__.'/../view/menu.php';

$connectionToUse->getProductsInCategory(1);
?>
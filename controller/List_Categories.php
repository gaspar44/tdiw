<?php
require_once __DIR__ . '/../model/Products.php';

$products = new Products();
$categories = $products->getCategories();

require_once __DIR__.'/../view/menu.php';
?>
<?php
require_once __DIR__ . '/../model/Products.php';

$products = new Products();
print_r($productID);
$productsInCategory = $products->getProductsInCategory($productID);

if (!is_null($productsInCategory)) {
    require_once __DIR__ . '/../view/product_view.php';
}

?>
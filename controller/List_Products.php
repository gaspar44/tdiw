<?php

require_once __DIR__ . '/../model/Products.php';

if (! is_null($categoryID) ){
    $products = new Products();
    $productsInCategory = $products->getProductsInCategory($categoryID);
}

if (! empty($productsInCategory) ) {
    require_once __DIR__ . '/../view/products_view.php';
}

?>
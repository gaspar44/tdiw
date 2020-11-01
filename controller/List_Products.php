<?php

global $productsInCategory;

if (! is_null($categoryID) ){
    $productsInCategory = $products->getProductsInCategory($categoryID);
}

if (! empty($productsInCategory) ) {
    require_once __DIR__ . '/../view/product_view.php';
}

?>
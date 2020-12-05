<?php
require_once __DIR__ . '/Product.php';

class ShoppingCar {
    private $productList;

    public function __construct()
    {
        $this->productList = [];
    }
}
?>
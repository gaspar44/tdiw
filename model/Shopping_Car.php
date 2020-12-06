<?php
require_once __DIR__ . '/Product.php';
class ShoppingCar {
    private $products;
    private $total;

    public function __construct()
    {
        $this->products = array();
        $this->total = 0;
    }

    public function addProduct($product) {
        array_push($this->products,$product);
        $this->total = $this->total + $product->getPrice();
    }

    public function getTotal(): int
    {
        return floatval($this->total);
    }

    public function getProducts(): array
    {
        return $this->products;
    }
}
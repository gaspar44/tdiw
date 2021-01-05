<?php
require_once __DIR__ . '/Product.php';
class ShoppingCar {
    private $products;
    private $total;
    private $numberOfProduts;

    public function __construct()
    {
        $this->products = array();
        $this->total = 0;
        $this->numberOfProduts = 0;
    }

    public function addProduct($product,$amount) {
        for ($i = 0; $i < $amount;$i++) {
            array_push($this->products,$product);
            $this->total = $this->total + $product->getPrice();
            $this->numberOfProduts++;
        }
    }

    public function getTotal()
    {
        return floatval($this->total);
    }

    public function getNumberOfProucts() {
        return $this->numberOfProduts;
    }

    public function getProducts(): array
    {
        return $this->products;
    }
}
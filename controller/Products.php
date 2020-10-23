<?php
require_once __DIR__ . '/../model/Connection.php';

class Products {
    private $connectionToDatabase;

    public function __construct()
    {
        $this->connectionToDatabase = new Connection();
    }

    public function getCategories() {
     return $this->connectionToDatabase->getCategories();
    }

    public function getProductsInCategory($categoryID) {
        if  ( is_null($categoryID) ) {
            require  __DIR__.'/../view/404.php';
            return NULL;
        }


        $productsToFound = $this->connectionToDatabase->getProductsInCategory($categoryID);
        if ( is_null($productsToFound[0]) ) {
            require  __DIR__.'/../view/404.php';
            return NULL;
        }

        require __DIR__.'/../view/product_view.php';
    }
}

$products = new Products();
$categories = $products->getCategories();

require_once __DIR__.'/../view/menu.php';

?>
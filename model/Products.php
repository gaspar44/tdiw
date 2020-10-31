<?php
require_once __DIR__ . '/Connection.php';

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
            $this->pageNotFoundLoadHTML();
            return NULL;
        }

        $productsToFound = $this->connectionToDatabase->getProductsInCategory($categoryID);
        if ( is_null($productsToFound[0]) ) {
            $this->pageNotFoundLoadHTML();
            return NULL;
        }

        require __DIR__.'/../view/product_view.php';
    }

    private function pageNotFoundLoadHTML() {
        require_once __DIR__. '/../view/404.html';
    }
}

?>
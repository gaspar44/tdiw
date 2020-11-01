<?php
require_once __DIR__ . '/Connection.php';
require_once __DIR__ . '/Product.php';

class Products {
    private $connectionToDatabase;

    public function __construct()
    {
        $this->connectionToDatabase = new Connection();
    }

    public function getCategories() {
        $stringQuery = 'SELECT * FROM categoria';
        return $this->connectionToDatabase->doQuery($stringQuery);
    }

    public function getProductsInCategory($categoryID) {
        if  ( is_null($categoryID) ) {
            $this->pageNotFoundLoadHTML();
            return NULL;
        }

        $stringQuery = "SELECT * FROM producto WHERE categoria_id = $categoryID";
        $productsInCategory = $this->connectionToDatabase->doQuery($stringQuery);

        if ( empty($productsInCategory) ) {
            $this->pageNotFoundLoadHTML();
            return NULL;
        }

        $typeOfCategoryQuery = "SELECT nombre FROM categoria WHERE id= $categoryID";
        $foundedCategory = $this->connectionToDatabase->doQuery($typeOfCategoryQuery);
        $foundedCategory = $foundedCategory[0]["nombre"];

        $produtsToReturn = array();

        foreach ($productsInCategory as $product){
            $productToAdd = new Product($product["nombre"],$product["precio"],$product["descripcion"],$product["ruta"],$foundedCategory,$product["id"]);
            $produtsToReturn[$productToAdd->getID()] = $productToAdd;
        }

        return $produtsToReturn;
    }

    private function pageNotFoundLoadHTML() {
        require_once __DIR__. '/../view/404.html';
    }
}

?>
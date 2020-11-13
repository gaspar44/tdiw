<?php
require_once __DIR__ . '/Connection.php';
require_once __DIR__ . '/Product.php';

class Products
{
    private $connectionToDatabase;

    public function __construct()
    {
        $this->connectionToDatabase = new Connection();
    }

    public function getCategories()
    {
        return $this->connectionToDatabase->getCategories();
    }

    public function getProductsInCategory($categoryID)
    {
        if (is_null($categoryID)) {
            $this->pageNotFoundLoadHTML();
            return NULL;
        }

        $categoryToLookUp = 'category_id';

        $stringQuery = "SELECT * FROM producto WHERE categoria_id =:".$categoryToLookUp;
        $productsInCategory = $this->connectionToDatabase->doQuery($stringQuery,[$categoryToLookUp =>$categoryID]);

        if (empty($productsInCategory)) {
            $this->pageNotFoundLoadHTML();
            return NULL;
        }

        $typeOfCategoryToLookUp= 'id';
        $typeOfCategoryQuery = "SELECT nombre FROM categoria WHERE id=:".$typeOfCategoryToLookUp;
        $foundedCategory = $this->connectionToDatabase->doQuery($typeOfCategoryQuery,[$typeOfCategoryToLookUp => $categoryID]);
        $foundedCategory = $foundedCategory[0]["nombre"];

        $produtsToReturn = array();

        foreach ($productsInCategory as $product) {
            $productToAdd = new Product($product["nombre"], $product["precio"], $product["descripcion"], $product["ruta"], $foundedCategory, $product["id"], $categoryID);
            $produtsToReturn[$productToAdd->getID()] = $productToAdd;
        }
        return $produtsToReturn;
    }

    private function pageNotFoundLoadHTML()
    {
        require_once __DIR__ . '/../view/404.html';
    }
}

?>
<?php

class Connection {
private $databaseName = 'tdiwb8';
private $databaseUserName = 'tdiw-b8';
private $databasePassword;
private $databaseHost;
private $databaseConnection;

    public function __construct()
    {
        $this->setPassword();
        $this->setHost();
        try {
            $this->databaseConnection = new PDO('mysql:host=' . $this->databaseHost . ';dbname=' . $this->databaseName . ';port=3306;charset=utf8mb4', $this->databaseUserName, $this->databasePassword);
            $this->databaseConnection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function doQuery($stringQuery) {
        try  {
            $stmnt = $this->databaseConnection->query($stringQuery, PDO::FETCH_ASSOC);
            $stmnt = $this->databaseConnection->query($stringQuery, PDO::FETCH_ASSOC);
            return $stmnt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (Exception $exp) {
            echo $exp->getMessage();
            return null;
        }
    }


    private function setPassword() {
        $this->databasePassword = getenv('MYSQL_PASSWORD') == FALSE ? 'RwJv1j9D' : getenv('MYSQL_PASSWORD');
    }
    private function setHost(){
        $this->databaseHost = getenv('DATABASE_HOST') == FALSE ? 'localhost' : getenv('DATABASE_HOST');
    }

    public function getProductsInCategory($categoryID) {
        $stringQuery = "SELECT * FROM producto WHERE categoria_id = $categoryID";
        $productsInCategory = $this->doQuery($stringQuery);
        $typeOfCategoryQuery = "SELECT nombre FROM categoria WHERE id= $categoryID";
        $foundedCategory = $this->doQuery($typeOfCategoryQuery);

        return array($foundedCategory[0]["nombre"],$productsInCategory);
    }

    public function getProduct($productID){

    }
}
?>
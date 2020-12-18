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

    public function doQuery($stringQuery, $parameters) {
        try  {
            $stmnt = $this->databaseConnection->prepare($stringQuery);
            $stmnt->execute($parameters);

            if ( !(strpos($stringQuery,'UPDATE') !== false) && !(strpos($stringQuery,'INSERT') !== false) ){
                return $stmnt->fetchAll(PDO::FETCH_ASSOC);
            }

            return $stmnt;
        }

        catch (Exception $exp) {
            echo $exp->getMessage();
            return null;
        }
    }

    public function getCategories() {
        $stringQuery = "SELECT * FROM categoria";
        $stmnt =$this->databaseConnection->query($stringQuery, PDO::FETCH_ASSOC);
        return $stmnt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function setPassword() {
        $this->databasePassword = getenv('MYSQL_PASSWORD') == FALSE ? 'RwJv1j9D' : getenv('MYSQL_PASSWORD');
    }

    private function setHost(){
        $this->databaseHost = getenv('DATABASE_HOST') == FALSE ? 'localhost' : getenv('DATABASE_HOST');
    }
}
?>
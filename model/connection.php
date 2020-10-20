<?php


class Connection {
private $databaseName = 'tdiwb8';
private $databaseUserName = 'tdiw-b8';
private $databasePassword;
private $databaseHost = 'db';
private $databaseConnection;
    public function __construct()
    {
        $this->databasePassword = getenv('MYSQL_PASSWORD') == FALSE ? 'RwJv1j9D' : getenv('MYSQL_PASSWORD');
        try {
            $this->databaseConnection = new PDO('mysql:host=' . $this->databaseHost . ';dbname=' . $this->databaseName . ';port=3306;charset=utf8mb4', $this->databaseUserName, $this->databasePassword);
            $this->databaseConnection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getCategoriesElements() {
        try {
            $stringQuery = 'SELECT * FROM categoria';
            $stmnt = $this->databaseConnection->query($stringQuery, PDO::FETCH_ASSOC);
            $stmnt = $this->databaseConnection->query($stringQuery, PDO::FETCH_ASSOC);
            return $stmnt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $exp) {
            echo $exp->getMessage();
            return null;
        }
    }
}
?>
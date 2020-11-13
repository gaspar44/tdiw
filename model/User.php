<?php
require_once __DIR__. '/Connection.php';
class User {
    private $connection;
    private $pdo;

    public function __construct()
    {
        $this->connection = new Connection();
    }

    public function registerUser() {

    }

    public function getUser($userName){

    }

    public function exists($userName){
        $sqlQuery = 'SELECT * FROM usuario where nombre='.$userName;
        $prueba = $this->pdo->prepare($sqlQuery);
        print_r($prueba);
    }

}

?>
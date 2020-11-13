<?php
require_once __DIR__. '/Connection.php';
class User {
    private $connection;
    private $userName;
    private $password;
    private $address;
    private $poblation;
    private $postalCode;
    private $userRealNames;

    public function __construct($userName,$password,$address,$poblation,$postalCode,$userRealNames)
    {
        $this->connection = new Connection();
        $this->userName = $userName;
        $this->password = password_hash($password,PASSWORD_DEFAULT);
        $this->address = $address;
        $this->poblation = $poblation;
        $this->postalCode = $postalCode;
        $this->userRealNames = $userRealNames;

    }

    public function registerUser() {
        $sqlQuery = "INSERT INTO usuario (nombre,mail,password,direccion,poblacion,cp) 
VALUES ($this->userRealNames,$this->userName,$this->password,$this->address,$this->poblation,$this->postalCode);";
        return true;
    }

    public function getUser($userName){

    }

    public function exists(){
        $nameToLookUp = ':userName';
        $sqlQuery = 'SELECT * FROM usuario where nombre='.$nameToLookUp;
        $existsOrNo = $this->connection->doQuery($sqlQuery,$nameToLookUp,$this->userName);

        return !empty($existsOrNo);
    }

}

?>
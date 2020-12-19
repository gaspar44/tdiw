<?php
require_once __DIR__. '/Connection.php';
class User {
    private $connection;
    private $id;
    private $userName;
    private $userRealNames;
    private $postalCode;
    private $password;
    private $address;
    private $poblation;
    private $routeToPicture;


    public function __construct($userName,$password,$address,$poblation,$postalCode,$userRealNames,$enablePasswordHash)
    {
        $this->connection = new Connection();
        $this->userName = $userName;

        $this->password = $enablePasswordHash ? password_hash($password,PASSWORD_DEFAULT) : $password;
        $this->address = $address;
        $this->poblation = $poblation;
        $this->postalCode = $postalCode;
        $this->userRealNames = $userRealNames;
        $this->id = null;
        $this->routeToPicture = null;
    }

    public function registerUser() {
        $sqlQuery = 'INSERT INTO usuario (nombre,mail,password,direccion,poblacion,cp) VALUES (:realName,:userName,:password,:address,:poblation,:postalCode);';
        $parameters = [
            'realName' => $this->userRealNames,
            'userName' => $this->userName,
            'password' => $this->password,
            'address' => $this->address,
            'poblation' => $this->poblation,
            'postalCode' => $this->postalCode
        ];

        return empty( ! $this->connection->doQuery($sqlQuery,$parameters) );
    }

    private function fillAttributes($stmnt) {
        $this->userName = $stmnt["mail"];
        $this->password = $stmnt["password"];
        $this->address = $stmnt["direccion"];
        $this->poblation = $stmnt["poblacion"];
        $this->postalCode = $stmnt["cp"];
        $this->userRealNames = $stmnt["nombre"];
        $this->id = $stmnt["id"];
        $this->routeToPicture = $stmnt["Picture"];
    }

    public function getUser(){
        $stmnt = $this->getUserInfo();
        $passwordToCompare = $stmnt[0]["password"];
        $match = password_verify($this->password,$passwordToCompare);

        if (empty($stmnt) || !$match){
            return null;
        }

        $this->fillAttributes($stmnt[0]);
        return $this;
    }

    private function getUserInfo() {
        $nameToLookUp = 'userName';
        $sqlQuery = 'SELECT * FROM usuario where mail=:'.$nameToLookUp;
        return $this->connection->doQuery($sqlQuery,[$nameToLookUp => $this->userName]);
    }

    public function exists(){
        $existsOrNo = $this->getUserInfo();
        return !empty($existsOrNo);
    }

    public function updateWithoutPassword()
    {
        $parameters = [
            'realName' => $this->userRealNames,
            'userName' => $this->userName,
            'address' => $this->address,
            'poblation' => $this->poblation,
            'postalCode' => $this->postalCode,
            'userID' => $this->id
        ];

        $sqlQuery = 'UPDATE usuario SET nombre=:realName,mail=:userName,poblacion=:poblation,direccion=:address,cp=:postalCode WHERE id=:userID';
        $this->connection->doQuery($sqlQuery,$parameters);

    }

    public function updatePassword()
    {
        $parameters = [
            'userID' => $this->id,
            'password' => $this->password
        ];

        $sqlQuery= 'UPDATE usuario SET password=:password WHERE id=:userID';

        return empty ( ! $this->connection->doQuery($sqlQuery,$parameters) );
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName): void
    {
        $this->userName = $userName;
    }

    /**
     * @param false|mixed|string|null $password
     */
    public function setPassword($password): void
    {
        $this->password = password_hash($password,PASSWORD_DEFAULT);
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getPoblation()
    {
        return $this->poblation;
    }

    /**
     * @param mixed $poblation
     */
    public function setPoblation($poblation): void
    {
        $this->poblation = $poblation;
    }

    /**
     * @return mixed
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param mixed $postalCode
     */
    public function setPostalCode($postalCode): void
    {
        $this->postalCode = $postalCode;
    }

    /**
     * @return mixed
     */
    public function getUserRealNames()
    {
        return $this->userRealNames;
    }

    /**
     * @param mixed $userRealNames
     */
    public function setUserRealNames($userRealNames): void
    {
        $this->userRealNames = $userRealNames;
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getRouteToPicture()
    {
        return $this->routeToPicture;
    }
}
?>
<?php
require_once __DIR__ . '/Connection.php';
class BuyingHistory {
    private $connection;
    private $userID;
    private $comandaList;
    private $linea_comandaList;

    public function __construct($userID) {
        $this->connection = new Connection();
        $this->userID = $userID;
    }

    public function getComanda(){
        $sqlQuery = 'SELECT * FROM comanda WHERE usuario_id=:id';
        $parameters = [
          'id' => $this->userID
        ];

        $stmt = $this->connection->doQuery($sqlQuery,$parameters);
        $this->comandaList = !(empty($stmt)) ? $stmt : null;
        return $this->comandaList;
    }
}

?>
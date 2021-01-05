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
        $this->comandaList = null;
        $this->linea_comandaList = array();
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

    public function getLineaComanda() {
        if (empty($this->comandaList)) {
            $this->getComanda();
        }

        $sqlQuery = 'SELECT * FROM linea_comanda WHERE comanda_id=:orderID';
        foreach ($this->comandaList as $order) {
            $parameters = [
              'orderID' => $order["id"]
            ];

            $stmt = $this->connection->doQuery($sqlQuery,$parameters);

            if (!empty($stmt)) {
                array_push($this->linea_comandaList,$stmt);
            }
        }

        return $this->linea_comandaList;
    }
}

?>
<?php
require_once __DIR__ .'/Shopping_Car.php';
require_once __DIR__ .'/Connection.php';
class OrderUpdater {
    private $connectionToDatabase;
    private $shoppingCar;
    private $userID;

    public function __construct($userID,$shoppingCar)
    {
        $this->userID = $userID;
        $this->shoppingCar = $shoppingCar;
        $this->connectionToDatabase = new Connection();
    }

    public function createComanda() {
        if ($this->shoppingCar->getNumberOfProucts() )
            return false;

        $actualTime = date("Y-m-d H:i:s");
        $parameters = [
            'userID' => $this->userID,
            'actualTime' => $actualTime,
            'totalProducts' => $this->shoppingCar->getNumberOfProucts(),
            'totalPrice' => $this->shoppingCar->getTotal()
        ];

        $sqlQuery = "INSERT INTO comanda (usuario_id,data,nElementos,total) VALUES (:userID,:actualTime,:totalProducts,:totalPrice)";
        $prueba =$this->connectionToDatabase->doQuery($sqlQuery,$parameters);

        //$getSqlQuery = "SELECT id FROM comanda WHERE usuario_id=:"
        return empty( ! $prueba);
    }
}
?>

<?php
require_once __DIR__ .'/Shopping_Car.php';
require_once __DIR__ .'/Connection.php';
class OrderUpdater {
    private $connectionToDatabase;
    private $shoppingCar;
    private $userID;
    private $commandID;

    public function __construct($userID,$shoppingCar)
    {
        $this->userID = $userID;
        $this->shoppingCar = $shoppingCar;
        $this->connectionToDatabase = new Connection();
    }

    public function createComanda() {
        if ($this->shoppingCar->getNumberOfProucts() == 0)
            return false;

        $actualTime = date("Y-m-d H:i:s");
        $parameters = [
            'userID' => $this->userID,
            'actualTime' => $actualTime,
            'totalProducts' => $this->shoppingCar->getNumberOfProucts(),
            'totalPrice' => $this->shoppingCar->getTotal()
        ];

        $sqlQuery = "INSERT INTO comanda (usuario_id,data,nElementos,total) VALUES (:userID,:actualTime,:totalProducts,:totalPrice)";
        $done = $this->connectionToDatabase->doQuery($sqlQuery,$parameters);

        $this->getCommandID($actualTime);

        return empty( ! $done);
    }

    private function getCommandID($time) {
        $parameters = [
            'userID' => $this->userID,
            'actualTime' => $time
        ];

        $sqlQuery = "SELECT id from comanda WHERE usuario_id=:userID AND data=:actualTime";
        $result = $this->connectionToDatabase->doQuery($sqlQuery,$parameters);

        $this->commandID = isset($result[0]["id"]) ? $result[0]["id"] : -1;
    }

    public function createLineaComanda() {
        if ($this->commandID == -1)
            return false;

        $products = $this->shoppingCar->getProducts();

        $sqlQuery = "INSERT INTO linea_comanda (comanda_id,producto_id,nombre_producto,precio_unidad,precio_total,cantidad) 
VALUES (:commandID,:productID,:productName,:productPrice,:productTotalPrice,1)";

        foreach ($products as $product) {
            $parameters = [
              'commandID' => $this->commandID,
              'productID' => $product->getID(),
                'productName' => $product->getName(),
                'productPrice' => $product->getPrice(),
                'productTotalPrice' => $product->getPrice()
            ];

            $this->connectionToDatabase->doQuery($sqlQuery,$parameters);
        }
        return true;
    }
}
?>

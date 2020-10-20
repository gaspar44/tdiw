<?php

function getConnection() {
    $databaseName = 'tdiwb8';
    $databaseUserName = 'tdiw-b8';
    $databasePassword = getenv('MYSQL_PASSWORD') == FALSE ? 'RwJv1j9D' : getenv('MYSQL_PASSWORD');
    $databaseHost = 'db';
    try {
        $connection = new PDO('mysql:host='.$databaseHost.';dbname='.$databaseName.';port=3306;charset=utf8mb4',$databaseUserName,$databasePassword);
        $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return $connection;

    } catch(PDOException $e) {
        echo $e->getMessage();
    }
}
?>
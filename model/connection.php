<?php


function getConnection() {
    $databaseName = 'tdiwb8';
    $databaseUserName = 'tdiw-b8';
    $databasePassword = getenv('MYSQL_PASSWORD') == FALSE ? 'RwJv1j9D' : getenv('MYSQL_PASSWORD');
    $databaseHost = 'db';
    try {
        $connection = new PDO('mysql:host='.$databaseHost.';dbname='.$databaseName.';port=3306;charset=utf8mb4',$databaseUserName,$databasePassword);
        $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $stringQuery = 'SELECT * FROM categoria';
        $stmnt = $connection->query($stringQuery,\PDO::FETCH_ASSOC);
        return $stmnt->fetchAll(PDO::FETCH_ASSOC);

    } catch(PDOException $e) {
        
        echo $e->getMessage();
    }


    
    // return $connection;
}


?>
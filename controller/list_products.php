<?php
require_once __DIR__.'/../model/connection.php';

function getCategories() {
    $prueba = getConnection();
    $stringQuery = 'SELECT * FROM categoria';

    try {
        $stmnt = $prueba->query($stringQuery,PDO::FETCH_ASSOC);
    }
    catch (Exception $exp) {
        return null;
    }   

    return $stmnt->FecthAll(PDO::FETCH_ASSOC);
}

?>
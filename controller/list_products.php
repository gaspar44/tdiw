<?php
require __DIR__.'/../model/connection.php';

function getCategories() {
    $stringQuery = 'SELECT * FROM categoria';

    try {
        $conn = getConnection();
        $stmnt = $conn->query($stringQuery,\PDO::FETCH_ASSOC);
        $stmnt = $conn->query($stringQuery,PDO::FETCH_ASSOC);
        return $stmnt->fetchAll(PDO::FETCH_ASSOC);
    }
    catch (Exception $exp) {
        echo $exp->getMessage();
        return null;
    }
}

?>
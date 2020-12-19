<?php
if (isset($_FILES) && ($_FILES["profile_image"]["size"]) != 0){
    require_once __DIR__ . '/../model/Files_Helper.php';

    $helper = new FilesHelper($_SESSION["userID"]);
    $srcFile = $_FILES["profile_image"]["tmp_name"];
    $destFile = $_FILES["profile_image"]["name"];

    $success = $helper->saveFileToDiskAndDatabase($srcFile,$destFile);
}
?>
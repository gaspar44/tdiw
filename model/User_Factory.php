<?php
require_once __DIR__ . '/User.php';
class UserFactory {
    public static function getUser($userName,$password,$address,$poblation,$postalCode,$userRealNames){
        return new User($userName,$password,$address,$poblation,$postalCode,$userRealNames,true);
    }

    public static function getUserByName($userName,$password) {
        return new User($userName,$password,null,null,null,null,false);
    }
}
?>
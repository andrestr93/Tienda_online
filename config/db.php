<?php

class Database {

    public static function connect() {
        $db = new mysqli('localhost:3308', 'root', '', 'tienda__master');
        $db->query("SET NAMES 'utf8'");
        return $db;
    }

}

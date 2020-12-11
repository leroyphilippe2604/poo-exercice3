<?php
    class DataBase{
        public static function connect($dbName){
            $pdo = new PDO('mysql:host=mysqldb;dbname=' . $dbName . '', 'root', 'root');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            return $pdo;
        }
    }

?>
<?php

require_once($_SERVER["DOCUMENT_ROOT"] . '/php/constants/Config.php');

    class Connect{
        public static function getConnection($database, $user, $password){
            try{
                $connection = new PDO(Config::DATABASE_DRIVE . ":host=" . Config::HOST . "; dbname={$database}", $user, $password);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $connection->exec("SET CHARACTER SET " . Config::CHARSET);
            }catch(Exception $e){
                die($e->getMessage());
            }
            return $connection;
        }
    }

?>
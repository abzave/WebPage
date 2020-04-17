<?php

    require_once("Connect.php");

    abstract class Database{

        protected $databaseName;
        protected $user;
        protected $password;
        protected $connection;

        protected function setConnection(){
            $this->connection = Connect::getConnection($this->databaseName, $this->user, $this->password);
        }

        protected function executePreparedQuery($query, $values){
            $response = $this->connection->prepare($query);
            $response->execute($values);
            return $response;
        }

        protected function decodeResponse($response){
            $result = array();
            while($row = $response->fetch(PDO::FETCH_ASSOC)){
                $result[] = $row;
            }
            $response->closeCursor();
            return json_encode($result);
        }

        protected function executeQuery($query){
            return $this->connection->query($query);
        }

    }

?>
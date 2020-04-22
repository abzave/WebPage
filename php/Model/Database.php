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

        protected function executePreparedQuery($query, $values, $dataType = PDO::PARAM_STR){
            $response = $this->connection->prepare($query);
            $this->bindList($response, $values, 0, $dataType);
            $response->execute();
            return $response;
        }

        protected function executePreparedQueryWithLimit($query, $values, $limits, $dataType = PDO::PARAM_STR){
            $response = $this->connection->prepare($query . IQueries::LIMIT_QUERY);
            $this->bindList($response, $values);
            $this->bindList($response, $limits, count($values), PDO::PARAM_INT);
            $response->execute();
            return $response;
        }

        private function bindList($response, $list, $offset = 0, $dataType = PDO::PARAM_STR){
            for($i = 1; $i <= count($list); $i++){
                $response->bindValue($i + $offset, $list[$i - 1], $dataType);
            }
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
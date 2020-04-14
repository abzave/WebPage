<?php

    require_once("Connect.php");
    require_once("IQueries.php");

    class BlogModel{

        private const DATABASE_NAME = 'your_database';
        private const USER = 'your_user';
        private const PASSWORD = 'your_password';
        private $connection;
        private static $instance;

        private function __construct(){
            $this->connection = Connect::getConnection(BlogModel::DATABASE_NAME, BlogModel::USER, BlogModel::PASSWORD);
        }

        public function getPostsPreview(){
            $response = $this->connection->query(IQueries::ALL_POSTS_PREVIEW);
            return $this->setPosts($response);
        }

        public function getPost($title){
            $response = $this->executePreparedQuery(IQueries::POST_CONTENT, array($title));
            return $this->setPosts($response);
        }

        public function getCategories($title){
            $response = $this->executePreparedQuery(IQueries::POST_CATEGORIES, array($title));
            return $this->setPosts($response);
        }

        public function getTags($title){
            $response = $this->executePreparedQuery(IQueries::POST_TAGS, array($title));
            return $this->setPosts($response);
        }

        private function executePreparedQuery($query, $values){
            $response = $this->connection->prepare($query);
            $response->execute($values);
            return $response;
        }

        private function setPosts($response){
            $result = array();
            while($row = $response->fetch(PDO::FETCH_ASSOC)){
                $result[] = $row;
            }
            $response->closeCursor();
            return json_encode($result);
        }

        public static function getInstance(){
            if(!BlogModel::$instance){
                BlogModel::$instance = new BlogModel();
            }
            return BlogModel::$instance;
        }

    }

?>
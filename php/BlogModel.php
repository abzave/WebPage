<?php

    require_once("Connect.php");
    require_once("IQueries.php");

    class BlogModel{

        private const DATABASE_NAME = 'your_database';
        private const USER = 'your_user';
        private const PASSWORD = 'your_password';
        private $connection;
        private $posts;

        public function __construct(){
            $this->connection = Connect::getConnection(BlogModel::DATABASE_NAME, BlogModel::USER, BlogModel::PASSWORD);
            $this->posts = array();
        }

        public function getPostsPreview(){
            $response = $this->connection->query(IQueries::ALL_POSTS_PREVIEW);
            while($row = $response->fetch(PDO::FETCH_ASSOC)){
                $this->posts[] = $row;
            }
            $this->posts = json_encode($this->posts);
            return $this->posts;
        }

    }

?>
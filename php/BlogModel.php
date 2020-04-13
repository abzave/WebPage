<?php

    require("Connect.php");

    class BlogModel{

        private const DATABASE_NAME = 'your_database_name';
        private const USER = 'your_user';
        private const PASSWORD = 'your_password';
        private $connection;
        private $posts;

        public function __construct(){
            $this->connection = Connect::getConnection(BlogModel::DATABASE_NAME, BlogModel::USER, BlogModel::PASSWORD);
            $this->posts = array();
        }

        public function getPostsPreview(){
            $response = $this->connection->query("SELECT title, description, author, image, date FROM post");
            while($row = $response->fetch(PDO::FETCH_ASSOC)){
                $this->posts[] = $row;
            }
            $this->posts = json_encode($this->posts);
            echo $this->posts;
        }

    }

?>
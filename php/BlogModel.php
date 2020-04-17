<?php

    require_once("Database.php");
    require_once("IDatabases.php");
    require_once("IQueries.php");

    class BlogModel extends Database{

        private static $instance;

        private function __construct(){
            $this->databaseName = IDatabases::BLOG;
            $this->setConnection();
        }

        public function getPostsPreview(){
            $response = $this->executeQuery(IQueries::ALL_POSTS_PREVIEW);
            return $this->decodeResponse($response);
        }

        public function getPost($title){
            $response = $this->executePreparedQuery(IQueries::POST_CONTENT, array($title));
            return $this->decodeResponse($response);
        }

        public function getCategories($title){
            $response = $this->executePreparedQuery(IQueries::POST_CATEGORIES, array($title));
            return $this->decodeResponse($response);
        }

        public function getTags($title){
            $response = $this->executePreparedQuery(IQueries::POST_TAGS, array($title));
            return $this->decodeResponse($response);
        }

        public static function getInstance(){
            if(!BlogModel::$instance){
                BlogModel::$instance = new BlogModel();
            }
            return BlogModel::$instance;
        }

    }

?>
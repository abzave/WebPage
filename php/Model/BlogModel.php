<?php

    require_once("Database.php");
    require_once($_SERVER["DOCUMENT_ROOT"] . '/php/constants/IDatabases.php');
    require_once($_SERVER["DOCUMENT_ROOT"] . '/php/constants/IUsers.php');
    require_once($_SERVER["DOCUMENT_ROOT"] . '/php/constants/IPasswords.php');
    require_once($_SERVER["DOCUMENT_ROOT"] . '/php/constants/IQueries.php');

    class BlogModel extends Database{

        private static $instance;

        private function __construct(){
            $this->databaseName = IDatabases::BLOG;
            $this->user = 'your_user';
            $this->password = 'your_password';
            $this->setConnection();
        }

        public function getPostsPreview($limit, $offset){
            $response = $this->executePreparedQuery(IQueries::ALL_POSTS_PREVIEW, array($offset, $limit), PDO::PARAM_INT);
            return $this->decodeResponse($response);
        }

        public function getAllCategories(){
            $response = $this->executeQuery(IQueries::ALL_CATEGORIES);
            return $this->decodeResponse($response);
        }

        public function getAllTags(){
            $response = $this->executeQuery(IQueries::ALL_TAGS);
            return $this->decodeResponse($response);
        }

        public function getPost($title){
            $response = $this->executePreparedQuery(IQueries::POST_CONTENT, array($title));
            return $this->decodeResponse($response);
        }

        public function searchPosts($criteria, $limit, $offset){
            $response = $this->executePreparedQueryWithLimit(IQueries::POSTS_SIMILAR_TO, array($criteria), array($offset, $limit));
            return $this->decodeResponse($response);    
        }

        public function searchPostsByCategory($categoryList, $limit, $offset){
            $response = $this->executePreparedQueryWithLimit(IQueries::POSTS_BY_CATEGORIES . $this->adjustParameters($categoryList), $categoryList, array($offset, $limit));
            return $this->decodeResponse($response);    
        }

        public function searchPostsByTag($tagList, $limit, $offset){
            $response = $this->executePreparedQueryWithLimit(IQueries::POSTS_BY_TAGS . $this->adjustParameters($tagList), $tagList, array($offset, $limit));
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

        private function adjustParameters($list){
            $filter = "";
            foreach($list as $data){
                $filter .= "?, ";
            }
            return substr($filter, 0, strlen($filter) - 2) . ") LIMIT ?, ?";
        }

        public static function getInstance(){
            if(!BlogModel::$instance){
                BlogModel::$instance = new BlogModel();
            }
            return BlogModel::$instance;
        }

    }

?>
<?php

    require_once("Database.php");
    require_once("IDatabases.php");
    require_once("IQueries.php");
    
    class ProjectsModel extends Database{

        private static $instance;

        private function __construct(){
            $this->databaseName = IDatabases::PROJECTS;
            $this->user = 'your_user';
            $this->password = 'your_password';
            $this->setConnection();
        }

        public function getProjects(){
            $response = $this->executeQuery("Select * FROM project");
            return $this->decodeResponse($response);
        }

        public static function getInstance(){
            if(!ProjectsModel::$instance){
                ProjectsModel::$instance = new ProjectsModel();
            }
            return ProjectsModel::$instance;
        }

    }

?>
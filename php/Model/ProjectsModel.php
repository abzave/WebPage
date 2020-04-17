<?php

    require_once("Database.php");
    require_once($_SERVER["DOCUMENT_ROOT"] . '/php/constants/IDatabases.php');
    require_once($_SERVER["DOCUMENT_ROOT"] . '/php/constants/IUsers.php');
    require_once($_SERVER["DOCUMENT_ROOT"] . '/php/constants/IPasswords.php');
    require_once($_SERVER["DOCUMENT_ROOT"] . '/php/constants/IQueries.php');
    
    class ProjectsModel extends Database{

        private static $instance;

        private function __construct(){
            $this->databaseName = IDatabases::PROJECTS;
            $this->user = 'your_user';
            $this->password = 'your_password';
            $this->setConnection();
        }

        public function getProjects(){
            $response = $this->executeQuery(IQueries::ALL_PROJECTS_PREVIEW);
            return $this->decodeResponse($response);
        }

        public function getProject($title){
            $response = $this->executePreparedQuery(IQueries::PROJECT_INFORMATION, array($title));
            return $this->decodeResponse($response);
        }

        public function getProjectLanguages($title){
            $response = $this->executePreparedQuery(IQueries::PROJECT_LANGUAGES, array($title));
            return $this->decodeResponse($response);
        }

        public function getProjectTechnologies($title){
            $response = $this->executePreparedQuery(IQueries::PROJECT_TECHNOLOGIES, array($title));
            return $this->decodeResponse($response);
        }

        public function getProjectParadigms($title){
            $response = $this->executePreparedQuery(IQueries::PROJECT_PARADIGMS, array($title));
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
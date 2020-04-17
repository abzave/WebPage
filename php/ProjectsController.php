<?php

    require_once("ProjectsModel.php");

    $model = ProjectsModel::getInstance();
    $projects = $model->getProjects();

    require_once($_SERVER["DOCUMENT_ROOT"] . "/html/projects.php");

?>
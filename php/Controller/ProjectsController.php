<?php

    require_once($_SERVER["DOCUMENT_ROOT"] . "/php/Model/ProjectsModel.php");

    $model = ProjectsModel::getInstance();
    $projects = $model->getProjects();

    require_once($_SERVER["DOCUMENT_ROOT"] . "/html/projects.php");

?>
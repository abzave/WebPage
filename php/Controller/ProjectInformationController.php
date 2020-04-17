<?php

    require_once($_SERVER["DOCUMENT_ROOT"] . "/php/Model/ProjectsModel.php");
    $model = ProjectsModel::getInstance();
    $title = $_GET["project"];
    $project = $model->getProject($title);
    $languages = $model->getProjectLanguages($title);
    $technologies = $model->getProjectTechnologies($title);
    $paradigms = $model->getProjectParadigms($title);
    require_once($_SERVER["DOCUMENT_ROOT"] . "/html/projectInformation.php");

?>
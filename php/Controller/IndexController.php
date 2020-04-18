<?php

    require_once($_SERVER["DOCUMENT_ROOT"] . "/php/Model/ProjectsModel.php");
    require_once($_SERVER["DOCUMENT_ROOT"] . "/php/Model/BlogModel.php");
    $projectsModel = ProjectsModel::getInstance();
    $blogModel = BlogModel::getInstance();
    $projects = $projectsModel->getProjects();
    $posts = $blogModel->getPostsPreview();
    require_once($_SERVER["DOCUMENT_ROOT"] . "/index.php");

?>
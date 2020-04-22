<?php

    require_once($_SERVER["DOCUMENT_ROOT"] . "/php/Model/ProjectsModel.php");
    require_once($_SERVER["DOCUMENT_ROOT"] . "/php/Model/BlogModel.php");
    const LIMIT = 5;
    $projectsModel = ProjectsModel::getInstance();
    $blogModel = BlogModel::getInstance();
    $projects = $projectsModel->getProjects();
    $posts = $blogModel->getPostsPreview(LIMIT, 0);
    require_once($_SERVER["DOCUMENT_ROOT"] . "/index.php");

?>
<?php

    require_once('Model/BlogModel.php');
    $title = $_GET["post"];
    $model = BlogModel::getInstance();
    $post = $model->getPost($title);
    $categories = $model->getCategories($title);
    $tags = $model->getTags($title);
    require_once($_SERVER["DOCUMENT_ROOT"] . '/html/post.php');

?>
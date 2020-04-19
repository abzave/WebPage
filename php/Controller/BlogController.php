<?php

    require_once($_SERVER["DOCUMENT_ROOT"] . '/php/Model/BlogModel.php');
    $model = BlogModel::getInstance();
    if(!isset($_GET["search"])){
        $postsPreview = $model->getPostsPreview();
    }else{
        $postsPreview = $model->searchPosts("%" . $_GET['search'] . "%");
    }
    require_once($_SERVER["DOCUMENT_ROOT"] . '/html/blog.php');
?>
<?php

    require_once($_SERVER["DOCUMENT_ROOT"] . '/php/Model/BlogModel.php');
    
    const LIMIT = 5;

    $offset = isset($_GET["page"]) ? $_GET["page"] : 0;
    $model = BlogModel::getInstance();
    $categories = $model->getAllCategories();
    $tags = $model->getAllTags();
    
    if(isset($_GET["search"])){
        $postsPreview = $model->searchPosts("%" . $_GET['search'] . "%", LIMIT, $offset);
    }else if(isset($_GET["category"])){
        $postsPreview = $model->searchPostsByCategory($_GET["category"], LIMIT, $offset);
    }else if(isset($_GET["tag"])){
        $postsPreview = $model->searchPostsByTag($_GET["tag"], LIMIT, $offset);
    }else{
        $postsPreview = $model->getPostsPreview(LIMIT, $offset);
    }

    require_once($_SERVER["DOCUMENT_ROOT"] . '/html/blog.php');
?>
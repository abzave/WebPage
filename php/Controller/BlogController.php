<?php

    require_once($_SERVER["DOCUMENT_ROOT"] . '/php/Model/BlogModel.php');
    
    const LIMIT = 1;

    $page = (isset($_GET["page"]) ? $_GET["page"] : 0);
    $offset = $page * LIMIT;
    $model = BlogModel::getInstance();
    $categories = $model->getAllCategories();
    $tags = $model->getAllTags();
    
    if(isset($_GET["search"])){
        $criteria = "%" . $_GET['search'] . "%";
        $postsPreview = $model->searchPosts($criteria, LIMIT, $offset);
        $totalPosts = $model->countSimilarPosts($criteria);
    }else if(isset($_GET["category"])){
        $postsPreview = $model->searchPostsByCategory($_GET["category"], LIMIT, $offset);
        $totalPosts = $model->countPostsWithCategories($_GET["category"]);
    }else if(isset($_GET["tag"])){
        $postsPreview = $model->searchPostsByTag($_GET["tag"], LIMIT, $offset);
        $totalPosts = $model->countPostsWithTags($_GET["tag"]);
    }else{
        $postsPreview = $model->getPostsPreview(LIMIT, $offset);
        $totalPosts = $model->countPosts();
    }

    require_once($_SERVER["DOCUMENT_ROOT"] . '/html/blog.php');
?>
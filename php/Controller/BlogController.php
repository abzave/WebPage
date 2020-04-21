<?php

    require_once($_SERVER["DOCUMENT_ROOT"] . '/php/Model/BlogModel.php');
    $model = BlogModel::getInstance();
    $categories = $model->getAllCategories();
    $tags = $model->getAllTags();
    if(isset($_GET["search"])){
        $postsPreview = $model->searchPosts("%" . $_GET['search'] . "%");
    }else if(isset($_GET["category"])){
        $filter = "";
        foreach($_GET["category"] as $category){
            $filter .= $category . ", ";
        }
        $filter = substr($filter, 0, strlen($filter) - 2);
        $postsPreview = $model->searchPostsByCategory($filter);
    }else if(isset($_GET["tag"])){
        $filter = "";
        foreach($_GET["tag"] as $tag){
            $filter .= $tag . ", ";
        }
        $filter = substr($filter, 0, strlen($filter) - 2);
        $postsPreview = $model->searchPostsByTag($filter);
    }else{
        $postsPreview = $model->getPostsPreview();
    }
    require_once($_SERVER["DOCUMENT_ROOT"] . '/html/blog.php');
?>
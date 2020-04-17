<?php

    require_once('Model/BlogModel.php');
    $model = BlogModel::getInstance();
    $postsPreview = $model->getPostsPreview();
    require_once($_SERVER["DOCUMENT_ROOT"] . '/html/blog.php');
?>
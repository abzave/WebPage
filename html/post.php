<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Blog</title>
        <link rel="stylesheet" href="/css/body.css">
        <link rel="stylesheet" href="/css/header.css">
        <link rel="stylesheet" href="/css/banner.css">
        <link rel="stylesheet" href="/css/post.css">
        <link rel="stylesheet" href="/css/footer.css">
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <?php
            require_once($_SERVER["DOCUMENT_ROOT"] . '/php/postController.php');
            echo "<script>var post = $post;\n" . 
                         "var categories = $categories\n" . 
                         "var tags = $tags</script>";
        ?>
        <script src="/js/functions.js"></script>
        <script src="/js/header.js"></script>
        <script src="/js/banner.js"></script>
        <script src="/js/post.js"></script>
		<script src="/js/footer.js"></script>
    </head>
    <body>
        <header></header>
        <div class="pageContent">
            <div class="bannerImage"></div>
            <h1 class="title" align="center"></h1>
            <div class="info" align="center">
                <p>Por: <span id="author"></span> el <span id="date"></span></p>
            </div>
            <div class="content leftSpacing rightSpacing topSpacing bottomSpacing"></div>
            <div class="categories leftSpacing">
                <p id="category">Categorías:  </p>
            </div>
            <hr align="left" class="leftSpacing">
            <div class="tags leftSpacing">
                <p id="tag">Tags: </p>
            </div>
        </div>
        <footer></footer>
    </body>
</html>
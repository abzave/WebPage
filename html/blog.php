<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Blog</title>
        <link rel="stylesheet" href="/css/body.css">
        <link rel="stylesheet" href="/css/header.css">
        <link rel="stylesheet" href="/css/blog.css">
        <link rel="stylesheet" href="/css/footer.css">
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <?php
            require_once($_SERVER["DOCUMENT_ROOT"] . "/php/Controller/blogController.php");
            echo "<script>var entries = $postsPreview</script>";
        ?>
        <script src="/js/functions.js"></script>
        <script src="/js/header.js"></script>
        <script src="/js/blogEntry.js"></script>
		<script src="/js/footer.js"></script>
    </head>
    <body>
        <header></header>
        <div class="pageContent">
            <h1 class="title">Posts del Blog</h1>
            <div class="posts">
                <form class="searchBox" method="GET" action="">
                    <input type="search" placeholder="Buscar" name="search">
                    <input type="submit" value="Buscar">
                </form>
                <div class="pageContainer">
                    <button class="pages" onclick="goToPage('blog.php')">&#706;</button>
                    <button class="pages" onclick="goToPage('blog.php')">1</button>
                    <button class="pages" onclick="goToPage('blog.php')">&#707;</button>
                </div>
            </div>
        </div>
        <footer></footer>
    </body>
</html>
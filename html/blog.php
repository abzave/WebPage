<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Blog</title>
        <link rel="stylesheet" href="/css/body.css">
        <link rel="stylesheet" href="/css/dropdown.css">
        <link rel="stylesheet" href="/css/header.css">
        <link rel="stylesheet" href="/css/blog.css">
        <link rel="stylesheet" href="/css/footer.css">
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <?php
            require_once($_SERVER["DOCUMENT_ROOT"] . "/php/Controller/blogController.php");
            echo "<script>const entries = $postsPreview;\n" . 
                 "const categories = $categories;\n" . 
                 "const tags = $tags;\n" . 
                 "const totalPosts = $totalPosts;\n" . 
                 "const currentPage = $page;\n" . 
                 "const limit = " . LIMIT . ";\n</script>";
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
                <div class="searchBoxes">
                    <form class="searchBox" method="GET" action="">
                        <input type="search" placeholder="Buscar" name="search" autocomplete="off">
                        <input type="submit" value="Buscar">
                    </form>    
                    <form class="searchBox" method="GET" action="">
                        <custom-dropdown default="Categorías">
                            <select id="categories" name="category[]" multiple>
                            </select>
                        </custom-dropdown>
                        <input type="submit" value="Aplicar" class="apply">
                    </form>
                    <form class="searchBox" method="GET" action="">
                        <custom-dropdown default="Etiquetas">
                            <select id="tags" name="tag[]" multiple>
                            </select>
                        </custom-dropdown>
                        <input type="submit" value="Aplicar" class="apply">
                    </form>
                    <form class="searchBox" method="GET" action="">
                        <input type="reset" value="Limpiar" class="apply" onClick="goToPage('/html/blog.php')">
                    </form>
                </div>
                <div class="pageContainer" align="center">
                    <button class="pages" onclick="goToPage('blog.php?page=0')">&#706;&#706;</button>
                </div>
            </div>
        </div>
        <footer></footer>
    </body>
</html>
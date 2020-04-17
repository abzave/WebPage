<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Projecto - </title>
        <link rel="stylesheet" href="/css/body.css">
        <link rel="stylesheet" href="/css/header.css">
        <link rel="stylesheet" href="/css/projectInformation.css">
        <link rel="stylesheet" href="/css/footer.css">
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <?php
            require_once($_SERVER["DOCUMENT_ROOT"] . "/php/Controller/ProjectInformationController.php");
            echo "<script>var project = $project;\n" . 
                 "var title = '$title';\n" .
                 "var languages = $languages;\n" . 
                 "var technologies = $technologies;\n" . 
                 "var paradigms = $paradigms</script>\n";
        ?>
        <script src="/js/header.js"></script>
        <script src="/js/projectInformation.js"></script>
		<script src="/js/footer.js"></script>
    </head>
    <body>
        <header></header>
        <div class="pageContent">
            <h1 class="title" align="center"></h1>
            <div class="content leftSpacing topSpacing rightSpacing bottomSpacing">
                <div class="information">
                    <img class="leftSpacing">
                    <p id="category"><b>Tipo de projecto: </b></p>
                    <p id="date"><b>Fecha: </b></p>
                    <p id="language"><b>Lenguaje: </b></p>
                    <p id="technologies"><b>Tecnologías: </b></p>
                    <p id="paradigm"><b>Paradigma: </b></p>
                    <p id="long_description"><b>Descripción: </b></p>
                    <center><a id="back" class="link">Volver</a></center>
                </div>
            </div>
        </div>
        <footer></footer>
    </body>
</html>
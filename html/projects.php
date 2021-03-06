<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Projectos</title>
        <link rel="stylesheet" href="../css/body.css">
        <link rel="stylesheet" href="/css/dropdown.css">
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/projects.css">
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <?php
            require_once($_SERVER["DOCUMENT_ROOT"] . "/php/Controller/ProjectsController.php");
            echo "<script>var projects = $projects</script>\n";
        ?>
        <script src="/js/functions.js"></script>
		<script src="/js/header.js"></script>
		<script src="../js/projectCard.js"></script>
		<script src="../js/projects.js"></script>
		<script src="../js/footer.js"></script>
    </head>
    <body>
		<header></header>
        <table class="projects">
			<tr class="row"><td><h2 class="title translate" id="personal"></h2></td></tr>
			<tr class="row"><td><h2 class="title translate" id="colaborative"></h2></td></tr>
			<tr class="row"><td><h2 class="title translate" id="work"></h2></td></tr>
			<tr class="row"><td><h2 class="title translate" id="university"></h2></td></tr>
		</table>
        <footer></footer>
    </body>
</html>
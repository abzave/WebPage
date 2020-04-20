<!DOCTYPE html>
<html>
	<head>
		<title>abzave</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/body.css">
		<link rel="stylesheet" href="/css/dropdown.css">
		<link rel="stylesheet" href="css/header.css">
		<link rel="stylesheet" href="css/banner.css">
		<link rel="stylesheet" href="css/presentation.css">
		<link rel="stylesheet" href="css/projects.css">
		<link rel="stylesheet" href="css/contact.css">
		<link rel="stylesheet" href="css/footer.css">
		<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
		<script src="js/header.js"></script>
		<script src="js/banner.js"></script>
		<script src="js/projectCard.js"></script>
		<script src="js/projects.js"></script>
		<script src="js/footer.js"></script>
		<script src="js/functions.js"></script>
	</head>
	<body>
		<header></header>
		<div class="banner">
			<?php
				require_once($_SERVER["DOCUMENT_ROOT"] . "/php/Controller/IndexController.php");
				echo "<script>var posts = $posts</script>\n";
			?>
			<div class="bannerImage"></div>
			<button class="slideButton" id="leftSlide">&#706;</button>
			<button class="slideButton" id="rightSlide">&#707;</button>
			<div class="imageInfo">
				<h2><a class="link"></a></h2>
				<p></p>
			</div>
		</div>
		<div class="presentation">
			<h2 class="title">Abraham Meza Vega</h2>
			<h3 class="subtitle">Ingeniero en Computación</h3>
			<div class="contents">
				<div class="information">
					<div class="content">
						<h4 class="contentTitle">Tecnologías</h4>
						<p>
							Páginas web, aplicaciones Android, realidad virtual, accessibilidad, 
							desarrollo de videojuegos, voz a texto, simulaciones, aplicaciones 
							desktop y desarrollo a bajo nivel en x86.
						</p>
					</div>
					<div class="content">
						<h4 class="contentTitle">Lenguajes de Programación</h4>
						<p>
							JavaScript, PHP, Python, Java, C#, C++, 
							C y ensamblador x86.
						</p>
					</div>
					<div class="content">
						<h4 class="contentTitle">Frameworks, Bibliotecas y APIs</h4>
						<p>
							Flask, QT, Unity, JQuery, wxPython, TKinter, JFreeChart, PdfBox y OpenGL.
						</p>
					</div>
				</div>
				<a href="html/about.html" class="learnMore link">Más</a>
			</div>
		</div>
		<div class="projects">
			<?php
				echo "<script>var projects = $projects</script>\n";
			?>
			<h2 class="title">Projectos</h2>
			<div class="projectsShowcase" id="selectedProjects">
				<div class="project" id="moreProjectsContainer">
					<a href="html/projects.php" class="link" id="moreProjects">Más Projectos</a>
				</div>
			</div>
		</div>
		<form class="contactForm" name="contact" method="POST" action="/php/Mail/SendMail.php">
			<h2 class="title">Contacto</h2>
			<table class="contact">
				<tr>
					<td>
						<input type="text" placeholder="Nombre" name="name" autocomplete="off">
					</td>
					<td>
						<input type="text" placeholder="Apellido" name="lastname" autocomplete="off">
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input id="emailField" type="email" placeholder="Correo" name="email" autocomplete="off">
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<textarea placeholder="Mensaje" name="message"></textarea>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" value="Enviar" id="sendButton">
					</td>
				</tr>
			</table>
		</form>
		<footer></footer>
	</body>
</html>

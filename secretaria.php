<?php 
include "./funcionConectar.php";
?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>IES Zaidin Vergeles</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by freehtml5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="freehtml5.co" />

	<!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FreeHTML5.co
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Oxygen:300,400" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
		<nav class="fh5co-nav" role="navigation">
			<div class="container-wrap">
				<div class="top-menu">
					<div class="row">
						<div class="col-xs-2">
							<div id="fh5co-logo"><a href="index.html">IZV</a></div>
						</div>
						<div class="col-xs-10 text-right menu-1">
							<ul>
								<li><a href="index.html">Inicio</a></li>
								<li class="active"><a href="secretaria.php">Secretar??a</a></li>
								<li><a href="noticias.html">Noticias</a></li>
								<li><a href="http://moodle.zaidinvergeles.local/">Moodle</a></li>
								<li><a href="contacta.html">Contacta</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
	<div class="container-wrap">
		<aside id="fh5co-hero">
			<div class="flexslider">
				<ul class="slides">
				<li style="background-image: url(images/pngtree-indoor-office.jpg);">
					<div class="overlay-gradient"></div>
					<div class="row">
						<div class="col-md-6 col-md-offset-3 slider-text slider-text-bg">
							<div class="slider-text-inner text-center">
								<h1>Secretar??a</h1>
							</div>
						</div>
					</div>
				</li>		   	
				</ul>
			</div>
		</aside>		
		<div id="fh5co-work">
			<h2>Ver tus Calificaciones:</h2>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
				<label for="dni">DNI del Alumno</label>
				<input type="text" name="dni" id="dni" value="00000001A" require><br>
				<input type="submit" value="Ver Notas">
			</form>
			<?php 
			#Preguntamos si se ha mandado por el formulario el DNI
				if (isset($_POST['dni'])){
					#Si se ha enviado hacemos lo siguente
					echo "<hr>";
					$dni = $_POST['dni'];
					#Nos conectamos a la base de datos que hemos creado
					$conexion = conectar('zv','usuario','usuario');
					#Hacemos una consulta a la base de datos para sacar el DNI y nombre del alumno
					$alumno = $conexion->query("select DNI_Alumno, nombre, apellidos from alumnos ".
					"where DNI_Alumno = '$dni'")->fetch(PDO::FETCH_BOTH);
					#Guardamos los datos en variables
					$dniAlumno = $alumno['DNI_Alumno'];
					$nombre = $alumno['nombre'] . ' ' . $alumno['apellidos'];
					#Buscamos las notas del alumno
					$notas = $conexion->query("select IdAsignatura, nota from cursos ".
					"where DNI_Alumno = '$dniAlumno'");
					#Preguntamos si el DNI del alumno existe en la base de datos
					if ($dniAlumno != ''){
						#Si existe crer?? una tabla con las notas
						echo "<p>Notas de $nombre</p>";
						echo "<table border='1'>";
						#Por cada nota vamos a sacar su asignatura 
						#y la mostraremos en una fila de la tabla
						while ($asignatura = $notas->fetch(PDO::FETCH_BOTH)){
							$idAsignatura = $asignatura['IdAsignatura'];
							$nombreAsignatura = $conexion->query("select nombre from asignaturas ".
							"where IdAsignatura = '$idAsignatura'")->fetch(PDO::FETCH_BOTH)[0];
							echo "<tr><th>$nombreAsignatura</th><td>". $asignatura['nota'] ."</td></tr>";
						}
						echo "</table>";
					}else {
						#Si no encuentra el DNI en la base de datos sale el siguiente mensaje
						echo "No se encuentra a ningun alumno con el DNI: $dni";
					}
				} else {
					#Si no se ha mandado ningun DNI sale el siguiente mensaje
					echo "<hr>";
					echo "Introduce el DNI para ver tus notas";
				}
			?>
		</div>
	</div><!-- END container-wrap -->

	<div class="container-wrap">
		<footer id="fh5co-footer" role="contentinfo">
			<div class="row">
				<div class="col-md-3 fh5co-widget">
					<h4>Sobre Nosotros</h4>
					<p>Somos un Instituto de Secudar??a ubicado en el Zaid??n.</p>
				</div>
				<div class="col-md-3 col-md-push-1">
					<h4>Enlaces</h4>
					<ul class="fh5co-footer-links">
						<li><a href="./index.html">Inicio</a></li>
						<li><a href="./secretaria.php">Secretar??a</a></li>
						<li><a href="./noticias.html">Noticias</a></li>
						<li><a href="http://moodle.zaidinvergeles.local">Moodle</a></li>
						<li><a href="./contacta.html">Contacta</a></li>
					</ul>
				</div>
				<div class="col-md-3">
					<h4>Informaci??n de Contacto</h4>
					<ul class="fh5co-footer-links">
						<li>Calle Primavera, N??mero 26, <br>  CP: 18008 Granada, Espa??a</li>
						<li><a href="tel://958893850">+34 958 89 38 50</a></li>
						<li><a href="mailto:info@zaidinvergeles.local">info@zaidinvergeles.local</a></li>
					</ul>
				</div>

			</div>

			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small> 
						<small class="block">Designed by <a href="http://freehtml5.co/" target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a></small>
					</p>
					<p>
						<ul class="fh5co-social-icons">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
			</div>
		</footer>
	</div><!-- END container-wrap -->
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Counters -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>


<?php include("estructura/header.php"); ?>
<body onload="GetUserName()">
	<?php 
		session_start();
		if(!isset($_SESSION['usuario']) && !isset($_SESSION['administrador'])){//Si no hay nada almacenado te manda al login 
			header("location: login.php");

		}
	 ?>

	<div class="fondoMenu">

		

		<div class="logo">
			<img src="img/logo.png">
		</div>

		<div class="salir">
			<a href="miCuenta.php"><i class="fas fa-user separar"></i></a>
			<a href="cerrarSesion.php"><i class="fas fa-sign-out-alt"></i></a>
		</div>

		<nav class="opciones">
				<ul>
					<li><a href="menuJuego.php" >Juegos</a></li>
					<li><a href="puntuacionAdmin.php" id="puntuacion" >Puntuación</a></li>
					<li><a href="diccionario.php" >Diccionario</a></li>
					<li><a href="ubicacion.php" >Mapa interactivo</a></li>
					<li><a href="admin.php" >Administrador</a></li>
				</ul>
		</nav>

		<script type="text/javascript" src="js/jquery-1.12.3.min.js"></script>

	    <script type="text/javascript" src="js/nivel1.js"></script>

		<div class="lineaMenu">
			<hr>
			<h6>©2019 Vocablos Indigenas B.C.S</h6>
			
		</div>


	</div>

</body>
</html>
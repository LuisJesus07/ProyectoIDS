<?php include("estructura/header.php"); ?>
<body>
	<?php 
		session_start();
		if(!isset($_SESSION['administrador'])){//Si no hay nada almacenado te manda al login 
			header("location: adminAccesoError.php");

		}
	 ?>

	<div class="menu">

		<div class="logo">
			<img src="img/logo.png">
		</div>

		<?php include("estructura/menu.php"); ?>


		<section class="administrar">

			<h2>Administrador</h2>

			<div class="botones">

 				<a href="adminUsuario.php"><button class="modificar"><i class="fas fa-user-cog separar"></i>Administrar Usuario</button></a><br>

 				<a href="adminJuego.php"><button class="modificar"><i class="fas fa-gamepad separar"></i>Administrar Juego</button></a><br>

 				<a href="adminDiccionario.php"><button class="modificar"><i class="fas fa-book-open separar"></i>Administrar Diccionario</button></a><br>



 				<div class="oscurecer" id="oscurecer"></div>
				
		
		</section>

		<a href="menuJuego.php"><button class="volver">Volver al Menú</button></a>

	</div>

<?php include("estructura/footer.php"); ?>
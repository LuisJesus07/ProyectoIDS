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

			<h2>Administrar Preguntas</h2>

			<div class="botones">

 				<a href="agregarPregunta.php"><button class="agregar"><i class="fas fa-plus-circle separar"></i>Agregar Pregunta</button></a><br>

 				<a href="niveles.php"><button class="modificar"><i class="fas fa-cog separar"></i>Administrar Preguntas</button></a><br>

 				<a href="eliminarPregunta_view.php"><button class="eliminar"><i class="fas fa-minus-circle separar"></i>Eliminar Pregunta</button></a><br>



 				<div class="oscurecer" id="oscurecer"></div>
				
		
		</section>

		<a href="menuJuego.php"><button class="volver">Volver al Menú</button></a>

	</div>

<?php include("estructura/footer.php"); ?>
<?php include("estructura/header.php"); ?>
<body onload="mostrarNivel()">
	<?php 
		session_start();
		if(!isset($_SESSION['administrador'])){//Si no hay nada almacenado te manda al login 
			header("location: adminAccesoError.php");

		}
	 ?>



	<div class="fondoDiccionario">

		<div class="logo">
			<img src="img/logo.png">
		</div>

		<?php include("estructura/menu.php"); ?>

		<h2>Administrar Preguntas</h2>

		<div class="niveles" id="niveles" >
			
		</div>

		<a href="adminJuego.php" class="tabla"><button>Volver Administrador</button></a>

	</div>

	
	<script type="text/javascript" src="js/nivel1.js"></script>

<?php include("estructura/footer.php"); ?>
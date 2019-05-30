

<?php include("estructura/header.php"); ?>
<body>
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

		<?php include("estructura/menu.php"); ?>

		<h2>Diccionario</h2>


		<a href="diccionarioGuaycura.php"><div class="puntos cuestionario menu-guaycuras">

			<h3>Guaycuras</h3>

			<img src="img/guaycuras.png">
			
		</div> </a>

		<a href="diccionario.php"><div class="puntos cuestionario menu-cochimies">

			<h3>Cochimíes</h3>

			<img src="img/cochimies.png">

		</div> </a>

		
		<a href="diccionarioPericu.php"><div class="puntos cuestionario menu-pericues">

			<h3>Pericúes</h3>

			<img src="img/pericues.png">

		</div> </a>



		<a href="index.php" class="tabla"><button>Volver al Menú</button></a>


	</div>

<?php include("estructura/footer.php"); ?>
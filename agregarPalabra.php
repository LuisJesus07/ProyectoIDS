<?php include("estructura/header.php"); ?>
<body>
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

		<h2>Agregar Palabra</h2>

		<div class="formulario-Pregunta">

			<form action="guardarPalabra.php" method="POST" enctype="multipart/form-data">

				<input placeholder="Palabra Español" name="palabraEsp" required>
				<input placeholder="Palabra Cochimie" name="palabraCochimie" required>
				<input type="file" name="imagen">

	  			
				<input type="submit" value="Enviar" class="btn btn-enviar">

			</form>
		</div>

		
		<a href="adminDiccionario.php" class="tabla"><button>Volver Administrador</button></a>

	</div>
	
<?php include("estructura/footer.php"); ?>
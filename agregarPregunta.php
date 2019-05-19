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

		<h2>Agregar Pregunta</h2>

		<div class="formulario-Pregunta">

			<form action="adminNivel.php" method="POST" enctype="multipart/form-data">

				<input placeholder="Pregunta" name="pregunta" required>
				<input class="opciones-pregunta" placeholder="Correcta" name="correcta" required>
				<input class="opciones-pregunta" placeholder="Opcion 2" name="opcion2" required>
				<input class="opciones-pregunta" placeholder="Opcion 3" name="opcion3" required>
				<input class="opciones-pregunta" placeholder="Opcion 4" name="opcion4" required>
				<select name="bloqueo" class="bloqueo">
				  <option value="0">Desbloqueado</option>
				  <option value="1">Bloqueado</option>
				</select>
				<input type="file" name="imagen">

	  			
				<input type="submit" value="Enviar" class="btn btn-enviar">

			</form>
		</div>

		
		<a href="adminJuego.php" class="tabla"><button>Volver a Administrador</button></a>

	</div>
	
<?php include("estructura/footer.php"); ?>
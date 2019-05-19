<?php  
	include("DB/conexion.php");

	$base=conectar();

	$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
	$txtPregunta=(isset($_POST['txtPregunta']))?$_POST['txtPregunta']:"";
	$txtRespuestas=(isset($_POST['txtRespuestas']))?$_POST['txtRespuestas']:"";

?>


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

		<h2>Eliminar</h2>

		


		<div class="container-pregunta">
			<form action="eliminarPregunta.php" method="POST" >

				<label for="" style="display: none">ID:</label>
				<input type="text" name="txtID" value="<?php echo$txtID ?>" placeholder="" id="txtID" required="" style="display: none;">
				
				
				<label for="">Pregunta:</label>
				<input type="text" name="txtPregunta" value="<?php echo$txtPregunta ?>" placeholder="" id="txtPregunta" required="">
				

				<label for="">Respuestas:</label>
				<input type="text" name="txtRespuestas" value="<?php echo$txtRespuestas ?>" placeholder="" id="txtRespuestas" required="">
				
						
				

				<input  class="btnModificar" type="submit" value="Eliminar">

				
			</form>

		</div>



		<?php 
		

		$sentencia = $base->prepare("select * from nivel;");
		$sentencia -> execute();
		$listaUsuarios = $sentencia-> fetchAll(PDO::FETCH_ASSOC);
		

		?>

		<div class="row-preguntas">
			<table>

				<thead>
					<th>Pregunta</th>
					<th>Respuestas</th>
					<th>Imagen</th>
					<th>Acciones</th>
				</thead>
			<?php foreach ($listaUsuarios as $usuario) { ?>
				<tr>
					<td><?php echo $usuario['pregunta'] ?></td>
					<td><?php echo $usuario['respuesta'] ?></td>
					<td><img src="<?php echo $usuario['imagen'] ?>"></td>

					
					<td>



					<form action="" method="post">

						<input type="hidden" name="txtID" value="<?php echo $usuario['idNivel']; ?>">
						<input type="hidden" name="txtPregunta" value="<?php echo $usuario['pregunta']; ?>">
						<input type="hidden" name="txtRespuestas" value="<?php echo $usuario['respuesta']; ?>">
						
						<input type="submit" value="Seleccionar" name="accion">
						
					</form>

						

					<hr>
					</td>
				</tr>

				
			<?php } ?>
			

			</table>
			
		</div>

		<a href="adminJuego.php" class="tabla"><button>Volver a Adminsitrador</button></a>

      

	</div>


<?php include("estructura/footer.php"); ?>
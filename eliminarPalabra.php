<?php  
	include("DB/conexion.php");

	$base=conectar();

	$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
	$txtPalabraEsp=(isset($_POST['txtPalabraEsp']))?$_POST['txtPalabraEsp']:"";
	$txtPalabra=(isset($_POST['txtPalabra']))?$_POST['txtPalabra']:"";

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
			<form action="borrarPalabra.php" method="POST" >

				<label for="" style="display: none">ID:</label>
				<input type="text" name="txtID" value="<?php echo$txtID ?>" placeholder="" id="txtID" required="" style="display: none;">
				
				
				<label for="">Palabra Español:</label>
				<input type="text" name="txtPalabraEsp" value="<?php echo$txtPalabraEsp ?>" placeholder="" id="txtPalabraEsp" required="">
				

				<label for="">Palabra Cochimie:</label>
				<input type="text" name="txtPalabra" value="<?php echo$txtPalabra ?>" placeholder="" id="txtPalabra" required="">
				
						
				

				<input  class="btnModificar" type="submit" value="Eliminar">

				
			</form>

		</div>



		<?php 
		

		$sentencia = $base->prepare("select * from diccionario;");
		$sentencia -> execute();
		$listaPalabras = $sentencia-> fetchAll(PDO::FETCH_ASSOC);
		

		?>

		<div class="row-preguntas palabras">
			<table>

				<thead>
					<th>Palabra Español</th>
					<th>Palabra Cochimie</th>
					<th>Imagen</th>
					<th>Acciones</th>
				</thead>
			<?php foreach ($listaPalabras as $palabra) { ?>
				<tr>
					<td><?php echo $palabra['palabraEsp'] ?></td>
					<td><?php echo $palabra['palabra'] ?></td>
					<td><img src="img/diccionario/<?php echo $palabra['imagen'] ?>"></td>

					
					<td>



					<form action="" method="post">

						<input type="hidden" name="txtID" value="<?php echo $palabra['idDiccionario']; ?>">
						<input type="hidden" name="txtPalabraEsp" value="<?php echo $palabra['palabraEsp']; ?>">
						<input type="hidden" name="txtPalabra" value="<?php echo $palabra['palabra']; ?>">
						
						<input type="submit" value="Seleccionar" name="accion">
						
					</form>

						

					<hr>
					</td>
				</tr>

				
			<?php } ?>
			

			</table>
			
		</div>

		<a href="adminDiccionario.php" class="tabla"><button>Volver a Adminsitrador</button></a>

      

	</div>


<?php include("estructura/footer.php"); ?>
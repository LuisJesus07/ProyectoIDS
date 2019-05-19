<?php  
	include("DB/conexion.php");

	$base=conectar();

	$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
	$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
	$txtCorreo=(isset($_POST['txtCorreo']))?$_POST['txtCorreo']:"";
	$txtEdad=(isset($_POST['txtEdad']))?$_POST['txtEdad']:"";
	$txtSexo=(isset($_POST['txtSexo']))?$_POST['txtSexo']:"";
	$txtNacimiento=(isset($_POST['txtNacimiento']))?$_POST['txtNacimiento']:"";

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

		


		<div class="container">
			<form action="eliminarUsuario.php" method="POST" >

				<label for="" style="display: none">ID:</label>
				<input type="text" name="txtID" value="<?php echo$txtID ?>" placeholder="" id="txtID" required="" style="display: none;">
				
				
				<label for="">Nombre:</label>
				<input type="text" name="txtNombre" value="<?php echo$txtNombre ?>" placeholder="" id="txtNombre" required="">
				

				<label for="">Correo:</label>
				<input type="text" name="txtCorreo" value="<?php echo$txtCorreo ?>" placeholder="" id="txtCorreo" required="">
				

				<label for="">Edad:</label>
				<input type="text" name="txtEdad" value="<?php echo$txtEdad ?>" placeholder="" id="txtEdad" required="">
				

				<label for="">Sexo:</label>
				<input type="text" name="txtSexo" value="<?php echo$txtSexo ?>" placeholder="" id="txtSexo" required="">
				

				
				

				<input  class="btnModificar" type="submit" value="Eliminar">

				
			</form>

		</div>



		<?php 
		
		$sentencia = $base->prepare("select * from usuario;");
		$sentencia -> execute();
		$listaUsuarios = $sentencia-> fetchAll(PDO::FETCH_ASSOC);
		

		?>

		<div class="row">
			<table>

				<thead>
					<th>Foto Perfil</th>
					<th>Nombre</th>
					<th>Correo</th>
					<th>Edad</th>
					<th>Sexo</th>
					<th>Acciones</th>
				</thead>
			<?php foreach ($listaUsuarios as $usuario) { ?>
				<tr>
					<td class="row-img-perfil"><img src="img/fotoPerfil/<?php echo $usuario['fotoPerfil'] ?>"></td>
					<td><?php echo $usuario['nombreCompleto'] ?></td>
					<td><?php echo $usuario['correoE'] ?></td>
					<td><?php echo $usuario['edad'] ?></td>
					<td><?php echo $usuario['sexo'] ?></td>
					<td>

					<form action="" method="post">

						<input type="hidden" name="txtID" value="<?php echo $usuario['idUsuario']; ?>">
						<input type="hidden" name="txtNombre" value="<?php echo $usuario['nombreCompleto']; ?>">
						<input type="hidden" name="txtCorreo" value="<?php echo $usuario['correoE']; ?>">
						<input type="hidden" name="txtEdad" value="<?php echo $usuario['edad']; ?>">
						<input type="hidden" name="txtSexo" value="<?php echo $usuario['sexo']; ?>">
						
						<input type="submit" value="Seleccionar" name="accion">
						
					</form>

						


					</td>
				</tr>
				
			<?php } ?>
			

			</table>
			
		</div>

		<a href="adminUsuario.php" class="tabla"><button>Volver a Adminsitrador</button></a>

      

	</div>


<?php include("estructura/footer.php"); ?>
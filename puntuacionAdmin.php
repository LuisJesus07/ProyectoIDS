<?php  
	include("DB/conexion.php");

	$base=conectar();

?>

<?php include("estructura/header.php"); ?>
<body>
	<?php 
		session_start();
		if(!isset($_SESSION['administrador'])){//Si no hay nada almacenado te manda al login 
			header("location: login.php");

		}
	 ?>

	<div class="fondoDiccionario">

		<div class="logo">
			<img src="img/logo.png">
		</div>

		<?php include("estructura/menu.php"); ?>

		<h2>Puntuacion General</h2>

		
		<?php 
		

		$sentencia = $base->prepare("select nivel, puntuacion,estrellas, nombreCompleto, correoE, fotoPerfil
									 from progreso P, usuario U
									 where P.idUsuario=U.idUsuario order by puntuacion desc;");
		$sentencia -> execute();
		$listaUsuarios = $sentencia-> fetchAll(PDO::FETCH_ASSOC);
		

		?>

		<div class="row">
			<table>

				<thead>
					<th>Foto Perfil</th>
					<th>Nombre</th>
					<th>Correo</th>
					<th>Nivel</th>
					<th>Estrellas</th>
					<th>Puntuacion</th>
				</thead>
			<?php foreach ($listaUsuarios as $usuario) { ?>
				<tr>
					<td class="row-img-perfil"><img src="img/fotoPerfil/<?php echo $usuario['fotoPerfil'] ?>"></td>
					<td><?php echo $usuario['nombreCompleto'] ?></td>
					<td><?php echo $usuario['correoE'] ?></td>
					<td><?php echo $usuario['nivel'] ?></td>
					<td><?php echo $usuario['estrellas'] ?></td>
					<td><?php echo $usuario['puntuacion'] ?></td>
					<td>


					</td>
				</tr>
				
			<?php } ?>
			

			</table>
			
		</div>

		<a href="menuJuego.php" class="tabla"><button>Volver al Menu</button></a>

      

	</div>


<?php include("estructura/footer.php"); ?>
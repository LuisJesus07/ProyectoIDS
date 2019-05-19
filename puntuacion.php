<?php  
	include("DB/conexion.php");
	$base=conectar();


?>

<?php include("estructura/header.php"); ?>
<body>
	<?php 
		session_start();
		if(!isset($_SESSION['usuario'])){//Si no hay nada almacenado te manda al login 
			header("location: puntuacionAdmin.php");

		}

	 ?>

	<div class="menu">

		<div class="logo">
			<img src="img/logo.png">
		</div>

		<?php include("estructura/menu.php"); ?>

		<section class="tabla">
			
			<h2>Puntuación</h2>

			<div class="puntos">

				<?php 
				
				$sesionAbierta = $_SESSION['usuario'];

				$sentencia = $base->prepare("select * from progreso inner join usuario where progreso.idUsuario=usuario.idUsuario and correoE='$sesionAbierta';");
				$sentencia -> execute();
				$listaPuntuacion = $sentencia-> fetchAll(PDO::FETCH_ASSOC);
				

				?>

				

				<h3><?php echo $_SESSION['usuario']; ?></h3>
				<h3>Usuario :</h3>

				<hr> </hr>

				<?php foreach ($listaPuntuacion as $puntos) { ?>

					<div class="numeros-puntos">	
						<h4><?php echo $puntos['nivel'] ?></h4>
						<h4><?php echo $puntos['puntuacion'] ?></h4>
						<h4><?php echo $puntos['estrellas'] ?></h4>
					</div>

					<div class="tiulo-puntos">
						<h5>Nivel</h5>
						<h5>Puntuación</h5>
						<h5>Estrellas</h5>
					</div>

				<?php } ?>

			</div>

			<a href="menuJuego.php"><button>Volver al Menú</button></a>



		</section>

	</div>

<?php include("estructura/footer.php"); ?>
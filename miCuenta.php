<?php  
	include("DB/conexion.php");
	$base=conectar();


?>

<?php include("estructura/header.php"); ?>
<body>
	<?php 
		session_start();
		if(!isset($_SESSION['usuario'])){//Si no hay nada almacenado te manda al login 
			header("location: menu.php");

		}

	 ?>

	<div class="menu">

		<div class="logo">
			<img src="img/logo.png">
		</div>

		<?php include("estructura/menu.php"); ?>

		<section class="tabla">
			
			<h2>Mi Cuenta</h2>

			<div class="puntos cuenta">

				
				<?php 
				
				$sesionAbierta = $_SESSION['usuario'];

				$sentencia = $base->prepare("select * from usuario where correoE='$sesionAbierta';");
				$sentencia -> execute();
				$listaDatos = $sentencia-> fetchAll(PDO::FETCH_ASSOC);
				

				?>


				<?php foreach ($listaDatos as $dato) { ?>

					
					<div class="fotoPerfil">
						<img src="img/fotoPerfil/<?php echo $dato['fotoPerfil'] ?>">
					</div>

					<div class="numeros-puntos miCuenta-resp-2">	
						<h4><?php echo $dato['nombreCompleto'] ?></h4>
						<h4><?php echo $dato['correoE'] ?></h4>
						<h4><?php echo $dato['edad'] ?></h4>
						<h4><?php echo $dato['sexo'] ?></h4>
					</div>

					<div class="tiulo-puntos miCuenta-resp">
						<h5>Nombre :</h5>
						<h5>Correo :</h5>
						<h5>Edad :</h5>
						<h5>Sexo :</h5>
					</div>

				<?php } ?>

			</div>

			<a href="menuJuego.php"><button>Volver al Menú</button></a>



		</section>

	</div>

<?php include("estructura/footer.php"); ?>
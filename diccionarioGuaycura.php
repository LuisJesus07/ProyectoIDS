<?php  
include("DB/conexion.php");

$base=conectar();


?>

<?php include("estructura/header.php"); ?>

<body>


	<div class="fondoDiccionario">

		<div class="logo">
			<img src="img/logo.png">
		</div>

		<?php include("estructura/menu.php"); ?>

		<h2>Diccionario Guaycura</h2>

		<div class="diccionario">


			<?php 
		

			$sentencia = $base->prepare("select * from diccionario where idioma='guaycura' order by palabraEsp asc;");
			$sentencia -> execute();
			$listaPalabras = $sentencia-> fetchAll(PDO::FETCH_ASSOC);
			

			?>


			<?php foreach ($listaPalabras as $palabra) { ?>

			<div class="contenedorImgPalabra">

				<div class="imgPalabra">
					<img src="img/diccionario/<?php echo $palabra['imagen'] ?>">
				</div>
				<div class="palabra"><?php echo $palabra['palabraEsp'] ?></div>
				<div class="palabra indigena"><?php echo $palabra['palabra'] ?></div>
				
			</div>

			

			<?php } ?>
			
		</div>

		<a href="menuDiccionario.php" class="tabla"><button>Menú diccionario</button></a>

	</div>

<?php include("estructura/footer.php"); ?>
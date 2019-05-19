<?php  
include("DB/conexion.php");

$base=conectar();


?>

<?php include("estructura/header.php"); ?>

<body>
<?php 
	session_start();
	if(!isset($_SESSION['usuario'])){//Si no hay nada almacenado te manda al login 
		header("location: menuJuego.php");

	}
 ?>

 <?php echo "<p id='nuser' style='display: none;''>".$_SESSION['usuario']."</p>" ?>


	<div class="fondoDiccionario">

		<div class="logo">
			<img src="img/logo.png">
		</div>

		<?php include("estructura/menu.php"); ?>

		<h2>Memorama</h2>

		<div class="iniciar" id="iniciarMemorama">
			<p>
				Haz clic sobre las cartas para encontrar los pares, cada par te sumara 100 puntos y cada error te restara 50.Completalo antes de que el tiempo termine.
			</p>
			<input type="button" value="Iniciar" id="iniciar" onclick="iniciarMemorama()">	
		</div>

		<div class="tiempo-memorama" id="tiempo">
				<p>
					<span id="minutos"></span>:<span id="segundos"></span>
				</p>
		</div>

		<div class="memorama" style="display: none;">

			<?php 
		

			$sentencia = $base->prepare("select * from diccionario order by RAND();");
			$sentencia -> execute();
			$listaCartas = $sentencia-> fetchAll(PDO::FETCH_ASSOC);
			$contCartas=0;
			$entraCarta=true;
			

			?>

			<?php foreach ($listaCartas as $carta) { ?>

			<?php if($contCartas<=4){ ?>

				<div class="contenedorImgPalabra carta" onclick="muestraPalabra('<?php echo $carta['palabraEsp'] ?>',1)">

					<div class="<?php echo $carta['palabraEsp'] ?>" style="display: none;">
						<div class="imgPalabra imgMemorama">
							<img src="img/diccionario/<?php echo $carta['imagen'] ?>">					
						</div>

						<div class="palabraMemo"><?php echo $carta['palabraEsp'] ?></div>
						<div class="indigena palabraMemo"><?php echo $carta['palabraCochimie'] ?></div>
						
					</div>
					

					<div class="imgPalabra <?php echo $carta['palabraEsp'] ?>No fondoNM">
						<img src="img/cartaMemorama.png">
					</div>
					
				</div>

				<div class="contenedorImgPalabra carta" onclick="muestraPalabra('<?php echo $carta['palabraEsp'] ?>2',1)">

					<div class="<?php echo $carta['palabraEsp'] ?>2" style="display: none;">
						<div class="imgPalabra imgMemorama">
							<img src="img/diccionario/<?php echo $carta['imagen'] ?>">					
						</div>

						<div class="palabraMemo"><?php echo $carta['palabraEsp'] ?></div>
						<div class="indigena palabraMemo"><?php echo $carta['palabraCochimie'] ?></div>
						
					</div>
					

					<div class="imgPalabra <?php echo $carta['palabraEsp'] ?>2No fondoNM">
						<img src="img/cartaMemorama.png">
					</div>
					
				</div>

			<?php } ?>

			<?php $contCartas+=1; ?>

			<?php } ?>



			

			

			<div class="ganaste ganaste-memorama" id="ganaste" style="display: none;"></div>
			<input class="sigNivel-memorama" id="sigNivel" type="button" value="Siguiente Nivel" onclick="sigNivelMemorama()">
			<input class="sigNivel-memorama repetir" id="repNivel" type="button" value="Repetir Nivel" onclick="repNivelMemorama()">
			<div class="perdiste-memorama" id="pierde"></div>


	
		</div>





		<div class="progreso" id="progress"></div>

	</div>

	<script type="text/javascript" src="js/nivel1.js"></script>

<?php include("estructura/footer.php"); ?>
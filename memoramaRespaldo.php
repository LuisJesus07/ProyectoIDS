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

		<h2>Memorama</h2>

		<div class="memorama">


			<div class="contenedorImgPalabra carta" onclick="muestraPalabraSeis()" title="Arroyo">

				<div class="mostradaSeis" style="display: none;">	
					<div class="imgPalabra">
						<img src="img/diccionario/arroyo.jpg">
					</div>
					<div class="palabra">Arroyo</div>
					<div class="palabra indigena">Camanc</div>
				</div>

				<div class="imgPalabra noMostradaSeis fondoNM">
					<img src="img/cartaMemorama.png">
				</div>

				
				
			</div>



			<div class="contenedorImgPalabra carta" onclick="muestraPalabraCuatro()" title="Pie">

				<div class="mostradaCuatro" style="display: none;">	
					<div class="imgPalabra">
						<img src="img/diccionario/pie.png">
					</div>
					<div class="palabra">Pie</div>
					<div class="palabra indigena">Aga-napa</div>
				</div>

				<div class="imgPalabra noMostradaCuatro fondoNM">
					<img src="img/cartaMemorama.png">
				</div>

				
				
			</div>

			

			<div class="contenedorImgPalabra carta" onclick="muestraPalabraTres()" title="Corazon">

				<div class="mostradaTres" style="display: none;">	
					<div class="imgPalabra">
						<img src="img/diccionario/corazon.png">
					</div>
					<div class="palabra">Corazón</div>
					<div class="palabra indigena">L-yi-punju-z</div>
				</div>

				<div class="imgPalabra noMostradaTres fondoNM">
					<img src="img/cartaMemorama.png">
				</div>

				
				
			</div>



			<div class="contenedorImgPalabra carta" onclick="muestraPalabra()" title="Año">

				<div class="mostrada" style="display: none;">	
					<div class="imgPalabra">
						<img src="img/diccionario/año.png">
					</div>
					<div class="palabra">Año</div>
					<div class="palabra indigena">Mexibo</div>
				</div>

				<div class="imgPalabra noMostrada fondoNM">
					<img src="img/cartaMemorama.png">
				</div>

				
				
			</div>

			<div class="contenedorImgPalabra carta" onclick="muestraPalabraOcho()" title="Pie">

				<div class="mostradaOcho" style="display: none;">	
					<div class="imgPalabra">
						<img src="img/diccionario/pie.png">
					</div>
					<div class="palabra">Pie</div>
					<div class="palabra indigena">Aga-napa</div>
				</div>

				<div class="imgPalabra noMostradaOcho fondoNM">
					<img src="img/cartaMemorama.png">
				</div>

				
				
			</div>

			

			<div class="contenedorImgPalabra carta" onclick="muestraPalabraCinco()" title="Año">

				<div class="mostradaCinco" style="display: none;">	
					<div class="imgPalabra">
						<img src="img/diccionario/año.png">
					</div>
					<div class="palabra">Año</div>
					<div class="palabra indigena">Mexibo</div>
				</div>

				<div class="imgPalabra noMostradaCinco fondoNM">
					<img src="img/cartaMemorama.png">
				</div>

				
			</div>

			

			<div class="contenedorImgPalabra carta" onclick="muestraPalabraDos()" title="Arroyo">

				<div class="mostradaDos" style="display: none;">	
					<div class="imgPalabra">
						<img src="img/diccionario/arroyo.jpg">
					</div>
					<div class="palabra">Arroyo</div>
					<div class="palabra indigena">Camanc</div>
				</div>

				<div class="imgPalabra noMostradaDos fondoNM">
					<img src="img/cartaMemorama.png">
				</div>

			
				
			</div>

			

			<div class="contenedorImgPalabra carta" onclick="muestraPalabraSiete()" title="Corazon">

				<div class="mostradaSiete" style="display: none;">	
					<div class="imgPalabra">
						<img src="img/diccionario/corazon.png">
					</div>
					<div class="palabra">Corazón</div>
					<div class="palabra indigena">L-yi-punju-z</div>
				</div>

				<div class="imgPalabra noMostradaSiete fondoNM">
					<img src="img/cartaMemorama.png">
				</div>

			
				
			</div>
	
		</div>

		<div class="progreso" id="progress">
				<h6 id='nomUsuario'>LuisJesus@gmail.com</h6>
				<hr>
				<h4>Nivel</h4>
				<hr>
				<h5 id='nivel'>10</h5>
				<hr>
				<h4>Progreso</h4>
				<hr>
				<h5 id='progreso'>0</h5>
				<hr>
				<h4>Puntuación</h4>
				<hr>
				<h5 id='puntuacion'>0</h5>
			</div>

	</div>

	<script type="text/javascript" src="js/memorama1.js"></script>

<?php include("estructura/footer.php"); ?>
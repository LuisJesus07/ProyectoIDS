<?php include("estructura/header.php"); ?>

<body >
	<?php 
		session_start();
		if(!isset($_SESSION['usuario'])){//Si no hay nada almacenado te manda al login 
			header("location: menuJuego.php");

		}
	 ?>

	 <?php echo "<p id='nuser' style='display: none;''>".$_SESSION['usuario']."</p>" ?>

	


	<div class="menu">

		<div class="logo">
			<img src="img/logo.png">
		</div>

		<?php include("estructura/menu.php"); ?>

		<h2>Juego</h2>

		<div class="iniciar" id="iniciar">
			<p>
				Haz clic sobre alguna de las cuatro opciones que consideres correcta, cada acierto te suma 100 puntos, en caso de fallar perderás 50.
			</p>
			<input type="button" value="Iniciar" id="iniciar" onclick="iniciar()">	
		</div>

		



		<div class="muestra_pregunta" id="muestra_pregunta">

			<div class="resultado" id="correcta"></div>

			<div class="resultado" id="incorrecta"></div>

			<div class="resultado" id="alerta"></div>
			
			<div class="tiempo" id="tiempo">
				<p>
					<span id="minutos"></span>:<span id="segundos"></span>
				</p>
			</div>


			

			<div class="imagenJuego" id="imagenJuego"></div>
			

			<div id="oscurecerJuego"></div>

			<div class="ganaste" id="ganaste"></div>

			<div class="calificacion" id="calificacion-cont">
				<h4>Calificacion</h4>
				<hr>
				<div id="calificacion"></div>

			</div>



			<div class="estrellas" id="estrellas"></div>

			<div class="pierde" id="pierde"></div>

			<div class="pregunta" id="pregunta"></div>

			<div class="respuesta" id="respuestas"></div>

			<input id="contestar" type="button" value="Contestar" onclick="comprobar()">

			<input class="sigNivel" id="sigNivel" type="button" value="Siguiente Nivel" onclick="sigNivel()">

			<input class="repNivel" id="repNivel" type="button" value="Repetir Nivel" onclick="repNivel()">

		</div>

		<div class="progreso" id="progress"></div>

		
	</div>

	<script type="text/javascript" src="js/nivel1.js"></script>

<?php include("estructura/footer.php"); ?>
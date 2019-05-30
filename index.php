

<?php include("estructura/header.php"); ?>
<body>
	<?php 
		session_start();
		if(!isset($_SESSION['usuario'])){//Si no hay nada almacenado te manda al login 
			header("location: menuJuego.php");

		}
	 ?>
	

	<div class="fondoMenu">

		<div class="logo">
			<img src="img/logo.png">
		</div>

		<h1>Vocablos Indígenas de B.C.S.</h1>

		<div class="salir">
			<a href="miCuenta.php"><i class="fas fa-user separar"></i></a>
			<a href="cerrarSesion.php"><i class="fas fa-sign-out-alt"></i></a>
		</div>

		


		<div class="puntos diccionario-menu mapa-menu">

			<h3>Mapa Interactivo</h3>


			<p>Conoce donde se ubicaban las comunidades indígenas de Baja California Sur con un mapa interactivo que te muestra información de su estilo de vida, su alimentación entre otras cosas.</p>

			<img src="img/menuMapa.png">

			<a href="ubicacion.php"><button>Mapa Interactivo</button></a>


			
		</div>



		<a href="memorama1.php"><div class="puntos cuestionario memorama-menu">

			<h3>Memorama</h3>

			<img src="img/memorama.png">
			
		</div> </a>

		<a href="juego.php"><div class="puntos cuestionario">

			<h3>Cuestionario</h3>

			<img src="img/indio.png">

		</div> </a>

		<div class="puntos diccionario-menu">

			<h3>Diccionario</h3>



			<img src="img/imgDiccionario.png">

			<p>Es importante que conozcas las palabras antes de empezar los juegos. Estudiarlas te ayudara a obtener el mayor puntaje posible.</p>

			<a href="menuDiccionario.php"><button>Diccionario</button></a>

		</div>



		<a href="miCuenta.php"><div class="puntos cuestionario miCuenta-menu miCuenta-index">

			<h3>Mi Cuenta</h3>

			<img src="img/imgCuentaMenu.png">

		</div> </a>

		<a href="puntuacion.php"><div class="puntos cuestionario puntuacion-menu">

			<h3>Puntuación</h3>

			<img src="img/imgPuntuacionMenu.png">

		</div> </a>






	</div>

<?php include("estructura/footer.php"); ?>
<?php include("estructura/header.php"); ?>

<body>

	<?php 
		session_start();
		if(!isset($_SESSION['administrador'])){//Si no hay nada almacenado te manda al login 
			header("location: registroOk.php");

		}
	 ?>

	<div class="menu">

		<div class="logo">
			<img src="img/logo.png">
		</div>

		<?php include("estructura/menu.php"); ?>

		<h2>Registro</h2>

		<div class="registroOk">
			<h1>Usuario Registrado con Exito</h1>

			<a href="admin.php"><input type="button"  value="Ir a Administrador"></a>
		</div>

	</div>


<?php include("estructura/footer.php"); ?>
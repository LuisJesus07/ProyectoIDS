<?php include("estructura/header.php"); ?>
<body>
	<?php 
		session_start();
		if(!isset($_SESSION['administrador'])){//Si no hay nada almacenado te manda al login 
			header("location: adminAccesoError.php");

		}
	 ?>

	<div class="menu">

		<div class="logo">
			<img src="img/logo.png">
		</div>

		<?php include("estructura/menu.php"); ?>

		<h2>Modificar</h2>

		<div class="registroOk">
			<h1>Usuario Modificado con Exito</h1>

			<a href="admin.php"><input type="button"  value="Aceptar"></a>
		</div>

	</div>


<?php include("estructura/footer.php"); ?>
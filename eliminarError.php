<?php include("estructura/header.php"); ?>
<body>

	<div class="menu">

		<div class="logo">
			<img src="img/logo.png">
		</div>

		<?php include("estructura/menu.php"); ?>

		<h2>Eliminar</h2>

		<div class="registroOk">
			<h1>Error al Eliminar</h1>

			<p>La cuenta que desea eliminar no existe.</p>

			<a href="admin.php"><input  type="button"  value="Aceptar"></a>
		</div>

	</div>


<?php include("estructura/footer.php"); ?>
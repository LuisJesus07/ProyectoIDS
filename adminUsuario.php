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


		<section class="administrar">

			<h2>Administrar Usuarios</h2>

			<div class="botones">

				<a id="activarRegistro"><button class="agregar"><i class="fa fa-user-plus separar" aria-hidden="true"></i>Agregar Usuario</button></a><br>

 				<a href="modificar.php"><button class="modificar"><i class="fas fa-user-cog separar"></i>Modificar Usuario</button></a><br>

 				<a href="eliminar.php"><button class="eliminar"><i class="fas fa-user-times separar"></i>Eliminar Usuario</button></a><br>



 				<div class="oscurecer" id="oscurecer"></div>
				
			<div class="registrar" id="registrar">
				<div class="cerrarRegistro" id="cerrarRegistro">
					<img src="img/cerrar.png">
				</div>


				<h1>Registrar</h1>
				<form action="guardarUsuario.php" method="POST" enctype="multipart/form-data">

					<input type="text" required placeholder="Nombre" name="nombreCompleto">
					<select name="sexo" placeholder="Sexo">
					  <option value="Hombre">Hombre</option>
					  <option value="Mujer">Mujer</option>
					</select>
					<input type="number" min="0" required placeholder="Edad" name="edad">
					<input type="email" required placeholder="Correo Electronico" name="correoE">
					<input type="password" required placeholder="Contraseña" name="password">
					<input type="password" required placeholder="Repetir contraseña" name="password2">
					<h5>Foto de Perfil :</h5>
					<div class="select-foto">
						<input type="file" name="imagen" placeholder="Imagen Perfil" required>
					</div>
					
					<?php if(!empty($errors)): ?>
						<div class="alert-error">
							<?php echo $errors ?>
						</div>
					<?php endif ?>


					<input type="submit" value="Crear" >

				</form>
				
				
			</div>

			<div class="modificar" id="modificar">
				
			</div>

			<div class="eliminarRegistro" id="eliminar">
				
				<div class="cerrarRegistro" id="cerrarEliminar">
					<img src="img/cerrar.png">
				</div>

				<h1>Eliminar</h1>
				<form action="eliminarUsuario.php" method="POST">

					<input type="email" required placeholder="Correo Electronico" name="correoE">

					<input type="submit" value="Eliminar">

				</form>
				
			</div>

		
		</section>

		<a href="menuJuego.php"><button class="volver">Volver al Menú</button></a>

	</div>

<?php include("estructura/footer.php"); ?>
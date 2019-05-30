<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=width-device, initial-scale=1">
	<title>Vocablos Indigenas</title>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/estilos.css">
	<script type="text/javascript" src="js/prefixfree.min.js"></script>

</head>
<body>
	<section class="principal">
		<h1>Vocablos Indígenas de B.C.S</h1>
		<h2>Juega y Aprende</h2>
		<p>Plataforma web que te ayudara a aprender algunas palabras con las cuales los habitantes de nuestra península se comunicaban, asi como también conocer algo de la historia de estos grupos indígenas de la región.</p>
		<a href="#" class="bt-home" id="activarLogin"><i class="fa fa-sign-in separar" aria-hidden="true"></i>Ingresar</a>
		<a href="" class="bt-home" id="activarRegistro"><i class="fa fa-user-plus separar" aria-hidden="true"></i>
 Registrarme</a>
 		<a href="#" class="bt-home" onclick="apareceloginAdmin()"><i class="fa fa-sign-in separar" aria-hidden="true"></i>Administrador</a>
 	

	</section>
	<div class="login" id="login">
		<a href="" class="cerrar" id="cerrar"><i class="fa fa-times" aria-hidden="true"></i></a>
		<form action="iniciarUsuario.php" method="POST">

			<input type="email" required placeholder="Correo" name="correoE">
			<input type="password" requered placeholder="********" name="password">
			<input type="submit" value="Entrar" >

		</form>
	</div>

	<div class="loginAdmin" id="loginAdmin">
		<a href="" class="cerrar" onclick="desapareceloginAdmin()"><i class="fa fa-times" aria-hidden="true"></i></a>
		<form action="iniciarAdministrador.php" method="POST">

			<input type="email" required placeholder="Correo" name="correoE">
			<input type="password" requered placeholder="********" name="password">
			<input type="submit" value="Entrar" >

		</form>
	</div>


	<div class="oscurecer" id="oscurecer"></div>

	<div class="registrar" id="registrar">

	<div class="cerrarRegistro" id="cerrarRegistro">
		<img src="img/cerrar.png">
	</div>

		<h1>Registro</h1>

		<form action="guardarUsuario.php" method="POST" enctype="multipart/form-data">

			<input type="text" required placeholder="Nombre" name="nombreCompleto" value="<?php if(isset($nombreCompleto)) echo $nombreCompleto ?>">
			<select name="sexo" placeholder="Sexo">
			  <option value="Hombre">Masculino</option>
			  <option value="Mujer">Femenino</option>
			</select>
			<input type="number" min="0" required placeholder="Edad" name="edad" value="<?php if(isset($edad)) echo $edad ?>">
			<input type="email" required placeholder="Correo Electrónico" name="correoE" value="<?php if(isset($correoE)) echo $correoE ?>">
			<input type="password" required placeholder="Contraseña" name="password">
			<input type="password" required placeholder="Repetir contraseña" name="password2">
			<h5>Foto de Perfil :</h5>
			<div class="select-foto">
				<input type="file" name="imagen" placeholder="Imagen Perfil">
			</div>

			<?php if(!empty($errors)): ?>
				<div class="alert-error">
					<?php echo $errors ?>
				</div>
			<?php endif ?>

			<input type="submit" value="Crear" >
		</form>
	</div>
	<script type="text/javascript" src="js/jquery-1.12.3.min.js"></script>
	<script type="text/javascript" src="js/acciones.js"></script>
</body>
</html>
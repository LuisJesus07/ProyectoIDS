<?php 
		include("DB/conexion.php");

		$base=conectar();

		$errors = '';
		$soloLetras = '/[a-zA-Z\s]/';
		
		if (isset($_POST['nombreCompleto']) && isset($_POST['correoE']) && isset($_POST['edad']) && isset($_POST['sexo']) && isset($_POST['password']) && isset($_POST['password2'])){

				$nombreCompleto = $_POST['nombreCompleto'];
				$correoE = $_POST['correoE'];
				$edad= $_POST['edad'];
				$sexo = $_POST['sexo'];
				$imagen = $_POST['imagen'];
				//Nunca almacenar las contraseñas en texto plano. No utilizar MD5 ni SHA1
				$password = $_POST['password'];
				$password2 = $_POST['password2'];

				$nombre_imagen = $_FILES['imagen']['name'];//Se guarda el nombre de la imagen
				$tipo_imagen = $_FILES['imagen']['type'];//Se guarda el tipo de la imagen
				$tam_imagen = $_FILES['imagen']['size'];//Se guarda el tamaño de la imagen

				// poner una foto por defecto si el usuario no pone una
				if($nombre_imagen == null && $sexo=='Hombre'){
					$nombre_imagen='imgDefHom.png';
				}

				if($nombre_imagen == null && $sexo=='Mujer'){
					$nombre_imagen='imgDefMuj.png';
				}

				// validar que las contraseñas sean iguales
				if($password != $password2){
					$errors .='Las contraseñas no coinciden <br />';
				}

				// validar nombre
				if(!empty($nombreCompleto)){
					$nombreCompleto = trim($nombreCompleto);
					$nombreCompleto = filter_var($nombreCompleto, FILTER_SANITIZE_STRING);
					if(!filter_var($nombreCompleto,FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>$soloLetras)))){
						$errors .='Ingresa un Nombre Valido <br />';
					}
					

				}else{
					$errors .='Ingresa tu Nombre <br />';
				} 

			
				

				// validar el correo
				if (!empty($correoE)){
					$correoE = filter_var($correoE, FILTER_SANITIZE_EMAIL);
					if(!filter_var($correoE, FILTER_VALIDATE_EMAIL)){
						$errors .='Ingresa un correo valido <br />';
					}
					
				} else{
					$errors .='Ingresa un Correo <br />';
				}

				// Validar que el correo que ingrese no exista
				$sentencia = $base->prepare("select * from usuario;");
				$sentencia -> execute();
				$listaCorreosRegistrados = $sentencia-> fetchAll(PDO::FETCH_ASSOC);

				foreach ($listaCorreosRegistrados as $correoRegistrado) {

					if($correoE==$correoRegistrado['correoE']){
						$errors .='Ese correo ya existe. Intenta con otro. <br />';
					}
					
				}


				// evalua si hay una imagen
				

					if ($tam_imagen<=5000000) {//Si excede los tres megas no te deja subir la foto
						if ($tipo_imagen=="image/jpeg"||$tipo_imagen=="image/jpg"||$tipo_imagen=="image/png"||$tipo_imagen=="image/gif" || $tipo_imagen== null){
							//RUTA DE LA CARPETA DESTINO EN EL SERVIDOR:
							$carpeta_destino = $_SERVER['DOCUMENT_ROOT'].'/Proyecto vocablos/img/fotoPerfil/';
							
							if(!$errors){
								//MOVEMOS LA IMAGEN DEL DIRECTORIO TEMPORAL AL DIRECTORIO ESCOGIDO:
								move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta_destino.$nombre_imagen);
							}
							
							
						}else{
							$errors .='La imagen no es valida <br />';

						}
					}else{
						$errors .='El tamaño es demaciado grande <br />';

					}

				

				// validar la edad
				if(!empty($edad)){
					if(!is_numeric($edad)){
						$errors .='Ingresa una edad valida<br />';
					}
				}else{
					$errors .='Ingresa tu Edad <br />';
				}




				if(!$errors){
					$last_id="";
					try{
						
						$query = "INSERT INTO usuario (nombreCompleto,correoE,edad,sexo,password,fotoPerfil) VALUES (:nombreCompleto, :correoE, :edad, :sexo, :password, '$nombre_imagen')";
						$resultado = $base->prepare($query);

				    	$resultado->execute(array(":nombreCompleto"=>$nombreCompleto, ":correoE"=>$correoE, ":edad"=>$edad, ":sexo"=>$sexo,  ":password"=>$password));
				    	
				    	$last_id=$base->lastInsertId();
				    	$sql =  "INSERT INTO progreso (calificacion,nivel,puntuacion,estrellas,idUsuario) VALUES (:calificacion,:nivel,:puntuacion,:estrellas,:idUsuario)";
						$resultado = $base->prepare($sql);
						
						$resultado->execute(array(":calificacion"=>0, ":nivel"=>1, ":puntuacion"=>0, ":estrellas"=>0, ":idUsuario"=>$last_id));

				    	$resultado->closeCursor();
					    //En caso de que no ocurra un error redirecciona al login del instagram para que inicie sesion
					   	header('location:registroOkAdmin.php');

					}catch(Exception $e){
						//En caso de error redirecciona de nuevo al formulario de registro y muestra un error
						header('location:registroOkAdmin.php');
						echo $e."LastID: ".$last_id;
					}
				}


		}


		session_start();
		if(!isset($_SESSION['administrador'])){//Si no hay nada almacenado te manda al login 
			require 'login.php';

		}else{
			require 'adminUsuario.php';
		}
		
?>
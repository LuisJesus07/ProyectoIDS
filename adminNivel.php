<?php 
		
		if (isset($_POST['pregunta']) && isset($_POST['correcta']) && isset($_POST['opcion2']) && isset($_POST['opcion3']) && isset($_POST['opcion4']) && isset($_POST['bloqueo'])){

				$imagen = $_POST['imagen'];
				$pregunta = $_POST['pregunta'];
				$correcta= $_POST['correcta'];
				$opcion2= $_POST['opcion2'];
				$opcion3= $_POST['opcion3'];
				$opcion4= $_POST['opcion4'];
				$bloqueo = $_POST['bloqueo'];


				$nombre_carpeta = 'img/juego/';

				$nombre_imagen = $_FILES['imagen']['name'];//Se guarda el nombre de la imagen
				$tipo_imagen = $_FILES['imagen']['type'];//Se guarda el tipo de la imagen
				$tam_imagen = $_FILES['imagen']['size'];//Se guarda el tamaño de la imagen

				if ($tam_imagen<=5000000) {//Si excede los tres megas no te deja subir la foto
					if ($tipo_imagen=="image/jpeg"||$tipo_imagen=="image/jpg"||$tipo_imagen=="image/png"||$tipo_imagen=="image/gif"){
						//RUTA DE LA CARPETA DESTINO EN EL SERVIDOR:
						$carpeta_destino = $_SERVER['DOCUMENT_ROOT'].'/Proyecto vocablos/img/juego/';
						//MOVEMOS LA IMAGEN DEL DIRECTORIO TEMPORAL AL DIRECTORIO ESCOGIDO:
						move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta_destino.$nombre_imagen);
						
						echo "imagenOk";
						
					}else{
						$errors .='La imagen no es valida <br />';

					}
				}else{
					echo "EL TAMAÑO ES DEMASIADO GRANDE";

				}
				
				try{
					include("DB/conexion.php");

					$base=conectar();

					$query = "INSERT INTO nivel (imagen,pregunta,respuesta,bloqueo) VALUES ('$nombre_carpeta$nombre_imagen',:pregunta, '$correcta*$opcion2*$opcion3*$opcion4', :bloqueo)";
					$resultado = $base->prepare($query);

			    	$resultado->execute(array(":pregunta"=>$pregunta, ":bloqueo"=>$bloqueo,));

			    	$resultado->closeCursor();
				    //En caso de que no ocurra un error redirecciona al login del instagram para que inicie sesion
				   	header('location:agregarPreguntaOk.php');

				}catch(Exception $e){
					//En caso de error redirecciona de nuevo al formulario de registro y muestra un error
					header('location:juego.html');
				}


		}

		require 'agregarPregunta.php';

?>
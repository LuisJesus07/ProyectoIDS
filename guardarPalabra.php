<?php 
		
		if (isset($_POST['palabraEsp']) && isset($_POST['palabraCochimie'])){

				$imagen = $_POST['imagen'];
				$palabraEsp = $_POST['palabraEsp'];
				$palabraCochimie= $_POST['palabraCochimie'];


				

				$nombre_imagen = $_FILES['imagen']['name'];//Se guarda el nombre de la imagen
				$tipo_imagen = $_FILES['imagen']['type'];//Se guarda el tipo de la imagen
				$tam_imagen = $_FILES['imagen']['size'];//Se guarda el tamaño de la imagen

				if ($tam_imagen<=5000000) {//Si excede los tres megas no te deja subir la foto
					if ($tipo_imagen=="image/jpeg"||$tipo_imagen=="image/jpg"||$tipo_imagen=="image/png"||$tipo_imagen=="image/gif"){
						//RUTA DE LA CARPETA DESTINO EN EL SERVIDOR:
						$carpeta_destino = $_SERVER['DOCUMENT_ROOT'].'/Proyecto vocablos/img/diccionario/';
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

					$query = "INSERT INTO diccionario (imagen,palabraEsp,palabraCochimie) VALUES ('$nombre_imagen',:palabraEsp, :palabraCochimie)";
					$resultado = $base->prepare($query);

			    	$resultado->execute(array(":palabraEsp"=>$palabraEsp, ":palabraCochimie"=>$palabraCochimie,));

			    	$resultado->closeCursor();
				    //En caso de que no ocurra un error redirecciona al login del instagram para que inicie sesion
				   	header('location:agregarPalabraOk.php');

				}catch(Exception $e){
					//En caso de error redirecciona de nuevo al formulario de registro y muestra un error
					header('location:juego.html');
				}


		}

		require 'agregarPalabra.php';

?>
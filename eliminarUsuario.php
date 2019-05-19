<?php 
		
		if (isset($_POST['txtID'])){

				$idUsuario = $_POST['txtID'];
				

				try{
					include("DB/conexion.php");
					$base=conectar();

					$query = "DELETE usuario FROM usuario WHERE idUsuario = :txtID";
					$resultado = $base->prepare($query);

			    	$resultado->execute(array(":txtID"=>$idUsuario));

			    	$resultado->closeCursor();
				    //En caso de que no ocurra un error redirecciona al login del instagram para que inicie sesion
				   	header('location:eliminarOk.php');

				}catch(Exception $e){
					//En caso de error redirecciona de nuevo al formulario de registro y muestra un error
					header('location:eliminarError.php');
				}


		}

?>
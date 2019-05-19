<?php 
		
		if (isset($_POST['txtID'])){

				$idNivel = $_POST['txtID'];
				

				try{
					include("DB/conexion.php");
					$base=conectar();

					$query = "DELETE FROM nivel WHERE idNivel = :txtID";
					$resultado = $base->prepare($query);

			    	$resultado->execute(array(":txtID"=>$idNivel));

			    	$resultado->closeCursor();
				    //En caso de que no ocurra un error redirecciona al login del instagram para que inicie sesion
				   	header('location:eliminarPreguntaOk.php');

				}catch(Exception $e){
					//En caso de error redirecciona de nuevo al formulario de registro y muestra un error
					header('location:eliminarError.php');
				}


		}

?>
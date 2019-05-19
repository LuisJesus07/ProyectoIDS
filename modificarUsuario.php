<?php 
		
		if (isset($_POST['txtID']) && isset($_POST['txtNombre']) && isset($_POST['txtCorreo']) && isset($_POST['txtEdad']) && isset($_POST['txtSexo'])){

				$id = $_POST['txtID'];
				$nombre = $_POST['txtNombre'];
				$correo= $_POST['txtCorreo'];
				$edad = $_POST['txtEdad'];
				$sexo= $_POST['txtSexo'];

				try{
					include("DB/conexion.php");
					$base=conectar();

					$query = "UPDATE usuario SET nombreCompleto= :txtNombre, correoE= :txtCorreo, edad= :txtEdad, sexo= :txtSexo WHERE idUsuario= :txtID";
					$resultado = $base->prepare($query);

			    	$resultado->execute(array(":txtID"=>$id, ":txtNombre"=>$nombre, ":txtCorreo"=>$correo, ":txtEdad"=>$edad, ":txtSexo"=>$sexo,));

			    	$resultado->closeCursor();
				    //En caso de que no ocurra un error redirecciona al login del instagram para que inicie sesion
				   	header('location:modificarOk.php');

				}catch(Exception $e){
					//En caso de error redirecciona de nuevo al formulario de registro y muestra un error
					header('location:juego.html');
				}


		}

?>
<?php 
		
		try{

			include("DB/conexion.php");
			$base=conectar();

			$query = "SELECT * FROM usuario WHERE correoE= :correoE AND password= :password";//Se hace la consulta SQL

			$resultado = $base->prepare($query);//Se prepara la consulta SQL
			$correoE = htmlentities(addslashes($_POST['correoE']));//Sirve para evitar inyecciones SQL por medio de los inputs o introducir caracteres extraños
			$password = htmlentities(addslashes($_POST['password']));//Sirve para evitar inyecciones SQL por medio de los inputs o introducir caracteres extraños
			$resultado->bindValue(":correoE", $correoE);//Se asigna el valor de nombre de usuario a su variable
			$resultado->bindValue(":password", $password);//Se asigna el valor de password a su variable
			$resultado->execute();//Se ejecuta la consulta SQL
			//$resultado->setFetchMode(PDO::FETCH_ASSOC);
			$numero_registro=$resultado->rowCount();// Devuelve el número de registros que hay
			//echo $numero_registro;


			if ($numero_registro!=0){//Sirve para saber si hay registros en la BD
				session_start();//Se inicia la sesion
				$_SESSION['usuario'] =$_POST['correoE']; //Le pasamos el nombre del usuario ala sesion
				header("location:index.php");//Redirigimos la pagina si es que el usuario existe en la BD al inicio

			}else{
				header("location:loginError.php");//Si no existe lo redirigimos al login de nuevo
			}


		}catch(Exception $e){//Excepciones/Errores
			die("Error: " . $e->getMessage());
		}

 ?>
<?php
    $mysqli = new mysqli('localhost','root','','vocablos');

    if($mysqli->connect_errno){
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $boton = $_POST['boton'];
    switch ($boton) {
        case 'obtenerInformacion':
            $query = "SELECT * FROM nivel WHERE bloqueo=0";
            $mysqli->set_charset('utf8');
            $result = $mysqli->query($query);
            $array = array();
            while($row = $result->fetch_array(MYSQLI_NUM)){
                $array[] = $row;
            }
            //print_r($array);
            echo json_encode($array);
            $mysqli->close();
        break;
         case 'mostrar':
            $query = "SELECT * FROM nivel";
            $mysqli->set_charset('utf8');
            $result = $mysqli->query($query);
            $array = array();
            while($row = $result->fetch_array(MYSQLI_NUM)){
                $array[] = $row;
            }
            //print_r($array);
            echo json_encode($array);
            $mysqli->close();
        break;
        case 'bloquear':
            $id = $_POST['id'];
            $query = "UPDATE nivel SET bloqueo=1 WHERE idNivel='$id'";
            $result = $mysqli->query($query);
            echo "Nivel Bloqueado";
            $mysqli->close();
        break;
        case 'desbloquear':
            $id = $_POST['id'];
            $query = "UPDATE nivel SET bloqueo=0 WHERE idNivel='$id'";
            $result = $mysqli->query($query);
            echo "Nivel Desbloqueado";
            $mysqli->close();
        break;
        case 'getPuntuacion':
            $id = $_POST['id'];
            $query = "SELECT nivel, puntuacion, estrellas, progreso.idUsuario, nombreCompleto FROM progreso, usuario WHERE progreso.idUsuario in (SELECT idUsuario FROM usuario WHERE correoE = '$id')";
            $mysqli->set_charset('utf8');
            $result = $mysqli->query($query);
            $array = array();
            while($row = $result->fetch_array(MYSQLI_NUM)){
                $array[] = $row;
            }
            //print_r($array);
            echo json_encode($array);
            $mysqli->close();
        break;
         case 'setNivel':
            $id = $_POST['id'];
            $niv = $_POST['nivel'];
            $query = "UPDATE progreso SET nivel='$niv' WHERE idUsuario='$id'";
            $result = $mysqli->query($query);
            echo "Valor de Nivel Actualizado";
            $mysqli->close();
        break;
        case 'setPuntuacion':
            $id = $_POST['id'];
            $punt = $_POST['puntuacion'];
            $query = "UPDATE progreso SET puntuacion='$punt' WHERE idUsuario='$id'";
            $result = $mysqli->query($query);
            echo "Valor de Puntuacion Actualizado";
            $mysqli->close();
        break;
        case 'setEstrellas':
            $id = $_POST['id'];
            $est = $_POST['estrellas'];
            $query = "UPDATE progreso SET estrellas='$est' WHERE idUsuario='$id'";
            $result = $mysqli->query($query);
            echo "Valor de Estrellas Actualizado";
            $mysqli->close();
        break;
        default:
            # code...
            break;
    }
    

    
?>
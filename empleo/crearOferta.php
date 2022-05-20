<?php
if(isset($_POST)){
	
	// Conexión a la base de datos
	require_once 'includes/conexion.php';

    $nombre = isset($_POST['nombre'])?mysqli_real_escape_string($db, $_POST['nombre']):false;
    $descripcion = isset($_POST['descripcion'])?mysqli_real_escape_string($db, $_POST['descripcion']):false;
    $requisitos = isset($_POST['requisitos'])?mysqli_real_escape_string($db, $_POST['requisitos']):false;
    $salario = isset($_POST['salario'])?mysqli_real_escape_string($db, $_POST['salario']):false;
    $comunidad = isset($_POST['comunidad'])?mysqli_real_escape_string($db, $_POST['comunidad']):false;
    $idEmpresa = $_SESSION['usuario']['id'];
    $img = $_FILES['img']['name'];
    $ciudad = isset($_POST['ciudad'])?mysqli_real_escape_string($db, $_POST['ciudad']):false;

    $errores = array();

    if(empty($nombre)){
        $errores['nombre'] = "El nombre no es valido";
    }
    if(empty($descripcion)){
        $errores['descripcion'] = "La descripcion no valido";
    }
    if(empty($requisitos)){
        $requisitos = "null";
    }
    if(empty($salario)){
        $salario = "null";
    }
    if(empty($comunidad)){
        $errores['comunidad'] = "La comunidad no valida";
    }
    if( isset($img) && $img != "" ){
        $tempf = $_FILES['img']['tmp_name'];
        $path="../empleo/assets/ofertasIcon/".$img;
        if(file_exists($path)) {
            chmod($path,0755); 
            unlink($path);
        }
        if(move_uploaded_file($tempf ,"../empleo/assets/ofertasIcon/".$img )){
            echo "foto movida";
        }else{
            echo "foto no movida";
        }
    }else{
        echo "Error al cargar la imagen";
    }

    if(count($errores) == 0){
		if(isset($_GET['editar'])){
            /*
			$oferta_id = $_GET['editar'];
			$usuario_id = $_SESSION['usuario']['id'];
			
			$sql = "UPDATE ofertasempleo SET nombre='$nombre', descripcion='$descripcion', requisitos='$requisitos',  ".
					" WHERE id = $entrada_id AND usuario_id = $usuario_id";
            */
		}else{
			$sql = "INSERT INTO ofertasempleo VALUES(null, '$img', '$nombre', '$descripcion', '$requisitos', '$salario', 'Abierta','$comunidad', '$ciudad', '$idEmpresa', curdate());";
            echo $sql;
            $guardar = mysqli_query($db, $sql);
            
            if($guardar){
                echo "guardado bien";
            }
            
            header("Location: misOfertas.php");
		}
    }else{
        header("Location: crearOfertas.php");
    }


}

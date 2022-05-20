<?php

// Iniciar la sesión y la conexión a bd
require_once 'includes/conexion.php';


$nombre;
$direccion;
$tlf;
$imagen;
$email = $_SESSION['usuario']['email'];

$foto = $_FILES['foto']['name'];

$nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
$direccion = isset($_POST['direccion']) ? mysqli_real_escape_string($db, $_POST['direccion']) : false;

if(isset($_POST['nombre']) && !is_numeric($_POST['nombre']) && !preg_match("/[0-9]/", $_POST['nombre'])){
    $nombre_valido = true;
}else{
    $nombre = $_SESSION['usuario']['nombre'];
}
if(isset($_POST['direccion'])){
    $direccion = $_POST['direccion'];
}else{
    $direccion = $_SESSION['usuario']['direccion'];
}
if(isset($_POST['telefono'])  && filter_var($_POST['telefono'], FILTER_SANITIZE_NUMBER_INT)){
    $tlf = $_POST['telefono'];
}else{
    $tlf = $_SESSION['usuario']['tlf'];
}
if( isset($foto) && $foto != "" ){
        $tempf = $_FILES['foto']['tmp_name'];
        $path="../empleo/assets/empresasIcon/".$foto;
        if(file_exists($path)) {
            chmod($path,0755); 
            unlink($path);
        }
        if(move_uploaded_file($tempf ,"../empleo/assets/empresasIcon/".$foto )){
            
        }else{
            echo "foto no movida";
        }
}else{
    echo "Error al cargar la imagen";
}
$usuario = $_SESSION['usuario']['id'];

    // ACTULIZAR USUARIO EN LA TABLA USUARIOS DE LA BBDD
    
    $sql = "UPDATE empresa SET "
        ."nombre = '$nombre', "
        ."direccion = '$direccion', "
        ."tlf = '$tlf', "
        ."imagen = '$foto' "
        ." WHERE id = '$usuario' ";
    $guardar = mysqli_query($db, $sql);
    

    if($guardar){
        $_SESSION['usuario']['nombre'] = $nombre;
        $_SESSION['usuario']['direccion'] = $direccion;
        $_SESSION['usuario']['tlf'] = $tlf;
        $_SESSION['usuario']['imagen'] = $foto;

        $_SESSION['completado'] = "Tus datos se han actualizado con éxito";
    }else{
        $_SESSION['errores']['general'] = "Fallo al guardar el actulizar tus datos!!";
    }

header('Location: empresa.php');

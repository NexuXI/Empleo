<?php

// Iniciar la sesión y la conexión a bd
require_once 'includes/conexion.php';


$nombre;
$apellidos;
$tlf;
$imagen;
$comunidad;
$email = $_SESSION['usuario']['email'];

$foto = $_FILES['foto']['name'];
$curriculum = $_FILES['cv']['name'];

$nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
$apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;

if(isset($_POST['nombre']) && !is_numeric($_POST['nombre']) && !preg_match("/[0-9]/", $_POST['nombre'])){
    $nombre_valido = true;
}else{
    $nombre = $_SESSION['usuario']['nombre'];
}
if(isset($_POST['apellidos']) && !is_numeric($_POST['apellidos']) && !preg_match("/[0-9]/", $_POST['apellidos'])){
    $apellidos = $_POST['apellidos'];
}else{
    $apellidos = $_SESSION['usuario']['apellidos'];
}
if(isset($_POST['telefono'])  && filter_var($_POST['telefono'], FILTER_SANITIZE_NUMBER_INT)){
    $tlf = $_POST['telefono'];
}else{
    $tlf = $_SESSION['usuario']['tlf'];
}
if(isset($_POST['comunidad'])){
    $comunidad = $_POST['comunidad'];
}else{
    $comunidad = $_SESSION['usuario']['comunidad'];
}
if( isset($foto) && $foto != "" ){
        $tempf = $_FILES['foto']['tmp_name'];
        $path="../empleo/assets/personasIcon/".$foto;
        if(file_exists($path)) {
            chmod($path,0755); 
            unlink($path);
        }
        if(move_uploaded_file($tempf ,"../empleo/assets/personasIcon/".$foto )){
            
        }else{
            echo "foto no movida";
        }
}else{
    $foto = $_SESSION['usuario']['imagen'];
}
if( isset($curriculum) && $curriculum != "" ){
    $tempc = $_FILES['cv']['tmp_name'];
    $path="../empleo/assets/pdf/".$curriculum;
        if(file_exists($path)) {
            chmod($path,0755); 
            unlink($path);
        }
    if(move_uploaded_file($tempc ,"../empleo/assets/pdf/".$curriculum )){
        
    }else{
        echo "curriculum no movido";
    }
}else{
    $curriculum = $_SESSION['usuario']['cv'];
}

$usuario = $_SESSION['usuario']['id'];

    // ACTULIZAR USUARIO EN LA TABLA USUARIOS DE LA BBDD
    
    $sql = "UPDATE candidatos SET "
        ."nombre = '$nombre', "
        ."apellidos = '$apellidos', "
        ."tlf = '$tlf', "
        ."imagen = '$foto', "
        ."curriculum = '$curriculum', "
        ."comunidad = '$comunidad' "
        ." WHERE id = '$usuario' ";
    $guardar = mysqli_query($db, $sql);
    

    if($guardar){
        $_SESSION['usuario']['nombre'] = $nombre;
        $_SESSION['usuario']['apellidos'] = $apellidos;
        $_SESSION['usuario']['tlf'] = $tlf;
        $_SESSION['usuario']['comunidad'] = $comunidad;
        $_SESSION['usuario']['imagen'] = $foto;
        $_SESSION['usuario']['cv'] = $curriculum;

        $_SESSION['completado'] = "Tus datos se han actualizado con éxito";
    }else{
        $_SESSION['errores']['general'] = "Fallo al guardar el actulizar tus datos!!";
    }

header('Location: usuario.php');

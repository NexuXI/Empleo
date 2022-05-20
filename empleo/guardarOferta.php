<?php

// Iniciar la sesión y la conexión a bd
require_once 'includes/conexion.php';

$id;
$nombre;
$descripcion;
$requisitos;
$salario;
$estadoOferta;
$comunidad;
$img;
$ciudad;

$nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
$descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) : false;
$img = $_FILES['img']['name'];

if(isset($_POST['nombre'])){
    $nombre_valido = true;
}else{
    $nombre = null;
}
if(isset($_POST['descripcion'])){
    $descripcion = $_POST['descripcion'];
}else{
    $descripcion = null;
}
if(isset($_POST['salario']) ){
    $salario = $_POST['salario'];
}else{
    $salario = null;
}
if(isset($_POST['requisitos']) ){
    $requisitos = $_POST['requisitos'];
}else{
    $requisitos = null;
}
if(isset($_POST['estadoOferta'])){
    $estadoOferta = $_POST['estadoOferta'];
}else{
    $estadoOferta = "Abierta";
}
if(isset($_POST['comunidad'])){
    $comunidad = $_POST['comunidad'];
}else{
    $comunidad = null;
}
if(isset($_POST['ciudad']) ){
    $ciudad = $_POST['ciudad'];
}else{
    $ciudad = null;
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



$oferta = $_POST['id'];

    // ACTULIZAR ofertasempleo
    
    $sql = "UPDATE ofertasempleo SET "
        . "img = '$img', "
        ."nombre = '$nombre', "
        ."descripcion = '$descripcion', "
        ."requisitos = '$requisitos', "
        ."salario = '$salario', "
        ."estadoOferta = '$estadoOferta', "
        ."comunidad = '$comunidad' "
        ." WHERE id = '$oferta'; ";
    $guardar = mysqli_query($db, $sql);
    echo $sql;

header('Location: misOfertas.php');

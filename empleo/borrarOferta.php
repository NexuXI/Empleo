<?php

require_once 'includes/conexion.php'; 

$id = $_POST['idOferta'];

$sql = "UPDATE ofertasempleo SET estadoOferta= 'Cerrada' WHERE id = '$id';";
$guardar = mysqli_query($db, $sql);

header('Location: misOfertas.php');

?>
<?php

require_once("includes/conexion.php");

$idOferta;
$idUser;
$estadoOferta;

if(isset($_POST)){

    $idOferta = $_POST['idOferta'];
    $idUser = $_POST['idUser'];
    $estadoOferta = $_POST['estado'];

    $sql = "UPDATE CandidaturasCandidato SET "
    ."estadoCandidatura = '$estadoOferta' "
    ." WHERE idCandidato = '$idUser' "
    ." and idOferta = '$idOferta'; ";

    $guardar = mysqli_query($db, $sql);

}

header("Location: misOfertas.php");

?>
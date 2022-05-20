<?php

require_once 'includes/conexion.php';

if(isset($_POST)){

    $idOferta = $_POST['idOferta'];
    $idUser = $_POST['idUser'];

    $puntos = 0;

    $sql = "SELECT * from candidatos where id='$idUser';";
    $resultados = mysqli_query($db, $sql);
    while($persona = mysqli_fetch_assoc($resultados)){
        $puntos = $persona['puntos'];
    }
    if($puntos == null || $puntos == ""){
        $puntos = 0;
    }

    $sql = "INSERT INTO candidaturascandidato values (null, $idUser, $idOferta, 'inscrito', curdate(), $puntos);";
    $guardar = mysqli_query($db, $sql);
}

header('Location: oferta.php?id='.$idOferta);


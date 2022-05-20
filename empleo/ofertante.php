<?php
    require_once 'includes/cabecera.php';

    $id = $_GET['id'];
    $idOferta = $_GET['idOferta'];

    $url = htmlspecialchars($_SERVER['HTTP_REFERER']);

    $sql = "SELECT * FROM candidatos where id = '$id';";

    $candidato = mysqli_query($db, $sql);

    $nombre;
    $apellidos;
    $tlf;
    $email;
    $imagen;
    $curriculum;
    $comunidad;

    if(!empty($candidato)){
        while($persona = mysqli_fetch_assoc($candidato)){
            $nombre = $persona['nombre'];
            $apellidos = $persona['apellidos'];
            $tlf = $persona['tlf'];
            $email = $persona['email'];
            $imagen = $persona['imagen'];
            $curriculum = $persona['curriculum'];
            $comunidad = $persona['comunidad'];
        }
    }

    

    if($imagen == null || $imagen == ""){
        $imagen = "default.png";
    }

    $sql = "SELECT estadoCandidatura, fechaCandidatura FROM candidaturascandidato where idCandidato = '$id' and idOferta = '$idOferta';";
    $candidatura = mysqli_query($db, $sql);

    $estadoCandidatura;
    $fechaCandidatura;

    if(!empty($candidato)){
        while($candidatur = mysqli_fetch_assoc($candidatura)){
            $estadoCandidatura = $candidatur['estadoCandidatura']; 
            $fechaCandidatura = $candidatur['fechaCandidatura'];
        }
    }

?>
<div style="padding: 2ex; background-color:  rgba(41,94,142,255); border-radius: 30px; border: 0.3ex solid white; padding: 2ex; margin: 2ex;" class="row" id="cajote">
        <div class="col-6" id="columna6">
            <img src="../empleo/assets/personasIcon/<?=$imagen ?>" style="height: auto; width: 80%; border-radius: 15px;">
        </div>
        <div class="col-4" id="columna4">
            <div>
                <h6 style="color: white;">Nombre y apellidos:</h6>
                <h3 style="color: white;"><?=$nombre . " " . $apellidos ?></h3>
            </div>
            <hr style="color: white;">
            <div>
                <h6 style="color: white;">Número de telefono:</h6>
                <p style="color: white;"><?=$tlf ?></p>
            </div>
            <hr style="color: white;">
            <div>
                <h6 style="color: white;">Email:</h6>
                <p style="color: white;"><?=$email ?></p>
            </div>
            <hr style="color: white;">
            <div>
                <h6 style="color: white;">Comunidad autonoma:</h6>
                <p style="color: white;"><?=$comunidad ?></p>
            </div>
            <hr style="color: white;">
            <div>
                <h6 style="color: white;">Estado de la candidatura:</h6>
                <p style="color: white;"><?=$estadoCandidatura ?></p>
            </div>
            <hr style="color: white;">
            <div>
                <h6 style="color: white;">Fecha de la candidatura:</h6>
                <p style="color: white;"><?=$fechaCandidatura ?></p>
            </div>
            <?php
                if($curriculum != null && $curriculum != ""){        
                    ?>
                        <hr style="color: white;">
                        <div>
                            <label style="color: white;">Curriculum:</label>
                            <a id="lineas" href="../empleo/assets/pdf/<?=$curriculum?>" download>Descargar curriculum de <?php echo $nombre . " " . $apellidos; ?></a>
                        </div>
                    <?php
                }else{
                    ?>
                        <hr style="color: white;">
                        <div>
                            <p style="color: white;"><?php echo $nombre . " " . $apellidos; ?> no tiene ningún curriculum subido.</p>
                        </div>
                    <?php
                }
            ?>
        </div>
        <div class="col-2" id="columna2">
            <div style="display: flex; flex-direction: column; justify-content: space-between; align-items: center;">
                <a href='<?php echo $url; ?>' id="ex" class="atras">&#215;</a>
            </div>
            <div style="display: flex; flex-direction: column; justify-content: space-between; align-items: center;">
                <form action="editarEstado.php" method="post">
                    <input type="hidden" name="idCandidato" value="<?=$id?>">
                    <input type="hidden" name="idOferta" value="<?=$idOferta?>">
                    <button type="submit" id="enter">Editar estado de su candidatura</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php 
    require_once 'includes/pie.php'; 
?>
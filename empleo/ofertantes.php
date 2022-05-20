<?php 
    require_once 'includes/cabecera.php';

    if(isset($_POST['idOferta'])){
        $idOferta = $_POST['idOferta'];
    }else{
        header('Location: index.php');
    }
    

    $sql = "SELECT * FROM candidaturascandidato WHERE idOferta = '$idOferta' order by puntosUser desc;";

    $candidaturas = mysqli_query($db, $sql);

    $hayCandidaturas = false;

    $idCandidatura;
    $idCandidato;
    $estadoOferta;
    $fechaCandidatura;

    $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
?>

    <!-- CAJA PRINCIPAL -->
<div class="container" id="cont2">
    <div class="row">
        <div style="display: flex; flex-direction: row; align-items: center; justify-content: space-evenly; background-color: rgba(41,94,142,255); border: 0.3ex solid white; border-radius: 30px; margin: 2ex;">
            <h1 style="color: white; padding: 2ex;">Candidatos a la oferta</h1>
            <div>
                <form action="oferta.php" method="GET">
                    <input type="hidden" name="id" value="<?php echo $idOferta; ?>">
                    <button id="enter">Ver Oferta</button>
                </form>
            </div>
            <div style="padding: 2ex; display: flex; flex-direction: column; align-items: center;">
                <a href='<?php echo $url; ?>' id="ex">&#8592;</a>
            </div>
        </div>
            
        <div id="ofertas">
        <?php
                while($candidatura = mysqli_fetch_assoc($candidaturas)){
                    $hayCandidaturas = true;
                    if($candidatura != null && $candidatura != ""){
                        $idCandidatura = $candidatura['id'];
                        $idCandidato = $candidatura['idCandidato'];
                        $estadoOferta = $candidatura['estadoCandidatura'];
                        $fechaCandidatura = $candidatura['fechaCandidatura'];

                        $sql = "SELECT * FROM candidatos WHERE id = '$idCandidato';";

                        $nombreC;
                        $apellidosC;
                        $imagenC;
                        $comunidad;

                        $candidato =  mysqli_query($db, $sql);
                        if(!empty($candidato)){
                            while($candidato1 = mysqli_fetch_assoc($candidato)){
                                if($candidato1 != null && $candidato1 != ""){
                                    $nombreC = $candidato1['nombre'];
                                    $apellidosC = $candidato1['apellidos'];
                                    $imagenC = $candidato1['imagen'];
                                    $comunidad = $candidato1['comunidad'];

                                    if($imagenC == null || $imagenC == ""){
                                        $imagenC = "default.png";
                                    }
                                    ?>
                                    <article style="padding: 2ex; height: 100%; width: 100%;">
                                        <div id="register2" style="padding: 5ex; height: 100%; width: 100%; display: flex; flex-direction: column; justify-content: space-between;">
                                            <div class="row">
                                                <img src="../empleo/assets/personasIcon/<?=$imagenC ?>" style="height: 10ex; width: auto; border-radius: 15px; padding-bottom: 1ex;">
                                                <div class="col">
                                                    <h3 style="color: white;"><?php echo $nombreC . " " . $apellidosC; ?></h3>
                                                    <hr style="color: white;">
                                                    <h6 style="color: white;"><?php echo $comunidad; ?></h6>
                                                    <hr style="color: white;">
                                                    <p style="color: white;"><?=$fechaCandidatura ?></p>
                                                </div>
                                            </div>
                                            <form action="ofertante.php" method="get" style="padding-top: 2ex; padding-bottom: 0.3ex;">
                                                <input type="hidden" value="<?=$idOferta ?>" name="idOferta">
                                                <input type="hidden" value="<?=$idCandidato ?>" name="id">
                                                <button type="submit" id="enter">Ver candidato</button>
                                            </form>
                                        </div>
                                    </article>
                                    <?php
                                }
                            }
                        }
                    }
                }
                if($hayCandidaturas == false){
                    ?>
                        <div style="background-color: rgba(119, 119, 119, 0.8); border: none; border-radius: 15px; padding-left: 1ex;">
                            <h2 style="color: white; width: 100%;">No hay candidatos para esta oferta</h2>
                        </div>
                    <?php
                }
        ?>
        </div>
    </div>
</div> 
<?php 
    require_once 'includes/pie.php'; 
?>
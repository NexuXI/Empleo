<?php require_once 'includes/cabecera.php'; ?>

<!-- CAJA PRINCIPAL -->
<div class="container" id="cont2">
    <div >
        <h1 style="color: white; padding: 2ex;">Todas las ofertas postuladas</h1>
        <div class="row">
            <div id="ofertas">
            <?php 
            $sql="SELECT * FROM ofertasempleo";

            $ofertas = mysqli_query($db, $sql);

            if(!empty($ofertas)){
                while($oferta = mysqli_fetch_assoc($ofertas)){ 
                    $id = $oferta['id'];
                    $img = $oferta['img'];
                    $nombre = $oferta['nombre'];
                    $comunidad = $oferta['comunidad'];
                    $ciudad = $oferta['ciudad'];
                    $fecha = $oferta['fecha'];
                    $idE = $oferta['idEmpresa'];
                    $sql = "SELECT * FROM empresa where id ='$idE';";
                    $empresa = mysqli_query($db, $sql);
                    if(!empty($empresa)){
                        while($e = mysqli_fetch_assoc($empresa)){
                            $nombreE = $e['nombre'];
                        }
                    }
                    $sql = "SELECT * from CandidaturasCandidato where IdOferta = '$id';";
                    $candidatura = mysqli_query($db, $sql);
                    if(!empty($candidatura)){
                        while($c = mysqli_fetch_assoc($candidatura)){
                            if($c['estadoCandidatura'] != "rechazado"){
                                ?>
                                <article style="padding: 2ex; height: 50rem;">
                                    <div id="register2" style="padding: 5ex; height: 100%; width: 100%;">
                                        <div class="row">
                                            <img src="../empleo/assets/ofertasIcon/<?=$img ?>" style="height: 100%; width: 100%; border-radius: 15px; padding-bottom: 1ex;">
                                            <div class="col">
                                                <h3 style="color: white;"><?=$nombreE?></h3>
                                                <hr style="color: white;">
                                                <h3 style="color: white;"><?=$nombre ?></h3>
                                                <hr style="color: white;">
                                                <h4 style="color: white;">
                                                    <h6 style="color: white;"><?php echo $comunidad; ?></h6>
                                                    <h4 style="color: white;"><?php echo $ciudad; ?></h4>
                                                </h4>
                                                <hr style="color: white;">
                                                <h5 style="color: white;"><?=$fecha ?></h5>
                                            </div>
                                            <form action="oferta.php" method="GET">
                                                <input type="hidden" value="<?=$id ?>" name="id">
                                                <button type="submit" id="enter">Ver oferta</button>
                                            </form>
                                        </div>
                                    </div>
                                </article>
                                <?php
                            }
                        }
                    }
                }
            }
        ?>
            </div>
        </div>
    </div>
</div> 

<?php 
    require_once 'includes/pie.php'; 
?>

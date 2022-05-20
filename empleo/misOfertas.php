<?php require_once 'includes/cabecera.php'; ?>
<!-- CAJA PRINCIPAL -->
<div class="container" id="cont2">
    <div>
        <div style="background-color: rgba(119, 119, 119, 0.8); border: none; border-radius: 15px;">
            <h1 style="color: white; padding: 2ex;">Todas mis ofertas</h1>
            <div class="container" id="contenedor">
                <a href="crearOferta.php" id="verMisOfertas">Crear oferta</a>
            </div>
        </div>
        
        <div class="row">
            <div id="ofertas">
        <?php 
            $sql="SELECT * FROM ofertasempleo where idEmpresa='".$_SESSION['usuario']['id']."';";

            $ofertas = mysqli_query($db, $sql);

            if(!empty($ofertas)){
                while($oferta = mysqli_fetch_assoc($ofertas)){
                    $id = $oferta['id'];
                    $idE = $oferta['idEmpresa'];
                    $sql = "SELECT * FROM empresa where id ='$idE';";
                    $empresa = mysqli_query($db, $sql);
                    if(!empty($empresa)){
                        while($e = mysqli_fetch_assoc($empresa)){
                            $nombre = $e['nombre'];
                        }    
                    }
        ?>
                    <article style="padding: 2ex; height: 50rem;">
                        <div id="register2" style="padding: 5ex; height: 100%; width: 100%;">
                            <div class="row">
                                <img src="../empleo/assets/ofertasIcon/<?=$oferta['img'] ?>" style="height: 100%; width: 100%; border-radius: 15px; padding-bottom: 1ex;">
                                <div class="col">
                                    <h3 style="color: white;"><?=$nombre?></h3>
                                    <hr style="color: white;">
                                    <h3 style="color: white;"><?=$oferta['nombre'] ?></h3>
                                    <hr style="color: white;">
                                    <h4 style="color: white;">
                                        <h6 style="color: white;"><?php echo $oferta['comunidad']; ?></h6>
                                        <h4 style="color: white;"><?php echo $oferta['ciudad']; ?></h4>
                                    </h4>
                                    <hr style="color: white;">
                                    <h5 style="color: white;"><?=$oferta['fecha'] ?></h5>
                                </div>
                                <div class="col" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                    <form action="borrarOferta.php" method="POST">
                                    <input type="hidden" value="<?=$id ?>" name="idOferta">
                                        <button type="submit" id="enter">Cerrar oferta</button>
                                    </form>
                                    <br>
                                    <form action="oferta.php" method="GET">
                                        <input type="hidden" value="<?=$id ?>" name="id">
                                        <button type="submit" id="enter">Ver oferta</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </article>
        <?php
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

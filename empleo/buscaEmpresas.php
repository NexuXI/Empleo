<?php
    require_once 'includes/cabecera.php'; 

    $busqueda;

    if(isset($_POST['busqueda'])){
        $busqueda = $_POST['busqueda'];
    }
    $ofertando = 0;

?>

<div class="container" id="busca">
    <form id="searchbar" action="buscaEmpresas.php" method="POST" enctype="multipart/form-data">
        <div class="search">
            <input type="text" placeholder="Ej: Bar Manolo, la Sureña..." name="busqueda">
        </div>
        <div id="boton">
            <button type="submit" id="buscar">Buscar</button>
        </div>
    </form>
</div>
<div style="display: flex; flex-direction: column; justify-content: center; align-items: center;" id="busca2">
    <form action="" method="POST" id="formulario2">
        <div id="sameSize">
            <input type="text" class="row" id="busqueda" placeholder="Ej: Bar Manolo, la Sureña..." style="border-radius: 15px; border: none; margin-bottom: 1ex;">
        </div>
        <button type="submit" class="row" id="buscar">Buscar</button>
    </form>
</div>
<!-- CAJA PRINCIPAL -->
<div class="container" id="cont2">
    <div>
        <div class="row">
            <?php
                if(isset($_POST['busqueda'])){
                    ?>
                    <h2 style="color: white;">Ofertas relacionadas con: <?=$busqueda ?></h2>
                    <?php
                }
            ?>
            <div id="ofertas">

<?php

        $sql = "SELECT * from ofertasempleo;";
        $ofertas = mysqli_query($db, $sql);

        $id;
        $img;
        $idEmpresa;
        $nombre;
        $comunidad;
        $ciudad;
        $fecha;
        $nombreEmpresa;
        $empresaId;

        if($ofertas != null && $ofertas != ""){
            while($oferta = mysqli_fetch_assoc($ofertas)){
                $id = $oferta['id'];
                $img = $oferta['img'];
                $idEmpresa = $oferta['idEmpresa'];
                $nombre = $oferta['nombre'];
                $comunidad = $oferta['comunidad'];
                $ciudad = $oferta['ciudad'];
                $fecha = $oferta['fecha'];

                if(isset($_POST['busqueda'])){
                    $sql = "SELECT * FROM empresa where nombre like '%$busqueda%';";
                }else{
                    $sql = "SELECT * FROM empresa;";
                }
                
                $resultado = mysqli_query($db, $sql);
                if($resultado != null && $resultado != ""){
                    while($resul = mysqli_fetch_assoc($resultado)){
                        $nombreEmpresa = $resul['nombre'];
                        $empresaId = $resul['id'];

                        if($idEmpresa == $empresaId){
                            ?>
                        <article style="padding: 2ex; height: 50rem;">
                            <div id="register2" style="padding: 5ex; height: 100%; width: 100%;">
                                <div class="row">
                                    <img src="../empleo/assets/ofertasIcon/<?=$img ?>" style="height: 100%; width: 100%; border-radius: 15px; padding-bottom: 1ex;">
                                    <div class="col">
                                        <h3 style="color: white;"><?=$nombreEmpresa?></h3>
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
                                    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; padding-top: 2ex;">
                                    <?php
                                        if(isset($_SESSION['usuario'])){
                                            if(!isset($_SESSION['usuario']['apellidos'])){
                                                if($_SESSION['usuario']['id'] == $idEmpresa){
                                    ?>
                                    <div>
                                        <form action="borrarOferta.php" method="POST">
                                            <input type="hidden" value="<?=$id  ?>" name="idOferta">
                                            <button type="submit" id="enter">Cerrar oferta</button>
                                        </form>
                                    </div>
                                    <?php 
                                                }
                                            }else{
                                                $sql = "SELECT * FROM candidaturascandidato WHERE idOferta = '$ofertaid' AND idCandidato = '$idUser';";
                                                $guardar = mysqli_query($db, $sql);
                                                if(isset($_SESSION['usuario'])):
                                                    if(isset($_SESSION['usuario']['apellidos'])):
                                                        if($estadoOferta == "Abierta"){
                                                            while($g = mysqli_fetch_assoc($guardar)){
                                                                if($g != "" && $g != null){
                                                                    $ofertando = 1;
                                        ?>
                                        <div>
                                            <h4 style="color: green;">Ya estas postulado a esta oferta de empleo</h4>
                                        </div>
                                        <?php 
                                                                }else{
                                                                    $ofertando = 0;
                                                                }
                                                            }
                                                                if($ofertando == 0){
                                        ?>
                                        <div>
                                            <form action="suscribirse.php" method="post">
                                                <input type="hidden" name="idOferta" value="<?php echo $id; ?>">
                                                <input type="hidden" name="idUser" value="<?php echo $_SESSION['usuario']['id']; ?>">
                                                <button id="enter" type="submit">Postularse a la oferta</button>
                                            </form>
                                        </div>
                                        <?php
                                                                }
                                                        }else{
                                        ?>
                                        <div>
                                            <h4 style="color: red;">La oferta de trabajo ha sido cerrada</h4>
                                        </div>
                                        <?php
                                                        }
                                                    endif;
                                                endif;
                                            }
                                        }
                                    ?>
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
                }else{

                }
            }
        }
?>
            </div>
        </div>
    </div>
</div>
<?php
    require_once('includes/pie.php');
?>
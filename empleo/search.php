<?php require_once 'includes/cabecera.php'; 

    $busqueda;
    $comunidad;
    if(isset($_POST['busqueda'])){
        $busqueda = $_POST['busqueda'];
    }else{
        $busqueda = "";
    }
    if(isset($_POST['comunidad'])){
        $comunidad = $_POST['comunidad'];
    }else{
        $comunidad = "";
    }
    if(isset($_SESSION['usuario'])){
        $idUser = $_SESSION['usuario']['id'];
    }
    $ofertando = 0;

?>
		<div class="container" id="busca">
                <form id="searchbar" action="search.php" method="POST" enctype="multipart/form-data">
                    <div class="search">
                        <input type="text" placeholder="Ej: Camarero, concinero..." name="busqueda">
                        <div id="ciudad">
                            <img src="../empleo/assets/img/puntozona.png" id="localizacion">
                            <select name="comunidad"  style="border-radius: 15px; margin-top: 0;">
                                <option value="">
                                    Todas
                                </option>
                                <option value="Andalucía">
                                    Andalucía
                                </option>
                                <option value="Aragón">
                                    Aragón
                                </option>
                                <option value="Islas Baleares">
                                    Islas Baleares
                                </option>
                                <option value="Canarias">
                                    Canarias
                                </option>
                                <option value="Cantabria">
                                    Cantabria
                                </option>
                                <option value="Castilla-La Mancha">
                                    Castilla-La Mancha
                                </option>
                                <option value="Castilla y León">
                                    Castilla y León
                                </option>
                                <option value="Cataluña">
                                    Cataluña
                                </option>
                                <option value="Comunidad de Madrid">
                                    Comunidad de Madrid
                                </option>
                                <option value="Comunidad Foral de Navarra">
                                    Comunidad Foral de Navarra
                                </option>
                                <option value="Comunidad Valenciana">
                                    Comunidad Valenciana
                                </option>
                                <option value="Extremadura">
                                    Extremadura
                                </option>
                                <option value="Galicia">
                                    Galicia
                                </option>
                                <option value="País Vasco">
                                    País Vasco
                                </option>
                                <option value="Principado de Asturias">
                                    Principado de Asturias
                                </option>
                                <option value="Región de Murcia">
                                    Región de Murcia
                                </option>
                                <option value="La Rioja">
                                    La Rioja
                                </option>
                                <option value="Ceuta">
                                    Ceuta
                                </option>
                                <option value="Melilla">
                                    Melilla
                                </option>
                            </select>
                        </div>
                    </div>
                    <div id="boton">
                        <button type="submit" id="buscar">Buscar</button>
                    </div>
                </form>
        </div>
        <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;" id="busca2">
                <form action="" method="POST" id="formulario2">
                    <div id="sameSize">
                            <input type="text" class="row" id="busqueda" placeholder="Ej: Camarero, cocinero..." style="border-radius: 15px; border: none; margin-bottom: 1ex;">
                            <div id="localizacion" class="row" style="margin-top: 1ex;">
                                <select id="selector" name="comunidad">
                                    <option value="Andalucía">
                                        Andalucía
                                    </option>
                                    <option value="Aragón">
                                        Aragón
                                    </option>
                                    <option value="Islas Baleares">
                                        Islas Baleares
                                    </option>
                                    <option value="Canarias">
                                        Canarias
                                    </option>
                                    <option value="Cantabria">
                                        Cantabria
                                    </option>
                                    <option value="Castilla-La Mancha">
                                        Castilla-La Mancha
                                    </option>
                                    <option value="Castilla y León">
                                        Castilla y León
                                    </option>
                                    <option value="Cataluña">
                                        Cataluña
                                    </option>
                                    <option value="Comunidad de Madrid">
                                        Comunidad de Madrid
                                    </option>
                                    <option value="Comunidad Foral de Navarra">
                                        Comunidad Foral de Navarra
                                    </option>
                                    <option value="Comunidad Valenciana">
                                        Comunidad Valenciana
                                    </option>
                                    <option value="Extremadura">
                                        Extremadura
                                    </option>
                                    <option value="Galicia">
                                        Galicia
                                    </option>
                                    <option value="País Vasco">
                                        País Vasco
                                    </option>
                                    <option value="Principado de Asturias">
                                        Principado de Asturias
                                    </option>
                                    <option value="Región de Murcia">
                                        Región de Murcia
                                    </option>
                                    <option value="La Rioja">
                                        La Rioja
                                    </option>
                                    <option value="Ceuta">
                                        Ceuta
                                    </option>
                                    <option value="Melilla">
                                        Melilla
                                    </option>
                                </select>
                                <img src="../empleo/assets/img/puntozona.png" id="puntozona">
                            </div>
                    </div>
                    <button type="submit" class="row" id="buscar">Buscar</button>
                </form>
            </div>
		
<!-- CAJA PRINCIPAL -->
<div class="container" id="cont2">
    <div>
        <div class="row">
            <div id="ofertas">
        
        <?php 
            if($busqueda != null && $busqueda != ""){
                if($comunidad != null && $comunidad != ""){
                    $sql="SELECT * FROM ofertasempleo where nombre like '%$busqueda%' or descripcion like '%$busqueda' and comunidad = '$comunidad';";
                }else{
                    $sql="SELECT * FROM ofertasempleo where nombre like '%$busqueda%' or descripcion like '%$busqueda';";
                }
            }else if( $comunidad != null && $comunidad != ""){
                $sql="SELECT * FROM ofertasempleo where comunidad = '$comunidad';";
            }else{
                $sql="SELECT * FROM ofertasempleo;";
            }


            $ofertas = mysqli_query($db, $sql);

            

            if($ofertas != null && $ofertas != ""){
                while($oferta = mysqli_fetch_assoc($ofertas)){
                    $ofertaid = $oferta['id'];
                    $estadoOferta = $oferta['estadoOferta'];
                    $sql = "SELECT e.id, e.nombre FROM empresa e INNER JOIN ofertasempleo o ON e.id = o.idEmpresa where o.id = '$ofertaid';";

                    $empresa = mysqli_query($db, $sql);
                    $nombreE;

                    if(!empty($empresa)){
                        while($emp = mysqli_fetch_assoc($empresa)){
                            $nombreE = $emp['nombre'];
                            $idE = $emp['id'];
                        }
                    }
                ?>

                    <article style="padding: 2ex; height: 50rem;">
                        <div id="register2" style="padding: 5ex; height: 100%; width: 100%;">
                            <div class="row">
                                <img src="../empleo/assets/ofertasIcon/<?=$oferta['img'] ?>" style="height: 100%; width: 100%; border-radius: 15px; padding-bottom: 1ex;">
                                <div>
                                    <h3 style="color: white;"><?=$nombreE?></h3>
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
                                <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; padding-top: 2ex;">
                                    <?php
                                        if(isset($_SESSION['usuario'])){
                                            if(!isset($_SESSION['usuario']['apellidos'])){
                                                if($_SESSION['usuario']['id'] == $idE){
                                    ?>
                                    <div>
                                        <form action="borrarOferta.php" method="POST">
                                            <input type="hidden" value="<?=$ofertaid  ?>" name="idOferta">
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
                                                                    if($g['estadoCandidatura'] == "rechazado"){
                                                                        ?>
                                                                        <div>
                                                                            <h4 style="color: red;">Has sido rechazado de esta oferta</h4>
                                                                        </div>
                                                                        <?php
                                                                    }else{
                                                                        ?>
                                                                        <div>
                                                                            <h4 style="color: green;">Ya estas postulado a esta oferta de empleo</h4>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }else{
                                                                    $ofertando = 0;
                                                                }
                                                            }
                                                                if($ofertando == 0){
                                        ?>
                                        <div>
                                            <form action="suscribirse.php" method="post">
                                                <input type="hidden" name="idOferta" value="<?php echo $ofertaid; ?>">
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
                                        <input type="hidden" value="<?=$ofertaid ?>" name="id">
                                        <button type="submit" id="enter">Ver oferta</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </article>
        
                <?php
                    $ofertando = 0;
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
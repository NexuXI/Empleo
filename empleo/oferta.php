<?php 
    require_once 'includes/cabecera.php';

    $ofertando = false;
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    
    if(isset($_SESSION['usuario'])){
        $idUser = $_SESSION['usuario']['id'];
    }
    $sql = "SELECT * from ofertasempleo where id='$id';";

    $oferta = mysqli_query($db, $sql);

    $id;
    $img;
    $nombre;
    $descripcion;
    $requisitos;
    $salario;
    $estadoOferta;
    $comunidad;
    $ciudad;
    $fecha;
    $idEmpresa;

    if(!empty($oferta)){
        while($of = mysqli_fetch_assoc($oferta)){
            $img = $of['img'];
            $nombre = $of['nombre'];
            $descripcion = $of['descripcion'];
            $requisitos = $of['requisitos'];
            $salario = $of['salario'];
            $estadoOferta = $of['estadoOferta'];
            $comunidad = $of['comunidad'];
            $ciudad = $of['ciudad'];
            $fecha = $of['fecha'];
            $idEmpresa = $of['idEmpresa'];
        }
    }

    $sql = "SELECT e.id, e.nombre FROM empresa e INNER JOIN ofertasempleo o ON e.id = o.idEmpresa where o.id = '$id';";

    $empresa = mysqli_query($db, $sql);

    $idE;
    $nombreE;

    if(!empty($empresa)){
        while($emp = mysqli_fetch_assoc($empresa)){
            $idE = $emp['id'];
            $nombreE = $emp['nombre'];
        }
    }
    $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
    
    if(isset($_SESSION['usuario'])){
        $sql = "SELECT * FROM candidaturascandidato WHERE idOferta = '$id' AND idCandidato = '$idUser';";
        $guardar = mysqli_query($db, $sql);
    }
    
?>
<div class="container" id="cont2">
    <div style="padding: 2ex; background-color:  rgba(41,94,142,255); border-radius: 30px; border: 0.3ex solid white; padding: 2ex;" class="row" id="cajote">
        <div class="col-6" id="columna6">
            <img src="../empleo/assets/ofertasIcon/<?=$img ?>" style="height: 100%; width: 100%; border-radius: 15px;">
        </div>
        <div class="col-4" id="columna4">
            <div>
                <h6 style="color: white;">Titulo de la oferta:</h6>
                <h3 style="color: white;"><?=$nombre ?></h3>
            </div>
            <hr style="color: white;">
            <div>
                <h6 style="color: white;">Nombre de la empresa:</h6>
                <p style="color: white;"><?=$nombreE ?></p>
            </div>
            <hr style="color: white;">
            <div>
                <h6 style="color: white;">Descripción:</h6>
                <p style="color: white;"><?=$descripcion ?></p>
            </div>
            <hr style="color: white;">
            <?php
                if($requisitos != null && $requisitos != "null"):
            ?>
                <div>
                    <h6 style="color: white;">Requisitos:</h6>
                    <p style="color: white;"> <?php echo $requisitos; ?> </p>
                </div>
                <hr style="color: white;">
            <?php
                endif;
            ?>
            <?php
                if($salario != null && $salario != "null"):
            ?>
            <div>
                <h6 style="color: white;">Salario:</h6>
                <p style="color: white;"> <?php echo $salario; ?> </p>
            </div>
            <hr style="color: white;">
            <?php
                endif;
            ?>
            <div>
                <h6 style="color: white;">Comunidad autonoma:</h6>
                <p style="color: white;"><?=$comunidad ?></p>
            </div>
            <hr style="color: white;">
            <div>
                <h6 style="color: white;">Ciudad:</h6>
                <p style="color: white;"><?=$ciudad ?></p>
            </div>
            <hr style="color: white;">
            <div>
                <h6 style="color: white;">Estado de la oferta:</h6>
                <p style="color: white;"><?=$estadoOferta ?></p>
            </div>
            <hr style="color: white;">
            <div>
                <h6 style="color: white;">Fecha de publicación:</h6>
                <p style="color: white;"><?=$fecha ?></p>
            </div>
        </div>
        <div class="col-2" id="columna2">
            <div style="display: flex; flex-direction: column; justify-content: space-between; align-items: center;">
                <a href='<?php echo $url; ?>' id="ex" class="atras">&#215;</a>
                <?php
                    if(isset($_SESSION['usuario'])):
                        if(!isset($_SESSION['usuario']['apellidos'])):
                            if($_SESSION['usuario']['id'] == $idEmpresa):
                ?>
                <form action="editarOferta.php" method="post" style="margin: 2ex;">
                    <input type="hidden" name="idOferta" value="<?php echo $id ?>">
                    <button id="enter" type="submit">Editar oferta</button>
                </form>
                <form action="borrarOferta.php" method="post" style="margin: 2ex;">
                    <input type="hidden" name="idOferta" value="<?php echo $id ?>">
                    <button id="enter" type="submit">Cerrar oferta</button>
                </form>
                <form action="ofertantes.php" method="post" style="margin: 2ex;">
                    <input type="hidden" name="idOferta" value="<?php echo $id ?>">
                    <button id="enter" type="submit">Ver ofertantes</button>
                </form>
            <?php
                        endif;
                    endif;
                endif;
            ?>
            <?php
            if(isset($_SESSION['usuario'])):
                if(isset($_SESSION['usuario']['apellidos'])):
                    if($estadoOferta == "Abierta"){
                        while($g = mysqli_fetch_assoc($guardar)){
                            if($g != "" && $g != null){
                                $ofertando = true;
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
                            }
                        }
                            if($ofertando == false){
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
            ?>
            </div>
        </div>
    </div>
</div>
        
<?php 
    require_once 'includes/pie.php'; 
?>

<?php 
    require_once 'includes/cabecera.php';

    if(isset($_POST['idOferta'])){
    
        $id = $_POST['idOferta'];

        $sql = "SELECT * from ofertasempleo where id = '$id'";

        $oferta = mysqli_query($db, $sql);

        $imagen;
        $nombre;
        $descripcion;
        $requisitos;
        $salario;
        $estadoOferta;
        $comunidad;
        $ciudad;
        $fecha;

        if(!empty($oferta)){
            while($of = mysqli_fetch_assoc($oferta)){
                $imagen = $of['img'];
                $nombre = $of['nombre'];
                $descripcion = $of['descripcion'];
                $requisitos = $of['requisitos'];
                $salario = $of['salario'];
                $estadoOferta = $of['estadoOferta'];
                $comunidad = $of['comunidad'];
                $ciudad = $of['ciudad'];
                $fecha = $of['fecha'];
            }
        }
        if($imagen == "null" || $imagen == ""){
            $imagen = "default.jpg";
        }
        if($requisitos == "null"){
            $requisitos = null;
        }
        if($salario == "null"){
            $salario = null;
        }
?>
        <div style="background-color:  rgba(41,94,142,255); border-radius: 30px; border: 0.3ex solid white; padding: 2ex;">
            <div id="cajote">
                <form action="guardarOferta.php" method="POST" enctype="multipart/form-data" class="row">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="col-6" id="columna6">
                    <div>
                        <img src="../empleo/assets/ofertasIcon/<?=$imagen ?>" style="width: 100%; height: 100%; border-radius: 15px;">
                        <input type="file" name="img" style="padding-bottom: 1ex;" id="fotoOferta">
                    </div>
                </div>
                <div class="col-4" id="columna4">
                    <div>
                        <h6 style="color: white;">Titulo de la oferta:</h6>
                        <input id="nom" name="nombre" value="<?php echo $nombre; ?>" style="border-radius: 15px; border: none;">
                    </div>
                    <hr style="color: white;">
                    <div>
                        <h6 style="color: white;">Nombre de la empresa:</h6>
                        <p style="color: white;"><?=$_SESSION['usuario']['nombre'] ?></p>
                    </div>
                    <hr style="color: white;">
                    <div>
                        <h6 style="color: white;">Descripción:</h6>
                        <textarea id="desc" name="descripcion" rows="7" cols="40" maxlength="255" placeholder="Camarero a tiempo parcial..."><?php echo $descripcion; ?></textarea>
                    </div>
                    <hr style="color: white;">
                    <div>
                        <h6 style="color: white;">Requisitos:</h6>
                        <textarea id="req" name="requisitos" rows="4" cols="40" maxlength="255" placeholder="3 años de experiencia..."><?php echo $salario; ?></textarea>
                    </div>
                    <hr style="color: white;">
                    <div>
                        <h6 style="color: white;">Salario:</h6>
                        <input id="sal" name="salario" value="<?php echo $salario; ?>" style="border-radius: 15px; border: none;">
                    </div>
                    <hr style="color: white;">
                    <div>
                        <h6 style="color: white;">Comunidad Autonoma:</h6>
                        <select name="comunidad" id="comunidad" style="border-radius: 15px; margin-top: 0;">
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
                    <hr style="color: white;">
                    <div>
                        <h6 style="color: white;">Ciudad:</h6>
                        <input id="nom" name="ciudad" value="<?php echo $ciudad; ?>" style="border-radius: 15px; border: none;">
                    </div>
                    <hr style="color: white;">
                    <div>
                        <h6 style="color: white;">Estado de la oferta:</h6>
                        <select name="estadoOferta" id="estado" style="border-radius: 15px; margin-top: 0; margin-bottom: 1ex; ">
                            <option value="Abierta">Abierta</option>
                            <option value="Cerrada">Cerrada</option>
                        </select>
                    </div>
                    <hr style="color: white;">
                    <div>
                        <h6 style="color: white;">Fecha de la publicación:</h6>
                        <p style="color: white;"><?=$fecha ?></p>
                    </div>
                </div>
                <div class="col-2" id="columna2">
                    <button type="submit" id="enter">Guardar cambios</button>
                </div>
                </form>
            </div>
        </div>

        <script>
            var comunidad = "<?php echo $comunidad; ?>";
            const element = document.getElementById("comunidad");
            var i;
            for( j = 0; i = element.options[j]; j++ ) {
                if(i.value == comunidad) { 
                    element.selectedIndex = j; 
                    break; 
                } 
            }

            var estado = "<?=$estadoOferta ?>";
            const elemento = document.getElementById("estado");
            var l;
            for( j = 0; l = elemento.options[j]; j++ ) {
                if(i.value == estado) { 
                    elemento.selectedIndex = j; 
                    break; 
                } 
            }
        </script>
<?php 
    }
    require_once 'includes/pie.php';
?>
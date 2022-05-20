<?php
// Iniciar la sesión y la conexión a bd
require_once 'includes/conexion.php';
require_once 'includes/cabecera.php';

if(isset($_SESSION['usuario'])){    
    ?>

        <div class="container">
            <div id="register2">
                <form action="actualizarPersona.php" method="POST" id="usuario" enctype="multipart/form-data" class="form-floating">
                    <div id="fotoPerfil">
                        <?php
                            if($_SESSION['usuario']['imagen'] != null){
                        ?>
                        <img id="perfil" src="../empleo/assets/personasIcon/<?php echo $_SESSION['usuario']['imagen']; ?>">
                        <?php
                            }else{
                        ?>
                            <img id="perfil" src="../empleo/assets/personasIcon/default.png">
                        <?php
                            }
                        ?>
                        <input type="file"  name="foto" id="inputFoto" accept="image/*">
                    </div>
                    <div class="form-floating mb-3">
                        <input id="nom" class="form-control" name="nombre" value="<?php echo $_SESSION['usuario']['nombre']; ?>">
                        <label for="nom">Nombre</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input id="ape" class="form-control" name="apellidos" value="<?php echo $_SESSION['usuario']['apellidos']; ?>">
                        <label for="ape">Apellidos</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input id="tlf" class="form-control" name="telefono" value="<?php echo $_SESSION['usuario']['tlf']; ?>">
                        <label for="tlf">Telefono</label>
                    </div>
                    <select name="comunidad" id="comunidad" style="border-radius: 15px;">
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
                    <div id="hayCV" style="backgroud-color: #0b8ec6;">
                            <?php
                                if($_SESSION['usuario']['cv'] != null && $_SESSION['usuario']['cv'] != ""){
                                    ?>
                                        <p style="font-weight: bold; color: white">Curriculum subido: <?php echo $_SESSION['usuario']['cv']; ?></p>
                                    <?php
                                }else{
                                    ?>
                                        <p style="font-weight: bold; color: white">No hay ningún curriculum subido</p>
                                    <?php
                                }
                            ?>
                        
                    </div>
                    <div id="subirCV">
                        <label id="cvlabel" for="cv">Curriculum</label>
                        <input name="cv" value="cv" id="cv" type="file" accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                    </div>
                    
                    <button type="submit" id="enter">Guardar cambios</button>
                </form>
            </div>
            
        </div>
        <script>
            var comunidad = "<?php echo $_SESSION['usuario']['comunidad']; ?>";
            const element = document.getElementById("comunidad");
            var i;
            for( j = 0; i = element.options[j]; j++ ) {
                if(i.value == comunidad) { 
                    element.selectedIndex = j; 
                    break; 
                } 
            }
        </script>
    <?php
}

require_once 'includes/pie.php';
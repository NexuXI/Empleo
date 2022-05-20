<?php
// Iniciar la sesión y la conexión a bd
require_once 'includes/conexion.php';
require_once 'includes/cabecera.php';

if(isset($_SESSION['usuario'])){    
    ?>

        <div class="container">
            <div id="register2">
                <form action="actualizarEmpresa.php" method="POST" id="usuario" enctype="multipart/form-data" class="form-floating">
                    <a id="verMisOfertas" href="misOfertas.php">Ver mis ofertas de trabajo</a>
                    <div id="fotoPerfil">
                        <?php
                            if($_SESSION['usuario']['imagen'] != null){
                        ?>
                        <img id="perfil" src="../empleo/assets/empresasIcon/<?php echo $_SESSION['usuario']['imagen']; ?>">
                        <?php
                            }else{
                        ?>
                            <img id="perfil" src="../empleo/assets/empresasIcon/default.png">
                        <?php
                            }
                        ?>
                        <input type="file" name="foto" id="inputFoto" accept="image/*">
                    </div>
                    <div class="form-floating mb-3">
                        <input id="nom" class="form-control" name="nombre" value="<?php echo $_SESSION['usuario']['nombre']; ?>">
                        <label for="nom">Nombre</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input id="dir" class="form-control" name="direccion" value="<?php echo $_SESSION['usuario']['direccion']; ?>">
                        <label for="dir">Direccion</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input id="tlf" class="form-control" name="telefono" value="<?php echo $_SESSION['usuario']['tlf']; ?>">
                        <label for="tlf">Telefono</label>
                    </div>
                    
                    <button type="submit" id="enter">Guardar cambios</button>
                </form>
            </div>
            
        </div>

    <?php
}

require_once 'includes/pie.php';
<?php
require_once("includes/cabecera.php");
?>
<div class="left">
            <div class="grey">
                <h3 id="cartel">¿Buscas empleo? Nosotros lo encontramos</h3>
            </div>
            <br>
            <!-- Bar Dispositivos Grandes -->
            <div id="bar">
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
                <div class="row">
                    <div class="col-7">
                    </div>
                    <div class="col-5" id="offer">
                        <?php 
                            if(isset($_SESSION['usuario'])){
                                if(isset($_SESSION['usuario']['apellidos'])){
                                    ?>
                                        <a id="makeOffer" href="search.php">
                                            <n>Ver ofertas de empleo</n>
                                        </a>
                                <?php
                                }else{
                                    ?>
                                        <a id="makeOffer" href="crearOfertas.php">
                                            <n>Crear oferta de empleo</n>
                                        </a>
                                    <?php
                                }
                            }else{
                                ?>
                                    <a id="makeOffer" href="login.php">
                                        <n>Crear oferta de empleo</n>
                                    </a>
                                <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
            <!-- Cierre Bar 1 -->
            <!-- Bar Dispositivos Pequeños-->
            <div class="col" id="bar2">
                <form action="search.php" method="POST" id="formulario2">
                    <div id="sameSize">
                        <input type="text" class="row" id="busqueda" placeholder="Ej: Camarero, cocinero...">
                    <div id="localizacion" class="row">
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
                <a href="#" id="alerta">Crear alerta de empleo</a>
            </div>
            <!-- Cierre Bar 2 -->
        </div>
        <br>
        <!-- Busqueda por opciones -->
        <div class="typeSearch">
            <div class="row" id="barra">
                <div id="searchBy" class="col">
                    <img src="../empleo/assets/img/etiqueta.png" id="typeSearchImg">
                    <a href="#">
                        <h4>Buscar por categoría</h4>
                    </a>
                </div>
                <div id="searchBy" class="col">
                    <img src="../empleo/assets/img/maletin.png" id="typeSearchImg">
                    <a href="buscaEmpresas.php">
                        <h4>Buscar por empresa</h4>
                    </a>
                </div>
                <div id="searchBy" class="col" style="border: none;">
                    <img src="../empleo/assets/img/mapa.png" id="typeSearchImg">
                    <a href="#">
                        <h4>Buscar por provincia</h4>
                    </a>
                </div>
            </div>
        </div>
        <!-- Cierre Busqueda por opciones -->
    </div>
<?php
    require_once("includes/pie.php");
?>
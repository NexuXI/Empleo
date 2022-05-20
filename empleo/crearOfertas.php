<?php 
// Iniciar la sesión y la conexión a bd
require_once 'includes/conexion.php';
require_once 'includes/cabecera.php';

if(isset($_SESSION['usuario'])){    
    
    ?>

    <div class="container">

        <div id="register2">

            <form action="crearOferta.php" method="POST" id="usuario"  enctype="multipart/form-data" class="form-floating">
                <h2 style="color: white;">Crear una oferta de empleo</h2>
                <div>
                    <label for="fotoOferta" style="color: white;">Foto de la oferta</label>
                    <input type="file" name="img" style="padding-bottom: 1ex;" id="fotoOferta">
                </div>
                <div class="form-floating mb-3">
                    <input id="nom" class="form-control" name="nombre" >
                    <label for="nom">Nombre de la oferta</label>
                </div>
                <div class="form-group">
                    <label for="desc" style="font-weight: bold; color: white;">Descripcion de la oferta</label>    
                    <textarea id="desc" class="form-control" name="descripcion" rows="7" cols="40" maxlength="255" placeholder="Camarero a tiempo parcial..."></textarea>
                </div>
                <div class="form-group">
                    <label for="req" style="font-weight: bold; color: white;">Requisitos</label>    
                    <textarea id="req" class="form-control" name="requisitos" rows="4" cols="40" maxlength="255" placeholder="3 años de experiencia..."></textarea>
                </div>
                <div class="form-floating mb-3" style="margin-top: 1ex;">
                    <input id="sal" class="form-control" name="salario">
                    <label for="sal">Salario</label>
                </div>
                <div class="form-group">
                    <label for="comunidad" style="font-weight: bold; color: white;">Comunidad Autonoma</label>
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
                    <div class="form-floating mb-3">
                        <input id="nom" class="form-control" name="ciudad" >
                        <label for="nom">Ciudad</label>
                    </div>
                </div>

                <button id="enter" type="submit">Crear oferta</button>
            </form>

        </div>

    </div>

    <?php
}

require_once 'includes/pie.php';
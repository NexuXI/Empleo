<?php require_once 'conexion.php'; ?>
<?php /* require_once 'includes/helpers.php'; */ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleo</title>
    <link rel="stylesheet" href="../empleo/assets/css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body onload="cambiar(pestanas, pestana1, pestanas2, Login1)">
    <script src="https://kit.fontawesome.com/40655c9087.js" crossorigin="anonymous"></script>
    <script src="../empleo/assets/js/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Header -->
    <header id="cabeza2">
        <nav>
            <div id="mySidenav" class="sidenav">
                <div class="row" id="superiorMenu">
                    <div class="col">
                    </div>
                    <div class="col" id="cerrar">
                        <a href="javascript:void(0)" onclick="closeNav()" id="ex">
                            &#215;
                        </a>
                    </div>
                </div>
                <a href="index.php">Home</a>
                <hr>
                <?php if(isset($_SESSION['usuario'])): ?>
                    <?php if(isset($_SESSION['usuario']['apellidos'])):?>
                        <a href="usuario.php">Acceso a mi perfil</a>
                        <hr>
                        <a href="ofertasPersona.php">Ofertas postuladas</a>
                    <?php endif; ?>
                    <?php if(!isset($_SESSION['usuario']['apellidos'])):?>
                        <a href="empresa.php">Acceso a mi perfil</a>
                        <hr>
                        <a href="misOfertas.php">Ofertas creadas</a>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if(!isset($_SESSION['usuario'])): ?>
                    <a href="login.php">Acceder a la cuenta</a>
                <?php endif; ?>
                <hr>
                <?php if(isset($_SESSION['usuario'])): ?>
                    <?php if(isset($_SESSION['usuario']['apellidos'])):?>
                        <a href="#">Formación</a>
                    <?php endif; ?>
                    <?php if(!isset($_SESSION['usuario']['apellidos'])): ?>
                        <a href="crearOfertas.php">Crear una oferta</a>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if(!isset($_SESSION['usuario'])): ?>
                    <a href="#">Formación</a>
                <?php endif; ?>
                <hr>
                <a href="#">Noticias</a>
                <br>
                <br>
                <?php if(isset($_SESSION['usuario'])): ?>
                    <div id="usuario-logueado" class="bloque">
                        <p style="color: white;">Bienvenido, <?=$_SESSION['usuario']['nombre'];?></p>
                        <form action="cerrar.php" method="POST">
                            <button type="submit" id="logout">Cerrar sesión</button>
                        </form>
                    </div>
	            <?php endif; ?>
                <?php if(!isset($_SESSION['usuario'])): ?>
                    <form action="login.php" method="POST">
                        <button type="submit" id="registrate">Registrate</button>
                    </form>
                <?php endif; ?>
            </div>
            <ul id="lista">
                <li>
                    <a href="../empleo/index.php">
                        <img src="../empleo/assets/img/logo-web.png" id="logo">
                    </a>
                </li>
                <li id="botonDesplegable">
                    <a href="#" onclick="openNav()" id="lineas">
                        &#9776;
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <!-- Cierre header -->
    <div id="wrapper">
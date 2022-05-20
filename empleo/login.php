<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../empleo/assets/css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body onload="cambiar(pestanas, pestana1, pestanas2, Login1)">
    <!-- Header Dispositivos Pequeños-->
    <header id="cabeza2">
        <nav>
            <ul id="lista">
                <li>
                    <a href="../empleo/index.php">
                        <img src="../empleo/assets/img/logo-web.png" id="logo">
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <!-- Cierre header 2 -->
    <div class="container">
        <div class="row" id="fila">
            <div class="col-6" id="login">
                <div class="col">
                    <div class="row-4" id="imgPlusText">
                        <img src="../empleo/assets/img/logo.png" id="logo2">
                        <h2>Log in to ItSicap</h2>
                    </div>
                    <div class="row-8" id="row8">
                        <div id="pestanas2">
                            <ul id=lista2 class="row">
                                <div class="col" id="empresa">
                                    <li id="Login1">
                                        <a href="javascript:cambiarPestannaL(pestanas2,Login1);">Estoy buscando un trabajo</a>
                                    </li>
                                </div>
                                <div class="col" id="candidato">
                                    <li id="Login2">
                                        <a href='javascript:cambiarPestannaL(pestanas2,Login2);'>Estoy contratando gente</a>
                                    </li>
                                </div>
                            </ul>
                        </div>
                        <div id="contenidopestanas2">
                            <div id="cLogin1">
                                <form action="loginPers.php" method="POST" id="contratando">
                                    <input type="text" name="email" id="email" placeholder="Email Personal">
                                    <input autocomplete="off" type="password" name="clave" id="clave" placeholder="Contraseña">
                                    <button type="submit" id="enter">Entrar</button>
                                    <a href="olvidarUser.php" id="olvidar">¿Has olvidado la contraseña?</a>
                                </form>
                            </div>
                            <div id="cLogin2">
                                <form action="loginEmpr.php" method="POST" id="contratando">
                                    <input type="text" name="email" id="email" placeholder="Email Empresa">
                                    <input autocomplete="off" type="password" name="clave" id="clave" placeholder="Contraseña">
                                    <button type="submit" id="enter">Entrar</button>
                                    <a href="olvidarEmpresa.php" id="olvidar">¿Has olvidado la contraseña?</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1" id="espacio">
            </div>
            <div class="col-5" id="register2">
                <div class="row-4" id="imgPlusText">
                    <img src="../empleo/assets/img/logo.png" id="logo2">
                    <h2>Registro</h2>
                </div>
                <div class="row-8" id="row8">
                    <h2>¿Eres nuevo?</h2>
                    <div id="nuevo">
                        <div id="pestanas">
                            <ul id=lista2 class="row">
                                <div class="col">
                                    <li id="pestana1">
                                        <a href='javascript:cambiarPestannaR(pestanas,pestana1);'>
                                            Empresa
                                        </a>
                                    </li>
                                </div>
                                <div class="col">
                                    <li id="pestana2">
                                        <a href='javascript:cambiarPestannaR(pestanas,pestana2);'>
                                            Candidato
                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </div>
                        <div id="contenidopestanas">
                            <div id="cpestana1">
                                <form action="registroEmpresa.html" method="POST">
                                    <button type="submit" class="registro">Regístrate</button>
                                </form>
                            </div>
                            <div id="cpestana2">
                                <form action="registroPersona.html" method="POST">
                                    <button type="submit" class="registro">Regístrate</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <!-- fin contenedor -->
    <!-- PIE DE PÁGINA -->
    <footer >
        <div class="text-center">
            <div class="container">
                <section>
                    <!-- Facebook -->
                    <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="https://www.facebook.com/SICAPconsultoriainformatica" role="button" data-mdb-ripple-color="dark" target="blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <!-- Twitter -->
                    <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="https://www.instagram.com/itsicapconsultoriaysistemas/?hl=es" role="button" data-mdb-ripple-color="dark" target="blank">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <!-- Linkedin -->
                    <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="https://es.linkedin.com/company/itsicap?trk=public_jobs_topcard-org-name" role="button" data-mdb-ripple-color="dark" target="blank">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <div class="text-center">
                        ©<span id="year"></span>Copyright: <a class="text-dark" href="https://itsicap.com/" target="blank" id="web">Itsicap.com</a>
                        </div>
                </section>
            </div>
        </div>
    </footer>
    <script src="https://kit.fontawesome.com/40655c9087.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
    <script src="../empleo/assets/js/index.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script>
        var currentTime = new Date();
        var year = currentTime.getFullYear()
        document.getElementById("year").innerHTML=" " + year + " ";
    </script>
</body>
</html>
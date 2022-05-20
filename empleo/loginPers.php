<?php
// Iniciar la sesión y la conexión a bd
require_once 'includes/conexion.php';

// Recoger datos del formulario
if(isset($_POST)){
	
	// Borrar error antiguo
	if(isset($_SESSION['error_login'])){
		session_unset();
	}
			
	// Recoger datos del formulario
	$email = trim($_POST['email']);
	$password = $_POST['clave'];
	
	// Consulta para comprobar las credenciales del usuario
	$sql = "SELECT * FROM candidatos WHERE email = '$email' and activo = 1";
	$login = mysqli_query($db, $sql);
	
	if($login && mysqli_num_rows($login) == 1){
		$usuario = mysqli_fetch_assoc($login);
		if($usuario['puntos'] == null || $usuario['puntos'] == ""){
			$puntos = 0;
		}else{
			$puntos = $usuario['puntos'];
		}
		// Comprobar la contraseña
		$verify = password_verify($password, $usuario['clave']);
		
		if($verify){
			// Utilizar una sesión para guardar los datos del usuario logueado
			$_SESSION['usuario'] = $usuario;
			$_SESSION['usuario']['cv'] = $usuario['curriculum'];
			$puntos ++;
			$sql = "UPDATE candidatos SET puntos='$puntos' WHERE email='$email' AND activo='1'";
			mysqli_query($db, $sql);
			// Redirigir al index.php
			header('Location: index.php');
		}else{
			// Si algo falla enviar una sesión con el fallo
			$_SESSION['error_login'] = "Login incorrecto!!";
			header('Location: login.php');
		}
	}else{
		// mensaje de error
		$_SESSION['error_login'] = "Login incorrecto!!";
		header('Location: login.php');
	}
	
}


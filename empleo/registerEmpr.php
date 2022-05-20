<?php
if(isset($_POST)){
	
	// Conexión a la base de datos
	require_once 'includes/conexion.php';

	// Iniciar sesión
	if(!isset($_SESSION)){
		session_start();
	}
	
	// Recorger los valores del formulario de registro
	$nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
	$direccion = isset($_POST['apel']) ? mysqli_real_escape_string($db, $_POST['dir']) : false;
	$telefono = isset($_POST['tlf']) ? mysqli_real_escape_string($db, $_POST['tlf']) : false;
	$email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
	
	//$password = isset($_POST['clave']) ? mysqli_real_escape_string($db, $_POST['clave']) : false;

	// Array de errores
	$errores = array();
	
	// Validar los datos antes de guardarlos en la base de datos
	// Validar campo nombre
	if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
		$nombre_validado = true;
	}else{
		$nombre_validado = false;
		$errores['nombre'] = "El nombre no es válido";
	}
	
	// Validar apellidos
	if(empty($direccion)){
        $direccion = null;
	}
	
	// Validar el email
	if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
		$email_validado = true;
	}else{
		$email_validado = false;
		$errores['email'] = "El email no es válido";
	}
	
	// Validar el telefono
	if(!empty($telefono) && filter_var($telefono, FILTER_SANITIZE_NUMBER_INT)){
		$telefono_valido = true;
	}else{
		$telefono_valido = false;
		$errores['telefono'] = "El telefono no es valido";
	}

	/*
	// Validar la contraseña
	if(!empty($password)){
		$password_validado = true;
	}else{
		$password_validado = false;
		$errores['password'] = "La contraseña está vacía";
	}
	*/
	
	$hash = md5( rand(0, 1000) );
	$password = rand(1000, 5000);

	$guardar_usuario = false;
	
	if(count($errores) == 0){
		$guardar_usuario = true;
		
		// Cifrar la contraseña
		$password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);
		
		// INSERTAR USUARIO EN LA TABLA USUARIOS DE LA BBDD
		$sql = "INSERT INTO empresa VALUES(null, '$nombre', '$direccion', '$telefono', '$email', 0, '$hash', '$password_segura',  'default.png');";
		$guardar = mysqli_query($db, $sql);
		
//		var_dump(mysqli_error($db));
//		die();
		if($guardar){
			$_SESSION['completado'] = "El registro se ha completado con éxito";

			$to = $email; // Send email to our user
			$subject = 'Registro | Verificación'; // Give the email a subject 
			$message = '
			<!DOCTYPE html>
			<html lang="es">
			<head>
				<meta charset="UTF-8">
				<title>Verificación</title>
			</head>
			<body>
				<h2>Gracias por registrarte!</h2>
				<h4>Tu cuenta ya ha sido creada, puedes hacer login con las siguientes crendeciales despues de activar la cuenta haciendo click en el enlace de abajo.</h4>	
				<p>------------------------</p>
				<h4>Email: '.$email.'</h4>
				<h4>Contraseña predeterminada: '.$password.'</h4>
				<p>------------------------</p>
				<h4>Haga click en este enlace para vericiar la cuenta: </h4>
				<h1>
					<a href="http://localhost:81/empleo/verificarEmpresas.php?email='.$email.'&hash='.$hash.'" target="_blank">Verificar</a> 
				</h1>
			</body>
			</html>
			'; 
								
			$headers = "From: noreply@itsicap.com\n";
			$headers .= 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

			mail($to, $subject, $message, $headers); // Send our email
			header('Location: login.php');
		}else{
			$_SESSION['errores']['general'] = "Fallo al guardar el usuario!!";
			header('Location: registroEmpresa.html');
		}
		
	}else{
		$_SESSION['errores'] = $errores;
		header('Location: registroEmpresa.html');
	}
}
header('Location: login.php');
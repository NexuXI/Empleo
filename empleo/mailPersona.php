<?php

// Iniciar la sesión y la conexión a bd
require_once 'includes/conexion.php';

if(isset($_POST["email"])){
    if($_POST['email'] != null && $_POST['email'] != ""){
        $email = $_POST['email'];

        $sql = "SELECT *FROM candidatos where email = '$email';";
        $busqueda = mysqli_query($db, $sql);
        if($busqueda != null){
            while($persona = mysqli_fetch_assoc($busqueda)){
                $id = $persona['id'];
                $hash = $persona['hash'];
            }
        }

        $to      = $email; // Send email to our user
		$subject = 'Recuperación cuenta'; // Give the email a subject 
		$message = '
		<!DOCTYPE html>
		<html lang="es">
		<head>
			<meta charset="UTF-8">
			<title>Recuperación</title>
		</head>
		<body>
			<h2>Cambia la contraseña de tu cuenta.</h2>
			<h4>Haz click en el siguiente enlace y cambia la contraseña del mail.</h4>	
			<p>------------------------</p>
			<h1>
				<a href="http://localhost:81/empleo/CambiarUser.php?id='.$id.'&hash='.$hash.'" target="_blank">Cambiar clave</a> 
			</h1>
		</body>
		</html>
		'; 

        $headers = "From: noreply@itsicap.com\n";
		$headers .= 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
        mail($to, $subject, $message, $headers); // Send our email
    }
}
header('Location: login.php');

?>
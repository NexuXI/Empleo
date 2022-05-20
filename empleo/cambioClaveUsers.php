<?php
require_once('includes/conexion.php');

if(isset($_POST['nuevaClave']) && !empty($_POST['nuevaClave'])){
    // Verify data
    $nuevaClave = mysqli_real_escape_string($db, $_POST['nuevaClave']); // Set email variable
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $hash = mysqli_real_escape_string($db, $_POST['hash']);

    $search = mysqli_query($db, "SELECT * FROM candidatos WHERE email='".$email."' AND hash='".$hash."' AND activo='1'") or die(mysql_error()); 
    $match  = mysqli_num_rows($search);

    $password_segura = password_hash($nuevaClave, PASSWORD_BCRYPT, ['cost'=>4]);

    if($match > 0){
        // We have a match, activate the account
        mysqli_query($db, "UPDATE candidatos SET clave='$password_segura' WHERE email='".$email."' AND hash='".$hash."' AND activo='1'") or die(mysql_error());
    }
}
header("Location: login.php");
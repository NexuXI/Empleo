<?php
require_once('includes/cabecera.php');

?>
<div class="container">
    <div id="register2">
<?php

if(isset($_GET['email']) &&  isset($_GET['hash'])){
    // Verify data
    $email = $_GET['email']; // Set email variable
    $hash = $_GET['hash']; // Set hash variable

    $search = mysqli_query($db, "SELECT email, hash, activo FROM empresa WHERE email='".$email."' AND hash='".$hash."' AND activo='0'") or die(mysql_error()); 
    $match  = mysqli_num_rows($search);
    if($match > 0){
        // We have a match, activate the account
        mysqli_query($db, "UPDATE empresa SET activo='1' WHERE email='".$email."' AND hash='".$hash."' AND activo='0'") or die(mysql_error());
        echo '<div class="statusmsg" style="padding: 0.5ex; padding-left: 2ex; color: white;">Su cuenta ya ha sido activada y ahora ya puede hacer login.</div>';
        
        ?> 
            
                    <form action="cambioClaveEmpresa.php" method="POST" style="display: flex; flex-direction: column; align-items: center;">
                        <div class="form-floating mb-3">
                            <input type="hidden" name="email" value="<?=$email ?>">
                            <input type="hidden" name="hash" value="<?=$hash ?>">
                            <input id="nom" class="form-control" name="nuevaClave" type="password">
                            <label for="nom">Nueva contraseña</label>
                        </div>
                        <button type="submit" id="enter" style="margin-bottom: 3ex;">Cambiar contraseña</button>
                    </form>
                
        <?php
        
    }else{
        // No match -> invalid url or account has already been activated.
        echo '<div class="statusmsg" style="padding: 0.5ex; padding-left: 2ex; color: white;">La URL es invalida o la cuenta ya ha sido activada./div>';
    }

}else{
    // Invalid approach
    echo $_GET['email'];
    echo "<br>";
    echo $_GET['hash'];
    echo '<div class="statusmsg">Llegada invalida, porfavor use el link que hemos mandado a su email.</div>';
}
?>
</div>
    </div>
<?php

require_once('includes/pie.php');
?>
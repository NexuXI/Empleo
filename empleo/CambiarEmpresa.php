<?php
require_once('includes/cabecera.php');

?>
<div class="container">
    <div id="register2">
<?php

if(isset($_GET['id']) &&  isset($_GET['hash'])){
    // Verify data
    $id = $_GET['id']; // Set email variable
    $hash = $_GET['hash']; // Set hash variable

    $sql = "SELECT id, hash, email FROM empresa WHERE id='".$id."' AND hash='".$hash."';";
    $search = mysqli_query($db, $sql) or die(mysql_error()); 
    $match  = mysqli_num_rows($search);
    if($match > 0){
        // We have a match
        while($persona = mysqli_fetch_assoc($search)){
            $email = $persona['email'];
        }
        ?> 
                    <form action="cambioClaveEmpresa.php" method="POST" style="display: flex; flex-direction: column; align-items: center;">
                        <div style="margin-bottom: 2ex;">
                            <input type="hidden" name="email" value="<?=$email ?>">
                            <input type="hidden" name="hash" value="<?=$hash ?>">
                            <label style="color: white;" for="nom">Nueva contraseña para: <?=$email ?></label>
                            <input id="nom" class="form-control" name="nuevaClave" type="password">
                        </div>
                        <button type="submit" id="enter" style="margin-bottom: 3ex;">Cambiar contraseña</button>
                    </form>
                
        <?php
    }else{
        // No match -> invalid url or account has already been activated.   
        echo '<div class="statusmsg" style="padding: 0.5ex; padding-left: 2ex; color: white;">La URL es invalida</div>';
    }

}else{
    // Invalid approach
    echo '<div class="statusmsg">Llegada invalida, porfavor use el link que hemos mandado a su email.</div>';
}
?>
</div>
    </div>
<?php

require_once('includes/pie.php');
?>
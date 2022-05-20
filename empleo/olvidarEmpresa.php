<?php
require_once 'includes/cabecera.php';
?>
<div id="register2">
    <form action="mailEmpresa.php" method="post" class="form-floating">
        <div class="container" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
            <div style="width: 50%;">
                <div class="form-floating mb-3">
                    <input id="nom" class="form-control" name="email" required>
                    <label for="nom">Email</label>
                </div>
            </div>
            <button id="enter" type="submit">Enviar mail de recuperación</button>
        </div>
    </form>
</div>
<?php
require_once 'includes/pie.php';
?>
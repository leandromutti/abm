<?php 
header_remove('Cache-Control');
require_once("includes/chequearSesion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Usuario</title>
    <?php
        require_once("includes/fuentes.php");
    ?>

    <link rel=StyleSheet href="includes/css/general.css" type="text/css" media=screen>
    <link rel=StyleSheet href="includes/css/popup.css" type="text/css" media=screen>
    
</head>
<body>
<?php
    require_once("includes/MNUbar.php");
    include_once("includes/RNFunciones.php");
    ?>
    <div class="panel panel-form">
        <form id="frmNuevo" name="frmNuevo" method="post" >
            <div class="form-item">
            <h2 class="titulo-color"><i class="far fa-file"></i>&nbsp;&nbsp;Nuevo Usuario</h2>
            </div>

            <div class="form-item">
                <input name="txtUsuario" id="txtUsuario" class="input-text" maxlength="10" placeholder="Usuario" value="">
            </div>
            <div class="form-item">
                <input name="txtNombre" id="txtNombre" class="input-text" maxlength="25" placeholder="Nombre" value="">
            </div>
            <div class="form-item">
                <input name="txtApellido" id="txtApellido" class="input-text" maxlength="25" placeholder="Apellido" value="">                    
            </div>
            <div class="form-item">
                <input type="password" name="txtContrasena" id="txtContrasena" maxlength="25" placeholder="Contraseña" class="input-text" value="">                 
            </div>   
            <div class="form-item contienebotones">
                <button type="button" name="btnGuardarNuevo" id="btnGuardarNuevo" class="app-button-st"><i class="fas fa-check"></i>&nbsp;&nbsp;Guardar</button>
                &nbsp;
                <button type="button" name="btnCancelar" id="btnCancelar" class="app-button-st cancelar"><i class="fas fa-ban"></i>&nbsp;&nbsp;Cancelar</button>
            </div>


        </form>
    </div>
    <?php
        require_once("includes/popup.php");
    ?>

    <script src="includes/js/acciones.js"></script>
    <script src="includes/js/setfocus.js"></script>
    <script src="includes/js/popup.js"></script>

</body>
</html>


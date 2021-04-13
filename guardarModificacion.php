<?php
    header_remove('Cache-Control');
    require_once("includes/chequearSesion.php");
    require_once("includes/RNFunciones.php");

    $idUsuario = $_SESSION["idUsuarioModificar"];

    if (isset($_POST["txtUsuario"]) && isset($_POST["txtNombre"])  && isset($_POST["txtApellido"])  && isset($_POST["txtContrasena"]))
    {

        $usuario = $_POST["txtUsuario"];
        $usuarioOriginal = $_POST["hidUsuario"];
        $nombre = $_POST["txtNombre"];
        $apellido = $_POST["txtApellido"];
        $password = $_POST["txtContrasena"];
        $hidUsuario = $_POST["hidUsuario"];

        $resultado = ActualizaUsuario($idUsuario,$usuario,$nombre,$apellido,$password,$usuarioOriginal);


        if ($resultado["estado"]) {
            $mensaje = "Actualizado con éxito";
            require_once("includes/MensajeRedirecciona.php");
        }else
        {
            $mensajeErr = $resultado["mensaje"];
            ?>
            <!DOCTYPE html>
            <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0 ">
                    <link rel=StyleSheet href="includes/css/login.css" type="text/css" media=screen>
                    <link rel=StyleSheet href="includes/css/popup.css" type="text/css" media=screen>
                    <title>Stampy Mail - Mensaje</title>
                </head>
                <body>
                    <form name="frmLogin" id="frmLogin" method="post" action="modificar.php">
                        <h2><img src="img/logo.jpg" class="imglogo"></h2>
                        <h2><img src="img/error.png" class="imgError"></h2>
                        <h5><?php echo $mensajeErr;?></h5>
                        <input type="hidden" name="txtUsuario" id="txtUsuario" value="<?php echo $usuario;?>">
                        <input type="hidden" name="txtNombre" id="txtNombre" value="<?php echo $nombre;?>"> 
                        <input type="hidden" name="txtApellido" id="txtApellido" value="<?php echo $apellido;?>">
                        <input type="hidden" name="txtContrasena" id="txtContrasena" value="<?php echo $password;?>">
                        <input type="hidden" name="hidUsuario" id="hidUsuario" value="<?php echo $hidUsuario;?>">
                        <input type="submit" name="btnRedicciona" id="btnRedicciona"  value= "Reintentar" class="app-button-st">
                    </form>
                </body>
            </html>
        <?php   
        }
    }else{
        $mensajeErr = "Acceso Denegado";
        require_once("includes/Mensaje.php");
    }    
?>

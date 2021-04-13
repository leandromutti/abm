<?php
    require_once("includes/chequearSesion.php");
    require_once("includes/RNFunciones.php");

    //Toma el id. usuario
    $idUsuario = $_SESSION["idUsuarioEliminar"];

    //Eliminar el usuario
    $resultado = EliminarUsuario($idUsuario);

    if ($resultado["estado"]) {
        $mensaje = "Eliminado con éxito";
        require_once("includes/MensajeRedirecciona.php");
    }else
    {
        ?>
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0 ">
                <?php
                    require_once("includes/fuentes.php");
                ?>

                <link rel=StyleSheet href="includes/css/login.css" type="text/css" media=screen>
                <link rel=StyleSheet href="includes/css/popup.css" type="text/css" media=screen>
                <title>Fidelitas</title>
            </head>
            <body>
                <form name="frmMensaje" id="frmMensaje" method="post" action="abm.php">
                    <h2><img src="img/fidelitas2.png" class="imglogo"></h2>
                    <h2><i class="fas fa-ban fa-3x"></i></h2>
                    <h3><?php echo $resultado["mensaje"];?></h3>
                    <input type="submit" name="btnRedicciona" id="btnRedicciona"  value= "Reintentar" class="app-button-st">
                </form>
            </body>
        </html>
        <?php
     
    }

?>
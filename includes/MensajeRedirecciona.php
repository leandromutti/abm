<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0 ">
        <link rel=StyleSheet href="includes/css/login.css" type="text/css" media=screen>
        <link rel=StyleSheet href="includes/css/popup.css" type="text/css" media=screen>
        <?php
            require_once("includes/fuentes.php");
        ?>
        <meta http-equiv="refresh" content="3; url=abm.php">
        <title>Fidelitas</title>
    </head>
    <body>
        <form name="frmMensaje" id="frmMensaje" method="post" action="">
            <h2><img src="img/fidelitas2.png" class="imglogo"></h2>
            <h2><i class="fas fa-check fa-3x"></i></h2>
            <h3><?php echo $mensaje;?></h3>
            <h3>Aguarde unos segundos</h3>
        </form>
    </body>
</html>
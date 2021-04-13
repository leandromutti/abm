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
    <title>fidelitas2</title>
</head>
<body>
    <form name="frmMensaje" id="frmMensaje" method="post" action="login.php">
        <h2><img src="img/fidelitas2.png" class="imglogo"></h2>
        <h2><i class="fas fa-ban fa-3x"></i></h2>
        <h3><?php echo $mensajeErr;?></h3>
        <input type="button" name="btnCancelar" id="btnCancelar"  value= "Reintentar" class="app-button-st">
    </form>
    <script src="includes/js/login.js"></script>
</body>
</html>
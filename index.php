
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    
    <link rel=StyleSheet href="includes/css/login.css" type="text/css" media=screen>
    <link rel=StyleSheet href="includes/css/popup.css" type="text/css" media=screen>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" integrity="sha384-KA6wR/X5RY4zFAHpv/CnoG2UW1uogYfdnP67Uv7eULvTveboZJg0qUpmJZb5VqzN" crossorigin="anonymous">

    <title>Fidelitas Usuarios</title>
</head>
<body>
    <form name="frmLogin" id="frmLogin" method="post" action="login.php">
        <h2><img src="img/fidelitas2.png" class="imglogo"></h2>
        <h2>Administración de usuarios</h2>
        <input type="text" name="txtUsuario" id="txtUsuario" class="input-text" placeholder= "Usuario" value="admin" maxlength="20">
        <input type="password" name="txtPass" id="txtPass"  class="input-text" placeholder= "Contraseña" value="ClavePrueba2021" maxlength="20" >
        <input type="button" name="btnLogin" id="btnLogin"  value= "Ingresar" class="app-button-st">
    </form>
    <?php
        require_once("includes/popup.php");
    ?>
    <script src="includes/js/popup.js"></script>
    <script src="includes/js/setfocus.js"></script>
    <script src="includes/js/login.js"></script>
</body>
</html>
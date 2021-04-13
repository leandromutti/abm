<?php
    session_start();
    $_SESSION["idUsuarioModificar"] = "";
    $_SESSION["idUsuarioEliminar"] = "";
    $_SESSION["usuario"] = "";

    $mensaje = "Cerrando Sesión...";
    require_once("includes/MensajeRedirecciona.php");

?>
<?php
    require_once("includes/chequearSesion.php");
    require_once("includes/RNFunciones.php");

    $idUsuario = $_SESSION["idUsuarioModificar"];

    if (isset($_POST["txtUsuario"]) && isset($_POST["txtNombre"])  && isset($_POST["txtApellido"])  && isset($_POST["txtContrasena"]))
    {

        $usuario = $_POST["txtUsuario"];
        $nombre = $_POST["txtNombre"];
        $apellido = $_POST["txtApellido"];
        $password = $_POST["txtContrasena"];

        $resultado = GuardaUsuario($usuario,$nombre,$apellido,$password);

        if ($resultado["estado"]) {
            $mensaje = "Guardado con éxito";
            require_once("includes/MensajeRedirecciona.php");
        }else
        {
            $mensajeErr = $resultado["mensaje"];
            require_once("includes/Mensaje.php");
        }
    }else{
        $mensajeErr = "Acceso Denegado";
        require_once("includes/Mensaje.php");
    }          

?>
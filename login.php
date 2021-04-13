<?php
    require_once("includes/RNFunciones.php");
    try
    {
        //Si ambos campos (usuario y constraseña estan completos)
        if (isset($_POST["txtUsuario"]) && isset($_POST["txtPass"]))  
        {

            $usuario = $_POST["txtUsuario"];
            $password = $_POST["txtPass"];

            if (($usuario != "") && ($password != ""))
            {
                //Login (devuelve array true /false y mensaje)
                $login = login($usuario, $password);
                if ($login != ""){
                    $mensajeErr = $login;      
                } 

            }else{
                $mensajeErr = "faltan completar datos";
            }

        }else{
            $mensajeErr = "faltan completar datos";
        }
        require_once("includes/Mensaje.php");

    }
    catch(Exception $e)
    {
        //echo "Se ha producido un error inesperado";
    }
?>
<?php 
header_remove('Cache-Control');
require_once("includes/chequearSesion.php");
require_once("includes/RNFunciones.php");

    
    if (isset($_POST["txtUsuario"])){ 
        $usuario = $_POST["txtUsuario"];
    }else{
        $usuario = "";
    }

    if (isset($_POST["txtNombre"])){
        $nombre = $_POST["txtNombre"];
    }else{
        $nombre = "";
    }

    if (isset($_POST["txtApellido"])){
        $apellido = $_POST["txtApellido"];
    }else{
        $apellido = "";
    }

    if (isset($_POST["txtContrasena"])){
        $password = $_POST["txtContrasena"];
    }else{
        $password = "";
    }




    if ($_SESSION["idUsuarioModificar"] != ""){
        $idUsuario = $_SESSION["idUsuarioModificar"];
    }else{
        //Tomo el id usuario
        if (isset($_POST["final"])){
            $idUsuario = $_POST["final"];
        }else{
            $idUsuario = "";
        }    
    }

    if ($idUsuario != ""){

        $_SESSION["idUsuarioModificar"] = $idUsuario;

        //Carga el usuario a modificar
        $arrUsuario = cargarUsuariosPorId($idUsuario);

        //Si es una estructura válida
        if (is_array($arrUsuario)){


            //Guarda en registros el array con los datos
            $registros = $arrUsuario["datos"];
            $mensaje = $arrUsuario["mensaje"];

            
            if (is_array($registros)){

                //Si hay usuarios
                if (count($registros) > 0){

                    $hidUsuario = $usuario; 
                    if ($usuario == ""){
                        $usuario = $registros[0]["usuario"];
                        $hidUsuario = $usuario;
                    }
                    if ($nombre == ""){
                        $nombre = $registros[0]["nombre"];  
                    }
                    if ($apellido == ""){
                        $apellido = $registros[0]["apellido"];
                    }

                    $hidUsuario = $usuario;
                    if (isset($_POST["hidUsuario"])){
                        $hidUsuario = $_POST["hidUsuario"];
                    }
                    
                    ?>
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Modificar</title>
                        <?php
                            require_once("includes/fuentes.php");
                        ?>                        
                        <link rel=StyleSheet href="includes/css/general.css" type="text/css" media=screen>
                        <link rel=StyleSheet href="includes/css/popup.css" type="text/css" media=screen>
                    </head>
                    <body>
                    <?php
                        require_once("includes/MNUbar.php");
                    ?>
                    
                    <div class="panel panel-form">
                        <form id="frmModificacion" name="frmModificacion" method="post" >
                            <div class="form-item">
                                <h2 class="titulo-color"><i class="fas fa-edit"></i>&nbsp;&nbsp;Editar Usuario</h2>
                            </div>
                        
                            <div class="form-item">
                                Usuario
                            </div>                                
                            <div>
                                <?php 
                                //No permito que se modifique "admin"
                                if ($hidUsuario == "admin"){
                                    $disabled = " disabled ";
                                    ?>
                                    <input name="txtUsuarioDis" id="txtUsuarioDis" class="input-text" <?php echo $disabled;?> value="<?php echo $usuario;?>">
                                    <input type="hidden" name="txtUsuario" id="txtUsuario" class="input-text" value="<?php echo $usuario;?>">
                                    <?php    

                                }else{
                                    ?>
                                    <input name="txtUsuario" id="txtUsuario" class="input-text" maxlength="10"  value="<?php echo $usuario;?>">
                                    <?php
                                }
                                
                                ?>
 
                                
                            </div>
                            <div class="form-item">
                                Nombre
                            </div>   
                            <div>
                                <input name="txtNombre" id="txtNombre" class="input-text" maxlength="25" value="<?php echo $nombre;?>">
                            </div>
                            <div class="form-item">
                                Apellido
                            </div> 
                            <div>
                                <input name="txtApellido" id="txtApellido" class="input-text" maxlength="25" value="<?php echo $apellido?>">                    
                            </div>
                            <div class="form-item">
                                Contraseña
                            </div> 
                            <div>
                                <input type="password" name="txtContrasena" maxlength="25" class="input-text" id="txtContrasena" value="<?php echo $password?>">                 
                            </div>   
                            <div class="form-item contienebotones">
                                <button type="button" value="Guardar" name="btnGuardarModi" id="btnGuardarModi"  class="app-button-st"><i class="fas fa-check"></i>&nbsp;&nbsp;Guardar</button>
                                &nbsp;
                                <button type="button" value="Cancelar" name="btnVolver" id="btnVolver"  class="app-button-st cancelar"><i class="fas fa-ban"></i>&nbsp;&nbsp;Cancelar</button>
                            </div>
                            <input type="hidden" name="hidUsuario" id="hidUsuario" class="input-text" value="<?php echo  $hidUsuario;?>">
                        </form>
                        </div>
                    <?php
                }else{
                    $mensajeErr = "No se encontraron registros";
                    require_once("includes/Mensaje.php");
                }   
            }else{
                $mensajeErr = "Error Inesperado";
                require_once("includes/Mensaje.php");
            }    
        }else{
            $mensajeErr = "Error Inesperado";
            require_once("includes/Mensaje.php");
        }    
    }else{
        $mensajeErr = "No se encontro el usuario";
        require_once("includes/Mensaje.php");
    }


     require_once("includes/popup.php");
    ?>

    <script src="includes/js/acciones.js"></script>
    <script src="includes/js/popup.js"></script>
    <script src="includes/js/setfocus.js"></script>
</body>
</html>
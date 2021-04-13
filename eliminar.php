<?php 
header_remove('Cache-Control');
require_once("includes/chequearSesion.php");
require_once("includes/RNFunciones.php");

    if (isset($_POST["accion"])){
        if ($_POST["accion"] == "BOR"){
            
            //Tomo el id usuario
            $idUsuario = $_POST["final"];

            $_SESSION["idUsuarioEliminar"] = $idUsuario;
                        
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
                        ?>
                        <!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>Eliminar</title>

                            <?php
                                require_once("includes/fuentes.php");
                            ?>

                            <link rel=StyleSheet href="includes/css/general.css" type="text/css" media=screen>
                        </head>
                        <body>              
                        <?php
                          require_once("includes/MNUbar.php");
                        ?>              
                        <div class="panel panel-form">
                            <h2 class="titulo-color"><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;&nbsp;Eliminar Usuario</h2>
                            <form id="frmEliminar" name="frmEliminar" method="post" >
                                <div  class="form-item">
                                    <h3 style="text-align:center">
                                        ¿Confirma eliminar el usuario <?php echo $registros[0]["usuario"]?>
                                        (<?php echo $registros[0]["nombre"]. " " . $registros[0]["apellido"]?>)?
                                    </h3>
                                </div>
                                <div  class="form-item contienebotones">
                                    <button type="button" name="btnEjecutarBorrado" id="btnEjecutarBorrado"  class="app-button-st"><i class="fas fa-times"></i>&nbsp;&nbsp;Eliminar</button>
                                    &nbsp;
                                    <button type="button" name="btnCancelar" id="btnCancelar"  class="app-button-st cancelar"><i class="fas fa-ban"></i>&nbsp;&nbsp;Cancelar</button>
                                </div>
                            </form>
                            </div>
                        <?php
                    }else{
                        $mensajeErr = "No se encontró el registro";
                        require_once("includes/Mensaje.php");
                    }   
                }
                
            }else{
                $mensajeErr = "Error Inesperado";
                require_once("includes/Mensaje.php");
            }  


        }else{
            $mensajeErr = "Acceso Denegado";
            require_once("includes/Mensaje.php");
        }
        
    }else{
        $mensajeErr = "Acceso Denegado";
        require_once("includes/Mensaje.php");
    }

    

    ?>
    <script src="includes/js/acciones.js"></script>
</body>
</html>


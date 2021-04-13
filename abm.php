<?php
    require_once("includes/chequearSesion.php");
    require_once("includes/RNFunciones.php");
    header_remove('Cache-Control');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abm Usuarios en Fidelitas</title>

    <?php
        require_once("includes/fuentes.php");
    ?>


    <link rel=StyleSheet href="includes/css/general.css" type="text/css" media=screen>
    


</head>
<body>
    <section>
<?php

    require_once("includes/MNUbar.php");

    $_SESSION["idUsuarioEliminar"] = "";
    $_SESSION["idUsuarioModificar"] = "";

    //Carga todos los usuarios
    $listadoUsuarios = cargarUsuarios("");
    if (is_array($listadoUsuarios)){

        //Guarda en registros el array con los datos
        $registros = $listadoUsuarios["datos"];
        $mensaje = $listadoUsuarios["mensaje"];

        if (is_array($registros)){

            //Si hay usuarios
            if (count($registros) > 0){
                ?>  
                <div class="panel">
                <button type="button"  id="btnNuevo" name="btnNuevo" class="app-button-st"><i class="fas fa-file"></i>&nbsp;&nbsp;Nuevo Usuario </button>
                <br><br>
                <table>
                    <thead> 
                        <tr>
                            <td class="titulocolumna">ID.</td>
                            <td class="titulocolumna">Usuario</td>
                            <td class="titulocolumna ocultarenmovil">Nombre</td>
                            <td class="titulocolumna ocultarenmovil ocultarenmovil2">Apellido</td>
                            <td colspan=2>&nbsp;</td>
                        </tr>
                    </thead>   
                    <tbody>
                    
                    <?php

                    foreach($registros as $registro)
                    {

                        $ix = $registro["id_usuario"] + 39;

                        ?>

                        <tr>        
                            <td width="5%" id="row<?php echo $ix;?>"><?php echo $registro["id_usuario"];?></td>
                            <td width="7%"><?php echo $registro["usuario"];?></td>
                            <td class="ocultarenmovil" width="25%"><?php echo $registro["nombre"];?></td>
                            <td class="ocultarenmovil ocultarenmovil2" width="25%"><?php echo $registro["apellido"];?></td>
                            <td>
                                <button type="button" id="btnMod" data-ix="op<?php echo $ix;?>" class="btnM app-button-st" name="btnMod<?php echo $ix;?>"> <i class="fas fa-edit"></i> &nbsp;Editar</button>
                            </td>    
                            <td>    
                                <button type="button" id="btnEli" data-ix="op<?php echo $ix;?>" class="btnD app-button-st" name="btnEli<?php echo $ix;?>"><i class="fas fa-times"></i> &nbsp;Borrar </button>   
                            </td>

                        </tr>    

                        <?php
                    }
                    ?>
                    </tbody>
                    </table>
                    </div>
                    <form name="frm" id="frm" method="post">
                        <input type="hidden" name="final" id="final">
                        <input type="hidden" name="accion" id="accion">
                    </form>
                    <?php   
            }else{
                echo "no hay usuarios";
            }    

        }


    }
 ?>
 </section>
<script src="includes/js/acciones.js"></script>
</body>
</html>
<?php
        require_once("BDFunciones.php");

        //Trae el usuario con filtro opcional
        function BDCargaUsuarios($usuario){

                try {

                    //Conecta a la base de datos    
                    $arrPDO = conectar();

                    //Compruebo que este conectado (true)
                    if ($arrPDO["estado"]){  

                        //Ejecuta Query
                        $sql = "select id_usuario, usuario, nombre, apellido, password from USUARIO ";

                        //Filtro
                        if ($usuario != ""){
                            $sql = $sql . " where usuario = ? ";
                            $params = array($usuario);
                        }else{
                            $params = "";
                        }

                        $pdo = $arrPDO["pdo"];
                        $datos = ejecutarQuery($sql,$pdo,$params);

                        //Arma Array de respuesta    
                        $arrDatos = array(
                            "datos" => $datos,
                            "mensaje" => ""
                        );

                    }else{

                        //No conectado
                        $mensaje = $arrPDO["mensaje"];

                        $arrDatos = array(
                            "datos" => "",
                            "mensaje" => $mensaje
                        );
                    }
    
                    return($arrDatos);
                }
                catch(Exception $e){
                    $arrDatos = array(
                        "datos" => "",
                        "mensaje" => "Se produjo un error al traer los datos"
                    );
                    return($arrDatos);

                }

        }
        //Trae el usuario con filtro opcional
        function BDCargaUsuariosPorId($idUsuario){

                try {

                    //Conecta a la base de datos    
                    $arrPDO = conectar();

                    //Compruebo que este conectado (true)
                    if ($arrPDO["estado"]){  

                        //Ejecuta Query
                        $sql = "select * from USUARIO ";

                        //Filtro
                        if ($idUsuario != ""){
                            $sql = $sql . " where id_usuario = ? ";
                            $params = array($idUsuario);
                        }else{
                            $params = "";
                        }



                        $pdo = $arrPDO["pdo"];
                        $datos = ejecutarQuery($sql,$pdo,$params);

                        //Arma Array de respuesta    
                        $arrDatos = array(
                            "datos" => $datos,
                            "mensaje" => ""
                        );

                    }else{

                        //No conectado
                        $mensaje = $arrPDO["mensaje"];

                        $arrDatos = array(
                            "datos" => "",
                            "mensaje" => $mensaje
                        );
                    }
    
                    return($arrDatos);
                }
                catch(Exception $e){
                    $arrDatos = array(
                        "datos" => "",
                        "mensaje" => "Se produjo un error al traer los datos"
                    );
                    return($arrDatos);

                }

        }
        
        //Actualiza el USUARIO
        function BDActualizaUsuario($idUsuario,$usuario,$nombre,$apellido,$password){
            try {
                
                //Conecta a la base de datos
                $arrPDO = conectar();

                if ($arrPDO["estado"]){  
                    $pdo = $arrPDO["pdo"];

                    //Si esta cargada la contraseña se actualiza, si no no
                    if ($password != ""){
                        $sql = "update USUARIO set usuario = ? , nombre = ?, apellido = ?, password = ? where id_usuario = ? " ;
                        $params = array($usuario,$nombre,$apellido,$password,$idUsuario);
                    }else{
                        $sql = "update USUARIO set usuario = ? , nombre = ?, apellido = ? where id_usuario = ? " ;
                        $params = array($usuario,$nombre,$apellido,$idUsuario);
                    }


                    $resp = ejecutarModificacion($sql,$pdo,$params);
                    
                    //Arma Array de respuesta    
                    $arrDatos = array(
                        "estado" => $resp,
                        "mensaje" => ""
                    );
                    return($arrDatos);

                }else{
                    //Arma Array de respuesta    
                    $arrDatos = array(
                        "estado" => false,
                        "mensaje" => "No se logró la conexión a la base de datos"
                    );
                    return($arrDatos);

                }


            }
            catch(Exception $e){
            
                    //Arma Array de respuesta    
                    $arrDatos = array(
                        "estado" => false,
                        "mensaje" => "No se logró actualizar el registro"
                    );   
                    return($arrDatos);
            }
        }

        function BDGuardaUsuario($usuario,$nombre,$apellido,$password){
            try {

                $arrPDO = conectar();

                if ($arrPDO["estado"]){  
                    $pdo = $arrPDO["pdo"];
                   
                    $sql = "Insert into USUARIO(usuario,nombre,apellido,password) values (?,?,?,?) ";

                    $params = array($usuario,$nombre,$apellido,$password);

                    $resp = ejecutarInsercion($sql,$pdo,$params);
                    
                    //Arma Array de respuesta    
                    $arrDatos = array(
                        "estado" => $resp,
                        "mensaje" => ""
                    );
                    return($arrDatos);


                }else{
                    //Arma Array de respuesta    
                    $arrDatos = array(
                        "estado" => false,
                        "mensaje" => "No se logró la conexión a la base de datos"
                    );
                    return($arrDatos);

                }

            }
            catch(Exception $e){
            
                    //Arma Array de respuesta    
                    $arrDatos = array(
                        "estado" => false,
                        "mensaje" => "No se logró ingresar el nuevo usuario"
                    );   
                    return($arrDatos);
            }
        }

        function BDEliminaUsuario($idUsuario){

            try {
                $arrPDO = conectar();
                if ($arrPDO["estado"]){  
 
                    $pdo = $arrPDO["pdo"];
                    $sql = "delete from USUARIO where id_usuario = ?";  
                    
                    $params = array($idUsuario);

                    $resp = ejecutarBorrado($sql,$pdo,$params);
                    
                    //Arma Array de respuesta    
                    $arrDatos = array(
                        "estado" => $resp,
                        "mensaje" => ""
                    );
                    return($arrDatos);


                }else{
                    //Arma Array de respuesta    
                    $arrDatos = array(
                        "estado" => false,
                        "mensaje" => "No se logró la conexión a la base de datos"
                    );
                    return($arrDatos);

                }

            }
            catch(Exception $e){
            
                    //Arma Array de respuesta    
                    $arrDatos = array(
                        "estado" => false,
                        "mensaje" => "No se logró eliminar el registro"
                    );   
                    return($arrDatos);
            }
        }
    ?>
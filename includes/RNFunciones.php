<?php
    require_once("BDUsuariosFunciones.php");

    function encriptaPwd($password) {
        return hash('SHA512', $password);
    }

    function verificaPwd($passUno, $passDos) {
        
        $respuesta = (encriptaPwd($passUno) == encriptaPwd($passDos));
        return($respuesta);
    }

    function validaFormularioCarga($usuario,$nombre,$apellido,$password){
        $msgError = "";
        //Valida caracteres no válidos.
        $validaUsuario = preg_match('/^[0-9a-zA-Z]+$/',$usuario); //Caracteres 0 al 9, aA a la zZ sin espacios
        $validaNombre = preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/',$nombre); //Caracteres 0 al 9, aA a la zZ con tildes
        $validaApellido = preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚ ]+$/',$apellido); //Caracteres 0 al 9, aA a la zZ con tildes
        
        if ($password != ""){
            $validaPassword = preg_match('/^[0-9a-zA-ZáéíóúÁÉÍÓÚ ]+$/',$password); //Caracteres 0 al 9, aA a la zZ con tildes
        }    

        if (!$validaUsuario){
            $msgError = $msgError . " - El campo 'Usuario' solo acepta números y letras, no acepta espacios <BR>";
        }
        if (strlen($usuario) > 10){
            $msgError = $msgError . " - El campo 'Usuario' puede tener hasta 10 caracteres <BR>";
        }

        if (!$validaNombre){
            $msgError = $msgError . " - El campo 'Nombre' solo acepta letras, tildes y espacios <BR>";
        }
        if (strlen($nombre) > 25){
            $msgError = $msgError . " - El campo 'Nombre' puede tener hasta 25 caracteres <BR>";
        }

        if (!$validaApellido){
            $msgError = $msgError . " - El campo 'Apellido' solo acepta letras, tildes y espacios <BR>";
        }

        if (strlen($apellido) > 25){
            $msgError = $msgError . " - El campo 'Apellido' puede tener hasta 25 caracteres <BR>";
        }

        if ($password != ""){
            if (!$validaPassword){
                $msgError = $msgError . " - El campo 'Contraseña' solo acepta números letras con caracteres latinos y espacios <BR>";
            }
        }
        return($msgError);
    }   

    function validaFormularioLogin($usuario,$password){
        $msgError = "";
        //Valida caracteres no válidos.
        $validaUsuario = preg_match('/^[0-9a-zA-Z]+$/',$usuario); //Caracteres 0 al 9, aA a la zZ sin espacios
        $validaPassword = preg_match('/^[0-9a-zA-ZáéíóúÁÉÍÓÚ ]+$/',$password); //Caracteres 0 al 9, aA a la zZ con tildes

        if (!$validaUsuario){
            $msgError = $msgError . " - El campo 'Usuario' solo acepta números y letras, no acepta espacios <BR>";
        }

        if (!$validaPassword){
            $msgError = $msgError . " - El campo 'Contraseña' solo acepta números letras con caracteres latinos y espacios <BR>";
        }
        return($msgError);
    }   
    function login($usuario, $password){

        //Error: validación de caraceteres invalidos ingresados
        $mensaje = validaFormularioLogin($usuario,$password);

        if ($mensaje == ""){

                //Carga el usuario
                $arrUsuario = BDCargaUsuarios($usuario);

                //Si es una estructura válida
                if (is_array($arrUsuario)) {

                    //Si no hay un mensaje de error
                    $mensaje = $arrUsuario["mensaje"];
                    $usuarios = $arrUsuario["datos"];

                    if (is_array($usuarios)){

                        //Toma el primer (y unico) usuario
                        if (count($usuarios)){

                            $usuario = $usuarios[0];
                        
                            $nick = $usuario["usuario"];
                            $nomape = $usuario["nombre"] . " " . $usuario["apellido"];
                            $passwordBD = $usuario["password"];
            
                            $password = encriptaPwd($password);
                            $checklogin = verificaPwd($passwordBD, $password);
            
                            //Si coinciden produce login    
                            if ($checklogin)
                            {
                                session_start();
                                $_SESSION["usuario"] = $nick;
                                $_SESSION["nombreyapellido"] = $nomape;
                                header("Location: abm.php");

                            }else{
                                return("Usuario o contraseña incorrectos");
                            }
                            
                        }else{
                            return("No se encontró el usuario");
                        }

                    }else{
                        return($mensaje);
                    }
                }
        }else{
            //Error: validación de caraceteres invalidos ingresados
            return($mensaje);
        }        


    }

    function cargarUsuarios($Usuario){
        $arrUsuarios = BDCargaUsuarios($Usuario);
        return($arrUsuarios);
    }

    function cargarUsuariosPorId($idUsuario){
        $arrUsuarios = BDCargaUsuariosPorId($idUsuario);
        return($arrUsuarios);
    }

    function ActualizaUsuario($idUsuario,$usuario,$nombre,$apellido,$password,$usuarioOriginal){

        $msgError = validaFormularioCarga($usuario,$nombre,$apellido,$password);

        if ($msgError != ""){
            $resultado = array(
                "estado" => false,
                "mensaje" => $msgError
            );

        }else{

            /*Si difieren el usuario original y el usuario a actualizar, se comprueba si ya existe.*/
            if ($usuario != $usuarioOriginal){
            
                //Valida que no exista el usuario
                $arrUsuario = BDCargaUsuarios($usuario);

                if (is_array($arrUsuario["datos"])){
                    $registros = $arrUsuario["datos"];
                    if (count($registros) > 0)
                    {
                        $resultado = array(
                            "estado" => false,
                            "mensaje" => "El nombre de usuario elegido ya existe, elija otro"
                        );
                    }else{
                        //Encripto la contraseña solo si hay cargada una contraseña
                        if ($password != ""){
                            $password = encriptaPwd($password);
                        }

                        $resultado = BDActualizaUsuario($idUsuario,$usuario,$nombre,$apellido,$password);
                    } 
                }

            }else{
                //Encripto la contraseña solo si hay cargada una contraseña
                if ($password != ""){
                    $password = encriptaPwd($password);
                }
                $resultado = BDActualizaUsuario($idUsuario,$usuario,$nombre,$apellido,$password);
            }
        }

        return($resultado);

    }



    function GuardaUsuario($usuario,$nombre,$apellido,$password){
        
        $msgError = validaFormularioCarga($usuario,$nombre,$apellido,$password);

        if ($msgError != ""){
            $resultado = array(
                "estado" => false,
                "mensaje" => $msgError
            );

        }else{

            //Valida que no exista el usuario
            $arrUsuario = BDCargaUsuarios($usuario);

            if (is_array($arrUsuario["datos"])){
                $registros = $arrUsuario["datos"];
                if (count($registros) > 0)
                {
                    $resultado = array(
                        "estado" => false,
                        "mensaje" => "El nombre de usuario elegido ya existe, elija otro"
                    );
                }else{
                    //Encripto la contraseña
                    $password = encriptaPwd($password);
                    $resultado = BDGuardaUsuario($usuario,$nombre,$apellido,$password);
                } 
            }

        }

        return($resultado);
    }
    function EliminarUsuario($idUsuario){

        //valida que no intente eliminar el usuario "admin"
        $arrUsuario = BDCargaUsuariosPorId($idUsuario);

        if (is_array($arrUsuario["datos"])){
            $registros = $arrUsuario["datos"];
            $registro =  $registros[0];
            $usuario = $registro["usuario"];
            
            if ($usuario == "admin"){
                $resultado = array(
                    "estado" => false,
                    "mensaje" => "No se puede eliminar el usuario 'admin'"
                );
            }
            else
            {
                $usuarioLogueado = $_SESSION["usuario"];

                if ($usuario == $usuarioLogueado){
                    $resultado = array(
                        "estado" => false,
                        "mensaje" => "No se puede eliminar el usuario logueado en el sistema"
                    );
                }else{
                    $resultado = BDEliminaUsuario($idUsuario);
                }

            } 
            return($resultado);            
        }
        
    }
?>
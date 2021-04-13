<?php 

function conectar(){

    $cadenaconexion = "mysql:host=167.250.5.39;dbname=desarrolloprueba_db";
    $usuario = 'desarrolloprueba_user';
    $password = 'ClavePrueba2021';


    try {
        $objPDO = new PDO($cadenaconexion, $usuario, $password);
        
        $arrResp["estado"] = true;
        $arrResp["pdo"] = $objPDO;
        $arrResp["mensaje"]  = "";

        return($arrResp);    

    }
    catch(PDOException $e){
        $mensaje = "Error, no pudo conectarse a la base de datos.";  
        $arrResp["estado"] = false;
        $arrResp["pdo"] = "";
        $arrResp["mensaje"]  = $mensaje;
        return($arrResp);    

    }

}

function ejecutarQuery($sql,$pdo,$params){

    $query = $pdo->prepare($sql);

    //Si hay parametros los aplica
    if (is_array($params))
    {
        $query->execute($params);
    }else{
        $query->execute();
    }
    
    $resultado = $query->fetchAll();
    $pdo = "";
    return $resultado;
}

function ejecutarModificacion($sql,$pdo,$params){
    try{
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $pdo->prepare($sql);
        $query->execute($params);
        //cierra conexion
        unset($pdo);

        return(true);
    }
    catch(PDOException $e){
        //cierra conexion
        unset($pdo);

        return(false);
    }
}

function ejecutarInsercion($sql,$pdo,$params){
    try{
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $pdo->prepare($sql);
        $query->execute($params);
        //cierra conexion
        unset($pdo);

        return(true);
    }
    catch(PDOException $e){
        //cierra conexion
        unset($pdo);

        return(false);
    }
}

function ejecutarBorrado($sql,$pdo,$params){
    try{
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $pdo->prepare($sql);
        $query->execute($params);
        //cierra conexion
        unset($pdo);

        return(true);
    }
    catch(PDOException $e){
        //cierra conexion
        unset($pdo);
        return(false);
    }
}


?>
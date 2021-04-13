        //---------------------------------------------------------------------------------------------------------
        //------------------------------------------- MODIFICAR ---------------------------------------------------
        //---------------------------------------------------------------------------------------------------------
        
        //Evento para boton Modificar
        let modButtons = document.querySelectorAll(".btnM");
        for ( let I=0;I<modButtons.length;I++){
                
                
                modButtons[I].addEventListener("click",function(){
                
                let attr = (this).getAttribute("data-ix")
                let rowid = attr.replace("op","");
                let finalobj = document.querySelector("#row" + rowid);
                let final = finalobj.innerHTML;
                
                //let final = document.querySelector("#row" + (this).getAttribute("data-ix").replace("op","")).innerHTML;
                document.querySelector("#final").value = final;
                document.querySelector("#accion").value = "MOD";
                let form = document.querySelector("#frm")
                form.action = "modificar.php";
                form.submit();
                
                
            });
        }

        
        //Click en guardar modificación
        let btnGuardarModi = document.querySelector("#btnGuardarModi");
        if (btnGuardarModi != null){
            btnGuardarModi.addEventListener("click",guardarModificacion);
        }


        function validar_pass(password)
		{
	
            let mayuscula = false;
            let minuscula = false;
            let numero = false;
            let caracter_raro = false;
            let msjFinal = "";

            for(var i = 0;i<password.length;i++)
            {
                if(password.charCodeAt(i) >= 65 && password.charCodeAt(i) <= 90)
                {
                    mayuscula = true;
                }
                else if(password.charCodeAt(i) >= 97 && password.charCodeAt(i) <= 122)
                {
                    minuscula = true;
                }
                else if(password.charCodeAt(i) >= 48 && password.charCodeAt(i) <= 57)
                {
                    numero = true;
                }
                else
                {
                    caracter_raro = true;
                }
            }
            if(password.length < 8){	
                msjFinal = msjFinal + " - La contraseña debe tener al menos 8 dígitos. <br>";
            }	
            if(!mayuscula){
                msjFinal = msjFinal + " - La contraseña debe contener letras mayúsculas. <br>";               
            }    
            if (!minuscula){
                msjFinal = msjFinal + " - La contraseña debe contener letras minúscula. <br>";               
            }
            if (!numero){
                msjFinal = msjFinal + " - La contraseña debe contener números. <br>";               
            } 

            return msjFinal;
    	}
        
        function checkform(txtUsuario,txtNombre, txtApellido, txtPassword, esModificacion){
            
            var errMsg = "";
            if (txtUsuario.value == ""){
                errMsg = errMsg + " - Debe ingresar el usuario <br>";

            }   
            if (txtNombre.value == ""){
                errMsg = errMsg + " - Debe ingresar el nombre <br>";

            }   
            if (txtApellido.value == ""){
                errMsg = errMsg + " - Debe ingresar el apellido <br>";

            }   

            if (esModificacion == 0){
                if (txtPassword.value == ""){
                    errMsg = errMsg + " - Debe ingresar la contraseña <br>";                
                }else{
                    let pass = txtPassword.value;
                    let checkpass = validar_pass(pass)
                    if (checkpass != "")
                    {
                        errMsg = errMsg + checkpass;
                    }
                }   
            }else{
                //si es modificacion y está completa
                if (txtPassword.value != ""){
                    let pass = txtPassword.value;
                    let checkpass = validar_pass(pass)
                    if (checkpass != "")
                    {
                        errMsg = errMsg + checkpass;
                    }
                }
            }

            return(errMsg);
        
        }
        
        function guardarModificacion(){
            
            let txtUsuario = document.querySelector("#txtUsuario");
            let txtNombre = document.querySelector("#txtNombre");
            let txtApellido = document.querySelector("#txtApellido");
            let txtPassword = document.querySelector("#txtContrasena");
            let errMsg = "";

            //Chequea que los campos esten completos
            errMsg = checkform(txtUsuario, txtNombre, txtApellido, txtPassword, 1);

    
            if (errMsg != ""){
                abrirPopup("Atención:",errMsg)

            }else{
                let frmModif = document.querySelector("#frmModificacion");
                frmModif.action = "guardarModificacion.php";
                frmModif.submit();
            }
            
        }

        
        //---------------------------------------------------------------------------------------------------------
        //------------------------------------------- ELIMINAR ----------------------------------------------------
        //---------------------------------------------------------------------------------------------------------


        let delButtons = document.querySelectorAll(".btnD");
        for ( let I=0;I<delButtons.length;I++){
                
            delButtons[I].addEventListener("click",function(){
                
                let attr = (this).getAttribute("data-ix")
                let rowid = attr.replace("op","");
                let finalobj = document.querySelector("#row" + rowid);
                let final = finalobj.innerHTML;
                
                //let final = document.querySelector("#row" + (this).getAttribute("data-ix").replace("op","")).innerHTML;
                document.querySelector("#final").value = final;
                document.querySelector("#accion").value = "BOR";
                let form = document.querySelector("#frm")
                form.action = "eliminar.php";
                form.submit();
                
                
            });
        }
       
        //Click en confirmar eliminación
        
        let btnEjecutarBorrado = document.querySelector("#btnEjecutarBorrado");

        if (btnEjecutarBorrado != null){
            btnEjecutarBorrado.addEventListener("click",confirmaEliminacion);
        }

        function confirmaEliminacion(){
            frmEliminar.action = "confirmaEliminacion.php";
            frmEliminar.submit();
        }

        //---------------------------------------------------------------------------------------------------------
        //------------------------------------------- CANCELAR ----------------------------------------------------
        //---------------------------------------------------------------------------------------------------------


        let btnCancelar = document.querySelector("#btnCancelar");
        if (btnCancelar != null){
            btnCancelar.addEventListener("click",function(){
                history.go(-1);
            }); 
        }

        

        let btnVolverAbm = document.querySelector("#btnVolver");
        if (btnVolverAbm != null){
            btnVolverAbm.addEventListener("click",function(){
                window.location.href = "abm.php";
            }); 
        }


        //---------------------------------------------------------------------------------------------------------
        //------------------------------------------- NUEVO ----------------------------------------------------
        //---------------------------------------------------------------------------------------------------------

        let btnNuevo = document.querySelector("#btnNuevo");
        if (btnNuevo != null){
            btnNuevo.addEventListener("click",function(){
                window.location.href = "nuevo.php";
            });
        }

        //Guardar Nuevo.
        let btnGuardarNuevo = document.querySelector("#btnGuardarNuevo");
        if (btnGuardarNuevo != null){
            btnGuardarNuevo.addEventListener("click",guardarNuevo);
        } 

        function guardarNuevo(){
            
            let txtUsuario = document.querySelector("#txtUsuario");
            let txtNombre = document.querySelector("#txtNombre");
            let txtApellido = document.querySelector("#txtApellido");
            let txtPassword = document.querySelector("#txtContrasena");
            let errMsg = "";

            //Chequea que los campos esten completos
            errMsg = checkform(txtUsuario, txtNombre, txtApellido, txtPassword, 0);

    
            if (errMsg != ""){
                abrirPopup("Atención:",errMsg)
            }else{
                let frmModif = document.querySelector("#frmNuevo");
                frmModif.action = "guardarNuevo.php";
                frmModif.submit();
            }
            
        }


        //---------------------------------------------------------------------------------------------------------
        //------------------------------------------- CERRAR SESION -----------------------------------------------
        //---------------------------------------------------------------------------------------------------------

        let btnCerrarSesion = document.querySelector("#btnCerrarSesion");
        btnCerrarSesion.addEventListener("click",function(){
            window.location.href = "cerrarsesion.php";

        });


        //---------------------------------------------------------------------------------------------------------
        //------------------------------------------- CUANDO PRESIONA ENTER ---------------------------------------
        //---------------------------------------------------------------------------------------------------------

        document.addEventListener("keydown", keyDownTextField, false);

        function keyDownTextField(e) {
            var keyCode = e.keyCode;
            if(keyCode==13) {

                let btnNuevo = document.querySelector("#btnNuevo");
                if (btnNuevo != null){
                    window.location.href = "nuevo.php";
                }

                let btnGuardarModi = document.querySelector("#btnGuardarModi");
                if (btnGuardarModi != null){
                    guardarModificacion();
                }

                let btnGuardarNuevo = document.querySelector("#btnGuardarNuevo");
                if (btnGuardarNuevo != null){
                    guardarNuevo();
                }

            } 
        }


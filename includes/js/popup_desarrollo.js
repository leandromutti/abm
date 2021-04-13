        //---------------------------------------------------------------------------------------------------------
        //-------------------------------------------  POPUP DE ERROR ----------------------------------------------
        //---------------------------------------------------------------------------------------------------------
        
        function abrirPopup(titulo,msgError){
            
            let msgHeader = document.querySelector("#msgHeader");
            msgHeader.innerHTML = titulo;

            let msgBody = document.querySelector("#msgBody");
            msgBody.innerHTML = msgError;

            let overlay = document.querySelector(".overlay");
            overlay.classList.add("active");

            let popup = document.querySelector(".popup");
            popup.classList.add("active");
            
        }
        
        let btnCerrarPopup = document.querySelector("#btnCerrarPopup"); 
        btnCerrarPopup.addEventListener("click",function(){

     

            let overlay = document.querySelector(".overlay");
            overlay.classList.remove("active");
            
            let popup = document.querySelector(".popup");
            popup.classList.remove("active");

        });
        
        let appButtonSt = document.querySelector("#btnPopupAceptar");
        appButtonSt.addEventListener("click",function(){
            let popup = document.querySelector(".popup");
            popup.classList.remove("active");

            let overlay = document.querySelector(".overlay");
            overlay.classList.remove("active");
        });
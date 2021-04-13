function hacerSubmit(){
    let msgErr = "";
    let frmLogin = "";

    let txtUsuario = document.querySelector("#txtUsuario");
    if (txtUsuario.value == ""){
        msgErr = msgErr + "- Debe ingresar el usuario. <br>";
    }
    let txtPass = document.querySelector("#txtPass");
    if (txtPass.value == ""){
        msgErr = msgErr + "- Debe ingresar la contraseña. <br>";
    }
    if (msgErr == ""){
        frmLogin = document.querySelector("#frmLogin");
        frmLogin.submit();
    }else{
        abrirPopup("Atención",msgErr)
    }

}


let  btnLogin = document.querySelector("#btnLogin");
if (btnLogin != null){
    btnLogin.addEventListener("click",function(){
        hacerSubmit();
    });
}



document.addEventListener("keydown", keyDownTextField, false);

function keyDownTextField(e) {
    var keyCode = e.keyCode;
    if(keyCode==13) {
        hacerSubmit();
    } 
}


let btnCancelar = document.querySelector("#btnCancelar");
if (btnCancelar != null){
    btnCancelar.addEventListener("click",function(){
        history.go(-1);
    }); 
}

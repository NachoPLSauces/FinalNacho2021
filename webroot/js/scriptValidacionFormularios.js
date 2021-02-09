//Función de validación de formularios
function validarRegistro(){
    var entradaOK = true;
    
    //Validar usuario
    if(!validarUsuario()){
        entradaOK = false;
    }
    //Validar contraseña
    if(!validarPassword()){
        entradaOK = false;
    }
    //Validar descripción
    if(!validarDescripcion()){
        entradaOK = false;
    }
    
    return entradaOK;
}

//Función para validar el usuario
function validarUsuario(){
    var usuario  = document.getElementById("usuario").value;
    
    if(usuario.length == 0){
        document.getElementById("errorUsuario").innerHTML = "CAMPO OBLIGATORIO";
        return false;
    }else if(usuario.length > 8){
        document.getElementById("errorUsuario").innerHTML = "Máximo 8 caracteres";
        return false;
    }else{
        document.getElementById("errorUsuario").innerHTML = "";
        return true;
    }
}
//Función para validar una contraseña
function validarPassword(){
    var password  = document.getElementById("password").value;
    
    if(password.length == 0){
        document.getElementById("errorPassword").innerHTML = "CAMPO OBLIGATORIO";
        return false;
    }else if(password.length > 8){
        document.getElementById("errorPassword").innerHTML = "Máximo 8 caracteres";
        return false;
    }else{
        document.getElementById("errorPassword").innerHTML = "";
    }
}
//Función para validar la descripción
function validarDescripcion(){
    var descripcion  = document.getElementById("descripcion").value;
    
    if(descripcion.length == 0){
        document.getElementById("errorDescripcion").innerHTML = "CAMPO OBLIGATORIO";
        return false;
    }else if(descripcion.length > 250){
        document.getElementById("errorDescripcion").innerHTML = "Máximo 250 caracteres";
        return false;
    }else{
        document.getElementById("errorDescripcion").innerHTML = "";
    }
}

//Función para validar el servicio Calculadora
function validarCalculadora(){
    var num1 = document.getElementById("num1").value;
    var num2 = document.getElementById("num2").value;
    var entradaOK = true;
    
    if(num1.length == 0){
        document.getElementById("errorNum1").innerHTML = "Campo vacío";
        entradaOK = false;
    }else if(isNaN(num1)){
        document.getElementById("errorNum1").innerHTML = "Debes introducir un número";
        entradaOK = false;
    }else{
        document.getElementById("errorNum1").innerHTML = "";
    }
    
    if(num2.length == 0){
        document.getElementById("errorNum2").innerHTML = "Campo vacío";
        entradaOK = false;
    }else if(isNaN(num2)){
        document.getElementById("errorNum2").innerHTML = "Debes introducir un número";
        entradaOK = false;
    }else{
        document.getElementById("errorNum2").innerHTML = "";
    }
    
    return entradaOK;
    
    
}







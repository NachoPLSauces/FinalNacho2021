//Función de validación de formulario de registro
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

//Función de validación de formulario para editar campos de un departamento
function validarEditarDepartamento(){
    var entradaOK = true;
    
    //Validar descripción
    if(!validarDescripcion()){
        entradaOK = false;
    }
    //Validar volumen
    if(!validarVolumenNegocio()){
        entradaOK = false;
    }
    
    return entradaOK;
}

//Función de validación de formulario para añadir un departamento
function validarAñadirDepartamento(){
    var entradaOK = true;
    
    //Validar descripción
    if(!validarCodigo()){
        entradaOK = false;
    }
    //Validar descripción
    if(!validarDescripcion()){
        entradaOK = false;
    }
    //Validar volumen
    if(!validarVolumenNegocio()){
        entradaOK = false;
    }
    
    return entradaOK;
}

//Función para validar el usuario
function validarUsuario(){
    var usuario  = document.getElementById("usuario").value;
    
    if(usuario.length === 0){
        document.getElementById("errorUsuario").innerHTML = "CAMPO OBLIGATORIO";
        document.getElementById("usuario").style.border = "1px solid red";
        return false;
    }else if(!(/[A-z]+/.test(usuario))){
        document.getElementById("errorUsuario").innerHTML = "Sólo se admiten letras";
        document.getElementById("usuario").style.border = "1px solid red";
        return false;
    }else if(usuario.length > 8){
        document.getElementById("errorUsuario").innerHTML = "Máximo 8 caracteres";
        document.getElementById("usuario").style.border = "1px solid red";
        return false;
    }else{
        document.getElementById("errorUsuario").innerHTML = "";
        document.getElementById("usuario").style.border = "1px solid green";
        return true;
    }
}
//Función para validar una contraseña
function validarPassword(){
    var password  = document.getElementById("password").value;
    
    if(password.length === 0){
        document.getElementById("errorPassword").innerHTML = "CAMPO OBLIGATORIO";
        document.getElementById("password").style.border = "1px solid red";
        return false;
    }else if(password.length > 8){
        document.getElementById("errorPassword").innerHTML = "Máximo 8 caracteres";
        document.getElementById("password").style.border = "1px solid red";
        return false;
    }else{
        document.getElementById("errorPassword").innerHTML = "";
        document.getElementById("password").style.border = "1px solid green";
        return true;
    }
}
//Función para validar la descripción
function validarDescripcion(){
    var descripcion  = document.getElementById("descripcion").value;
    
    if(descripcion.length == 0){
        document.getElementById("errorDescripcion").innerHTML = "CAMPO OBLIGATORIO";
        document.getElementById("descripcion").style.border = "1px solid red";
        return false;
    }else if(descripcion.length > 250){
        document.getElementById("errorDescripcion").innerHTML = "Máximo 250 caracteres";
        document.getElementById("descripcion").style.border = "1px solid red";
        return false;
    }else{
        document.getElementById("errorDescripcion").innerHTML = "";
        document.getElementById("descripcion").style.border = "1px solid green";
        return true;
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

//Función para validar el volumen de negocio
function validarVolumenNegocio(){
    var volumen  = document.getElementById("volumen").value;
    
    if(volumen.length == 0){
        document.getElementById("errorVolumenNegocio").innerHTML = "CAMPO OBLIGATORIO";
        document.getElementById("volumen").style.border = "1px solid red";
        return false;
    }else if(!(/^[0-9]+[\.,]?[0-9]*$/.test(volumen))){
        document.getElementById("errorVolumenNegocio").innerHTML = "Debes introducir un número";
        document.getElementById("volumen").style.border = "1px solid red";
        return false;
    }else{
        document.getElementById("errorVolumenNegocio").innerHTML = "";
        document.getElementById("volumen").style.border = "1px solid green";
        return true;
    }
}
//Función para validar el código de un departamento
function validarCodigo(){
    var codigo  = document.getElementById("codDepartamento").value;
    
    if(codigo.length == 0){
        document.getElementById("errorCodigo").innerHTML = "CAMPO OBLIGATORIO";
        document.getElementById("codDepartamento").style.border = "1px solid red";
        return false;
    }else if(!(/^[A-Z]{3,3}$/.test(codigo))){
        document.getElementById("errorCodigo").innerHTML = "Error de formato";
        document.getElementById("codDepartamento").style.border = "1px solid red";
        return false;
    }else{
        document.getElementById("errorCodigo").innerHTML = "";
        document.getElementById("codDepartamento").style.border = "1px solid green";
        return true;
    }
}




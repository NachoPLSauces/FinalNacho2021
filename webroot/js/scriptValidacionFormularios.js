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
    
    if(password.length == 0){
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
//Función para validar el campo confirmar contraseña
function validarPassword(){
    var password  = document.getElementById("confirmarPassword").value;
    
    if(password.length == 0){
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

//JQuery
$(document).ready(function(){
    //Busca departamentos cada vez que el usuario pulsa una tecla
    $("#descDepartamento").keyup(function(){
        var descDepartamento = $("#descDepartamento").val(); //Descripción introducida por el usuario
        
        $.getJSON("http://daw202.sauces.local/FinalNacho2021/api/buscarDepartamentos.php?", {descripcion: descDepartamento}, buscarDepartamentos); //Obtiene el JSON devuelto por la API
        
    });
    function buscarDepartamentos(aRespuesta){
        var aDepartamentos = aRespuesta["Departamentos"];
        var mostrar = "";
        
        if(aDepartamentos != null){
            for(var departamento = 0;departamento<aDepartamentos.length;departamento++){
                mostrar += "<div><h2>Departamento " + departamento + "</h2>";
                mostrar += "<h3>Código</h3><p>" + aDepartamentos[departamento]["codigo"] + "</p>";
                mostrar += "<h3>Descripción</h3><p>" + aDepartamentos[departamento]["descripcion"] + "</p>";
                mostrar += "<h3>Volumen</h3><p>" + aDepartamentos[departamento]["volumen"] + "</p></div>";
            }
        }else{
            mostrar = "<h3>" + aRespuesta["Error"] + "</h3>";
        }
        
        $("#apiDepartamentos").html(mostrar); //Muestra los departamentos encontrados
    }
    
    //Busca APIs públicas
    $("#apis").submit(function(){
        var titulo = $("#tituloAPI").val(); //Título introducido por el usuario
        
        $.getJSON("https://api.publicapis.org/entries?", {title: titulo}, buscarAPIsPublicas); //Obtiene el JSON devuelto por la API
        
        return false;
    });
    function buscarAPIsPublicas(aServicioPublicApis){
        var mostrar = "";
        var aAPIs = aServicioPublicApis["entries"];
        
        if(aAPIs != null){
            mostrar = "<h2>Se han encontrado " + aAPIs.length + " APIs</h2>";
            for(var api = 0;api<aAPIs.length;api++){
                mostrar += "<div><h3>Nombre</h3><p>" + aAPIs[api]["API"] + "</p>";
                mostrar += "<h3>Descripción</h3><p>" + aAPIs[api]["Description"] + "</p>";
                mostrar += "<h3>Categoría</h3><p>" + aAPIs[api]["Category"] + "</p>";
                mostrar += "<h3>Link</h3><a href='" + aAPIs[api]["Link"] + "' target='_blank'>" + aAPIs[api]["Link"] + "</a></div>";
            }
        }else{
            mostrar = "<h3>No se ha encontrado ninguna API</h3>";
        }
        
        $("#publicApi").html(mostrar); //Muestra las APIs encontradas
    }
    
    //Busca imagen de la NASA del día seleccionado
    $("#fechaAPOD").change(function(){
        var fecha = $("#fechaAPOD").val(); //Fecha introducida por el usuario
        
        $.getJSON("https://api.nasa.gov/planetary/apod?api_key=DEMO_KEY", {date: fecha}, buscarAPOD); //Obtiene el JSON devuelto por la API
    });
    function buscarAPOD(aServicioAPOD){
        var mostrar = "";
        
        if($.isArray(aServicioAPOD)){
            mostrar += "<h3>" + $aServicioAPOD['title'] + "</h3>";
            mostrar += "<img src='" + $aServicioAPOD['url'] + "'>" + $aServicioAPOD['url'];
            mostrar += "<p>" + $aServicioAPOD['explanation'] + "</p>";
        }else{
            mostrar = "<h3>API no disponible</h3>";
        }
        
        $("#APOD").html(mostrar); //Muestra la foto encontrada
    }
    
    //Obtener resultado de la calculadora
    $("#calculadora").submit(function(){
        var tipo = $("#operacion").val(); //Tipo de operación seleccionada
        var num1 = $("#num1").val(); //Primer número
        var num2 = $("#num2").val(); //Segundo número
        
        $.getJSON("http://daw203.sauces.local/AppFinalRaul2021/api/calculadora.php?", {operaciones: tipo, n1: num1, n2: num2}, calcularResultado); //Obtiene el JSON devuelto por la API
    
        return false;
    });
    function calcularResultado(resultado){
        var mostrar = "";
        
        if(resultado != null){
            mostrar += "<h3>Resultado</h3><p>" + resultado + "</p>";
        }
        
        $("#servicioCalculadora").html(mostrar); //Muestra las APIs encontradas
    }
    
    $("#enviarVideo").click(function(){
        var titulo = $("#tituloVideo").val();
        
        $.get("https://www.googleapis.com/youtube/v3/search",{
            part: 'snippet, id',
            q: titulo,
            pageToken: '',
            type: 'video',
            key: 'AIzaSyAS8oJv6GhVOguGcRlDUCmqxIPqL4uWXGI'
        }, function(data){
            console.log(data.items);
        });
        
        
        
        return false;
    });
});





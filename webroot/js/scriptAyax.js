//JQuery
$(document).ready(function(){
    //Busca departamentos cada vez que el usuario pulsa una tecla
    $("#descDepartamento").keyup(function(){
        var descDepartamento = $("#descDepartamento").val(); //Descripción introducida por el usuario
        
        $.getJSON("http://daw202.ieslossauces.es/FinalNacho2021/api/buscarDepartamentos.php?", {descripcion: descDepartamento}, buscarDepartamentos); //Obtiene el JSON devuelto por la API
        
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
        
        if(aServicioAPOD != null){
            mostrar += "<h3>" + aServicioAPOD['title'] + "</h3>";
            mostrar += "<img src='" + aServicioAPOD['url'] + "'>" + aServicioAPOD['url'];
            mostrar += "<p>" + aServicioAPOD['explanation'] + "</p>";
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
        
        $.getJSON("http://daw203.ieslossauces.es/AppFinalRaul2021/api/calculadora.php?", {operaciones: tipo, n1: num1, n2: num2}, calcularResultado); //Obtiene el JSON devuelto por la API
    
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

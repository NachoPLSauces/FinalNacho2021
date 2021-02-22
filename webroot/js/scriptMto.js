//JQuery
$(document).ready(function(){
    //Busca departamentos cada vez que el usuario pulsa una tecla
    $("#DescDepartamento").keyup(function(){
        var descDepartamento = $("#DescDepartamento").val(); //Descripción introducida por el usuario
        
        $.getJSON(("https://daw202.ieslossauces.es/FinalNacho2021/api/buscarDepartamentos.php?"), {descripcion: descDepartamento}, buscarDepartamentos); //Obtiene el JSON devuelto por la API
        
    });
    function buscarDepartamentos(aRespuesta){
        var aDepartamentos = aRespuesta["Departamentos"];
        var mostrar = "";
        
        if(aDepartamentos != null){
            for(var departamento = 0;departamento<aDepartamentos.length;departamento++){
                mostrar += "<div class='filaDep'><p "; //Código del departamento
                if(aDepartamentos[departamento]["fechaBaja"]){ mostrar += 'style="color: red !important"';}  
                mostrar += ">" + aDepartamentos[departamento]["codigo"] + "</p>";
                mostrar += "<p "; //Descripción del departamento
                if(aDepartamentos[departamento]["fechaBaja"]){ mostrar += 'style="color: red !important"';}  
                mostrar += ">" + aDepartamentos[departamento]["descripcion"] + "</p>";
                if(aDepartamentos[departamento]["fechaBaja"]){ //Fecha de baja
                    mostrar += '<p style="color: red !important">' + aDepartamentos[departamento]["fechaBaja"] + "</p>";
                } else {
                    mostrar += '<p style="color: red !important">null</p>';
                }
                mostrar += "<p "; //Volumen de negocio
                if(aDepartamentos[departamento]["fechaBaja"]){ mostrar += 'style="color: red !important"';}  
                mostrar += ">" + aDepartamentos[departamento]["volumen"] + "</p>";
                mostrar += "<p><a href='#'><img src='webroot/media/img/editar.png'></a><a href='#'><img src='webroot/media/img/mostrar.png'></a><a href='#'><img src='webroot/media/img/papelera.png'></a></p></div>";
            }
        }else{
            mostrar = "<td colspan='4' class='sinDepartamentos'>No se han encontrado departamentos</td>";
        }
        
        $("#departamentosEncontrados").html(mostrar); //Muestra los departamentos encontrados
    }
    
    
});
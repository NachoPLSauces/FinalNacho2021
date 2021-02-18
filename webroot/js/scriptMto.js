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
                mostrar += "<tr><td "; //Código del departamento
                if(aDepartamentos[departamento]["fechaBaja"]){ mostrar += 'style="color: red !important"';}  
                mostrar += ">" + aDepartamentos[departamento]["codigo"] + "</td>";
                mostrar += "<td "; //Descripción del departamento
                if(aDepartamentos[departamento]["fechaBaja"]){ mostrar += 'style="color: red !important"';}  
                mostrar += ">" + aDepartamentos[departamento]["descripcion"] + "</td>";
                if(aDepartamentos[departamento]["fechaBaja"]){ //Fecha de baja
                    mostrar += '<td style="color: red !important">' + aDepartamentos[departamento]["fechaBaja"] + "</td>";
                } else {
                    mostrar += '<td style="color: red !important">null</td>';
                }
                mostrar += "<td "; //Volumen de negocio
                if(aDepartamentos[departamento]["fechaBaja"]){ mostrar += 'style="color: red !important"';}  
                mostrar += ">" + aDepartamentos[departamento]["volumen"] + "</td>";
                mostrar += "<td><a href='#'><img src='webroot/media/img/editar.png'></a><a href='#'><img src='webroot/media/img/mostrar.png'></a><a href='#'><img src='webroot/media/img/papelera.png'></a></td></tr>";
            }
        }else{
            mostrar = "<td colspan='4' class='sinDepartamentos'>No se han encontrado departamentos</td>";
        }
        
        $("#departamentosEncontrados").html(mostrar); //Muestra los departamentos encontrados
    }
    
    
});
<?php
$aDepartamentosEncontrados = departamentoPDO::buscarDepartamentoPorDescripcion(""); //Muestra los departamentos al cargar la página
$mostrarDepartamentosEncontrados = "";

foreach ($aDepartamentosEncontrados as $key => $departamento) {
    $mostrarDepartamentosEncontrados .= "<div class='filaDep'><p "; //Código del departamento
    if($departamento["fechaBaja"]){ $mostrarDepartamentosEncontrados .= 'style="color: red !important"';}  
    $mostrarDepartamentosEncontrados .= ">".$departamento["codigo"]."</p>";
    $mostrarDepartamentosEncontrados .= "<p "; //Descripción del departamento
    if($departamento["fechaBaja"]){ $mostrarDepartamentosEncontrados .= 'style="color: red !important"';}  
    $mostrarDepartamentosEncontrados .= ">".$departamento["descripcion"]."</p>";
    if($departamento["fechaBaja"]){ //Fecha de baja
        $mostrarDepartamentosEncontrados .= '<p style="color: red !important">'.$departamento["fechaBaja"]."</p>";
    } else {
        $mostrarDepartamentosEncontrados .= '<p style="color: red !important">null</p>';
    }
    $mostrarDepartamentosEncontrados .= "<p "; //Volumen de negocio
    if($departamento["fechaBaja"]){ $mostrarDepartamentosEncontrados .= 'style="color: red !important"';}  
    $mostrarDepartamentosEncontrados .= ">".$departamento["volumen"]."</p>";
    $mostrarDepartamentosEncontrados .= "<p><a href='#'><img src='webroot/media/img/editar.png'></a><a href='#'><img src='webroot/media/img/mostrar.png'></a><a href='#'><img src='webroot/media/img/papelera.png'></a></p></div>";

}

//Incluimos la lógica de la vista
$vista = $vistas['departamentos'];
require_once $vistas['layoutMto'];
?>
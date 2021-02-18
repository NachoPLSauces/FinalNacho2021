<?php
$aDepartamentosEncontrados = departamentoPDO::buscarDepartamentoPorDescripcion(""); //Muestra los departamentos al cargar la página
$mostrarDepartamentosEncontrados = "";

foreach ($aDepartamentosEncontrados as $key => $departamento) {
    $mostrarDepartamentosEncontrados .= "<div class='filaDep'><td "; //Código del departamento
    if($departamento["fechaBaja"]){ $mostrarDepartamentosEncontrados .= 'style="color: red !important"';}  
    $mostrarDepartamentosEncontrados .= ">".$departamento["codigo"]."</td>";
    $mostrarDepartamentosEncontrados .= "<td "; //Descripción del departamento
    if($departamento["fechaBaja"]){ $mostrarDepartamentosEncontrados .= 'style="color: red !important"';}  
    $mostrarDepartamentosEncontrados .= ">".$departamento["descripcion"]."</td>";
    if($departamento["fechaBaja"]){ //Fecha de baja
        $mostrarDepartamentosEncontrados .= '<td style="color: red !important">'.$departamento["fechaBaja"]."</td>";
    } else {
        $mostrarDepartamentosEncontrados .= '<td style="color: red !important">null</td>';
    }
    $mostrarDepartamentosEncontrados .= "<td "; //Volumen de negocio
    if($departamento["fechaBaja"]){ $mostrarDepartamentosEncontrados .= 'style="color: red !important"';}  
    $mostrarDepartamentosEncontrados .= ">".$departamento["volumen"]."</td>";
    $mostrarDepartamentosEncontrados .= "<td><a href='#'><img src='webroot/media/img/editar.png'></a><a href='#'><img src='webroot/media/img/mostrar.png'></a><a href='#'><img src='webroot/media/img/papelera.png'></a></td></div>";

}

//Incluimos la lógica de la vista
$vista = $vistas['departamentos'];
require_once $vistas['layoutMto'];
?>
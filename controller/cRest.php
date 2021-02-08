<?php
/**
 * Web services
 * 
 * Muestra los web services que ofrecen otras páginas
 */
if(!isset($_SESSION["usuarioDAW202LoginLogoffMulticapa"])){
    header('Location: ./index.php'); 
    exit;
}

//Si el usuario pulsa "Volver" se le dirige al inicio
if (isset($_REQUEST['flechaVolver'])) { 
    $_SESSION['paginaEnCurso'] = $controladores['inicio'];
    header('Location: ./index.php'); 
    exit;
} 

/**
 * Mostrar APOD
 * 
 * Muestra la foto del día de la NASA
 */
if(isset($_REQUEST['enviarAPOD'])) { //si se ha enviado una fecha
    $errorAPOD = "" ; //Creamos una variable para almacenar errores
    try{
        $aServicioAPOD = wsREST::sevicioAPOD($_REQUEST['fecha']); //llamamos al servicio y le pasamos la fecha introducida por el usuario
    } catch (Exception $ex) {
        $errorAPOD = "ERROR";
    }
    
}
else {
    //llamamos al servicio y le pasamos la fecha de hoy
    $aServicioAPOD = wsREST::sevicioAPOD(date('Y-m-d'));
}
if($aServicioAPOD != null){
    $tituloEnCurso = $aServicioAPOD['title'];
    $imagenEnCurso = $aServicioAPOD['url'];
    $descripcionEnCurso = $aServicioAPOD['explanation'];
}

/**
 * Mostrar Public API
 * 
 * Muestra la primera API pública encontrada con el nombre introducido
 */
if(isset($_REQUEST['enviarPublicApis'])) { 
    $aServicioPublicApis = wsREST::servicioPublicAPIS($_REQUEST['titulo']);
}
else{
    $aServicioPublicApis = null;
}
if($aServicioPublicApis){
    $nombreApiEnCurso = $aServicioPublicApis['entries'][0]['API'];
    $descripcionApiEnCurso = $aServicioPublicApis['entries'][0]['Description'];
    $linkApiEnCurso = $aServicioPublicApis['entries'][0]['Link'];
    $categoriaApiEnCurso = $aServicioPublicApis['entries'][0]['Category'];
}

/**
 * Mostrar Calculadora
 * 
 * Muestra el resultado obtenido
 */
if(isset($_REQUEST['enviarCalculadora'])) { 
    $resultado = wsREST::servicioCalculadora($_REQUEST['operacion'], $_REQUEST['num1'], $_REQUEST['num2']);
}

if(isset($_REQUEST['enviarDescripcion'])) { 
    $aRespuesta = wsREST::servicioBuscarDepartamentosPorDescripcion($_REQUEST['descDepartamento']);
}

//Incluimos la lógica de la vista
$vista = $vistas['rest'];
require_once $vistas['layout'];
?>
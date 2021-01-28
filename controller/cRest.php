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
if (isset($_REQUEST['volver'])) { 
    $_SESSION['paginaEnCurso'] = $controladores['inicio'];
    header('Location: ./index.php'); 
    exit;
} 

if(isset($_REQUEST['enviar'])) { //si se ha enviado una fecha
    //llamamos al servicio y le pasamos la fecha introducida por el usuario
    $aServicioAPOD = wsREST::sevicioAPOD($_REQUEST['fecha']);
}
else {
    //llamamos al servicio y le pasamos la fecha de hoy
    $aServicioAPOD = wsREST::sevicioAPOD(date('Y-m-d'));
}
$tituloEnCurso = $aServicioAPOD['title'];
$imagenEnCurso = $aServicioAPOD['url'];
$descripcionEnCurso = $aServicioAPOD['explanation'];

//Incluimos la lógica de la vista
$vista = $vistas['rest'];
require_once $vistas['layout'];
?>
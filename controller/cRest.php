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

//Incluimos la lógica de la vista
$vista = $vistas['rest'];
require_once $vistas['layout'];
?>
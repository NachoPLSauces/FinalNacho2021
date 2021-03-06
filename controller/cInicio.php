<?php
/**
 * Inicio sesión
 * 
 * Permite que un usuario que a iniciado sesión navegue por la página
 * Muestra el número de conexiones realizadas y la fecha de la última conexión
 * 
 * @author Nacho del Prado Losada
 * @since 27/01/2021
 * @version 27/01/2021
 */
if(!isset($_SESSION["usuarioDAW202LoginLogoffMulticapa"])){
    header('Location: ./index.php'); 
    exit;
}


//Si el usuario pulsa "Salir" se le dirige al Login
if (isset($_REQUEST['salir'])) { 
    session_destroy();
    $_SESSION['paginaEnCurso'] = $controladores['login'];
    header('Location: ./index.php'); 
    exit;
} 

//Si el usuario pulsa "Editar cuenta" se le dirige a vMiCuenta
if (isset($_REQUEST['editar'])) { 
    $_SESSION['paginaEnCurso'] = $controladores['editar'];
    header('Location: ./index.php'); 
    exit;
}

//Si el usuario pulsa "Borrar" se le dirige a vBorrarCuenta
if (isset($_REQUEST['borrar'])) { 
    $_SESSION['paginaEnCurso'] = $controladores['borrar'];
    header('Location: ./index.php'); 
    exit;
} 

//Si el usuario pulsa "REST" se le dirige a vRest
if (isset($_REQUEST['rest'])) { 
    $_SESSION['paginaEnCurso'] = $controladores['rest'];
    header('Location: ./index.php'); 
    exit;
} 

//Si el usuario pulsa "departamentos" se le dirige a vMantenimientoDeDepartamentos
if (isset($_REQUEST['departamentos'])) { 
    $_SESSION['paginaEnCurso'] = $controladores['departamentos'];
    header('Location: ./index.php'); 
    exit;
} 

//Variables que guardan información del usuario
$descripcionUsuario = $_SESSION["usuarioDAW202LoginLogoffMulticapa"]->getDescUsuario();
$numConexiones = $_SESSION["usuarioDAW202LoginLogoffMulticapa"]->getNumConexiones();
$ultimaConexion = $_SESSION['usuarioDAW202LoginLogoffMulticapa']->getFechaHoraUltimaConexion(); 

//Incluimos la lógica de la vista
$vista = $vistas['inicio'];
require_once $vistas['layout'];
?>
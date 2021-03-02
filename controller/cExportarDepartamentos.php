<?php
/**
 * Exportar departamentos
 * 
 * Permite exportar los departamentos
 * 
 * @author Nacho del Prado Losada
 * @since 03/03/2021
 * @version 03/03/2021
 */
//Si el usuario no ha iniciado sesión se le dirije al Login
if(!isset($_SESSION["usuarioDAW202LoginLogoffMulticapa"])){
    header('Location: ./index.php'); 
    exit;
}

//Si el usuario pulsa volver le dirijo a la vista de Mantenimiento de departamentos
if(isset($_REQUEST['volver'])){
    $_SESSION['paginaEnCurso'] = $controladores['departamentos'];
    header("Location: index.php");
    exit;
}

//Si el usuario pulsa exportar se exportan los departamentos
if(isset($_REQUEST['exportar'])){
    departamentoPDO::exportarDepartamentos();
    $_SESSION['paginaEnCurso'] = $controladores['departamentos'];
    header("Location: index.php");
    exit;
}

//Incluimos la lógica de la vista
$vista = $vistas['exportar'];
require_once $vistas['layoutMto'];
?>
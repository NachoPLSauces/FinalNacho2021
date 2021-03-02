<?php
/**
 * Baja lógica departamento
 * 
 * Permite dar de baja un departamento
 * 
 * @author Nacho del Prado Losada
 * @since 02/03/2021
 * @version 02/03/2021
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

$aDepartamento = departamentoPDO::buscarDepartamentoPorCodigo($_SESSION["codDepartamento"]); //Cargar los campos del departamento seleccionado
//Almaceno el contenido de los campos en variables
$descripcion = $aDepartamento["descripcion"];
$volumenNegocio = $aDepartamento["volumen"];
    
if(isset($_REQUEST['baja'])){
    departamentoPDO::bajaDepartamento($_SESSION["codDepartamento"], $_REQUEST["fechaBaja"]); //Da de baja el departamento
    $_SESSION['paginaEnCurso'] = $controladores['departamentos'];
    header("Location: index.php");
    exit;
}

//Incluimos la lógica de la vista
$vista = $vistas['bajaLogicaDepartamento'];
require_once $vistas['layoutMto'];
?>
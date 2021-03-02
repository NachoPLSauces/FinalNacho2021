<?php
/**
 * Importar departamentos
 * 
 * Permite importar los departamentos
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

$entradaOK = true;
$errorArchivo = null;

//Si el usuario pulsa importar se comprueba la extensión del archivo
if(isset($_REQUEST['importar'])){
    if ($_FILES['archivo']['type'] != 'text/xml'){
        $errorArchivo = "El formato de archivo debe ser .xml";
    }
    
    if($errorArchivo == null){
        $entradaOK = false;
    }
}else{
    $entradaOK=false;
}

//Si el archivo es correcto se importan los departamentos
if($entradaOK){
    departamentoPDO::importarDepartamentos($_FILES['archivoImportar']['tmp_name']);
    $_SESSION['paginaEnCurso'] = $controladores['importar'];
    header("Location: index.php");
    exit;
}

//Incluimos la lógica de la vista
$vista = $vistas['importar'];
require_once $vistas['layoutMto'];
?>
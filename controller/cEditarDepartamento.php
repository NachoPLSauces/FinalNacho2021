<?php
/**
 * Editar departamento
 * 
 * Permite editar campos de un departamento
 * 
 * @author Nacho del Prado Losada
 * @since 24/02/2021
 * @version 24/02/2021
 */
//Si el usuario no ha iniciado sesión se le dirije al Login
if(!isset($_SESSION["usuarioDAW202LoginLogoffMulticapa"])){
    header('Location: ./index.php'); 
    exit;
}

//Si el usuario pulsa volver le dirijo a la vista de Mentenimiento de departamentos
if(isset($_REQUEST['volver'])){
    $_SESSION['paginaEnCurso'] = $controladores['departamentos'];
    header("Location: index.php");
    exit;
}



//Array de errores inicializado a null
$aErrores = ["descripcion" => null,
             "volumenNegocio" => null];

define("OBLIGATORIO", 1); //Variable obligatorio inicializada a 1

//Variables MAX_FLOAT y MIN_FLOAT de los números máximos y mímimos permitidos
define ('MAX_FLOAT', 3.402823466E+38);
define ('MIN_FLOAT', -3.402823466E+38);

$entradaOK = true; //Varible de entrada correcta inicializada a true 

if(isset($_REQUEST['editar'])){
    //Comprobar que el campo descripción se ha rellenado con alfanuméricos
    $aErrores["descripcion"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['descripcion'], 200, 1, OBLIGATORIO);
    //Comprobar que el campo volumenNegocio se ha rellenado con float
    $aErrores["volumenNegocio"] = validacionFormularios::comprobarFloat($_REQUEST['volumenNegocio'], MAX_FLOAT, MIN_FLOAT, OBLIGATORIO);

    //Comprobar si algún campo del array de errores ha sido rellenado
    foreach ($aErrores as $clave => $valor) {
        //Comprobar si el campo ha sido rellenado
        if($valor!=null){
            $_REQUEST[$clave] = "";
            $entradaOK = false;
        }
    }
}
else{
    $entradaOK = false;
    
    $aDepartamento = departamentoPDO::buscarDepartamentoPorCodigo($_SESSION["codDepartamento"]); //Cargar los campos del departamento seleccionado
    //Almaceno el contenido de los campos en variables
    $descripcion = $aDepartamento["descripcion"];
    $fechaBaja = $aDepartamento["fechaBaja"];
    $volumenNegocio = $aDepartamento["volumen"];
}

if($entradaOK){ //Se actualizan los campos del departamento y se dirige al usuario a la vista de Mantenimiento
    $descripcion = $_REQUEST["descripcion"];
    $volumenNegocio = $_REQUEST["volumenNegocio"];
    
    departamentoPDO::editarDepartamento($_SESSION["codDepartamento"], $descripcion, $volumenNegocio);
    $_SESSION['paginaEnCurso'] = $controladores['departamentos'];
    header("Location: index.php");
    exit;
}

//Incluimos la lógica de la vista
$vista = $vistas['editarDepartamento'];
require_once $vistas['layoutMto'];
?>
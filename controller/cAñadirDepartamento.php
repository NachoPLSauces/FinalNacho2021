<?php
/**
 * Añadir departamento
 * 
 * Permite añadir un departamento
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

//Array de errores inicializado a null
$aErrores = ["descripcion" => null,
             "volumenNegocio" => null,
             "codDepartamento" => null];

define("OBLIGATORIO", 1); //Variable obligatorio inicializada a 1

//Variables MAX_FLOAT y MIN_FLOAT de los números máximos y mímimos permitidos
define ('MAX_FLOAT', 3.402823466E+38);
define ('MIN_FLOAT', -3.402823466E+38);

$entradaOK = true; //Varible de entrada correcta inicializada a true 

if(isset($_REQUEST['añadir'])){
    $aErrores["codDepartamento"] = validacionFormularios::comprobarAlfabetico($_REQUEST['codDepartamento'], 3, 3, OBLIGATORIO); //Comprobar que el campo codDepartamento se ha rellenado con un código válido
    $aErrores["descripcion"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['descripcion'], 200, 1, OBLIGATORIO); //Comprobar que el campo descripción se ha rellenado con alfanuméricos
    $aErrores["volumenNegocio"] = validacionFormularios::comprobarFloat($_REQUEST['volumenNegocio'], MAX_FLOAT, MIN_FLOAT, OBLIGATORIO); //Comprobar que el campo volumenNegocio se ha rellenado con float

    $departamento = departamentoPDO::buscarDepartamentoPorCodigo($_REQUEST['codDepartamento']); //Se comprueba si ya hay un departamento con el código introducido
    if($departamento != null){
        $aErrores['codDepartamento'] = "El código introducido ya existe";
    }
    
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
}

if($entradaOK){ //Se crea el departamento con los datos introducidos
    departamentoPDO::añadirDepartamento($_REQUEST['codDepartamento'], $_REQUEST['descripcion'], $_REQUEST['volumenNegocio']);
    $_SESSION['paginaEnCurso'] = $controladores['departamentos'];
    header("Location: index.php");
    exit;
}

//Incluimos la lógica de la vista
$vista = $vistas['añadirDepartamento'];
require_once $vistas['layoutMto'];
?>
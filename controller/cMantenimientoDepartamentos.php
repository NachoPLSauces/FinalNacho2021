<?php
/**
 * Mantenimiento de departamentos
 * 
 * Controla la ventana de la vista de mantenimiento de departamentos
 * 
 * @author Nacho del Prado Losada
 * @since 22/02/2021
 * @version 22/02/2021
 */
//Si el usuario no ha iniciado sesión se le dirije al Login
if(!isset($_SESSION["usuarioDAW202LoginLogoffMulticapa"])){
    header('Location: ./index.php'); 
    exit;
}

//Si el usuario pulsa volver le dirijo al inicio
if(isset($_REQUEST['volver'])){
    $_SESSION['paginaEnCurso'] = $controladores['inicio'];
    header("Location: index.php");
    exit;
}

$aErrores = ["DescDepartamento" => null]; //Array de errores inicializado a null
$entradaOK = true; //Varible de entrada correcta inicializada a true          
$aRespuestas = ["DescDepartamento" => null]; //Array de respuestas inicializado a null

//Si el usuario pulsa "Buscar"
if(isset($_REQUEST['buscar'])){
    $aErrores["DescDepartamento"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['DescDepartamento'], 255, 1, 0); //Comprobar que el campo campoDescDepartamento se ha rellenado con un alfanumérico

    foreach ($aErrores as $clave => $valor) { //Comprobar si algún campo del array de errores ha sido rellenado
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

$oDepartamento = departamentoPDO::buscarDepartamentoPorDescripcion($_REQUEST['DescDepartamento']); //Se buscan departamentos por la descripción
$mostrarDepartamentosEncontrados = "";

if($oDepartamento == null){
    $mostrarDepartamentosEncontrados = '<p class="sinDepartamentos">No se han encontrado departamentos</p>';
}else{
    foreach ($oDepartamento as $key => $departamento) {
        if($departamento["fechaBaja"]){
            $mostrarDepartamentosEncontrados .= "<div class='filaDep'><p style='color: red !important'>".$departamento["codigo"]."</p>";
            $mostrarDepartamentosEncontrados .= "<p style='color: red !important'>".$departamento["descripcion"]."</p>";
            $mostrarDepartamentosEncontrados .= "<p style='color: red !important'>".$departamento["fechaBaja"]."</p>";
            $mostrarDepartamentosEncontrados .= "<p style='color: red !important'>".$departamento["volumen"]."</p>";
        }else{
            $mostrarDepartamentosEncontrados .= "<div class='filaDep'><p>".$departamento["codigo"]."</p>";
            $mostrarDepartamentosEncontrados .= "<p>".$departamento["descripcion"]."</p>";
            $mostrarDepartamentosEncontrados .= "<p>null</p>";
            $mostrarDepartamentosEncontrados .= "<p>".$departamento["volumen"]."</p>";
        }
        $mostrarDepartamentosEncontrados .= "<p><input type='image' alt='editar' src='webroot/media/img/editar.png'><input type='image' alt='mostrar' src='webroot/media/img/mostrar.png'><input type='image' alt='borrar' src='webroot/media/img/papelera.png'></p></div>";
    }
}

//Incluimos la lógica de la vista
$vista = $vistas['departamentos'];
require_once $vistas['layoutMto'];
?>
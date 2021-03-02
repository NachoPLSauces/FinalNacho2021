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

//Si el usuario pulsa editar en un departamento el dirijo a editarDepartamento
if(isset($_REQUEST['editar'])){
    $_SESSION['codDepartamento'] = $_REQUEST["editar"];
    $_SESSION['paginaEnCurso'] = $controladores['editarDepartamento'];
    header("Location: index.php");
    exit;
}

//Si el usuario pulsa añadir en un departamento le dirijo a añadirDepartamento
if(isset($_REQUEST['añadir'])){
    $_SESSION['paginaEnCurso'] = $controladores['añadirDepartamento'];
    header("Location: index.php");
    exit;
}

//Si el usuario pulsa borrar en un departamento le dirijo a borrarDepartamento
if(isset($_REQUEST['borrar'])){
    $_SESSION['codDepartamento'] = $_REQUEST["borrar"];
    $_SESSION['paginaEnCurso'] = $controladores['borrarDepartamento'];
    header("Location: index.php");
    exit;
}

//Si el usuario pulsa baja en un departamento le dirijo a bajaLogicaDepartamento
if(isset($_REQUEST['baja'])){
    $_SESSION['codDepartamento'] = $_REQUEST["baja"];
    $_SESSION['paginaEnCurso'] = $controladores['bajaLogicaDepartamento'];
    header("Location: index.php");
    exit;
}

//Si el usuario pulsa alta en un departamento le dirijo a altaDepartamento
if(isset($_REQUEST['alta'])){
    $_SESSION['codDepartamento'] = $_REQUEST["alta"];
    $_SESSION['paginaEnCurso'] = $controladores['altaDepartamento'];
    header("Location: index.php");
    exit;
}

//Si el usuario pulsa exportar se le dirige a exportarDepartamentos
if(isset($_REQUEST['exportar'])){
    $_SESSION['paginaEnCurso'] = $controladores['exportar'];
    header("Location: index.php");
    exit;
}

//Si el usuario pulsa importar se le dirige a importarDepartamentos
if(isset($_REQUEST['importar'])){
    $_SESSION['paginaEnCurso'] = $controladores['importar'];
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

if($entradaOK){
    $oDepartamento = departamentoPDO::buscarDepartamentoPorDescripcion($_REQUEST['DescDepartamento']); //Se buscan departamentos por la descripción
}else{
    $oDepartamento = departamentoPDO::buscarDepartamentoPorDescripcion(""); //Se buscan todos los departamentos
}
$mostrarDepartamentosEncontrados = "";

if($oDepartamento == null){
    $mostrarDepartamentosEncontrados = '<p class="sinDepartamentos">No se han encontrado departamentos</p>';
}else{
    foreach ($oDepartamento as $key => $departamento) {
        if($departamento["fechaBaja"]){
            $mostrarDepartamentosEncontrados .= "<div class='filaDep'><p style='color: red !important'>".$departamento["codigo"]."</p>";
            $mostrarDepartamentosEncontrados .= "<p style='color: red !important'>".$departamento["descripcion"]."</p>";
            $mostrarDepartamentosEncontrados .= "<p style='color: red !important'>".date('d/m/Y',$departamento["fechaBaja"])."</p>";
            $mostrarDepartamentosEncontrados .= "<p style='color: red !important'>".$departamento["volumen"]."</p>";
        }else{
            $mostrarDepartamentosEncontrados .= "<div class='filaDep'><p>".$departamento["codigo"]."</p>";
            $mostrarDepartamentosEncontrados .= "<p>".$departamento["descripcion"]."</p>";
            $mostrarDepartamentosEncontrados .= "<p>null</p>";
            $mostrarDepartamentosEncontrados .= "<p>".$departamento["volumen"]."</p>";
        }
        $mostrarDepartamentosEncontrados .= "<p><button type='submit' name='editar' value='".$departamento["codigo"]."'><img src='webroot/media/img/editar.png' alt='editar'></button><button type='submit' name='borrar' value='".$departamento["codigo"]."'><img src='webroot/media/img/bin.png'></button>";
        if($departamento["fechaBaja"]){
            $mostrarDepartamentosEncontrados .= "<button type='submit' name='alta' value='".$departamento["codigo"]."'><img src='webroot/media/img/flechaArriba.png'></button></p></div>";
        }else{
            $mostrarDepartamentosEncontrados .= "<button type='submit' name='baja' value='".$departamento["codigo"]."'><img src='webroot/media/img/flechaAbajo.png'></button></p></div>";
        }
    }
}

//Incluimos la lógica de la vista
$vista = $vistas['departamentos'];
require_once $vistas['layoutMto'];
?>
<?php
//daw202.sauces.local/FinalNacho2021/api/buscarDepartamentos.php?descripcion=
//Se incluyen la configuración de la base de datos y los ficheros del modelo necesarios
require_once '../config/confDB.php';
require_once '../model/iDB.php';
require_once '../model/dbPDO.php';
require_once '../model/departamentoPDO.php';

$buscarDescripcion = ""; //Cadena que buscará en las decripciones de los departamentos
//Se inicializa el array de la respuesta a null
$aRespuesta = ["Departamentos" => null,
               "Error" => null];

//Si se ha pasado una descripción como parámetro se almacena en una variable
if(isset($_GET['descripcion'])){
    $buscarDescripcion = $_GET['descripcion'];
}

//Se almacenan en un array los departamentos encontrados
$aDepartamentos = departamentoPDO::buscarDepartamentoPorDescripcion($buscarDescripcion);

if($aDepartamentos != null){
    $aRespuesta["Departamentos"] = $aDepartamentos; //Se guardan los departamentos en el array de respuesta
}
else{
    $aRespuesta["Error"] = "No se han encontrado departamentos"; //Si no hay departamentos, se guarda un error
}

header('Content-type: application/json'); //Indica que el contenido devuelto es de tipo JSON
echo json_encode($aRespuesta); //Imprime el $aRespuesta en formato JSON

?>
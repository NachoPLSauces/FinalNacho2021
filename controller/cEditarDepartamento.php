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

//Cargar los campos del departamento seleccionado
$oDepartamento = "";
    
//Almaceno el contenido de los campos en variables
$descripcion = $registro->DescDepartamento;
$fechaBaja = $registro->FechaBaja;
$volumenNegocio = $registro->VolumenNegocio;

//Array de errores inicializado a null
$aErrores = ["descripcion" => null,
             "volumenNegocio" => null];

//Variable obligatorio inicializada a 1
define("OBLIGATORIO", 1);

//Variables MAX_FLOAT y MIN_FLOAT de los números máximos y mímimos permitidos
define ('MAX_FLOAT', 3.402823466E+38);
define ('MIN_FLOAT', -3.402823466E+38);

//Varible de entrada correcta inicializada a true
$entradaOK = true;   

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
}

if($entradaOK){
    //Mostrar registros de la tabla Departamento
    try {
        //Instanciar un objeto PDO y establecer la conexión con la base de datos
        $miDB = new PDO(DSN, USER, PASSWORD);

        //Establecer PDO::ERRMODE_EXCEPTION como valor del atributo PDO::ATTR_ERRMODE
        $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //Se crea una variable que almacena una consulta sql para insertar los valores en la tabla Departamento
        $sql = "UPDATE Departamento SET DescDepartamento=:DescDepartamento, VolumenNegocio=:VolumenNegocio WHERE CodDepartamento=:CodDepartamento";

        //Preparación de la consulta
        $consulta = $miDB->prepare($sql);

        //Llamada a bindParam
        $consulta->bindParam(":CodDepartamento", $_GET['codDepartamento']);
        $consulta->bindParam(":DescDepartamento", $_REQUEST['descripcion']);
        $consulta->bindParam(":VolumenNegocio", $_REQUEST['volumenNegocio']);

        //Ejecución de la consulta
        $consulta->execute();

        header("Location: ../indexMtoDepartamentosTema4.php");
        exit;

    } catch (PDOException $pdoe) {
        //Mostrar mensaje de error
        echo "<p style='color:red'>ERROR: " . $pdoe . "</p>";
    } finally {
        //Cerrar la conexión
        unset($miDB);
    }
}
?>
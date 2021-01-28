<?php
    /**
     * Fichero de configuración
     * 
     * Carga la librería de validación, la lógica del modelo y crea arrays 
     * para almacenar la ruta de los ficheros del controlador y la vista
     */

    //Llamada a la librería de validación
    require_once 'core/libreriaValidacion.php';
    
    //Se incluye la lógica del modelo
    require_once 'model/iDB.php';
    require_once 'model/iUsuarioDB.php';
    require_once 'model/dbPDO.php';
    require_once 'model/usuario.php';
    require_once 'model/usuarioPDO.php';
    require_once 'model/wsREST.php';
    
    //Creamos un array que contiene las rutas de los archivos del controlador
    $controladores=["login" => "controller/cLogin.php",
                    "inicio" => "controller/cInicio.php",
                    "borrar" => "controller/cBorrarCuenta.php",
                    "editar" => "controller/cMiCuenta.php",
                    "rest" => "controller/cRest.php",
                    "registro" => "controller/cRegistro.php"];
    
    //Creamos un array que contiene las rutas de los archivos de la vista
    $vistas=["login" => "view/vLogin.php",
            "inicio" => "view/vInicio.php",
            "borrar" => "view/vBorrarCuenta.php",
            "editar" => "view/vMiCuenta.php",
            "rest" => "view/vRest.php",
            "registro" => "view/vRegistro.php",
            "layout" => "view/layout.php"];
?>
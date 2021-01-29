<?php
    /**
     * Index del proyecto FinaNacho2021
     * 
     * Obtiene los datos del modelo y carga el controlador necesario
     * 
     * @author Nacho del Prado Losada
     * @since 27/01/2021
     * @version 27/01/2021
     */
    
    //Llamada a los ficheros de configuración
    require_once 'config/confDB.php';
    require_once 'config/config.php';
    
    session_start(); //Se inicia o recupera la sesión

    //Se carga el controlador almacenado en la sesión o el Login si está vacía
    if(isset($_SESSION['paginaEnCurso'])){
        require_once $_SESSION['paginaEnCurso'];
    }else{
        require_once $controladores["login"];
    }
?>
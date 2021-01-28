<?php
/**
 * Login
 * 
 * Muestra al usuario la vista del Login, que le permite iniciar sesión en la aplicación
 * 
 * @author Nacho del Prado Losada
 * @since 27/01/2021
 * @version 27/01/2021
 */
//Comprobamos si el usuario ha elegido crear una cuenta
if(isset($_REQUEST['crear'])){
    $_SESSION['paginaEnCurso'] = $controladores['registro'];
    header("Location: index.php");
    exit;
}

$error = ""; //Variable para almacenar los errores

//Comprobamos si se ha enviado el formulario
if(isset($_REQUEST['enviar'])){
    if($_REQUEST['usuario'] == null || $_REQUEST['password'] == null){
        $error = "Debes introducir un usuario y una contraseña";
    }
    else{
        $oUsuario = usuarioPDO::validarUsuario($_REQUEST['usuario'], $_REQUEST['password']); //Se comprueba si existe el usuario
            
        if($oUsuario){
            //Se guarda el usuario para comprobar si el usuario ha pasado por el Login al visualizar las demás páginas 
            $_SESSION['usuarioDAW202LoginLogoffMulticapa'] = $oUsuario; 
            
            //Se guarda la última conexión
            $ultimaConexionAnterior = $_SESSION['usuarioDAW202LoginLogoffMulticapa']->getFechaHoraUltimaConexion();   

            //Si no es la primera vez que el usuario se conecta, se guarda la última conexión
            if($ultimaConexionAnterior != null){
                $_SESSION['fechaHoraUltimaConexionAnterior'] = $ultimaConexionAnterior;
            }  
            
            //Se dirige al usuario al inicio
            $_SESSION['paginaEnCurso'] = $controladores['inicio'];
            header('Location: index.php');
            exit;
        }
        else{
            $error = "Usuario o contraseña incorrectos";
        }
    }
}

//Si el usuario no existe se carga el Login
$vista = $vistas['login'];
require_once $vistas['layout'];
?>
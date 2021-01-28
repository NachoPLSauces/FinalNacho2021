<?php
    /**
     * Clase usuario
     * 
     * Clase usuario que contiene los campos del usuario y métodos para acceder a ellos
     * 
     * @since 27/01/2021
     * @version 27/01/2021
     */
    class usuario{
        private $codUsuario;
        private $password;
        private $descUsuario;
        private $numConexiones;
        private $fechaHoraUltimaConexion;
        private $perfil;
        
        /**
         * 
         * @param string $codUsuario Código del usuario
         * @param string $password Contraseña del usuario
         * @param string $descUsuario Descripción del usuario
         * @param int $numConexiones Número de conexiones realizadas
         * @param int $fechaHoraUltimaConexion Fecha de la última conexión realizada
         * @param string $perfil Tipo de perfil del usuario
         */
        function __construct($codUsuario, $password, $descUsuario, $numConexiones, $fechaHoraUltimaConexion, $perfil){
            $this->codUsuario=$codUsuario;
            $this->password=$password;
            $this->descUsuario=$descUsuario;
            $this->numConexiones=$numConexiones;
            $this->fechaHoraUltimaConexion=$fechaHoraUltimaConexion;
            $this->perfil=$perfil;
        }
        // Creamos los métodos get que devuelven el valor de cada atributo.
        function getCodUsuario(){
            return $this->codUsuario;
        }
        function getPassword(){
            return $this->password;
        }
        function getDescUsuario(){
            return $this->descUsuario;
        }
        function getNumConexiones(){
            return $this->numConexiones;
        }
        function getFechaHoraUltimaConexion(){
            return $this->fechaHoraUltimaConexion;
        }
        function getPerfil(){
            return $this->perfil;
        }
        // Creamos los métodos set que permiten modificar el valor de un atributo.
        function setCodUsuario($codUsuario){
           $this->codUsuario=$codUsuario; 
        }
        function setPassword($password){
            $this->password=$password;
        }
        function setDescUsuario($descUsuario){
            $this->descUsuario=$descUsuario;
        }
        function setNumConexiones($numConexiones){
            $this->numConexiones=$numConexiones;
        }
        function setFechaHoraUltimaConexion($fechaHoraUltimaConexion){
            $this->fechaHoraUltimaConexion=$fechaHoraUltimaConexion;
        }
        function setPerfil($perfil){
            $this->perfil=$perfil;
        }
    }
?>
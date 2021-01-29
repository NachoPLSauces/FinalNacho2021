<?php
    /**
     * Interfaz UsuarioDB
     * 
     * @author Nacho del Prado Losada
     * @since 27/01/2021
     * @version 27/01/2021
     */
    interface UsuarioDB{
        /**
         * 
         * @param string $codUsuario Código del usuario
         * @param string $password Contraseña del usuario
         */
        public static function validarUsuario($codUsuario, $password);

    }
?>
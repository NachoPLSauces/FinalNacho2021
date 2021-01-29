<?php
    /**
     * Interfaz DB
     * 
     */
    interface DB{
        /**
         * 
         * @param string $sql Consulta sql
         * @param array $parametros Parámetros necesarios para realizar la consulta
         */
        public static function consultaSQL($sql, $parametros);

    }
?>
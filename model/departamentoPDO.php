<?php
    /**
     * Clase departamentoPDO
     * 
     * Contiene métodos que permiten realizar diferentes consultas a la tabla Departamentoç
     * 
     * @author Nacho del Prado Losada
     * @since 02/02/2021
     * @version 01/03/2021
     */
    class departamentoPDO{
        
        /**
         * Función buscarDepartamentoPorDescripcion
         * 
         * Busca departamento que contengan la cadena pasada como parámetro en su descripción
         * 
         * @param string $descripcion Cadena para buscar departamentos
         * @return array Devuelve un array con lo departamentos encontrados
         */
        public static function buscarDepartamentoPorDescripcion($descripcion) {
            $aDepartamento = null;
            
            $sql="SELECT * FROM Departamento WHERE DescDepartamento LIKE '%$descripcion%'"; 
            $resultado = DBPDO::consultaSQL($sql, []); //Se almacena el resultado de la consulta
            
            $departamento = $resultado->fetchObject();
                
            //Se almacenan los departamentos encontrados en una array
            while ($departamento != null){
                $aDepartamento[] = ["codigo" => $departamento->CodDepartamento,
                                    "descripcion" => $departamento->DescDepartamento,
                                    "fechaBaja" => $departamento->FechaBajaDepartamento,
                                    "volumen" => $departamento->VolumenNegocio];
                $departamento = $resultado->fetchObject();
            }
            
            return $aDepartamento;
        }
        
        /**
         * Función buscarDepartamentoPorCodigo
         * 
         * Busca un departamenro por el código
         * 
         * @param string $descripcion Cadena para buscar departamentos
         * @return array Devuelve un array con lo departamentos encontrados
         */
        public static function buscarDepartamentoPorCodigo($codigo) {
            $aDepartamento = null;
            
            $sql="SELECT * FROM Departamento WHERE CodDepartamento=?"; 
            $resultado = DBPDO::consultaSQL($sql, [$codigo]); //Se almacena el resultado de la consulta
            
            $departamento = $resultado->fetchObject();
                
            //Se almacenan los departamentos encontrados en una array
            if($departamento != null){
                $aDepartamento = ["codigo" => $departamento->CodDepartamento,
                                    "descripcion" => $departamento->DescDepartamento,
                                    "fechaBaja" => $departamento->FechaBajaDepartamento,
                                    "volumen" => $departamento->VolumenNegocio];
            }
            
            return $aDepartamento;
        }
        
        /**
         * Función editarDepartamento
         * 
         * Permite editar los campos de un departamento
         * 
         * @param string $codigo Codigo del departamento
         * @param string $descripcion Descripción del departamento
         * @param foat $volumen Volumen de negocio
         */
        public static function editarDepartamento($codigo, $descripcion, $volumen) {
            $sql = "UPDATE Departamento SET DescDepartamento=?, VolumenNegocio=? WHERE CodDepartamento=?";
            DBPDO::consultaSQL($sql, [$descripcion, $volumen, $codigo]);
        }
        
        /**
         * Función añadirDepartamento
         * 
         * Permite crear un departamento
         * 
         * @param string $codigo Codigo del departamento
         * @param string $descripcion Descripción del departamento
         * @param float $volumen Volumen de negocio
         */
        public static function añadirDepartamento($codigo, $descripcion, $volumen) {
            $sql = "INSERT INTO Departamento (CodDepartamento, DescDepartamento, VolumenNegocio, FechaCreacionDepartamento) VALUES (?, ?, ?, ?)";
            DBPDO::consultaSQL($sql, [$codigo, $descripcion, $volumen, time()]);
        }
        
        /**
         * Función borrarDepartamento
         * 
         * Permite borrar un departamento
         * 
         * @param string $codigo Codigo del departamento
         */
        public static function borrarDepartamento($codigo) {
            $sql = "DELETE FROM Departamento WHERE CodDepartamento=?";
            DBPDO::consultaSQL($sql, [$codigo]);
        }
        
        /**
         * Función bajaDepartamento
         * 
         * Permite dar de baja un departamento
         * 
         * @param string $codigo Codigo del departamento
         * @param date $fechaBaja Fecha de baja del departamento
         */
        public static function bajaDepartamento($codigo, $fechaBaja) {
            $fechaBajaDepartamento = new DateTime($fechaBaja);
            
            $sql = "UPDATE Departamento SET FechaBajaDepartamento=? WHERE CodDepartamento=?";
            DBPDO::consultaSQL($sql, [$fechaBajaDepartamento->getTimestamp(), $codigo]);
        }
        
        /**
         * Función altaDepartamento
         * 
         * Permite dar de alta un departamento
         * 
         * @param string $codigo Codigo del departamento
         */
        public static function altaDepartamento($codigo) {
            $fechaBajaDepartamento = new DateTime($fechaBaja);
            
            $sql = "UPDATE Departamento SET FechaBajaDepartamento=? WHERE CodDepartamento=?";
            DBPDO::consultaSQL($sql, [null, $codigo]);
        }
    }

?>
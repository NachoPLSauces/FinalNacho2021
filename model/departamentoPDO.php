<?php
    /**
     * Clase departamentoPDO
     * 
     * Contiene métodos que permiten realizar diferentes consultas a la tabla Departamentoç
     * 
     * @author Nacho del Prado Losada
     * @since 02/02/2021
     * @version 02/02/2021
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
                                    "fechaBaja" => $departamento->FechaBaja,
                                    "volumen" => $departamento->VolumenNegocio];

                $departamento = $resultado->fetchObject();
            }
            
            return $aDepartamento;
        }
        
        
    }

?>
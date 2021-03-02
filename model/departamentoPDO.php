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
        
        /**
         * Función exportarDepartamentos
         * 
         * Permite exportar los departamentos
         * 
         */
        public static function exportarDepartamentos() {
            $sql = "SELECT * from Departamento";
            $aDepartamentos = DBPDO::consultaSQL($sql, []);

            $dom = new DOMDocument("1.0", "utf-8"); //Creación variable tipo DOMDocument
            $dom->formatOutput = true; //Se establece la salida formateada

            $xmlTablaDepartamentos = $dom->appendChild($dom->createElement("TablaDepartamentos")); //Creo la raíz del documento xml

            //Recorro las filas de la consulta sql
            $departamento = $aDepartamentos->fetchObject();
            while($departamento){
                //Creo un elemento hijo de TablaDepartamentos
                $xmlDepartamento = $xmlTablaDepartamentos->appendChild($dom->createElement("Departamento"));

                //Creo los hijos de Departamento, que serán CodDepartamento, DescDepartamento, FechaBaja y VolumenNegocio
                $xmlDepartamento->appendChild($dom->createElement("CodDepartamento", $departamento->CodDepartamento));
                $xmlDepartamento->appendChild($dom->createElement("DescDepartamento", $departamento->DescDepartamento));
                $xmlDepartamento->appendChild($dom->createElement("FechaBaja", $departamento->FechaBaja));
                $xmlDepartamento->appendChild($dom->createElement("VolumenNegocio", $departamento->VolumenNegocio));

                $departamento = $aDepartamentos->fetchObject();
            }

            $fechaActual = date("Ymd");
            //Guardar el archivo xml
            $dom->save("./tmp/".$fechaActual."TablaDepartamentos.xml");                

            header('Content-Type: text/xml'); //Establecer el tipo de documento
            header('Content-Disposition: attachment; filename='.$fechaActual.'TablaDepartamentos.xml');
            readfile("./tmp/".$fechaActual."TablaDepartamentos.xml");
            exit;
        }
        
        /**
         * Función importarDepartamentos
         * 
         * Permite importar los departamentos
         * 
         */
        public static function importarDepartamentos($archivo) {
            $importar = true;
            $sql = "INSERT INTO Departamento (CodDepartamento, DescDepartamento, VolumenNegocio, FechaCreacionDepartamento, FechaBajaDepartamento) VALUES (?, ?, ?, ?, ?)";
            move_uploaded_file($archivo, "tmp/copiaSeguridadDepartamentos.xml");
            $dom = new DOMDocument("1.0", "utf-8"); //Creación variable tipo DOMDocument
            $dom->load('tmp/copiaSeguridadDepartamentos.xml'); //Se establece la salida formateada

            $numeroDepartamentos = $dom->getElementsByTagName("Departamento")->count();
            for($numDepartamento = 0; $numDepartamento<$numeroDepartamentos; $numDepartamento++){
                $codDepartamento = $dom->getElementsByTagName("CodDepartamento")->item($numDepartamento)->nodeValue;
                $descDepartamento = $dom->getElementsByTagName("DescDepartamento")->item($numDepartamento)->nodeValue;
                $volumenNegocio = $dom->getElementsByTagName("VolumenNegocio")->item($numDepartamento)->nodeValue;
                $FechaBaja = $dom->getElementsByTagName("FechaBaja")->item($numeroDepartamento)->nodeValue;
                if(empty($FechaBaja)){
                    $FechaBaja = null;
                }
                
                $resultado = departamentoPDO::buscarDepartamentoPorCodigo($codDepartamento);
            
                if($resultado == null){
                    DBPDO::consultaSQL($sql, [$codDepartamento, $descDepartamento, $volumenNegocio, time(), $FechaBaja]);
                }
            }
            
            return $importar;
        }
    }

?>
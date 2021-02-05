<?php
    /**
     * Clase usuarioPDO
     * 
     * Contiene métodos que permiten realizar distintas consultas sql
     * 
     * @author Nacho del Prado Losada
     * @since 27/01/2021
     * @version 27/01/2021
     */
    class usuarioPDO implements UsuarioDB{
        
        /**
         * Función validarUsuario
         * 
         * Permite validar el Login de un usuario
         * 
         * @param string $codUsuario Código del usuario
         * @param string $password Contraseña del usuario
         * @return \usuario
         */
        public static function validarUsuario($codUsuario, $password){
            $oUsuario=null;
            $fechaHoraUltimaConexion = null;
            
            $sql="SELECT * FROM Usuario where CodUsuario=? and Password=?"; 
            $encriptarPassword=hash("sha256", ($codUsuario.$password)); //Se encripta el password
            $resultado= DBPDO::consultaSQL($sql, [$codUsuario, $encriptarPassword]); //Se almacena el resultado de la consulta
            
            if($resultado->rowCount()>0){
                $usuarioConsulta = $resultado->fetchObject();
                $fechaHoraUltimaConexion = $usuarioConsulta->FechaHoraUltimaConexion; //Se almacena la fecha de la conexión anterior
                
                //Se actualiza la última conexión registrada en la base de datos
                $sql = "UPDATE Usuario SET NumConexiones=NumConexiones+1, FechaHoraUltimaConexion=? WHERE CodUsuario=?";
                DBPDO::consultaSQL($sql, [time(), $codUsuario]);
                
                $sql="SELECT * FROM Usuario where CodUsuario=?";
                $resultado= DBPDO::consultaSQL($sql, [$codUsuario]);
                $usuarioConsulta = $resultado->fetchObject();
                
                //Se instancia un objeto usuario
                $oUsuario = new usuario($usuarioConsulta->CodUsuario, 
                                        $usuarioConsulta->Password, 
                                        $usuarioConsulta->DescUsuario, 
                                        $usuarioConsulta->NumConexiones, 
                                        $usuarioConsulta->FechaHoraUltimaConexion, 
                                        $usuarioConsulta->Perfil);
                
                date_default_timezone_set('Europe/Madrid');                 
                
            }
            
            return [$oUsuario, $fechaHoraUltimaConexion];
        }
        
        /**
         * Función altaUsuario
         * 
         * Permite dar de alta a un usuario
         * 
         * @param string $codUsuario Código del usuario
         * @param string $password Contraseña del usuario
         * @param string $descUsuario Descripción del usuario
         * @return \usuario
         */
        public static function altaUsuario($codUsuario, $password, $descUsuario){
            $oUsuario=null;
            
            $sql="INSERT INTO Usuario (CodUsuario, Password, DescUsuario, NumConexiones, FechaHoraUltimaConexion) values (?,?,?,1,?)";
            $resultado=DBPDO::consultaSQL($sql, [$codUsuario, $password, $descUsuario, time()]);
            
            $sql = "SELECT * FROM Usuario WHERE CodUsuario=?";
            $consulta = DBPDO::consultaSQL($sql, [$codUsuario]);
            
            if($consulta->rowCount()>0){
                $usuarioConsulta = $consulta->fetchObject();
                $oUsuario = new usuario($usuarioConsulta->CodUsuario, 
                                        $usuarioConsulta->Password, 
                                        $usuarioConsulta->DescUsuario, 
                                        $usuarioConsulta->NumConexiones, 
                                        $usuarioConsulta->FechaHoraUltimaConexion, 
                                        $usuarioConsulta->Perfil);
            }
            return $oUsuario;
        }
        
        /**
         * Función validarCodNoExiste
         * 
         * Comprueba si el código introducido ya existe
         * 
         * @param string $codUsuario Código del usuario que se va a comprobar
         * @return string Devuelve un error si el código ya existe, null si está disponible
         */
        public static function validarCodNoExiste($codUsuario){
            $error = "";
            $sql = "SELECT CodUsuario FROM Usuario WHERE CodUsuario=?";
            $consulta = DBPDO::consultaSQL($sql, [$codUsuario]);

            $registro = $consulta->fetchObject();
            if($registro != null){
                $error = "El código introducido no está disponible";
            }
            
            return $error;
        }
        
        /**
         * Función borrarUsuario
         * 
         * Permite borrar un usuario
         * @param string $codUsuario Código del usuario
         */
        public static function borrarUsuario($codUsuario){
            //Almaceno la consulta a sql en una variable
            $sql = "DELETE FROM Usuario WHERE CodUsuario=?";
            
            DBPDO::consultaSQL($sql, [$codUsuario]);
        }
        
        /**
         * Función modificar usuario
         * 
         * Permite modificar los campos de un usuario
         * 
         * @param string $descUsuario Descripción del usuario
         * @param string $codUsuario Código del usuario
         * @return \usuario Devuelve un objeto usuario
         */
        public static function modificarUsuario($descUsuario, $codUsuario){
            $oUsuario = null;
            //Almaceno la consulta a sql en una variable
            $sql = "UPDATE Usuario SET DescUsuario=? WHERE CodUsuario=?";
            
            DBPDO::consultaSQL($sql, [$descUsuario, $codUsuario]);
            
            $sql = "SELECT * FROM Usuario WHERE CodUsuario=?";
            $consulta = DBPDO::consultaSQL($sql, [$codUsuario]);
            
            if($consulta->rowCount()>0){
                $usuarioConsulta = $consulta->fetchObject();
                $oUsuario = new usuario($usuarioConsulta->CodUsuario, 
                                        $usuarioConsulta->Password, 
                                        $usuarioConsulta->DescUsuario, 
                                        $usuarioConsulta->NumConexiones, 
                                        $usuarioConsulta->FechaHoraUltimaConexion, 
                                        $usuarioConsulta->Perfil);
            }
            return $oUsuario;
        }
    }
?>
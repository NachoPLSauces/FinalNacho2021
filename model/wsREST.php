<?php
/**
 * Clase wsREST
 * 
 * Clase con funciones para llamar a web services
 * 
 * @author Nacho del Prado Losada
 * @since 27/01/2021
 * @version 27/01/2021
 */
class wsREST{
    /**
     * Función servicioAPOD
     * 
     * Llama al servicio API REST APOD(Astronomy Picture of the Day), que nos devuelve la imagen atronómica del
     * día e información relativa a esta.
     * 
     * @param type $fecha la fecha que le vamos a pasar al servicio para que busque una imagen.
     * @return type array que contiene información sobre la imagen astronómica del día. 
     * @author Susana Fabián Antón
     * @since 26/01/2021
     * @version 26/01/2021
     */
    public static function sevicioAPOD($fecha) {
        //llamamos al servicio, pasándole la fecha al campo date, y decodificamos el json que nos devuelve
        return json_decode(file_get_contents("https://api.nasa.gov/planetary/apod?api_key=DEMO_KEY&date=$fecha"), true);        
    }
    
    public static function servicioPublicAPIS($titulo) {
        return json_decode(file_get_contents("https://api.publicapis.org/entries?title=$titulo"), true);
    }
}

?>
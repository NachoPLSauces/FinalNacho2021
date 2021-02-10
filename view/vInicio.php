<script type="text/javascript" src="./webroot/js/scriptValidacionFormularios.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<main>
    <div class="content">
        <div class="navegacion">
           <figure class="contenedorNav">
                <div class="imagenesNav">
                    <a href="./doc/CatalogoDeRequisitos.pdf" target="_blank" class="fotoNav"><img src="./webroot/media/img/requisitos.JPG"><p>CATÁLOGO DE REQUISITOS</p></a>
                    <a href="./doc/DiagramaDeCasosDeUso.pdf" target="_blank" class="fotoNav"><img src="./webroot/media/img/casosUso.JPG"><p>DIAGRAMA DE CASOS DE USO</p></a>
                    <a href="./doc/DiagramaDeClases.pdf" target="_blank" class="fotoNav"><img src="./webroot/media/img/diagramaClases.JPG"><p>DIAGRAMA DE CLASES</p></a>
                    <a href="./doc/ArbolDeNavegación.pdf" target="_blank" class="fotoNav"><img src="./webroot/media/img/arbolNavegacion.JPG"><p>ÁRBOL DE NAVEGACIÓN</p></a>
                    <a href="./doc/RelacionDeFicheros.pdf" target="_blank" class="fotoNav"><img src="./webroot/media/img/mapaWeb.JPG"><p>MAPA WEB</p></a>
                    <a href="./doc/EstructuraDeAlmacenamiento.JPG" target="_blank" class="fotoNav"><img src="./webroot/media/img/EstructuraDeAlmacenamiento.JPG"><p>ESTRUCTURA DE ALMACENAMIENTO</p></a>
                    <a href="./doc/ModeloFisicoDeDatos20-21.pdf" target="_blank" class="fotoNav"><img src="./webroot/media/img/modeloFisico.JPG"><p>MODELO FÍSICO DE DATOS</p></a>
                    
                    <a class="prev" onclick="moverSlide(-1)">&#10094;</a>
                    <a class="next" onclick="moverSlide(1)">&#10095;</a>
                </div>
               
                <div class="puntos">
                    <span class="punto" onclick="cambiarImagen(0)"></span>
                    <span class="punto" onclick="cambiarImagen(1)"></span>
                    <span class="punto" onclick="cambiarImagen(2)"></span>
                    <span class="punto" onclick="cambiarImagen(3)"></span>
                    <span class="punto" onclick="cambiarImagen(4)"></span>
                    <span class="punto" onclick="cambiarImagen(5)"></span>
                    <span class="punto" onclick="cambiarImagen(6)"></span>
                </div>
            </figure> 
        </div>
        
        <div class="barraVertical"></div>
        
        <form name="inicio" action="<?php $_SERVER['PHP_SELF']?>" method="post">
            <fieldset>
                <div>
                    <h2>Bienvenido <?php echo $descripcionUsuario; ?>
                    </h2>
                </div>

                <div>
                    <p>
                        <?php if($numConexiones == 1){
                            echo 'Es tu primera conexión';
                        } 
                        else{ 
                            echo "Esta es la conexión número ".$numConexiones;
                        } ?>
                    </p>
                    <?php if(!empty($_SESSION['fechaHoraUltimaConexionAnterior'])){?>
                        <p>Última conexión: <?php echo date("d-m-Y H:i:s", $_SESSION['fechaHoraUltimaConexionAnterior']); ?></p>
                    <?php } ?>
                </div>

                <div>
                    <input class="enviar" type="submit" name="editar" value="Editar cuenta"/>
                    <input class="enviar" type="submit" name="borrar" value="Borrar cuenta"/>
                    <input class="enviar" type="submit" name="salir" value="Salir"/>
                </div>
            </fieldset>

            <div class="crearCuenta">
                <p></p>
                <input class="enviar" type='submit' name='rest' value='REST' />
            </div>
        </form>
    </div>
</main>
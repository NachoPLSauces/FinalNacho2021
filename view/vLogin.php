<script src="./webroot/media/js/scriptPaginacion.js"></script>
<main>
    <div class="title">
        <div class="logo">
            <img src="./webroot/media/img/logo.png" alt="logo">
        </div>

        <div>
            <h2><a href="../proyectoDWES/indexProyectoDWES.php">Proyecto DWES</a></h2>
        </div>				
    </div>

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
        
        <form name="login" action="<?php $_SERVER['PHP_SELF']?>" method="post">
            <fieldset>
                <div>
                    <h2>Iniciar sesión</h2>
                </div>

                <div>
                    <label for='usuario'>Usuario </label>
                    <input type='text' id='usuario' name='usuario'/>

                    <label for='password' >Contraseña </label>
                    <input type='password' id="password" name='password'/>

                    <span><?php echo $error; ?></span>

                    <input class="enviar" type='submit' name='enviar' value='Iniciar sesión' />
                </div>
            </fieldset>

            <div class="crearCuenta">
                <p>¿Eres nuevo?</p>
                <input class="enviar" type='submit' name='crear' value='Crea tu cuenta' />
            </div>
        </form>
    </div>
</main>
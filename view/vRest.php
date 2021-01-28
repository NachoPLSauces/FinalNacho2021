<main>
    <div class="container">
        <header>
            <h2>Uso de web services REST</h2>
        </header>
        
        <div class="webService">
            <div class="apiRequest">
                <form>
                    <fieldset>
                        <div>
                            <h2>APOD Nasa</h2>
                        </div>

                        <div>
                            <input type="date" name="fecha" value="<?php echo date('Y-m-d') ?>">

                            <input class="enviar" type="submit" name="enviarAPOD" value="Enviar">
                            <input class="enviar" type="submit" name="volver" value="volver">
                        </div>
                    </fieldset>
                </form>
            </div>

            <div class="servicio-rest APOD">
                <?php if($aServicioAPOD){ ?>
                    <p><?php echo $tituloEnCurso?></p>
                    <img src="<?php echo $imagenEnCurso?>">
                    <p><?php echo $descripcionEnCurso?></p>
                <?php } ?>
            </div>
        </div>
        
        <div class="webService">
            <div class="apiRequest">
                <form>
                    <fieldset>
                        <div>
                            <h2>Public APIs</h2>
                        </div>

                        <div>
                            <label for="titulo">Título de la API</label>
                            <input type="text" id="titulo" name="titulo" value="<?php 
                                if(isset($_REQUEST["titulo"])){
                                    echo $_REQUEST["titulo"];
                                }else{
                                    echo "cats";
                                }
                            ?>">

                            <input class="enviar" type="submit" name="enviarPublicApis" value="Enviar">
                            <input class="enviar" type="submit" name="volver" value="volver">
                        </div>
                    </fieldset>
                </form>
            </div>

            <div class="servicio-rest publicApi">
                <?php if($aServicioPublicApis){ ?>
                    <h3>Nombre</h3>
                    <p><?php echo $nombreApiEnCurso?></p>
                    <h3>Descripción</h3>
                    <p><?php echo $descripcionApiEnCurso?></p>
                    <h3>Categoría</h3>
                    <p><?php echo $categoriaApiEnCurso?></p>
                    <h3>Link</h3>
                    <a href="<?php echo $linkApiEnCurso?>" target="_blank"><?php echo $linkApiEnCurso?></a>
                <?php } ?>
            </div>
        </div>
    </div>
    
    
</main>
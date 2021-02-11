<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="./webroot/js/scriptValidacionFormularios.js"></script>
<main>
    <div class="container">
        <header>
            <h2>Uso de web services REST</h2>
        </header>
        
        <form class="flecha">
            <button type="submit" name="flechaVolver"><img src="./webroot/media/img/flecha.png" height="30px"></button>
        </form>
        
        <div class="webService">
            <div class="apiRequest">
                <form name="apod" action="<?php $_SERVER['PHP_SELF']?>" method="post">
                    <fieldset>
                        <div>
                            <h2>APOD Nasa</h2>
                        </div>

                        <div>
                            <input type="date" name="fechaAPOD" id="fechaAPOD" max="<?php echo date('Y-m-d') ?>" value="<?php if(isset($_REQUEST['fechaAPOD'])){
                                echo $_REQUEST['fechaAPOD'];
                            }else{
                                echo date('Y-m-d');
                            } ?>">

                            <input class="enviar" type="submit" name="enviarAPOD" value="Enviar">
                        </div>
                    </fieldset>
                    
                    <div class="apiInfo">
                        <h4>Información de la api: </h4>
                        <a href="https://apod.nasa.gov/apod/astropix.html" target="_blank"> APOD Nasa</a>
                    </div>
                </form>
            </div>

            <div class="servicio-rest APOD">
                <?php if($aServicioAPOD){ ?>
                    <p><?php echo $tituloEnCurso?></p>
                    <img src="<?php echo $imagenEnCurso?>">
                    <p><?php echo $descripcionEnCurso?></p>
                <?php }else{?>
                    <p><?php echo "ERROR: API no disponible" ?></p>
                <?php } ?>
            </div>
        </div>
        
        <div class="webService">
            <div class="apiRequest">
                <form name="apis" action="<?php $_SERVER['PHP_SELF']?>" method="post">
                    <fieldset>
                        <div>
                            <h2>Public APIs</h2>
                        </div>

                        <div>
                            <label for="tituloAPI">Título de la API</label>
                            <input type="text" id="tituloAPI" name="tituloAPI" value="<?php 
                                if(isset($_REQUEST["tituloAPI"])){
                                    echo $_REQUEST["tituloAPI"];
                                }
                            ?>">

                            <input class="enviar" type="submit" name="enviarPublicApis" value="Enviar">
                        </div>
                    </fieldset>
                    
                    <div class="apiInfo">
                        <h4>Información de la api: </h4>
                        <a href="https://api.publicapis.org/" target="_blank"> Public apis</a>
                    </div>
                </form>
            </div>

            <div class="servicio-rest publicApi">
                <?php if(isset($_REQUEST["tituloAPI"])){
                    if($aServicioPublicApis['entries'] != null){ ?>
                        <h3>Nombre</h3>
                        <p><?php echo $nombreApiEnCurso?></p>
                        <h3>Descripción</h3>
                        <p><?php echo $descripcionApiEnCurso?></p>
                        <h3>Categoría</h3>
                        <p><?php echo $categoriaApiEnCurso?></p>
                        <h3>Link</h3>
                        <a href="<?php echo $linkApiEnCurso?>" target="_blank"><?php echo $linkApiEnCurso?></a>
                    <?php }else{ ?>
                        <h3>No se ha encontrado ninguna API</h3>
                    <?php }
                }?>
            </div>
        </div>
        
        <div class="webService">
            <div class="apiRequest">
                <form name="buscarDepartamento" id="buscarDepartamento" action="<?php $_SERVER['PHP_SELF']?>" method="post">
                    <fieldset>
                        <div>
                            <h2>Buscar departamentos por descripción</h2>
                        </div>

                        <div>
                            <label for="descDepartamento">Descripción del departamento</label>
                            <input type="text" id="descDepartamento" name="descDepartamento" placeholder="Introduce el texto a buscar" value="<?php if(isset($_REQUEST['descDepartamento'])){
                                echo $_REQUEST['descDepartamento'];
                            }else{
                                echo '';
                            }?>">
                        </div>
                    </fieldset>

                    <div class="apiInfo">
                        <h4> </h4>
                        <a href="#" target="_blank"></a>
                    </div>
                </form>
            </div>

            <div class="servicio-rest apiDepartamentos" id="apiDepartamentos">
                
            </div>
        </div>
        
        <div class="webService">
            <div class="apiRequest">
                <form name="calculadora" action="<?php $_SERVER['PHP_SELF']?>" method="post" onsubmit="return validarCalculadora()">
                    <fieldset>
                        <div>
                            <h2>Calculadora</h2>
                        </div>

                        <div>
                            <label for="operacion">Elige una operación </label>
                            <select id="operacion" name="operacion">
                                <option value="1" <?php if(isset($_REQUEST["operacion"])){ if($_REQUEST["operacion"]==1){ echo 'selected';}} ?>>Suma</option>
                                <option value="2" <?php if(isset($_REQUEST["operacion"])){ if($_REQUEST["operacion"]==2){ echo 'selected';}} ?>>Resta</option>
                                <option value="3" <?php if(isset($_REQUEST["operacion"])){ if($_REQUEST["operacion"]==3){ echo 'selected';}} ?>>Multiplicación</option>
                                <option value="4" <?php if(isset($_REQUEST["operacion"])){ if($_REQUEST["operacion"]==4){ echo 'selected';}} ?>>División</option>
                            </select><br><br>
                            
                            <label for="num1">Primer número</label><br>
                            <span id="errorNum1"></span>
                            <input type="text" id="num1" name="num1" value="<?php 
                                if(isset($_REQUEST["num1"])){
                                    echo $_REQUEST["num1"];
                                }
                            ?>">
                            
                            <label for="num2">Segundo número</label><br>
                            <span id="errorNum2"></span>
                            <input type="text" id="num2" name="num2" value="<?php 
                                if(isset($_REQUEST["num2"])){
                                    echo $_REQUEST["num2"];
                                }
                            ?>">

                            <input class="enviar" type="submit" name="enviarCalculadora" value="Enviar">
                        </div>
                    </fieldset>
                    
                    <div class="apiInfo">
                        <h4> </h4>
                        <a href="#" target="_blank"></a>
                    </div>
                    
                    <div class="servicio-rest publicApi">
                        <?php if(isset($_REQUEST["operacion"])){
                            if($resultado != null){ ?>
                                <h3>Resultado: </h3>
                                <p><?php echo $resultado?></p>
                            <?php 
                            }
                        } ?>
                    </div>
                </form>
            </div>
        </div>   
        
        <div class="webService">
            <div class="apiRequest">
                <form name="buscarVideos" action="<?php $_SERVER['PHP_SELF']?>" method="post">
                    <fieldset>
                        <div>
                            <h2>Buscar vídeos en YouTube</h2>
                        </div>

                        <div>
                            <label for="tituloVideo">Título del vídeo</label>
                            <input type="text" id="tituloVideo" name="tituloVideo" value="<?php if(isset($_REQUEST['tituloVideo'])){
                                echo $_REQUEST['tituloVideo'];
                            }else{
                                echo '';
                            }?>">

                            <input class="enviar" type="submit" name="enviarVideo" id="enviarVideo" value="Enviar">
                        </div>
                    </fieldset>

                    <div class="apiInfo">
                        <h4> </h4>
                        <a href="#" target="_blank"></a>
                    </div>
                </form>
            </div>

            <div class="servicio-rest apiYoutube">
                
            </div>
        </div>
            
    </div>
    
    
</main>
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
                            <input type="date" name="fecha" value="<?php if(isset($_SERVER['fechaAPOD'])){
                                echo $_SERVER['fechaAPOD'];
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
                            <label for="titulo">Título de la API</label>
                            <input type="text" id="titulo" name="titulo" value="<?php 
                                if(isset($_SERVER["tituloAPI"])){
                                    echo $_SERVER["tituloAPI"];
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
        
        <div class="webService">
            <div class="apiRequest">
                <form name="calculadora" action="<?php $_SERVER['PHP_SELF']?>" method="post">
                    <fieldset>
                        <div>
                            <h2>Calculadora</h2>
                        </div>

                        <div>
                            <label for="operacion">Elige una operación </label>
                            <select id="operacion" name="operacion">
                                <option value="1" <?php if($_REQUEST["operacion"]==1){ echo 'selected';} ?>>Suma</option>
                                <option value="2" <?php if($_REQUEST["operacion"]==2){ echo 'selected';} ?>>Resta</option>
                                <option value="3" <?php if($_REQUEST["operacion"]==3){ echo 'selected';} ?>>Multiplicación</option>
                                <option value="4" <?php if($_REQUEST["operacion"]==4){ echo 'selected';} ?>>División</option>
                            </select><br><br>
                            
                            <label for="num1">Primer número</label>
                            <input type="text" id="num1" name="num1" value="<?php 
                                if(isset($_REQUEST["num1"])){
                                    echo $_REQUEST["num1"];
                                }
                            ?>">
                            
                            <label for="num2">Segundo número</label>
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
                </form>
            </div>

            <div class="servicio-rest publicApi">
                <?php if($resultado){ ?>
                    <h3>Resultado: </h3>
                    <p><?php echo $resultado?></p>
                <?php } ?>
            </div>
        </div>
    </div>
    
    
</main>
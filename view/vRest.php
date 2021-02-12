<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="./webroot/js/scriptAyax.js"></script>
<script src="./webroot/js/scriptValidacionFormularios.js"></script>
<main>
    <div class="container">
        <header>
            <h2>Uso de web services REST</h2>
        </header>
        
        <div class="navegadorAPIs">
            <ul>
                <li><a href="#apod">APOD</a></li>
                <li><a href="#apis">Public APIs</a></li>
                <li><a href="#buscarDepartamento">Buscar departamentos</a></li>
                <li><a href="#calculadora">Calculadora</a></li>                
            </ul>
        </div>
        
        <form class="flecha">
            <button type="submit" name="flechaVolver"><img src="./webroot/media/img/flecha.png" height="30px"></button>
        </form>
        
        <div class="webService">
            <div class="apiRequest">
                <form name="apod" id="apod" action="<?php $_SERVER['PHP_SELF']?>" method="post">
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
                        </div>
                    </fieldset>
                    
                    <div class="apiInfo">
                        <h4>Información de la api: </h4>
                        <a href="https://apod.nasa.gov/apod/astropix.html" target="_blank"> APOD Nasa</a>
                    </div>
                </form>
            </div>

            <div class="servicio-rest APOD" id="APOD">
                
            </div>
        </div>
        
        <div class="webService">
            <div class="apiRequest">
                <form name="apis" id="apis" action="<?php $_SERVER['PHP_SELF']?>" method="post">
                    <fieldset>
                        <div>
                            <h2>Public APIs</h2>
                        </div>

                        <div>
                            <label for="tituloAPI">Título de la API</label>
                            <input type="text" id="tituloAPI" name="tituloAPI" placeholder="Introduce el texto a buscar" value="<?php 
                                if(isset($_REQUEST["tituloAPI"])){
                                    echo $_REQUEST["tituloAPI"];
                                }
                            ?>">

                            <input class="enviar" type="submit" id="enviarPublicApis" name="enviarPublicApis" value="Enviar">
                        </div>
                    </fieldset>
                    
                    <div class="apiInfo">
                        <h4>Información de la api: </h4>
                        <a href="https://api.publicapis.org/" target="_blank"> Public apis</a>
                    </div>
                </form>
            </div>

            <div class="servicio-rest publicApi" id="publicApi">
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
                <form name="calculadora" id="calculadora" action="<?php $_SERVER['PHP_SELF']?>" method="post" onsubmit="return validarCalculadora()">
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
                    
                    
                </form>
            </div>
            
            <div class="servicio-rest servicioCalculadora" id="servicioCalculadora">
            </div>
        </div>   
            
    </div>
    
    
</main>
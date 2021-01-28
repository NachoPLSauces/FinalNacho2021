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

                            <input class="enviar" type="submit" name="enviar" value="Enviar">
                            <input class="enviar" type="submit" name="volver" value="volver">
                        </div>
                    </fieldset>
                </form>
            </div>

            <div id="servicio-rest">
                <p><?php echo $tituloEnCurso?></p>
                <img src="<?php echo $imagenEnCurso?>">
                <p><?php echo $descripcionEnCurso?></p>
            </div>
        </div>
    </div>
    
    
</main>
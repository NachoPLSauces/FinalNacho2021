<main>
    <div class="container">
        <header>
            <h2>APOD Nasa</h2>
        </header>
        
        <div class="apiRequest">
            <form>
                <fieldset>
                    <input type="date" name="fecha" value="<?php echo date('Y-m-d') ?>">

                    <input class="enviar" type="submit" name="enviar" value="Enviar">
                    <input class="enviar" type="submit" name="volver" value="volver">
                </fieldset>
            </form>
        </div>
        
        <div id="servicio-rest">
            <p><?php echo $tituloEnCurso?></p>
            <img src="<?php echo $imagenEnCurso?>" width="100">
            <p><?php echo $descripcionEnCurso?></p>
        </div>
    </div>
    
    
</main>
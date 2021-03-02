<main>
    <div class="contenedorFormularios">
        <form class="formulario" name="input" action="<?php $_SERVER['PHP_SELF']?>" method="post">
            <fieldset>
                <div>
                    <h2>Exportar departamentos</h2>
                </div>

                <div>
                    <label for="exportar">Pulsa para exportar los departamentos</label>
                    <input class="enviar" type="submit" id="exportar" value="Exportar" name="exportar"/>
                </div>
            </fieldset>
        </form>
        <form>
            <div class="formBottom">
                <input class="volver" type="submit" value="Volver" name="volver">
            </div>
        </form>
    </div>
</main>
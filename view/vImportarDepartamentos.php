<main>
    <div class="contenedorFormularios">
        <form class="formulario" name="input" action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
            <fieldset>
                <div>
                    <h2>Importar departamentos</h2>
                </div>

                <div>
                    <label for="archivoImportar">Elige un archivo para importar los departamentos</label>
                    <input type="file" id="archivoImportar" name="archivoImportar"/>
                    
                    <input class="enviar" type="submit" id="importar" value="Importar" name="importar"/>
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
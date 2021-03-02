<script src="./webroot/js/scriptValidacionFormularios.js"></script>
<main>
    <div class="contenedorFormularios">
        <form class="formulario" name="input" action="<?php $_SERVER['PHP_SELF']?>" method="post" onsubmit="return validarBajaDepartamento()">
            <fieldset>
                <div>
                    <h2>Dar departamento de baja</h2>
                </div>

                <div>
                    <label for="codDepartamento">Código de departamento </label><br>
                    <input class="readonly" type="text" id="codDepartamento" name="codDepartamento" value="<?php echo $_SESSION['codDepartamento']; ?>" readonly/>

                    <label for="descripcion">Descripción </label><br>
                    <input class="readonly" type="text" id="descripcion" name="descripcion" value="<?php echo $descripcion; ?>" readonly/>

                    <label for="volumen">Volumen </label><br>
                    <input class="readonly" type="text" id="volumen" name="volumenNegocio" value="<?php echo $volumenNegocio; ?>" readonly/>
                    
                    <label for="fechaBaja">Fecha de baja </label><br>
                    <input class="readonly" type="text" id="fechaBaja" name="fechaBaja" value="<?php echo date('d/m/Y',$fechaBaja); ?>" readonly/>

                    <input class="enviar" type="submit" value="Dar de alta" name="alta"/>
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
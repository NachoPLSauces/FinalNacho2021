<main>
    <form class="formulario" name="input" action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <fieldset>
            <div>
                <h2>Editar departamento</h2>
            </div>

            <div>
                <label for="codDepartamento">Código de departamento </label><br>
                <input class="readonly" type="text" id="codDepartamento" name="codDepartamento" value="<?php echo $_GET['codDepartamento']; ?>" readonly/>

                <label for="descripcion">Descripción <span>*</span></label><br>
                <span style='color:red'>
                    <?php
                    //Imprime el error en el caso de que se introduzca mal la descripcion
                    if($aErrores["descripcion"] != null){
                        echo $aErrores['descripcion'];
                    }
                    ?> 
                </span>

                <input type="text" id="descripcion" name="descripcion" value="<?php 
                    //Rellena el campo descripcion
                    if(isset($_REQUEST['descripcion']) && $aErrores["descripcion"] == null){
                        echo $_REQUEST['descripcion'];
                    }
                    else{
                        echo $descripcion;
                    }
                ?>"/>

                <label for="fechaBaja">Fecha Baja </label><br>
                <input class="readonly" type="text" id="fechaBaja" name="fechaBaja" value="<?php echo ($fechaBaja ? $fechaBaja : "null"); ?>" readonly/>

                <label for="volumen">Volumen <span>*</span></label><br>
                <span style='color:red'>
                    <?php
                    //Imprime el error en el caso de que se introduzca mal el volumen de negocio
                    if($aErrores["volumenNegocio"] != null){
                        echo $aErrores['volumenNegocio'];
                    }
                    ?> 
                </span>

                <input type="text" id="volumen" name="volumenNegocio" value="<?php 
                    //Rellena el campo volumenNegocio
                    if(isset($_REQUEST['volumenNegocio']) && $aErrores["volumenNegocio"] == null){
                        echo $_REQUEST['volumenNegocio'];
                    }
                    else{
                        echo $volumenNegocio;
                    }
                ?>"/>

                <input class="enviar" type="submit" value="Confirmar cambios" name="editar"/>
                <input class="enviar" type="reset" value="Borrar"/>
            </div>
        </fieldset>

        <div class="formBottom">
            <input class="volver" type="submit" value="Volver" name="volver">
        </div>
    </form>
</main>
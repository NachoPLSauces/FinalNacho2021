<script src="./webroot/js/scriptValidacionFormularios.js"></script>
<main>
    <div class="contenedorFormularios">
        <form class="formulario" name="input" action="<?php $_SERVER['PHP_SELF']?>" method="post" onsubmit="return validarAñadirDepartamento()">
            <fieldset>
                <div>
                    <h2>Añadir departamento</h2>
                </div>

                <div>
                    <label for="codDepartamento">Código de departamento </label><br>
                    <span id="errorCodigo">
                        <?php
                        //Imprime el error en el caso de que se introduzca mal la descripcion
                        if($aErrores["codDepartamento"] != null){
                            echo $aErrores['codDepartamento'];
                        }
                        ?> 
                    </span>
                    <input type="text" id="codDepartamento" name="codDepartamento" onblur="validarCodigo()" placeholder="ABC" value="<?php 
                        //Rellena el campo descripcion
                        if(isset($_REQUEST['codDepartamento']) && $aErrores["codDepartamento"] == null){
                            echo $_REQUEST['codDepartamento'];
                        }
                    ?>"/>

                    <label for="descripcion">Descripción <span>*</span></label><br>
                    <span id="errorDescripcion" style='color:red'>
                        <?php
                        //Imprime el error en el caso de que se introduzca mal la descripcion
                        if($aErrores["descripcion"] != null){
                            echo $aErrores['descripcion'];
                        }
                        ?> 
                    </span>

                    <input type="text" id="descripcion" name="descripcion" onblur="validarDescripcion()" placeholder="Descripción del departamento" value="<?php 
                        //Rellena el campo descripcion
                        if(isset($_REQUEST['descripcion']) && $aErrores["descripcion"] == null){
                            echo $_REQUEST['descripcion'];
                        }
                    ?>"/>

                    <label for="volumen">Volumen <span>*</span></label><br>
                    <span id="errorVolumenNegocio" style='color:red'>
                        <?php
                        //Imprime el error en el caso de que se introduzca mal el volumen de negocio
                        if($aErrores["volumenNegocio"] != null){
                            echo $aErrores['volumenNegocio'];
                        }
                        ?> 
                    </span>

                    <input type="text" id="volumen" name="volumenNegocio" onblur="validarVolumenNegocio()" placeholder="Volumen de negocio" value="<?php 
                        //Rellena el campo volumenNegocio
                        if(isset($_REQUEST['volumenNegocio']) && $aErrores["volumenNegocio"] == null){
                            echo $_REQUEST['volumenNegocio'];
                        }
                    ?>"/>

                    <input class="enviar" type="submit" value="Añadir departamento" name="añadir"/>
                    <input class="enviar" type="reset" value="Vaciar campos"/>
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
<main>
    <form name="editar" action="<?php $_SERVER['PHP_SELF']?>" method="post" onsubmit="return validarMiCuenta()">
        <fieldset>
            <div>
                <h2>Editar perfil</h2>
            </div>

            <div>
                <label for='usuario'>Usuario </label><br>
                <input class="readonly" type='text' id='usuario' name='usuario' value="<?php echo $_SESSION['usuarioDAW202LoginLogoffMulticapa']->getCodUsuario(); ?>" readonly/>

                <label for='descripcion' >Descripción </label><br>
                <span style="color:red">
                    <?php
                    //Imprime el error en el caso de que se introduzca mal el nombre
                    if($aErrores["descripcion"] != null){
                        echo $aErrores['descripcion'];
                    }
                    ?> 
                </span>
                <input type='text' id="descripcion" name='descripcion' value="<?php echo $_SESSION['usuarioDAW202LoginLogoffMulticapa']->getDescUsuario(); ?>"/>
                
                <label for='numConexiones'>Número de conexiones </label><br>
                <input class="readonly" type='text' id='numConexiones' name='numConexiones' value="<?php echo $_SESSION['usuarioDAW202LoginLogoffMulticapa']->getNumConexiones(); ?>" readonly/>

                <label for='fechaHora'>Fecha y hora de la conexión </label><br>
                <input class="readonly" type='text' id='fechaHora' name='fechaHora' value="<?php echo date("d-m-Y H:i:s", $_SESSION['usuarioDAW202LoginLogoffMulticapa']->getFechaHoraUltimaConexion()); ?>" readonly/>
            </div>

            <div>
                <input class="enviar" type="submit" name="editar" value="Aceptar"/>
                <input class="enviar" type="submit" name="cancelar" value="Cancelar"/>
            </div>
        </fieldset>
    </form>
</main>
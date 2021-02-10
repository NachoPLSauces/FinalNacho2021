<script src="./webroot/js/scriptValidacionFormularios.js"></script>
<main>
    <div class="title">
        <div class="logo">
            <img src="./webroot/media/img/logo.png" alt="logo">
        </div>

        <div>
            <h2><a href="../../proyectoDWES/indexProyectoDWES.php">Proyecto DWES</a></h2>
        </div>				
    </div>

    <form name="registro" action="<?php $_SERVER['PHP_SELF']?>" method="post" onsubmit="return validarRegistro()">
        <fieldset>
            <div>
                <h2>Crear cuenta</h2>
            </div>

            <div>
                <label for='usuario'>Usuario <span>*</span></label><br>
                <span id="errorUsuario" style="color:red">
                    <?php
                    //Imprime el error en el caso de que se introduzca mal el nombre
                    if($aErrores["usuario"] != null){
                        echo $aErrores['usuario'];
                    }
                    ?> 
                </span>

                <input type='text' id='usuario' name='usuario' onblur="validarUsuario()" value="<?php 
                    //Devuelve el campo nombre si se había introducido correctamente
                    if(isset($_REQUEST['usuario']) && $aErrores["usuario"] == null){
                        echo $_REQUEST['usuario'];
                    }
                ?>"/>

                <label for='descripcion' >Descripción <span>*</span></label><br>
                <span id="errorDescripcion" style="color:red">
                    <?php
                    //Imprime el error en el caso de que se introduzca mal el nombre
                    if($aErrores["descripcion"] != null){
                        echo $aErrores['descripcion'];
                    }
                    ?> 
                </span>

                <input type='text' id="descripcion" name='descripcion' onblur="validarDescripcion()" value="<?php 
                    //Devuelve el campo nombre si se había introducido correctamente
                    if(isset($_REQUEST['descripcion']) && $aErrores["descripcion"] == null){
                        echo $_REQUEST['descripcion'];
                    }
                ?>"/>

                <label for='password' >Contraseña <span>*</span></label><br>
                <span id="errorPassword" style="color:red">
                    <?php
                    //Imprime el error en el caso de que se introduzca mal el nombre
                    if($aErrores["password"] != null){
                        echo $aErrores['password'];
                    }
                    ?> 
                </span>

                <input type='password' id="password" name='password' onblur="validarPassword()" value="<?php 
                    //Devuelve el campo nombre si se había introducido correctamente
                    if(isset($_REQUEST['password']) && $aErrores["password"] == null){
                        echo $_REQUEST['password'];
                    }
                ?>"/>

                <input class="enviar" type='submit' name='enviar' value='Crear cuenta'/>
            </div>
        </fieldset>
    </form>
    
    <form name="cancelar" action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <input class="enviar" type='submit' name='cancelar' value='Cancelar'/>
    </form>
</main>
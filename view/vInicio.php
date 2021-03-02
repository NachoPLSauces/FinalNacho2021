<script type="text/javascript" src="./webroot/js/scriptValidacionFormularios.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<main>
    <div class="content">
        <div class="navegacion">
            <form class="contenedorInicio">
                <div class="iconoNavegacion">
                    <button type="submit" name='rest'><img src="./webroot/media/img/apiRest.png" alt="REST"></button>
                </div>
                <div class="iconoNavegacion">
                    <button type="submit" name='departamentos'><img src="./webroot/media/img/departamentos.png" alt="departamentos"></button>
                </div>
            </form>
        </div>
        
        <div class="barraVertical"></div>
        
        <form name="inicio" action="<?php $_SERVER['PHP_SELF']?>" method="post">
            <fieldset>
                <div>
                    <h2>Bienvenido <?php echo $descripcionUsuario; ?>
                    </h2>
                </div>

                <div>
                    <p>
                        <?php if($numConexiones == 1){
                            echo 'Es tu primera conexión';
                        } 
                        else{ 
                            echo "Esta es la conexión número ".$numConexiones;
                        } ?>
                    </p>
                    <?php if(!empty($_SESSION['fechaHoraUltimaConexionAnterior'])){?>
                        <p>Última conexión: <?php echo date("d-m-Y H:i:s", $_SESSION['fechaHoraUltimaConexionAnterior']); ?></p>
                    <?php } ?>
                </div>

                <div>
                    <input class="enviar" type="submit" name="editar" value="Editar cuenta"/>
                    <input class="enviar" type="submit" name="borrar" value="Borrar cuenta"/>
                    <input class="enviar" type="submit" name="salir" value="Salir"/>
                </div>
            </fieldset>
        </form>
    </div>
</main>
<main>
    <div class="buscarDepartamentos">
        <form name="input" action="<?php $_SERVER['PHP_SELF']?>" method="post">
            <div class="descripcion">
                <label>Descripción </label>
                <input name="DescDepartamento" id="DescDepartamento" type="text" placeholder="Descripción del departamento" value="<?php 
                    //Devuelve el campo campoDescDepartamento
                    if(isset($_REQUEST['DescDepartamento'])){
                        echo $_REQUEST['DescDepartamento'];
                    }
                ?>"/>
            </div>

            <div class="topBar">
                <a href="#">EXPORTAR</a>
                <a href="#">IMPORTAR</a>
                <a href="#">AÑADIR</a>
            </div>
        </form>
    </div>

    <div class="mostrarDepartamentos">
        <header>
            <p>CodDepartamento</p>
            <p>DescDepartamento</p>
            <p>FechaBaja</p>
            <p>VolumenNegocio</p>
            <p></p>
        </header>
        <div class="departamentos" id="departamentosEncontrados">
            <?php echo $mostrarDepartamentosEncontrados; ?>
        </div>
    </div>

    <div class="botBar">
        <div>
            <a href="../MtoDeDepartamentosTema4/mostrarCodigo/muestraMtoDepartamentosTema4.php">MOSTRAR CÓDIGO</a>
            <a href="../proyectoDWES/indexProyectoDWES.php">VOLVER</a>
        </div>
    </div>
</main>
<main>
    <div class="buscarDepartamentos">
        <form name="input" action="<?php $_SERVER['PHP_SELF']?>" method="post">
            <div class="descripcion">
                <input name="DescDepartamento" id="DescDepartamento" type="text" placeholder="Descripción del departamento" value="<?php 
                    //Devuelve el campo campoDescDepartamento
                    if(isset($_REQUEST['DescDepartamento'])){
                        echo $_REQUEST['DescDepartamento'];
                    }
                ?>"/>
                <input class="botonBuscar" type="submit" value="BUSCAR" name="buscar"/>
            </div>

            <div class="topBar">
                <input class="botonBuscar" type="submit" value="EXPORTAR" name="exportar"/>
                <input class="botonBuscar" type="submit" value="IMPORTAR" name="importar"/>
                <input class="botonBuscar" type="submit" value="AÑADIR" name="añadir"/>
            </div>
        </form>
    </div>

    <div class="mostrarDepartamentos">
        <header>
            <div>
                <p>CodDepartamento</p>
            </div>
            <div>
                <p>DescDepartamento</p>
            </div>
            <div>
                <p>FechaBaja</p>
            </div>
            <div>
                <p>VolumenNegocio</p>
            </div>
            <div></div>
        </header>
        <form class="departamentos" id="departamentosEncontrados">
            <?php echo $mostrarDepartamentosEncontrados; ?>
        </form>
    </div>

    <form class="botBar">
        <div>
            <input class="botonBuscar" type="submit" value="VOLVER" name="volver"/>
        </div>
    </form>
</main>
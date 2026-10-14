<?php
function contenido($categoria)
{ ?>
    <article class="buscador">
        <div>
            <input class="buscador-producto" type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por tienda ...">
        </div>
    </article>
    <article class="productos" id="mySection">
        <?php
        include('../../php/conexion.php');
        $mysqlConect = new Mysqldb();
        $getmysql = $mysqlConect->conexmysql();
        $i = 0;
        if ($getmysql) {
            $sql = "SELECT * FROM productos 
                INNER JOIN imagenes ON productos.codigo=imagenes.codigo
                INNER JOIN especificaciones ON imagenes.codigo=especificaciones.codigo_esp 
                WHERE imagenes.posicion=1 AND productos.estado=1 AND productos.categoria='$categoria' AND especificaciones.orden=1 ORDER BY productos.nombre ASC";
            //$sentencia = mysqli_prepare($getmysql, $sql); tambien sirve como respuesto de myslqi_stmt_init
            $sentencia = mysqli_stmt_init($getmysql);
            mysqli_stmt_prepare($sentencia, $sql);
            mysqli_stmt_execute($sentencia);
            $resultado = mysqli_stmt_get_result($sentencia);
            include "../../administrador/php/include/categoria-tabla.php";
            while ($fila =  mysqli_fetch_assoc($resultado)) {
                $i = $i + 1;
                $divid = "submit-div$i";
        ?>

                <div class="producto">
                    <?php
                    include "../../include/refaccionaria-catalogo.php";
                    ?>
                </div>
            <?php }
            mysqli_stmt_free_result($sentencia);
            mysqli_stmt_close($sentencia);
            mysqli_close($getmysql);
            ?>


        <?php } ?>
    </article>
    <div class="busqueda-fallida">
        <p>No encuentras tu producto. envianos un mensaje por <a target="_blank" href="https://wa.me/5216623467286">WhatsApp</a></p>
    </div>
<?php }
?>

<?php
function contenido_especifico($categoria, $permitir, $negar)
{ ?>
    <article class="buscador">
        <div>
            <input class="buscador-producto" type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por tienda ...">
        </div>
    </article>
    <article class="productos" id="mySection">
        <?php
        include('../../../php/conexion.php');
        $mysqlConect = new Mysqldb();
        $getmysql = $mysqlConect->conexmysql();
        $i = 0;
        if ($getmysql) {
            $sql = "SELECT * FROM productos 
                INNER JOIN imagenes ON productos.codigo=imagenes.codigo
                INNER JOIN especificaciones ON imagenes.codigo=especificaciones.codigo_esp 
                WHERE imagenes.posicion=1 AND productos.estado=1 AND productos.categoria='$categoria' AND especificaciones.orden=1 AND productos.nombre LIKE '%$permitir%' AND productos.nombre NOT LIKE '%$negar%' ORDER BY productos.nombre ASC";
            //$sentencia = mysqli_prepare($getmysql, $sql); tambien sirve como respuesto de myslqi_stmt_init
            $sentencia = mysqli_stmt_init($getmysql);
            mysqli_stmt_prepare($sentencia, $sql);
            mysqli_stmt_execute($sentencia);
            $resultado = mysqli_stmt_get_result($sentencia);
            include "../../../administrador/php/include/categoria-tabla.php";
            while ($fila =  mysqli_fetch_assoc($resultado)) {
                $i = $i + 1;
                $divid = "submit-div$i";
        ?>

                <div class="producto">

                    <?php
                    include "../../../include/refaccionaria-catalogo.php";
                    ?>
                </div>
            <?php }
            mysqli_stmt_free_result($sentencia);
            mysqli_stmt_close($sentencia);
            mysqli_close($getmysql);
            ?>


        <?php } ?>
    </article>
    <div class="busqueda-fallida">
        <p>No encuentras tu producto. envianos un mensaje por <a target="_blank" href="https://wa.me/5216623467286">WhatsApp</a></p>
    </div>
<?php }
?>



<?php
function contenido_especifico_plus($categoria, $permitir, $permitir2, $negar, $negar2)
{ ?>
    <article class="buscador">
        <div>
            <input class="buscador-producto" type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por tienda ...">
        </div>
    </article>
    <article class="productos" id="mySection">
        <?php
        include('../../../php/conexion.php');
        $mysqlConect = new Mysqldb();
        $getmysql = $mysqlConect->conexmysql();
        $i = 0;
        if ($getmysql) {
            $sql = "SELECT * FROM productos 
            INNER JOIN imagenes ON productos.codigo = imagenes.codigo
            INNER JOIN especificaciones ON imagenes.codigo = especificaciones.codigo_esp 
            WHERE imagenes.posicion = 1 
            AND productos.estado = 1 
            AND productos.categoria = '$categoria' 
            AND especificaciones.orden = 1 
            AND (productos.nombre LIKE '%$permitir%' OR productos.nombre LIKE '%$permitir2%') 
            AND productos.nombre NOT LIKE '%$negar%' AND productos.nombre NOT LIKE '%$negar2%'
            ORDER BY productos.nombre ASC;";

            //$sentencia = mysqli_prepare($getmysql, $sql); tambien sirve como respuesto de myslqi_stmt_init
            $sentencia = mysqli_stmt_init($getmysql);
            mysqli_stmt_prepare($sentencia, $sql);
            mysqli_stmt_execute($sentencia);
            $resultado = mysqli_stmt_get_result($sentencia);
            include "../../../administrador/php/include/categoria-tabla.php";
            while ($fila =  mysqli_fetch_assoc($resultado)) {
                $i = $i + 1;
                $divid = "submit-div$i";
        ?>

                <div class="producto">
                    <?php
                    include "../../../include/refaccionaria-catalogo.php"; ?>
                </div>
            <?php }
            mysqli_stmt_free_result($sentencia);
            mysqli_stmt_close($sentencia);
            mysqli_close($getmysql);
            ?>


        <?php } ?>
    </article>
    <div class="busqueda-fallida">
        <p>No encuentras tu producto. envianos un mensaje por <a target="_blank" href="https://wa.me/5216623467286">WhatsApp</a></p>
    </div>
<?php }
?>



<?php
function contenido_ferreteria($categoria)
{ ?>
    <article class="buscador">
        <div>
            <input class="buscador-producto" type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por tienda ...">
        </div>
    </article>
    <article class="productos" id="mySection">
        <?php
        include('../../php/conexion.php');
        $mysqlConect = new Mysqldb();
        $getmysql = $mysqlConect->conexmysql();
        $i = 0;
        if ($getmysql) {
            $sql = "SELECT * FROM productos 
                INNER JOIN imagenes ON productos.codigo=imagenes.codigo
                INNER JOIN especificaciones ON imagenes.codigo=especificaciones.codigo_esp 
                WHERE imagenes.posicion=1 AND productos.estado=2 AND productos.categoria='$categoria' AND especificaciones.orden=1 ORDER BY productos.nombre ASC";
            //$sentencia = mysqli_prepare($getmysql, $sql); tambien sirve como respuesto de myslqi_stmt_init
            $sentencia = mysqli_stmt_init($getmysql);
            mysqli_stmt_prepare($sentencia, $sql);
            mysqli_stmt_execute($sentencia);
            $resultado = mysqli_stmt_get_result($sentencia);
            include "../../administrador/php/include/categoria-tabla.php";
            while ($fila =  mysqli_fetch_assoc($resultado)) {
                $i = $i + 1;
                $divid = "submit-div$i";
        ?>

                <div class="producto">
                    <?php
                    include "../../include/ferreteria-catalogo.php"; ?>
                </div>
            <?php }
            mysqli_stmt_free_result($sentencia);
            mysqli_stmt_close($sentencia);
            mysqli_close($getmysql);
            ?>
        <?php } ?>
    </article>
    <div class="busqueda-fallida">
        <p>No encuentras tu producto. envianos un mensaje por <a target="_blank" href="https://wa.me/5216623467286">WhatsApp</a></p>
    </div>
<?php }
?>
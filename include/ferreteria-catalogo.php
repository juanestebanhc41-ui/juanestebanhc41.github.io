<div id="<?php echo $divid ?>" onclick="producto('<?php echo $divid ?>','<?php echo 'formulario' . $i; ?>');">
    <div><img class="img-producto" src="/upload/<?php echo $fila["imagen"] ?>"></div>
    <div><b><span class="p-span puntero"><?php echo $fila["nombre"]; ?></span></b></div>
    <div><span class="p-span puntero2">Codigo: <?php echo $fila["codigo"]; ?></span></div>
    <?php  
    $categoria=$fila['categoria'];
    ?>
    <div><span class="p-span">Categoria: <?php echo clientef($categoria) ?></span></div>
    <?php
    if ($fila["envio"] == 1) { ?>
        <div><span class="p-span paqueteriasi">Envio por paqueteria: Si</span></div>
    <?php } else { ?>
        <div><span class="p-span paqueteriano">Envio por paqueteria: No</span></div>
    <?php } ?>
    <?php
    if ($fila["precio_esp"] == "Contactanos" || $fila["precio_esp"] == 0) { ?>
        <div><span class="p-span">Solicitar cotización</span></div>
    <?php } else { ?>
        <div><span class="p-span">Precio: $<?php echo $fila["precio_esp"]; ?></span></div>
    <?php } ?>

    <form id="formulario<?php echo $i ?>" action="/ferreteria/producto/" method="GET">
        <input type="hidden" name="codigo" value="<?php echo $fila["codigo"]; ?>">
    </form>
</div>
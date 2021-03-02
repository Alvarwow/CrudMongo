<?php
require "modelo/clases/Ejercicio.php";

$Ejercicio=new ListaEjercicio();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MongoCrud</title>
    <LINK REL=StyleSheet HREF="css/estilosIndex.css" TYPE="text/css" MEDIA=screen>
</head>
<body>

<header>
<div class="buscador">
<input type="text">
<a href="">Enviar</a>
</div>
<div class="iconos_login_dwJson">
    <a href="formuInsert.php">Json</a>
    <a href="">Usuario</a>
</div>
</header>
<section>
    <div class="top">
        <?php
    echo $Ejercicio->imprimirFigurasEnBack();
        ?>
    </div>
    <div class="categorias">

    </div>
</section>
<footer>

</footer>

</body>
</html>
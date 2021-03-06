<?php
require "modelo/clases/Ejercicio.php";
require "modelo/dao/DaoEjercicio.php";
session_start();
if (empty($_SESSION['nombre'])) {
    header('Location: login.php');
}


$listaEjercicios=new ListaEjercicio();
$listaEjercicios->obtenerLista("");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <LINK REL=StyleSheet HREF="css/estilosIndex.css" TYPE="text/css" MEDIA=screen>
    <script type="text/javascript" src="modelo/js/llamadasAjax.js"></script>
</head>
<body>
<?php
include "includes/header.php"
?>

<h1 class="fecha">Rutina de hoy

    <?php
    $hoy = getdate();
    print_r($hoy['weekday']." / ".$hoy['mday']." / ".$hoy['month']);
    ?></h1>
<form class="search-container" id="busqueda"  >

<input type="text" id="search-bar" name="busqueda" placeholder="Introduzca el nombre del ejercicio" onkeypress="buscarEjercicio()">
<a onclick="buscarEjercicio()" id="buscarBton" ><img class="search-icon" src="img/search.png"></a>


</form>
<div class="contenedorEjercicios" id="lista">

    <?php echo $listaEjercicios->imprimirEnTabla() ?>

</div>



</div>
</body>
</html>

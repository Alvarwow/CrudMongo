<?php

require "../modelo/clases/Ejercicio.php";
require "../modelo/dao/DaoEjercicio.php";
session_start();
$lista = new ListaEjercicio();
$lista->obtenerJson();


$fh = fopen("../EjerciciosJson/" . $_SESSION['nombre'] . ".json", 'w')
or die("Error al abrir fichero de salida");
fwrite($fh, json_encode($lista->getLista(), JSON_PRETTY_PRINT));
fclose($fh);
$ruta="EjerciciosJson/" . $_SESSION['nombre'] . ".json";
echo $ruta;

?>
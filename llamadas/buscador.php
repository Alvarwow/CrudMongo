<?php
require "../modelo/clases/Ejercicio.php";
require "../modelo/dao/DaoEjercicio.php";
$busqueda="";
session_start();
if (isset($_GET['busqueda']) && !empty($_GET['busqueda'])) {

    $busqueda=$_GET['busqueda'];
    $busqueda = preg_replace("#[^0-9a-z]#i","",$busqueda);

}

$lista = new ListaEjercicio();
$lista->obtenerLista($busqueda);


echo $lista->imprimirEnTabla();
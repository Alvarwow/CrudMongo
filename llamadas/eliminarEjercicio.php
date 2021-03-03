<?php
require "../modelo/clases/Ejercicio.php";
require "../modelo/dao/DaoEjercicio.php";

$id = $_GET['id'];

//borro el elemento de la BD y su foro
$ejercicio=new Ejercicio();
$ejercicio->borrar($id);


$lista = new ListaEjercicio();
$lista->obtenerLista();


echo $lista->imprimirEnTabla();
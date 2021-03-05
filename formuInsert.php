<?php
require "modelo/clases/Ejercicio.php";
require_once "modelo/clases/Ejercicio.php";
include "modelo/dao/DaoEjercicio.php";

$ejercicio= new Ejercicio();

if (isset($_GET['id']) && !empty(($_GET['id']))) {

    $id = $_GET['id'];
    $ejercicio->listarID($id);


}
if(isset($_POST) && !empty($_POST)){

    if (isset($_GET['id']) && !empty(($_GET['id']))) {

    $ejercicio->llenarObj($_POST);
       $ejercicio->Actualizar($ejercicio);


}else{
    //LLeno el objeto con los datos del post
    $ejercicio->llenarObj($_POST);
    //Inserto el Ejercicio en la base de datos
    $ejercicio->insertar();

}
//Formulario que recive la id de la biblioteca


}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insertar Ejercicio</title>
    <LINK REL=StyleSheet HREF="css/estilosIndex.css" TYPE="text/css" MEDIA=screen>
    <LINK REL=StyleSheet HREF="css/estilosFormu.css" TYPE="text/css" MEDIA=screen>
    <script type="text/javascript" src="modelo/js/motor.js"></script>
</head>

<body>
<?php
include "includes/header.php"
?>

<div class="contenedor">
    <form class="formularioInsercion" id="formularioInsercion" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
          enctype="multipart/form-data">

        <label>Nombre</label> <input type="text" name="nombre" value="<?php echo $ejercicio->getNombre()?>"  >
        <label>Repeticiones</label><input type="number" name="repeticiones"value="<?php echo $ejercicio->getRepeticiones()?>">
        <label>Series</label><input type="number" name="series"value="<?php echo $ejercicio->getSeries()?>">
        <label>Descanso</label><input type="number" name="descanso"value="<?php echo $ejercicio->getDescanso()?>" >
        <label>Video</label><input type="text" name="video"value="<?php echo $ejercicio->getVideo()?>">
        <input type="hidden" name="id"value="<?php echo $ejercicio->getId()?>">
        <input type="submit"  value="Guardar" >
    </form>
</div>

</body>
</html>

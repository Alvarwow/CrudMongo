<?php
require "modelo/clases/Usuario.php";

include "modelo/dao/DaoUsuario.php";
require "modelo/clases/Ejercicio.php";
session_start();
if (empty($_SESSION['nombre']&&$_SESSION['permiso']=='3221')) {
    header('Location: index.php');
}
$usu=new Usuario();
if (isset($_POST) && !empty($_POST)) {

    //LLeno el objeto con los datos del post
     $usu->llenarObj($_POST);
    $usu->insertarUsuario();
    if($_POST['Descarga']!=null){
        $lista=new ListaEjercicio();
        json_encode($lista->obtenerLista(""),JSON_PRETTY_PRINT);
    }





}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FitApp</title>
    <LINK REL=StyleSheet HREF="css/estilosIndex.css" TYPE="text/css" MEDIA=screen>
    <LINK REL=StyleSheet HREF="css/estilosLogin.css" TYPE="text/css" MEDIA=screen>
</head>


<body>
<?php
include "includes/header.php"
?>
<div class="contenedor">


    <form class="formularioContacto" id="formularioInsertUsu" action="<?php echo $_SERVER['PHP_SELF']; ?>"
          method="post"
          enctype="multipart/form-data">
        <h1 class="titulo">Crear Usuario</h1>
        <label>Usuario</label> <input name="user" type="text">
        <label>Email</label> <input name="mail" type="text">
        <label>Contraseña</label> <input name="pass" type="password">
        <input type="submit" value="Crear Usuario">
    </form>

</div>

</div>

</body>

</html>
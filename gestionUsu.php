<?php
require "modelo/clases/Usuario.php";

include "modelo/dao/DaoUsuario.php";


$usu=new Usuario();




if (isset($_POST) && !empty($_POST)) {


    //LLeno el objeto con los datos del post
     $usu->llenarObj($_POST);

    $usu->insertarUsuario();
   echo ("hecho");





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
        <h1>Crear Usuario</h1>
        <label>Usuario</label> <input name="user">
        <label>Email</label> <input name="mail">
        <label>Contraseña</label> <input name="pass">
        <input type="submit" value="Log in">
    </form>

</div>

</div>

</body>

</html>
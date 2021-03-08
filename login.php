<?php
require "modelo/clases/Usuario.php";

include "modelo/dao/DaoUsuario.php";

$usu=new Usuario();

if (isset($_POST) && !empty($_POST)) {


    if ($usu->logIn($_POST['user'], $_POST['pass']) ){
        session_start([
            'cookie_lifetime' => 86400,
        ]);
        $_SESSION['nombre'] = $usu->getNombre();
        $_SESSION['permiso'] = $usu->getPermiso();




        session_write_close();
        header('Location: index.php');
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
    <script type="text/javascript" src="modelo/js/motor.js"></script>
</head>


<body>

<div class="contenedor">


    <form class="formularioContacto" id="formularioLogin" action="<?php echo $_SERVER['PHP_SELF']; ?>"
          method="post"
          enctype="multipart/form-data">
        <label>Usuario</label> <input type="text" name="user">
        <label>Contraseña</label> <input type="password" name="pass">
        <input type="button" onclick="validarlogin()" value="Log in">
    </form>

</div>

</div>

</body>

</html>

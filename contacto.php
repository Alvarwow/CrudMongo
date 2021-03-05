<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contacta con nosotros</title>
    <LINK REL=StyleSheet HREF="css/estilosIndex.css" TYPE="text/css" MEDIA=screen>


    <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>
    <LINK REL=StyleSheet HREF="css/estilosContacto.css" TYPE="text/css" MEDIA=screen>
    <script type="text/javascript" src="modelo/js/motor.js"></script>
</head>
<body>
<?php
include "includes/header.php"
?>
<div class="contenedor">


        <form class="formularioContacto" action="[URL]" method="post">
            <label>Correo</label> <input name="correo">
        <textarea name="content" id="editor">

        </textarea>
            <p><input type="submit" class="enviar" value="Submit"></p>
        </form>
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'))
                .catch(error => {
                    console.error(error);
                });
        </script>
    </div>

</div>

</body>
</html>

<header>
    <div class="iconos">

            <a href="index.php">  <img src="img/pesa.png" ></a>


       <?php if($_SESSION['permiso']==3221)echo( "<a class='botonNav' href='formuInsert.php'>Insertar</a>")?>
        <a class="botonNav" href="contacto.php">Contacto</a>
       <a class="botonNav" href="Login.php">Login</a>
    </div>
    <?php if($_SESSION['permiso']==3221)echo( "<a href='gestionUsu.php'> <img class='usuario' src='img/usuario.png'></a>")?>

</header>
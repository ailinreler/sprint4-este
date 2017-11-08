<?php session_start() ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Log-in/Register</title>
  </head>
  <body>

    <?php

    include "includes/header.php";

    ?>

    <div class="container-login">

      <?php if (isset($_SESSION['errores']['errorMysql'])): ?>
        <div class="errores">
          <p>alguno de los datos ingresados es incorrecto</p>
        </div>
      <?php endif; ?>

      <div class="loginbox">
        <img class="user" src="images/user-login.png" alt="" >
        <form class="loginbox-form" action="controller/login.controller.php" method="post" enctype="multipart/form-data">
          <div class="inputbox">
            <input class="username" type="text" name="user" value="<?php

              if(isset($_COOKIE['recordar'])){
                echo $_COOKIE['recordar'];
              }

             ?>" placeholder="Usuario">
            <span><i class="fa fa-user" aria-hidden="true"></i></span>
          </div>
          <div class="inputbox">
            <input class="password" type="password" name="pass" value="" placeholder="Contraseña">
            <span><i class="fa fa-lock" aria-hidden="true"></i></span>
          </div>
          <input class="submit" type="submit" name="" value="Ingresar">

          <label for="recodar">Recordarme:</label>
          <input type="checkbox" name="recordar" value="recordar" class="recordar">
        </form>
        <a href="register.php">¿No tiene una cuenta? Registrate.</a>
        <br>
        <a href="#">¿Olvidó su contraseña?</a>
      </div>

    </div>


    <?php

    include "includes/footer.php";

    ?>

  </body>
</html>

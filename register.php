<?php session_start(); ?>

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

      <div class="errores">

        <?php

        if (!empty($_SESSION['errores'])) {
          session_destroy();

          foreach ($_SESSION['errores'] as $key => $value) { ?>
            <p><?php echo $value . "<br>"; } ?></p>

        <?php } ?>



      </div>


      <div class="loginbox">
        <img class="user" src="images/user-login.png" alt="" >
        <form class="loginbox-form" action="controller/register.controller.php" method="post" enctype="multipart/form-data">
          <div class="inputbox">
            <input class="username"type="text" name="user" value="<?php

              if(isset($_SESSION['errores'])){
                if (isset($_COOKIE['user']) && !isset($_SESSION['errores']['erroruser']) && !isset($_SESSION['errores']['useryaexiste'])) {
                  echo $_COOKIE['user'];
                }
              }

             ?>" placeholder="Usuario">
            <span><i class="fa fa-user" aria-hidden="true"></i></span>
          </div>
          <div class="inputbox">
            <input class="password" type="password" name="pass" value="" placeholder="Contraseña">
            <span><i class="fa fa-lock" aria-hidden="true"></i></span>
          </div>
          <div class="inputbox">
            <input class="password" type="password" name="passconf" value="" placeholder="Corroborar Contraseña">
            <span><i class="fa fa-lock" aria-hidden="true"></i></span>
          </div>
          <div class="inputbox">
            <input class="email" type="email" name="mail" value="

              <?php

                if(isset($_SESSION['errores'])){
                  if (isset($_COOKIE['mail']) && !isset($_SESSION['errores']['errormail']) && !isset($_SESSION['errores']['errormailingresado']) && !isset($_SESSION['errores']['emailexiste'])) {
                    echo $_COOKIE['mail'];
                  }
                }

               ?>

            " placeholder="Correo electrónico">
            <span><i class="fa fa-envelope" aria-hidden="true"></i></span>
          </div>
          <div class="inputbox">
            <input class="phone" type="number" name="phone" value="" placeholder="Número de teléfono / Celular">
            <span><i class="fa fa-mobile" aria-hidden="true"></i></span>
          </div>
          <div class="inputbox">
            <label for="avatar">Avatar:</label>
            <input type="file" id="avatar" name="avatar">
          </div>

            <input href="login.html" class="submit" type="submit" name="" value="Registrarte">
          </form>
        </div>

      </div>
    <?php

    include "includes/footer.php";

    ?>

  </body>
</html>

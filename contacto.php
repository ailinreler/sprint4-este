<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Document</title>
</head>
<body>

  <?php

  include "includes/header.php";

  ?>

  <div class="container">

    <div class="preguntasfrecuentesForm">
      <h2>Contactate cuando quieras con nosotros!</h2>
      <p>Vamos a responderte lo más rápido posible!</p>
      <form class="preguntasfrecuentesHelp" action="index.html" method="post">
        <label for="name">Nombre y Apellido:</label>
        <input class="subtitulo-faq" type="text" name="Name" value="">
        <label for="email">E-mail:</label>
        <input class="subtitulo-faq" type="text" name="Name" value="">
        <label for="tema">Tema:</label>
        <input class="subtitulo-faq" type="text" name="Name" value="">
        <label for="categoria">Categoría:</label>
        <input class="subtitulo-faq" type="dropdown" name="Name" value="">
        <label for="pregunta">Pregunta:</label>
        <textarea class="subtitulo-faq" name="pregunta" rows="8" cols="80"></textarea>
        <input class="submit-faq" type="submit" name="submit-faq" value="Enviar pregunta">
      </form>
    </div>

  </div>

  <?php
    include "includes/footer.php";
   ?>

</body>
</html>

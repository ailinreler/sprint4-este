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

  <div class="slider">
    <div class="slider-contenedor">
      <h2>Nuevo iphone 7 plus</h2>
      <p>La nueva tecnología de Apple en tu celular</p>
      <div><img src="images/iphone.png" alt=""></div>
    </div>
  </div>

  <section class="productos-destacados container">

    <h2>productos destacados</h2>

    <div>
      <img src="images/tele.jpg" alt="">
      <div><a href=""><span>+</span></a></div>
    </div>

    <div>
      <img src="images/oculus.jpg" alt="">
      <div><a href=""><span>+</span></a></div>
    </div>

    <div>
      <img src="images/bundleplay2.jpg" alt="">
      <div><a href=""><span>+</span></a></div>
    </div>

    <div>
      <img src="images/parlante.jpg" alt="">
      <div><a href=""><span>+</span></a></div>
    </div>

  </section>

  <section class="elegirnos container">

    <h2>Por qué elegirnos</h2>

    <div class="porque">
      <div>
        <span class="fa fa-trophy fa-5x icono-1"></span>
      </div>
      <h3>Calidad</h3>
      <p>Nuestro productos estan certificados por normas de calidad internacional.</p>
    </div>

    <div class="porque">
      <div>
        <span class="fa fa-handshake-o fa-5x icono-2"></span>
      </div>
      <h3>Confianza</h3>
      <p>Llevamos más de 20 años brindando confianza a nuestro clientes.</p>
    </div>

    <div class="porque">
      <div>
        <span class="fa fa-comment fa-5x icono-3"></span>
      </div>
      <h3>Soporte 24hs!</h3>
      <p>Podés comunicarte con nosotros las 24hs antes cualquier duda o inconveniente.</p>
    </div>

  </section>

  <section class="losmasvendidos">

    <div class="bg-oscuro">
      <h2>Productos <span>más vendidos</span></h2>

      <div class="container">

          <div>
            <img src="images/play4bundle.png" alt="imagen-bundleplay">
            <div><a href=""><span>+</span></a></div>
          </div>

          <div>
            <img src="images/alexa.jpg" alt="imagen-alexa">
            <div><a href=""><span>+</span></a></div>
          </div>

          <div>
            <img src="images/auriculares-sony.jpg" alt="imagen-auriculares">
            <div><a href=""><span>+</span></a></div>
          </div>

          <div>
            <img src="images/compu2.jpg" alt="imagen-compu">
            <div><a href=""><span>+</span></a></div>
          </div>

      </div>
    </div>

  </section>

  <section class="nuestrosclientes container">

    <h2>Lo que dicen nuestro clientes</h2>

    <div class="cliente">
      <div><img src="images/yani.jpg" alt=""></div>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum est cum unde quod molestias qui. Ex, porro quas nemo non fuga libero neque quam perspiciatis, esse. Eius sunt quaerat porro.</p>
    </div>

    <div class="cliente">
      <div><img src="images/cliente2.jpg" alt=""></div>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum est cum unde quod molestias qui. Ex, porro quas nemo non fuga libero neque quam perspiciatis, esse. Eius sunt quaerat porro.</p>
    </div>

    <div class="cliente">
      <div><img src="images/cliente3.jpg" alt=""></div>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum est cum unde quod molestias qui. Ex, porro quas nemo non fuga libero neque quam perspiciatis, esse. Eius sunt quaerat porro.</p>
    </div>

  </section>

  <?php
    include "includes/footer.php"
   ?>

</body>
</html>

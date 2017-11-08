<?php session_start(); ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Productos</title>
  </head>
  <body>
    <div class="container-products">

      <?php include "includes/header.php"; ?>

    <!--================= TITULO DE LA PAGINA ===============================-->
    <div class="page-title">
      <div class="container-title">
        <h2>Productos</h2>
      </div>
    </div>
    <!--=================CONFIGURACION DE PRODUCTOS===========================-->
    <div class="page-select">
      <label>Elegir producto</label>
      <div class="product-select">
        <select>
          <option value="Producto">Celulares</option>
          <option value="Producto">Consola de juegos</option>
          <option value="Producto">Televisores</option>
          <option value="Producto">Tablets</option>
          <option value="Producto">Cámaras</option>
          <option value="Producto">Impresoras</option>
        </select>
      </div>
      <br>
      <label>Elegir marca</label>
      <div class="product-select">
      <select>
        <option value="Marca1">Apple</option>
        <option value="Marca2">Samsung</option>
        <option value="Marca3">Motorola</option>
        <option value="Marca4">Huawei</option>
        <option value="Marca5">Sony</option>
        <option value="Marca6">LG</option>
      </select>
      </div>
      <br>
      <label>Elegir precio</label>
      <div class="product-select">
      <select>
        <option value="Descuento1">10%</option>
        <option value="Descuento2">20%</option>
        <option value="Descuento3">30%</option>
        <option value="Descuento4">40%</option>
        <option value="Descuento5">50%</option>
        <option value="Descuento6">Other</option>
      </select>
    </div>
    </div>
    <!--=================PRODUCTOS DE LA PAGINA==============================-->
    <div class="page-product">
      <div class="product-div">
        <p class="descuento">50% off</p>
        <img src="images/celular5.jpg" alt="" width="200px">
        <p>Monitor LG-1569</p>
        <p><del class="tachado">$150.00</del> $89.00</p>
        <input type="button" name="" value="Ver producto">
      </div>
      <div class="product-div">
        <p class="descuento">Agotado</p>
        <img src="images/celular1.jpg" alt="" width="200px">
        <p>Monitor LG-1569</p>
        <p>$89.00</p>
        <input type="button" name="" value="Ver producto">
      </div>
      <div class="product-div">
        <p class="descuento">20% off</p>
        <img src="images/celular2.jpg" alt="" width="200px">
        <p>Monitor LG-1569</p>
        <p><del class="tachado">$100.00</del> $34.00</p>
        <input type="button" name="" value="Ver producto">
      </div>
      <div class="product-div">
        <p class="descuento"></p>
        <img src="images/celular3.jpg" alt="" width="200px">
        <p>Monitor LG-1569</p>
        <p>$89.00</p>
        <input type="button" name="" value="Ver producto">
      </div>
      <div class="product-div">
        <p class="descuento">50% off</p>
        <img src="images/celular5.jpg" alt="" width="200px">
        <p>Monitor LG-1569</p>
        <p><del class="tachado">$70.00</del> $30.00</p>
        <input type="button" name="" value="Ver producto">
      </div>
      <div class="product-div">
        <p class="descuento">Agotado</p>
        <img src="images/celular1.jpg" alt="" width="200px">
        <p>Monitor LG-1569</p>
        <p>$89.00</p>
        <input type="button" name="" value="Ver producto">
      </div>
      <div class="product-div">
        <p class="descuento">20% off</p>
        <img src="images/celular3.jpg" alt="" width="200px">
        <p>Monitor LG-1569</p>
        <p>$89.00</p>
        <input type="button" name="" value="Ver producto">
      </div>
      <div class="product-div">
        <p class="descuento">20% off</p>
        <img src="images/celular2.jpg" alt="" width="200px">
        <p>Monitor LG-1569</p>
        <p>$89.00</p>
        <input type="button" name="" value="Ver producto">
      </div>
      <div class="product-div">
        <p class="descuento">20% off</p>
        <img src="images/celular5.jpg" alt="" width="200px">
        <p>Monitor LG-1569</p>
        <p>$89.00</p>
        <input type="button" name="" value="Ver producto">
      </div>
      <div class="product-div">
        <p class="descuento">20% off</p>
        <img src="images/celular1.jpg" alt="" width="200px">
        <p>Monitor LG-1569</p>
        <p>$89.00</p>
        <input type="button" name="" value="Ver producto">
      </div>
      <div class="product-div">
        <p class="descuento">20% off</p>
        <img src="images/celular2.jpg" alt="" width="200px">
        <p>Monitor LG-1569</p>
        <p>$89.00</p>
        <input type="button" name="" value="Ver producto">
      </div>
      <div class="product-div">
        <p class="descuento">20% off</p>
        <img src="images/celular3.jpg" alt="" width="200px">
        <p>Monitor LG-1569</p>
        <p>$89.00</p>
        <input type="button" name="" value="Ver producto">
      </div>
    </div>

    <?php include "includes/footer.php"; ?>
  </div>
  </body>
</html>

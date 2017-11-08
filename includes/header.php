

<div class="marca">
  <h1><span>E</span>lectronic</h1>
</div>

<div class="login">

  <div class="hamburguesa">
    <a href="#">≡</a>
  </div>

  <?php if(!isset($_SESSION['sessionopen'])): ?>
  <a href="login.php">login</a>
  <a href="register.php">registrate</a>
  <?php endif; ?>

  <?php if(isset($_SESSION['sessionopen'])): ?>
  <a href="controller/logout.controller.php">cerrar sesión</a>

  <div class="container-loggedin">
    <?php if ($_SESSION['useravatar'] != null): ?>
      <img src="<?php echo "images/" . $_SESSION['useravatar'] ?>" alt="imagen-avatar">
    <?php endif; ?>

    <h2>Bienvenido <?php echo $_SESSION['userlogged']; ?> !</h2>
  </div>
  <?php endif; ?>



</div>


<header>

  <nav>
    <ul>
      <li><a href="index.php">home</a></li>
      <li><a href="products.php">productos</a></li>
      <li><a href="faq.php">faq</a></li>
      <li><a href="contacto.php">contacto</a></li>
    </ul>
  </nav>


</header>

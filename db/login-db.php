<?php

session_start();

require "../conexion/conn.php";

$errores = [];

$user = trim($_POST['user']);

$pass = trim($_POST['pass']);


if (empty($pass)) {
  $errores['errorpass'] = "por favor, ingrese contraseña";
}


$query = $db->prepare("SELECT user, pass, avatar FROM usuario WHERE user = ?");

$query->execute([$user]);

$datosUsuario = $query->fetch(PDO::FETCH_ASSOC);

foreach ($datosUsuario as $key => $value) {
  if ($key == 'user') {
    $dbUsuario = $value;
  }

  if ($key == 'pass') {
    $dbPass = $value;
  }

  if ($key == 'avatar') {
    $dbAvatar = $value;
  }
}


if (count($dbUsuario) > 0 && password_verify($pass, $dbPass)) {

  $_SESSION['sessionopen'] = true;
  $_SESSION['userlogged'] = $dbUsuario;
  $_SESSION['useravatar'] = $dbAvatar;


  if (isset($_POST['recordar'])) {

    $vencimiento = time() + 60 * 60 * 24 * 365;

    setcookie('recordar', $_POST['user'], $vencimiento, '/');

  }

  fclose($recurso);

  header('location: ../index.php');exit;

}else{
  $_SESSION['errores']['errorlogin'] = 'alguno de los datos ingresados es incorrecto';
    header('Location: ../login.php');
}

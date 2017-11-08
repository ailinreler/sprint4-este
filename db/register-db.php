<?php

session_start();

include '../controller/cookie.controller.php';
include '../conexion/conn.php';

  //REGISTRO

  $errores = [];

  $user = trim($_POST['user']);
  if (empty($user)) {
    $errores['erroruser'] = "el nombre es obligatorio";
  }


  $pass = trim($_POST['pass']);
  $passconf = trim($_POST['passconf']);

  if (empty($pass)) {
    $errores['errorpass'] = "por favor, ingrese contraseña";
  }elseif ($pass != $passconf) {
    $errores['errorpassdistintas'] = "Las contraseñas son distintas";
  }elseif (strlen($pass) < 5) {
    $errores['errorpasscorta'] = "La contraseña debe contener por lo menos 5 caracteres";
  }



  $mail = trim($_POST['mail']);
  if (empty($mail)) {
    $errores['errormail'] = "Por favor, agregar un mail";
  }elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    $errores['errormailingresado'] = "El mail ingresado no es válido";
  }


  $phone = trim($_POST['phone']);

  if (empty($phone)) {
    $phone = null; // se puede poner null?

  }

  $nImagen = uniqid();
  $path = "../images/";


  function guardarAvatar($avatar, $nImagen,$path)
  {
    if ($_FILES[$avatar]['error'] == UPLOAD_ERR_OK) {
      $ext = pathinfo($_FILES[$avatar]['name'], PATHINFO_EXTENSION);
      move_uploaded_file($_FILES[$avatar]['tmp_name'], $path . $nImagen . "." . $ext);

      return $nImagen . '.' . $ext;

    }
  }

    $nombreCompleto = guardarAvatar('avatar', $nImagen, $path);

  // registro y captación de errores de mail y usuario existente en base de datos


  $query = $db->prepare("SELECT user, mail FROM usuario WHERE user = ? OR mail = ?");
  $query->execute([$user,$mail]);

  $resultado = $query->fetch(PDO::FETCH_ASSOC);

  if ($resultado) {
    foreach ($resultado as $key => $value) {
      if ($key == 'user') {
        $errores['usuarioExistente'] = 'el usuario ya existe';
      }elseif($key == 'mail'){
        $errores['mailExistente'] = 'el mail ya existe';
      }
    }
  }


  if (!empty($errores)) {
    $_SESSION['errores'] = $errores;
  }

  if (empty($errores) && $query->rowCount() == 0) {
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    $queryInsert = $db->query("INSERT INTO usuario(user, pass, mail, phone, avatar) VALUES ('$user', '$pass', '$mail', '$phone', '$nombreCompleto')");

  }else{
     header('Location: ../register.php');
  }

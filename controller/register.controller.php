<?php


require_once '../classes/Usuario.php';
require_once '../classes/MySQLDB.php';
require_once '../classes/DBFactory.php';
require_once '../classes/JsonDB.php';
require_once '../classes/Validacion.php';


// MySQLDB - JsonDB
DBFactory::$dbType = 'JsonDB';  

$usuario = new Usuario($_POST);

  if (
    count(Validacion::ValidacionUser()) == 0 && count(Validacion::ValidacionPass()) == 0 && count(Validacion::ValidacionPassConf()) == 0 && count(Validacion::ValidacionMail()) == 0 && count(Validacion::ValidacionPhone()) == 0)  {
    $usuario->save();
  }else{

    foreach (Validacion::ValidacionUser() as $key => $value) {
      $_SESSION['errores'][$key] = $value;
    }
    foreach (Validacion::ValidacionPass() as $key => $value) {
      $_SESSION['errores'][$key] = $value;
    }
    foreach (Validacion::ValidacionPassConf() as $key => $value) {
      $_SESSION['errores'][$key] = $value;
    }
    foreach (Validacion::ValidacionMail() as $key => $value) {
      $_SESSION['errores'][$key] = $value;
    }
    foreach (Validacion::ValidacionMail() as $key => $value) {
      $_SESSION['errores'][$key] = $value;
    }
    foreach (Validacion::ValidacionPhone() as $key => $value) {
      $_SESSION['errores'][$key] = $value;
    }


  header('Location:../register.php');

  }




// session_start();
//
// define('DB_PATH', '../usuarios.json');
//
//
// require_once '../conexion/conn.php';
// require_once '../helper.php';
// require_once '../db/dbActual.php';
// require_once 'cookie.controller.php';
//
//
// //con esto puedo hacer la conexión sin especificar el nombre de la base de datos, y la especifico acá de esta manera. NO LO ESTAMOS USANDO ASÍ
// // $queryDbName = $db->prepare("USE usuarios");
// // $queryDbName->execute();
//
// $errores = [];
//
// //validación user
//
// if (isset($_POST['user'])) {
//
//   $user = trim($_POST['user']);
//   if (empty($user)) {
//     $errores['erroruser'] = "el nombre es obligatorio";
//   }
//
// }
//
//
//
// // validación password
//
// if (isset($_POST['pass'])) {
//
//   $pass = trim($_POST['pass']);
//   $passconf = trim($_POST['passconf']);
//
//   if (empty($pass)) {
//     $errores['errorpass'] = "por favor, ingrese contraseña";
//   }elseif ($pass != $passconf) {
//     $errores['errorpassdistintas'] = "Las contraseñas son distintas";
//   }elseif (strlen($pass) < 5) {
//     $errores['errorpasscorta'] = "La contraseña debe contener por lo menos 5 caracteres";
//   }
//
// }
//
//
// // validación mail
//
// if (isset($_POST['mail'])) {
//
//   $mail = trim($_POST['mail']);
//   if (empty($mail)) {
//     $errores['errormail'] = "Por favor, agregar un mail";
//   }elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
//     $errores['errormailingresado'] = "El mail ingresado no es válido";
//   }
//
// }
//
//
//
//
// // validación teléfono - el teléfono no es obligatorio
//
// if (isset($_POST['phone'])) {
//
//   $phone = trim($_POST['phone']);
//
//   if (empty($phone)) {
//     $phone = 0; // se puede poner null?
//
//   }
//
// }
//
//
//
// //guardar errores
//
// if (!empty($errores)) {
//   $_SESSION['errores'] = $errores;
// }
//
// //guardar registro // imagen de avatar
//
// $nImagen = uniqid();
// $path = "../images/";
//
//
// function guardarAvatar($avatar, $nImagen,$path)
// {
//   if ($_FILES[$avatar]['error'] == UPLOAD_ERR_OK) {
//     $ext = pathinfo($_FILES[$avatar]['name'], PATHINFO_EXTENSION);
//     move_uploaded_file($_FILES[$avatar]['tmp_name'], $path . $nImagen . "." . $ext);
//
//     return $nImagen . '.' . $ext;
//
//   }
// }
//
// $nombreCompleto = guardarAvatar('avatar', $nImagen, $path);
//
// if ($dbActual == 'json') {
//
//   //validacion usuario json
//   if (revisarUsuario($user) == true) {
//     $errores['useryaexiste'] = 'ese usuario ya existe';
//     $_SESSION['errores']['useryaexiste'] = 'ese usuario ya existe';
//   }
//
//   //validacion mail json
//   if (revisarMail($mail)) {
//     $errores['emailexiste'] = 'ese mail ya fue utilizado';
//     $_SESSION['errores']['emailexiste'] = 'ese mail ya fue utilizado';
//   }
//
//   if (empty($errores)) {
//
//
//     $usuario = [
//
//       'user' => $user,
//       'pass' => password_hash($pass, PASSWORD_DEFAULT),
//       'mail' => $mail,
//       'phone' => $phone,
//       'avatar' => $nombreCompleto
//
//     ];
//
//     $json = json_encode($usuario);
//
//     file_put_contents("../usuarios.json", $json . PHP_EOL, FILE_APPEND);
//
//      header('Location: ../register-ok.php');
//
//   }
//
//
//
//    if (!empty($errores)) {
//      header('Location: ../register.php');
//    }
// }
//
//
// if ($dbActual == 'mysql') {
//
//
//   $query = $db->prepare("SELECT user, mail FROM usuario WHERE user = ? OR mail = ?");
//   $query->execute([$user,$mail]);
//
//   $resultado = $query->fetch(PDO::FETCH_ASSOC);
//
//   if ($resultado) {
//     foreach ($resultado as $key => $value) {
//       if ($key == 'user' && $value == $user) {
//         $errores['usuarioExistente'] = 'el usuario ya existe';
//       }elseif($key == 'mail' && $value == $mail){
//         $errores['mailExistente'] = 'el mail ya existe';
//       }
//     }
//   }
//
//
//   if (!empty($errores)) {
//     $_SESSION['errores'] = $errores;
//   }
//
//   if (empty($errores) && $query->rowCount() == 0) {
//     $pass = password_hash($pass, PASSWORD_DEFAULT);
//     $queryInsert = $db->prepare("INSERT INTO usuario (user, pass, mail, phone, avatar) VALUES ('$user', '$pass', '$mail', '$phone', '$nombreCompleto')");
//     $queryInsert->execute();
//     header('Location: ../register-ok.php');
//   }else{
//     header('Location: ../register.php');
//   }
//
// }

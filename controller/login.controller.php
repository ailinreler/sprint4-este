<?php

require_once '../classes/Usuario.php';
require_once '../classes/MySQLDB.php';
require_once '../classes/DBFactory.php';
require_once '../classes/JsonDB.php';
require_once '../classes/Validacion.php';


// JsonDB - MySQLDB

DBFactory::$dbType = 'JsonDB';

$usuario = Usuario::login($_POST['user'], $_POST['pass']);

// session_start();
//
// require "../conexion/conn.php";
// require "../db/dbActual.php";
//
//
// //BASE DE DATOS JSON
//
// if ($dbActual == 'json') {
//
// $archivo = '../usuarios.json';
//
// $recurso = fopen($archivo, 'r');
//
// while ( ($linea = fgets($recurso)) !== false ) {
//   $usuario = json_decode($linea, true);
//   if ($usuario['user'] == $_POST['user'] &&  password_verify($_POST['pass'], $usuario['pass'])) {
//     $_SESSION['sessionopen'] = true;
//     $_SESSION['userlogged'] = $usuario['user'];
//     $_SESSION['useravatar'] = $usuario['avatar'];
//
//
//     if (isset($_POST['recordar'])) {
//
//       $vencimiento = time() + 60 * 60 * 24 * 365;
//
//       setcookie('recordar', $_POST['user'], $vencimiento, '/');
//
//     }
//     fclose($recurso);
//     header('location: ../index.php');exit;
//
//   }
//
// }
// fclose($recurso);
// $_SESSION['errores']['errorlogin'] = 'alguno de los datos ingresados es incorrecto';
// header('location: ../login.php');
//
//
// }
//
//
// // BASE DE DATOS MYSQL
//
//
//
// if ($dbActual == 'mysql') {
//
//   $errores = [];
//
//   $user = trim($_POST['user']);
//
//   $pass = trim($_POST['pass']);
//
//
//   if (empty($pass)) {
//     $errores['errorpass'] = "por favor, ingrese contraseña";
//   }
//
//   $query = $db->prepare("SELECT user, pass, avatar FROM usuario WHERE user = ?");
//
//   $query->execute([$user]);
//
//   $datosUsuario = $query->fetch(PDO::FETCH_ASSOC);
//
//   if (count($datosUsuario['user']) > 0 && password_verify($pass, $datosUsuario['pass'])) {
//
//     $_SESSION['sessionopen'] = true;
//     $_SESSION['userlogged'] = $datosUsuario['user'];
//     $_SESSION['useravatar'] = $datosUsuario['avatar'];
//
//
//     if (isset($_POST['recordar'])) {
//
//       $vencimiento = time() + 60 * 60 * 24 * 365;
//
//       setcookie('recordar', $_POST['user'], $vencimiento, '/');
//
//     }
//
//     fclose($recurso);
//
//     header('location: ../index.php');exit;
//
//   }else{
//     $_SESSION['errores']['errorlogin'] = 'alguno de los datos ingresados es incorrecto';
//       header('Location: ../login.php');
//   }
//
// }

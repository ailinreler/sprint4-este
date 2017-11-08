<?php

require_once '../classes/Usuario.php';
require_once '../classes/MySQLDB.php';
require_once '../classes/DBFactory.php';
require_once '../classes/JsonDB.php';
require_once '../classes/Validacion.php';

echo '<pre>';

// JsonDB - MySQLDB

DBFactory::$dbType = 'MySQLDB';

// login usuario
// $usuario = Usuario::login($_POST['user'], $_POST['pass']);
// var_dump($usuario);



// registro usuario
$usuario = new Usuario($_POST);
$usuario->save();
// if (count(Validacion::ValidacionUser()) == 0 && count(Validacion::ValidacionPass()) == 0) {
//   $usuario->save();
// }else{
//   header('Location:../register.php');
// }





//  $usuario = Usuario::login('montoto', '123456');
// $usuario->setNombre('mondonga');
//  $usuario->save();

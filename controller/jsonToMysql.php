<?php

require "../conexion/conn.php";

$pasarJsonAMysql = 'no';

if ($pasarJsonAMysql == 'si') {


  $dbCrear = $db->prepare("DROP TABLE IF EXISTS usuarios.usuario");
  $dbCrear->execute();

  $dbCrear = $db->prepare("CREATE DATABASE IF NOT EXISTS usuarios");
  $dbCrear->execute();

  $queryDbName = $db->prepare("USE usuarios");
  $queryDbName->execute();

  $query = $db->prepare("CREATE TABLE IF NOT EXISTS usuario (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    user VARCHAR(80) NOT NULL,
    pass VARCHAR(60) NOT NULL,
    mail VARCHAR(100) NOT NULL,
    phone VARCHAR(100) NULL DEFAULT NULL,
    avatar VARCHAR(200) NULL DEFAULT NULL,
    PRIMARY KEY (id))");

  $query->execute();


  $json = file_get_contents("../usuarios.json");

  $json = explode(PHP_EOL, $json);

  foreach ($json as $key => $value) {

    $json[$key] = json_decode($value, true);


    if ($value != NULL) {

      $insertarEnDb = $db->prepare("INSERT INTO usuario (user, pass, mail, phone, avatar) VALUES (:user, :pass, :pass, :phone, :avatar)");

      $insertarEnDb->bindValue(':user',$json[$key]['user'], PDO::PARAM_STR);
      $insertarEnDb->bindValue(':pass',$json[$key]['pass'], PDO::PARAM_STR);
      $insertarEnDb->bindValue(':pass',$json[$key]['mail'], PDO::PARAM_STR);
      $insertarEnDb->bindValue(':phone',$json[$key]['phone'], PDO::PARAM_STR);
      $insertarEnDb->bindValue(':avatar',$json[$key]['avatar'], PDO::PARAM_STR);

      $insertarEnDb->execute();
      // var_dump($json[$key]['user']);

    }

  }

}

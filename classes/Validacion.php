<?php

class Validacion{

    public static function ValidacionUser()
    {

      $errores = [];

      if (isset($_POST['user'])) {

        $user = trim($_POST['user']);
        if (empty($user)) {
          $errores['erroruser'] = "el nombre es obligatorio";
        }

      }

      return $errores;
    }


    public static function ValidacionPass()
    {
      $errores = [];

      if (isset($_POST['pass'])) {

        $pass = trim($_POST['pass']);
        $passconf = trim($_POST['passconf']);

        if (empty($pass)) {
          $errores['errorpass'] = "por favor, ingrese contraseña";
        }elseif (strlen($pass) < 5) {
          $errores['errorpasscorta'] = "La contraseña debe contener por lo menos 5 caracteres";
        }

      }
      return $errores;
    }

    public static function ValidacionPassConf()
    {
      $errores = [];

      $pass = trim($_POST['pass']);
      $passconf = trim($_POST['passconf']);

      if ($pass != $passconf) {
        $errores['errorpassdistintas'] = "Las contraseñas son distintas";
      }

      return $errores;
    }


    public static function ValidacionMail()
    {

      $errores = [];

      if (isset($_POST['mail'])) {

        $mail = trim($_POST['mail']);
        if (empty($mail)) {
          $errores['errormail'] = "Por favor, agregar un mail";
        }elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
          $errores['errormailingresado'] = "El mail ingresado no es válido";
        }

      }

      return $errores;
    }

    public static function ValidacionPhone()
    {
      $errores = [];

      if (isset($_POST['phone'])) {

        $phone = trim($_POST['phone']);

        if (empty($phone)) {
          $phone = 0; // se puede poner null?

        }

      }

      return $errores;
    }


}

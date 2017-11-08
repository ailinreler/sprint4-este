<?php

class JsonDB{

  public static function login($user, $tabla, $class, $pass){

    $archivo = '../usuarios.json';

    $recurso = fopen($archivo, 'r');

    while ( ($linea = fgets($recurso)) !== false ) {
      $usuario = json_decode($linea, true);

      if ($usuario['user'] == $user && $usuario['pass'] == password_verify($pass, $usuario['pass']) ) {

        $model = new $class([]);
        $model->toModel($usuario);

        $_SESSION['sessionopen'] = true;
        $_SESSION['userlogged'] = $model->user;
        $_SESSION['useravatar'] = $model->avatar;

        return $model;


        fclose($recurso);
        // header('location: ../index.php');exit;

      }

    }
  }

  public function save($tabla, $model){

    $usuario = [

      // foreach ($model->fillable as $column) {
      //   "$column => $model->$column";
      // } por qué no funciona?------------------------------------

      'user' => $model->user,
      'pass' => password_hash($model->pass, PASSWORD_DEFAULT),
      'mail' => $model->mail,
      'phone' => $model->phone,
      'avatar' => $model->avatar

    ];

    $json = json_encode($usuario);

    file_put_contents("../usuarios.json", $json . PHP_EOL, FILE_APPEND);
  }


}

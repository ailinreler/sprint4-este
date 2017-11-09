<?php

class JsonDB{

  public static function login($user, $tabla, $class, $pass){

    $archivo = '../usuarios.json';

    $recurso = fopen($archivo, 'r');

    while ( ($linea = fgets($recurso)) !== false ) {
      $usuario = json_decode($linea, true);


      if ($usuario['user'] == $user && password_verify($pass, $usuario['pass'])) {

        $model = new $class([]);
        $model->toModel($usuario);

        $_SESSION['sessionopen'] = true;
        $_SESSION['userlogged'] = $model->user;
        $_SESSION['useravatar'] = $model->avatar;

        return $model;

        fclose($recurso);
        header('location: ../index.php');exit;

      }

    }
  }

  public function save($tabla, $model, $user){

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


    $usuarioExiste = $this->revisarUsuario($user);

    if ($usuarioExiste == true) {
      $_SESSION['errores']['existeusuario'] = 'el usuario ya existe';
      header('Location: ../register.php');
    }else{
      file_put_contents("../usuarios.json", $json . PHP_EOL, FILE_APPEND);
      header('Location: ../login.php');
    }
  }


  private function revisarUsuario($user)
  {
    $recurso = fopen('../usuarios.json', 'r');

    while ( ($linea = fgets($recurso)) !== false ) {
      $usuario = json_decode($linea, true);
      if ($usuario['user'] == $user) {
        return true;

      }
    }

    fclose($recurso);


  }


}

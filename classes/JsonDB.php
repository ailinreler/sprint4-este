<?php


class JsonDB{

  public static function login($user, $class, $pass){

    $archivo = '../usuarios.json';

    $recurso = fopen($archivo, 'r');

    if (isset($_POST['recordar'])) {

      $vencimiento = time() + 60 * 60 * 24 * 365;

        setcookie('recordar', $_POST['user'], $vencimiento, '/');

    }

    while ( ($linea = fgets($recurso)) !== false ) {

      $usuario = json_decode($linea, true);

      if ($usuario['user'] == $user && password_verify($pass, $usuario['pass'])) {

        $model = new $class([]);
        $model->toModel($usuario);

        $_SESSION['sessionopen'] = true;
        $_SESSION['userlogged'] = $model->user;
        $_SESSION['useravatar'] = $model->avatar;



        fclose($recurso);

        header('location: ../index.php');exit;
        return $model;
      }else{

        $_SESSION['errores']['datosIncorrectos'] = 'alguno de los datos no es correcto';
        // header('location: ../login.php');

      }

    }
  }

  public function save($tabla, $model, $user){

    $usuario = [

      // foreach ($model->fillable as $column) {
      //   "$column => $model->$column";
      // } por qué no funciona?------------------------------------

      'user' => $model->user,
      'pass' => $model->pass,
      'mail' => $model->mail,
      'phone' => $model->phone,
      'avatar' => $model->avatar

    ];

    $json = json_encode($usuario);


    $usuarioOMailExiste = $this->revisarUsuario($user, $model);

    if ($usuarioOMailExiste == 'userexiste') {
      $_SESSION['errores']['erroruser'] = 'el usuario ya existe';

      header('Location: ../register.php');
    }elseif( $usuarioOMailExiste == 'mailexiste' ){
      $_SESSION['errores']['errormail'] = 'el mail ya existe';
      header('Location: ../register.php');
    }
    else{
      file_put_contents("../usuarios.json", $json . PHP_EOL, FILE_APPEND);
      header('Location: ../login.php');
    }
  }


  private function revisarUsuario($user, $model)
  {
    $recurso = fopen('../usuarios.json', 'r');

    while ( ($linea = fgets($recurso)) !== false ) {
      $usuario = json_decode($linea, true);
      if ($usuario['user'] == $user) {
        return 'userexiste';
      }elseif($usuario['mail'] == $model->mail){
        return 'mailexiste';
      }
    }

    fclose($recurso);


  }


}

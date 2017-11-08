<?php
session_start();

class MySQLDB{

  public static function login($user, $tabla, $class, $pass){

    $errores = [];

    $sql = DB::getConn()->prepare('SELECT * FROM ' .$tabla. ' WHERE user = :user');
    $sql->bindValue(':user', $user);
    $sql->execute();
    $resultado = $sql->fetch(PDO::FETCH_ASSOC);


    $passDB = $resultado['pass'];


    if (password_verify($pass, $passDB)) {



      $model = new $class([]);
      $model->toModel($resultado);

      $_SESSION['sessionopen'] = true;
      $_SESSION['userlogged'] = $model->user;
      $_SESSION['useravatar'] = $model->avatar;


      header('Location: ../index.php');

      return $model;

    }else{

      header('Location: ../login.php');
      return $_SESSION['errores']['errorMysql'] = 'alguno de los datos es  incorrecto';
    }




  }


  public function save($tabla, $model){

    $sqlValidacion = DB::getConn()->prepare('SELECT * FROM ' .$tabla. ' WHERE user = :user');

    $sqlValidacion->bindValue(':user', $model->user);
    $sqlValidacion->execute();

    $resultado = $sqlValidacion->fetch(PDO::FETCH_ASSOC);

    if ($resultado == true) {
      $_SESSION['errores'][errorsession] = 'el usuario ya existe';
      header('Location: ../register.php');

    }else{

      $sql = $this->insert($tabla, $model);

      foreach ($model->fillable as $column) {
        $sql->bindValue(":$column", $model->$column);
      }

      $sql->execute();

      header('Location:../login.php');

    }
  }

  private function insert($tabla, $model){
    $columns = implode(',', $model->fillable);
    $placeholders = ':'.implode(', :', $model->fillable);

    return DB::getConn()->prepare("INSERT INTO " .$tabla. " ($columns) VALUES ($placeholders)");
  }



}

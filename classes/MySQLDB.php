<?php
session_start();

class MySQLDB{

  public static function login($user, $tabla, $class, $pass){

    if (isset($_POST['recordar'])) {
    
          $vencimiento = time() + 60 * 60 * 24 * 365;

          setcookie('recordar', $_POST['user'], $vencimiento, '/');

        }

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

    $sqlValidacion = DB::getConn()->prepare('SELECT * FROM ' .$tabla. ' WHERE user = :user OR mail = :mail');

    $sqlValidacion->bindValue(':user', $model->user);
    $sqlValidacion->bindValue(':mail', $model->mail);
    $sqlValidacion->execute();

    $resultados = $sqlValidacion->fetchAll(PDO::FETCH_ASSOC);

    if ($resultados == true) {
      foreach ($resultados as $resultado) {
        if ($resultado['user'] == $model->user) {

            $_SESSION['errores']['erroruser'] = 'El usuario ya existe';
        }elseif ($resultado['mail'] == $model->mail) {
          $_SESSION['errores']['errormail'] = 'El mail ya existe';

        }
      }

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

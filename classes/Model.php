<?php


require_once 'DBFactory.php';

class Model{


  public function __construct($data){

    $this->toModel($data);

  }

  public static function login($user, $pass){

    return DBFactory::getDB()::login($user, static::$tabla, get_called_class(), $pass);

  }

  public function toModel($data){

    if (isset($data['id'])) {
      $this->id = $data['id'];
    }

    foreach ($data as $key => $value) {
      if (in_array($key, $this->fillable)) {
        $this->$key = $value;
      }
    }

  }



  public function save(){

    return DBFactory::getDB()->save(static::$tabla, $this, $_POST['user']);

  }


}

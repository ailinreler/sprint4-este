<?php

require_once 'DB.php';
require_once 'Model.php';

class Usuario extends Model{

  public $id;
  public $user;
  public $pass;
  public $passconf;
  public $mail;
  public $phone;
  public $avatar;

  public $fillable = ['user', 'pass' , 'mail', 'phone', 'avatar'];
  public static $tabla = 'usuario';

  // public function __construct($user, $pass, $mail, $phone){
  //
  //   $this->user = $user;
  //   $this->setPass($pass);
  //   $this->mail = $mail;
  //   $this->phone = $phone;
  //   if (isset($_FILES['avatar'])) {
  //     $this->setAvatar();
  //   }
  // }

   public function __construct($data){
     parent::__construct($data);
     if (isset($_FILES['avatar'])) {
       $this->setAvatar();
     }

     if ($_POST['pass']) {
       $this->setPass($_POST['pass']);
     }
   }

  public function getNombre()
  {
    return $this->user;
  }


  public function setNombre($user)
  {
    $this->user = $user;

    return $this;
  }


  public function getPass()
  {
    return $this->pass;
  }


  public function setPass($pass)
  {
    $this->pass = password_hash($pass, PASSWORD_DEFAULT);

    return $this;
  }


  public function getMail()
  {
    return $this->mail;
  }


  public function setMail($mail)
  {
    $this->mail = $mail;

    return $this;
  }


  public function getTelefono()
  {
    return $this->phone;
  }


  public function setTelefono($phone)
  {
    $this->phone = $phone;

    return $this;
  }


  public function getAvatar()
  {
    return $this->avatar;
  }


  public function setAvatar()
  {
    $this->avatar = $this->guardarAvatar('avatar', uniqid(), "../images/");

    return $this;
  }

  public function guardarAvatar($avatar, $nImagen,$path)
  {
    if ($_FILES[$avatar]['error'] == UPLOAD_ERR_OK) {
      $ext = pathinfo($_FILES[$avatar]['name'], PATHINFO_EXTENSION);
      move_uploaded_file($_FILES[$avatar]['tmp_name'], $path . $nImagen . "." . $ext);

      return $nImagen . '.' . $ext;

    }
  }

}

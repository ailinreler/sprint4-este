<?php


function revisarMail ($mail)
{
  $recurso = fopen('../usuarios.json', 'r');

  while ( ($linea = fgets($recurso)) !== false) {

    $usuario = json_decode($linea,true);
    if ($usuario['mail'] == $mail)
     {
      return true;

    }
  }

  fclose($recurso);

}

function revisarUsuario($user)
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

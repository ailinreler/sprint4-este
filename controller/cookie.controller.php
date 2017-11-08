<?php

$vencimiento = time() + 60 * 60 * 24 * 365;

if (isset($_POST['mail'])) {

  setcookie('mail', $_POST['mail'], $vencimiento, '/');

}

if (isset($_POST['user'])) {

  setcookie('user', $_POST['user'], $vencimiento, '/');

}

?>

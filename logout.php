<?php
  include_once("funciones.php");
  session_start();
  session_destroy();
  borrarCookies();
  header("Location:home.php");exit;
 ?>

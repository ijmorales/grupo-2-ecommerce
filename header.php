<?php
require_once("funciones.php");
$usuarioLogueado = null;
if(estaLogueado()){
  $usuarioLogueado = traerUsuarioLogueado();
}
?>

<header class="header">
  <div class="upper">
     <!-- Logo caja 1 -->
    <div class="logo">
      <a class="navbar-brand" href="home.php">
        <img src="img/logo.png" alt="" class="logo">
      </a>
    </div>
    <div class="menu-section">
      <div class="user-menu">
        <ul class="user-items">
          <li> <a href="#">Login</a> </li>
          <li> <a href="#">Registro</a> </li>
        </ul>
      </div>
      <div class="categories">
        <ul>
          <li> <a href="#">Kits</a> </li>
          <li> <a href="#">Cámaras</a> </li>
          <li> <a href="#">Alarmas</a> </li>
          <li> <a href="#">Accesorios</a> </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- menues caja 2 -->
  <div class="contact-us">
    <ul class="menu-items">
      <li> <a href="#">Quienes somos</a> </li>
      <li> <a href="#">Servicio tecnico</a> </li>
      <li> <a href="#">Monitoreo</a> </li>
      <li> <a href="#">Llamenos 4158-5451</a> </li>
    </ul>
    <ul class="social">
      <li> <a href="#"><i class="fab fa-linkedin"></i></a> </li>
      <li> <a href="#"><i class="fab fa-facebook-square"></i> </a> </li>
      <li> <a href="#"><i class="fab fa-instagram"></i></a> </li>
    </ul>
  </div>

</header>

<?php
session_start();
if ($_SESSION["id_member"] == "" || $_SESSION["name_member"] == null) {
  header("Location: http://localhost/guatelibro/ver/login");
}
echo '
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="http://localhost/guatelibro/assets/css/style.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://localhost/guatelibro/assets/css/fontawesome-free/css/all.min.css">
  <!-- Sweet Alert -->
  <link rel="stylesheet" href="http://localhost/guatelibro/assets/css/sweetAlert/sweetalert2.min.css">
  <!-- Estilo CSS Propio -->
  <link rel="stylesheet" href="http://localhost/guatelibro/assets/css/main.css">
  <link rel="stylesheet" href="http://localhost/guatelibro/assets/css/mainClient.css">
</head>
<body>
  <!-- <div class="wrapper"> -->
  <div class="navbar">
    <div class="navbar_left">
      <div class="brand-navbar">
        <img src="http://localhost/guatelibro/assets/img/logo-admin.png" alt="">
        <a href="#">Guatelibro</a>
      </div>
    </div>
    <div class="navbar_left">
      <a href="http://localhost/guatelibro/ver/bibliotecaDigital" class="link_page active-link ">Libros</a>
      <a href="http://localhost/guatelibro/ver/libro" class="link_page">Mi Biblioteca</a>
    </div>
    <div class="navbar_right">

      <div class="profile">
        <div class="icon_wrap">
          <img src="http://localhost/guatelibro/assets/img/members/' . $_SESSION['photo'] . '" alt="profile_pic">
          <span class="name">' . $_SESSION['name_member'] . '</span>
          <i class="fas fa-chevron-down"></i>
        </div>

        <div class="profile_dd">
          <ul class="profile_ul">
            <li class="profile_li"><a class="profile letra" href=""><span class="picon"><i class="fas fa-user-alt"></i>
                </span>Perfil</a>
              <a href="http://localhost/guatelibro/ver/perfil">
                <div class="btn">Mi Perfil</div>
              </a>
            </li>
            <li><a class="address letra" href="http://localhost/guatelibro/ver/membresia"><span class="picon"><i class="fas fa-crown"></i></i></span>Membresias</a></li>
            <li><a class="logout letra" href="http://localhost/guatelibro/Cerrar_session/cerrar"><span class="picon"><i class="fas fa-sign-out-alt"></i></span>Salir</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  ';

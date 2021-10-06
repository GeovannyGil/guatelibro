<?php
session_start();
if ($_SESSION["id_member"] == "" || $_SESSION["name_member"] == null) {
  header("Location: http://localhost/guatelibro/ver/login");
}

if ($_SESSION['rol'] == "Particular" || $_SESSION['rol'] == "Alumno" || $_SESSION['rol'] == "Profesor") {
  header("Location: http://localhost/guatelibro/ver/bibliotecaDigital");
}
echo '<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://localhost/guatelibro/assets/css/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="http://localhost/guatelibro/assets/css/adminlte.min.css">
  <!-- Sweet Alert -->
  <link rel="stylesheet" href="http://localhost/guatelibro/assets/css/sweetAlert/sweetalert2.min.css">
  <!-- Estilo CSS Propio -->
  <link rel="stylesheet" href="http://localhost/guatelibro/assets/css/main.css">
</head>

<body class="hold-transition sidebar-mini sidebar-collapse layout-navbar-fixed">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <!--         <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form
          </div>
        </li> -->

        <!-- Notifications Dropdown Menu -->
        <!-- <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">2</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notificaciones</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">Ver todas las notificaciones</a>
          </div>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="http://localhost/guatelibro/Cerrar_session/cerrar" role="button">
            <i class="fas fa-sign-out-alt"></i>
          </a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li> -->
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="http://localhost/guatelibro/assets/img/logo-admin.png" alt="Guatelibro Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">Guatelibro Admin</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="http://localhost/guatelibro/assets/img/members/' . $_SESSION['photo'] . '" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">' . $_SESSION['name_member'] .
  '</a>
          </div>
        </div>
        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Buscar" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                                     with font-awesome or any other icon font library -->
          <li class="nav-item">
              <a href="http://localhost/guatelibro/ver/dashboard" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Dashboard
                </p>
              </a>
        </li>
        ';
$permisos = json_decode($_SESSION['permisos']);
foreach ($permisos as $permiso) :
  if ($permiso == "categorias") {
    echo '<li class="nav-item">
              <a href="http://localhost/guatelibro/ver/categorias" class="nav-link">
                <i class="nav-icon fas fa-tags"></i>
                <p>
                  Categorias
                </p>
              </a>
        </li>';
  }
  if ($permiso == "rol") {
    echo ' <li class="nav-item">
              <a href="http://localhost/guatelibro/ver/rol" class="nav-link">
                <i class="nav-icon fas fa-user-lock"></i>
                <p>
                  Rol
                </p>
              </a>
            </li>';
  }

  if ($permiso == "productos") {
    echo '<li class="nav-item">
              <a href="http://localhost/guatelibro/ver/productos" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Productos
                </p>
              </a>
            </li>';
  }

  if ($permiso == "miembros") {
    echo '  <li class="nav-item">
              <a href="http://localhost/guatelibro/ver/miembros" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Miembros
                </p>
              </a>
            </li>';
  }

  if ($permiso == "libreria_personal") {
    echo '<li class="nav-item">
              <a href="http://localhost/guatelibro/ver/libreria_personal" class="nav-link">
                <i class="nav-icon fas fa-book-reader"></i>
                <p>
                  Libreria Personal
                </p>
              </a>
            </li>';
  }

  if ($permiso == "membresias") {
    echo ' <li class="nav-item">
              <a href="http://localhost/guatelibro/ver/membresias" class="nav-link">
                <i class="nav-icon fas fa-crown"></i>
                <p>
                  Membresias
                </p>
              </a>
            </li>';
  }

  if ($permiso == "suscripciones") {
    echo '<li class="nav-item">
              <a href="http://localhost/guatelibro/ver/suscripciones" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Suscripciones
                </p>
              </a>
            </li>';
  }

  if ($permiso == "pagos") {
    echo
    '<li class="nav-item">
              <a href="http://localhost/guatelibro/ver/pagos" class="nav-link">
                <i class="nav-icon fas fa-money-check-alt"></i>
                <p>
                  Pagos
                </p>
              </a>
            </li>';
  }


endforeach;

echo ' <li class="nav-item">
              <a href="http://localhost/guatelibro/ver/bibliotecaDigital" class="nav-link">
                <i class="nav-icon fas fa-street-view "></i>
                <p>
                  Vista cliente
                </p>
              </a>
      </li>
      </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">';

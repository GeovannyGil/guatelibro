<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" type="image/jpg" href="http://localhost/guatelibro/assets/img/logo-admin.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="http://localhost/guatelibro/assets/css/main.css">
  <link rel="stylesheet" href="http://localhost/guatelibro/assets/css/login.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://localhost/guatelibro/assets/css/fontawesome-free/css/all.min.css">
  <!-- Sweet Alert -->
  <link rel="stylesheet" href="http://localhost/guatelibro/assets/css/sweetAlert/sweetalert2.min.css">
  <title>GUATELIBRO S.A</title>
</head>

<body>
  <div class="container" id="container">
    <div class="form-container sign-up-container">
      <form action="#" id="formRegister">
        <h1>Crear una cuenta</h1>
        <input type="text" name="name" id="name" placeholder="Nombre: " />
        <input type="text" name="surname" id="surname" placeholder="Apellido: " />
        <input type="email" name="email_memberR" id="email_memberR" placeholder="Correo" />
        <input type="password" name="passwordR" id="passwordR" placeholder="Contraseña" />
        <?php
        $Cargar = new Cargar();
        $Cargar->selectRolRegister();
        ?>
        <button id="register_member">Registrarse</button>
      </form>
    </div>
    <div class="form-container sign-in-container">
      <form action="#" id="formLogin">
        <h1>Ya tengo una cuenta</h1>
        <input type="email" placeholder="Correo" name="email_member" id="email_member" />
        <input type="password" placeholder="Contraseña" id="password_member" name="password_member" />
        <!-- <a href=" #">Olvido su contraseña?</a> -->
        <button id="login_member">Iniciar Sesion</button>
      </form>
    </div>
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1>GUATELIBRO</h1>
          <p>Accede a miles de libros de toda la comunidad y comparte tus propios libros</p>
          <button class="ghost" id="signIn">Ya tengo una cuenta</button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1>GUATELIBRO</h1>
          <p>Bienvenido a la biblioteca digital preferida por todos los guatemaltecos</p>
          <button class="ghost" id="signUp">Registrarme</button>
        </div>
      </div>
    </div>
  </div>

  <!-- <footer>
    <p>
      Creador <i class="fa fa-heart"></i> por
      <a target="_blank" href="https://florin-pop.com">Geovanny Gil</a> y
      <a target="_blank" href="https://www.florin-pop.com/blog/2019/03/double-slider-sign-in-up-form/">Angel Teret</a>.
    </p>
  </footer> -->
  <!-- jQuery -->
  <script src="http://localhost/guatelibro/assets/js/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="http://localhost/guatelibro/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="http://localhost/guatelibro/assets/js/sweetAlert/sweetalert2.all.min.js"></script>
  <script src="http://localhost/guatelibro/assets/js/login.js"></script>
</body>

</html>
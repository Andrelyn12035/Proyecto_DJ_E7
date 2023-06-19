<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Iniciar sesión</title>
    <link rel="icon" href="../img/icono.png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="../css/style.min.css" rel="stylesheet">
    <style>
        html, body, header, .view {
        height: 100%;
        }
        @media (max-width: 740px) {
          html, body, header, .view {
            height: 100%;
          }
        }
        @media (min-width: 800px) and (max-width: 850px) {
          html, body, header, .view {
            height: 100%;
          }
        }
        @media (min-width: 800px) and (max-width: 850px) {
          .navbar:not(.top-nav-collapse) {
            background: #1C2331!important;
          }
        }
        main{
          height: 100%;
        }
      </style>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
      <div class="container">
        <!-- Brand -->
        <a class="navbar-brand" href="../index.html">
          <img src="../img/logo.png" style="height: 35px;"><strong>RHM</strong>
        </a>
        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="../index.html" target="_self">Inicio
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../form.html" target="_self">Contratación</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="comprobante.php" target="_self">Comprobante</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#" target="_self">Administrador</a>
            </li>
          </ul>
          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item">
              <a href="../index.html" class="nav-link border border-light rounded">
                <i class="fas fa-music mr-2"></i>RhythmMakers
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- /.Navbar -->
    <main style="background:linear-gradient(rgba(1, 37, 83, 0.6), rgba(42, 41, 49, 0.6));">
      <div style="width: 100%; max-width: 330px; padding: 15px; margin: auto;">
        <div class="card ml-n5" style="width: 132%; margin-top: 5rem; margin-bottom: 3.45rem;">
          <div class="card-body">
            <div class="text-center">
              <i class="fas fa-lock text-muted text-center" style="font-size: 5rem; text-align: center;"></i>
            </div>
            <h3 class="text-muted text-center font-weight-bold mt-3">ERROR</h3>
            <h5 class="grey-text text-center mt-4">Acceso a administrador denegado</h5>
            <h6 class="grey-text text-center mt-5 mb-3">El usuario o contraseña ingresados son incorrectos.</h6>
            <a class="btn btn-dark btn-block mt-3 mb-3" href="../login_admin.html" target="_self" role="button">Volver a Intentarlo
              <i class="fas fa-chevron-left ml-2"></i></a>
          </div>
        </div>
      </div>
    </main>
    <footer class="page-footer text-center font-small wow fadeIn">
    <!--Copyright-->
    <div class="footer-copyright py-3">© 2023 Copyright:
        <a href="../index.html" target="_self"> RhythmMakers</a>
    </div>
</footer>

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../js/mdb.min.js"></script>
    <!-- Initializations -->
    
    <script>
      new WOW().init();
    </script>
  </body>
</html>
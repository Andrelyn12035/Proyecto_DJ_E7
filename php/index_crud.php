<?php 
    include("db.php");
    session_start();
	if(isset($_SESSION["usuario"])){
		$usuario = $_SESSION["usuario"];
	}
	else{
    header("Location: ../login_admin.html");
	}
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Menú Administrador</title>
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
        width: 100%;
      }
      @media (min-width: 800px) and (max-width: 850px) {
        .navbar:not(.top-nav-collapse) {
          background: #1C2331!important;
        }
      }
      @media(max-width: 600px) {
        .tarjeta{
          flex-direction: column;
          align-items: center;
        }
        .btn{
          padding: .3rem;
        }
        .card{
          font-size: 9px;
          justify-content: center;
        }
      }
      main{
        height: 100%;
      }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar bg-dark">
      <div class="container">
        <!-- Brand -->
        <a class="navbar-brand" href="#">
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
              <a class="nav-link" href="#" target="_self">Menu Administrador
                <span class="sr-only">(current)</span>
              </a>
            </li>
          </ul>
          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item">
              <a href="logout.php?cerrar=yes" class="nav-link border border-light rounded">
                <i class="fas fa-chevron-left mr-2"></i> Cerrar sesión&nbsp;&nbsp;
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- /.Navbar -->

    <main>
      <h6 class="text-dark m-5">Bienvenido <?php echo $usuario ?></h6>
      <div class="container d-flex justify-content-between align-items-center tarjeta" style="margin-top: 8rem; width: 100%">
        <div class="container w-50 d-flex justify-content-center">
          <a href="../form.html" class="btn btn-success">Crear nuevo evento</a>
        </div>
        <div class="container w-50 d-flex flex-column justify-content-around">
          <div class="card m-2">
            <h5 class="card-header">Folio: ####</h5>
              <div class="card-body">
                <h5 class="card-title">Fecha: #####</h5>
                  <p class="card-text">Datos del evento:</p>
                  <a href="../form.html" class="btn btn-primary">Editar evento</a>
                  <a href="#" class="btn btn-danger">Borrar evento</a>
              </div>
          </div>
          <div class="card m-2">
            <h5 class="card-header">Folio: ####</h5>
              <div class="card-body">
                <h5 class="card-title">Fecha: #####</h5>
                <p class="card-text">Datos del evento:</p>
                <a href="../form.html" class="btn btn-primary">Editar evento</a>
                <a href="#" class="btn btn-danger">Borrar evento</a>
              </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="container-lg my-auto mx-4">
        <div class="" style="margin-top:8rem; ">
          <h3 style="display:inline;" class="ml-5">Cliente</h3>
          <div style="display:inline;" class="ml-5">
            <a  href="../form.html"><button type="button" class="btn btn-primary btn-lg">AGREGAR</button></a>
          </div>
        </div>
      </div>
    </main>
<?php include("footer.php")?>

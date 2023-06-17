<?php
   if (isset($_POST['form'])) {
      $nombre = $_POST['nombre'];
      $a_pat = $_POST['a_paterno'];
      $a_mat = $_POST['a_materno'];
      $curp = $_POST['curp'];
      $correo = $_POST['correo'];
      $calle = $_POST['calle'];
      $num = $_POST['num'];
      $colonia = $_POST['colonia'];
      $codigo = $_POST['codigo'];
      $alc = $_POST['alcaldia'];
      $entidad = $_POST['estado'];
      $lugar = $_POST['lugar'];
      $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : ""; 
      $hora = isset($_POST['hora']) ? $_POST['hora'] : "";
      $evento = $_POST['evento'];
      $desc = $_POST['otra_opc'];
      $menu = $_POST['menu'];
      $personas = $_POST['personas'];
      $folio = $curp.$lugar.$fecha.$hora;
   }
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Contratación</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="../css/style.min.css" rel="stylesheet">
    
    <!-- datepicker styles -->
    <style type="text/css">
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
    </style>
    
<script>
   function goBack() {
      window.history.back();
   }
</script>
  </head>

  <body>
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
      <div class="container">
        <!-- Brand -->
        <a class="navbar-brand" href="index.html">
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
            <li class="nav-item active">
              <a class="nav-link" href="../form.html" target="_self">Contratación</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../comprobante.html" target="_self">Comprobante</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index_crud.php" target="_self">Administrador</a>
            </li>
          </ul>
          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item">
              <a href="index.html" class="nav-link border border-light rounded">
                <i class="fas fa-music mr-2"></i>RhythmMakers
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- /.Navbar -->
  
    <!-- Full Page Intro -->
    <main style="background-image: url('../img/form.jpg'); background-repeat:no-repeat; background-size: cover;">
      <!-- Mask & flexbox options-->
      <div class="mask rgba-black-light justify-content-center align-items-center">
        <!-- Content -->
        <div class="container"><br><br><br><br>
          <!--Card-->
          <div class="card" style="width: 60%;">
            <!--Card content-->
            <div class="card-body">
              <!-- Form -->
              <form name="contratacion" action="form.php" id="contratacion" method="POST" class="m-4">
                <!-- Heading -->
                <h3 class="dark-grey-text text-center font-weight-bold">VERIFICAR DATOS</h3>
                <h6 class="dark-grey-text text-center font-weight-bold">Hola <?php echo $nombre;?>, verifica que los datos de tu contratación/reservación que ingresaste sean correctos:</h6>
                <hr>
                <p><span style="font-weight: bold;">Nombre: </span> <?php echo $nombre;?></p>
                <p><span style="font-weight: bold;">Apellido Paterno: </span> <?php echo $a_pat;?></p>
                <p><span style="font-weight: bold;">Apellido Materno: </span> <?php echo $a_mat;?></p>
                <p><span style="font-weight: bold;">CURP: </span> <?php echo $curp;?></p>
                <p><span style="font-weight: bold;">Correo Electrónico: </span> <?php echo $correo;?></p>
                <p><span style="font-weight: bold;">Dirección</span></p>
                <p><span style="font-weight: bold;">Calle: </span> <?php echo $calle;?></p>
                <p><span style="font-weight: bold;">Número: </span> <?php echo $num;?>p>
                <p><span style="font-weight: bold;">Colonia: </span> <?php echo $colonia;?></p>
                <p><span style="font-weight: bold;">Código Postal: </span> <?php echo $codigo;?></p>
                <p><span style="font-weight: bold;">Alcaldía o Municipio: </span> <?php echo $alc;?></p>
                <p><span style="font-weight: bold;">Entidad Federativa: </span> <?php echo $entidad;?></p>
                <p><span style="font-weight: bold;">Sede del Evento: </span> <?php echo $lugar;?></p>
                <p><span style="font-weight: bold;">Fecha: </span> <?php echo $fecha;?></p>
                <p><span style="font-weight: bold;">Horario: </span> <?php echo $hora;?></p>
                <p><span style="font-weight: bold;">Evento: </span> <?php echo $evento;?></p>
                <p><span style="font-weight: bold;">Menú: </span> <?php echo $menu;?></p>
                <p><span style="font-weight: bold;">Número de personas: </span> <?php echo $personas;?></p>
                <p><span style="font-weight: bold;">Folio: </span> <?php echo $folio;?></p>
                <div class="text-center">
                  <button class="btn btn-dark" type="button" onclick=""><i class="fas fa-chevron-left prefix mr-2"></i>Modificar Datos</button>
                  <button type="submit" class="btn btn-dark">
                    <i class="fas fa-paper-plane prefix mr-2"></i>Aceptar y Enviar
                  </button>
                </div>
              </form>
            </div>
          </div><br>
          <!--/.Card-->                
        </div>
        <!-- Content -->
      </div>
      <!-- Mask & flexbox options-->
    </main>
    <!-- Full Page Intro -->

    <!--Footer-->
    <footer class="page-footer text-center font-small wow fadeIn">
      <!--Call to action-->
      <div class="pt-4 mb-4">
        <a class="btn btn-outline-white" href="index.html" target="_self" role="button">Ven y Conócenos
          <i class="fas fa-users ml-2"></i>
        </a>
        <a class="btn btn-outline-white" href="comprobante.html" target="_self" role="button">Recuperar Comprobante
          <i class="fas fa-file-pdf ml-2"></i>
        </a>
      </div>
      
      <!--Copyright-->
      <div class="footer-copyright py-3">© 2023 Copyright:
        <a href="index.html" target="_self"> RhythmMakers</a>
      </div>
      <!--/.Copyright-->
    </footer>
    <!--/.Footer-->

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js" integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/locales/bootstrap-datepicker.es.min.js" integrity="sha512-5pjEAV8mgR98bRTcqwZ3An0MYSOleV04mwwYj2yw+7PBhFVf/0KcE+NEox0XrFiU5+x5t5qidmo5MgBkDD9hEw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script type="text/javascript" src="../js/update.js"></script>
     <!-- Bootstrap JS -->
    <!-- Bootstrap Datepicker JS -->
    <script type="text/javascript">
      // Animations initialization
      $('.input-group.date').datepicker({
          language: "es",
          daysOfWeekDisabled: "1,2,3,4",
          startDate: "+0d",
          format: "dd/mm/yyyy"
      });
      new WOW().init();
    </script>
  </body>
</html>
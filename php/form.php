<?php
   include("db.php");
  /* if (isset($_GET)) {
      header("location: ../index.html");
   }*/
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

      $sql = "INSERT INTO evento(folio, sede, fecha, tipo, menu, no_personas, nombre, a_paterno, a_materno, curp, correo, calle, numero, colonia, cp, alcaldia, entidad, hora) VALUES ('$folio', '$lugar', STR_TO_DATE('$fecha', '%d/%m/%Y') , '$evento', '$menu', '$personas', '$nombre', '$a_pat', '$a_mat', '$curp', '$correo', '$calle', '$num', '$colonia', '$codigo', '$alc', '$entidad', '$hora')";
      $res = mysqli_query($conexion, $sql);
      if (!$res) {
         die("Error en query");
      }
   }
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Comprobante</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="../css/style.min.css" rel="stylesheet">
      <style>
        .form-comp {
          width: 100%;
          max-width: 600px;
          padding: 15px;
          margin: auto;
        }
        .admin-icon{
          font-size: 4rem;
          text-align: center;
        }
        html, body, header, .view {
        min-height: 100%;
        }
        @media (min-width: 800px) and (max-width: 850px) {
          .navbar:not(.top-nav-collapse) {
            background: #1C2331!important;
          }
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
            <li class="nav-item active">
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

    <!-- Main -->
    <main style="background-image: url('../img/index.jpg'); background-repeat:no-repeat; background-size: cover;">
      <div class="my-auto">
      <form name="pdf" action="fpdf/generar_pdf.php" id="generar" method="POST" class="form-comp">
          <div class="card" style="margin-top: 4.1rem;">
            <div class="card-body">
              <div class="text-center">
                <i class="fas fa-id-card text-muted text-center admin-icon"></i>
              </div>
              <h3 class="text-muted text-center font-weight-bold mt-3">Tus datos fueron guardador correctamente</h3>
              <h6 class="text-muted text-center mt-3 mb-5">Para recuperar el comprobante de tu evento puedes hacerlo ahora mismo o en otra ocasion a traves de la pestaña "Comprobante"</h6>
              <input type="text" style="display:none;" name="folio" value="<?php echo $folio; ?>"> </input>
              <div class="text-center mt-4 mb-3">
                  <button type='submit' name='generar' id='btnYes' class='btn btn-dark'>GENERAR PDF</button>
              </div>
              
            </div>
          </div>
        </form>
      </div>
    </main>
    <!-- /.Main -->
    
    <!--Footer-->
    <footer class="page-footer text-center font-small wow fadeIn">
        <!--Call to action-->
      <div class="pt-4 mb-4">
        <a class="btn btn-outline-white" href="index.html" target="_self" role="button">Ven y Conócenos
          <i class="fas fa-users ml-2"></i>
        </a>
        <a class="btn btn-outline-white" href="form.html" target="_self" role="button">Contratar Servicio
            <i class="fas fa-pen ml-2"></i>
        </a>
      </div>
      <!--Copyright-->
      <div class="footer-copyright py-3">© 2023 Copyright:
        <a href="index.html" target="_self"> RhythmMakers</a>
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
    <script type="text/javascript">
      // Animations initialization
      new WOW().init();
    </script>
  </body>
</html>


<script>
   function goBack() {
      window.history.back();
   }
</script>
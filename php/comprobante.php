<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" href="img/icono.png">
    <title>Comprobante</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="../css/style.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css" integrity="sha512-34s5cpvaNG3BknEWSuOncX28vz97bRI59UnVtEEpFX536A7BtZSJHsDyFoCl8S7Dt2TPzcrCEoHBGeM4SUBDBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.standalone.min.css" integrity="sha512-D5/oUZrMTZE/y4ldsD6UOeuPR4lwjLnfNMWkjC0pffPTCVlqzcHTNvkn3dhL7C0gYifHQJAIrRTASbMvLmpEug==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker3.min.css" integrity="sha512-aQb0/doxDGrw/OC7drNaJQkIKFu6eSWnVMAwPN64p6sZKeJ4QCDYL42Rumw2ZtL8DB9f66q4CnLIUnAw28dEbg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker3.standalone.min.css" integrity="sha512-t+00JqxGbnKSfg/4We7ulJjd3fGJWsleNNBSXRk9/3417ojFqSmkBfAJ/3+zpTFfGNZyKxPVGwWvaRuGdtpEEA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
        height: 100%;
        }
        @media (min-width: 800px) and (max-width: 850px) {
          .navbar:not(.top-nav-collapse) {
            background: #1C2331!important;
          }
        }

        td{
        color:darkblue;
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
              <a class="nav-link" href="#" target="_self">Comprobante</a>
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
        <form action="fpdf/generar_pdf.php" method="POST" name="comprobante" class="form-comp">
          <div class="card" style="margin-top: 4.1rem;">
            <div class="card-body">
              <div class="text-center">
                <i class="fas fa-id-card text-muted text-center admin-icon"></i>
              </div>
              <h3 class="text-muted text-center font-weight-bold mt-3">Recuperar Comprobante</h3>
              <h6 class="text-muted text-center mt-3 mb-5">Para recuperar el comprobante de tu evento es necesario verificar los siguientes datos.</h6>
              <div class="mt-4">
              <?php if (isset($_SESSION['comp'])) { ?>
              <div class="alert alert-primary alert-dismissible fade show w-100" role="alert">
                <?= $_SESSION['comp']?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <?php unset($_SESSION['comp']); } ?>
                <i class="fas fa-id-badge prefix grey-text"></i>
                <label for="curp" class="grey-text ml-2"> CURP</label>
                <input type="text" id="curp" name="curp" class="form-control font-smaller" placeholder="Ingresar CURP" required>
              </div>
              <div class="mt-4">
                <i class="fas fa-calendar prefix grey-text"></i>
                <label for="fecha">Fecha</label><br><br>
                <!-- Date Picker -->
                <div class="input-group date">
                  <input type="text" id="fecha" name="fecha" class="form-control" required><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                </div>
              </div>
              <div class="mt-4">
                  <i class="fas fa-clock prefix grey-text"></i>
                  <label for="horario"> Horario</label><br><br>
                  <select class="custom-select mr-sm-2" name="hora" id="horario" required disabled>

                  </select>
              </div>
              <div class="mt-4">
                <i class="fas fa-map-marked-alt prefix grey-text"></i>
                <label for="lugar" class="grey-text ml-2 mb-0">Sede de Evento</label><br><br>
                <select class="custom-select mr-sm-2 mt-0" id="lugar" name="lugar" required >
                  <option hidden disabled selected value> Selecciona un lugar </option>
                  <option value="S1">Gran Salón del Valle</option>
                  <option value="S2">Lion's Palace</option>
                  <option value="J1">Jardín Santa Fe</option>
                </select>
              </div>
              <div class="text-center mt-4 mb-3">
                  <button class="btn btn-dark" type="reset">Limpiar</button>
                  <button class="btn btn-dark" name="generar" style="display: none;" id="comp" type="submit"></button>
                  <input type="text" style="display:none;" name="folio" id="fol"> </input>
                  <button type="button" onclick="validarCo()" class="btn btn-dark">
                    <i class="fas fa-paper-plane prefix mr-2"></i>Enviar
                  </button>
              </div>
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="alert alert-danger text-center" role="alert">
                    El campo <span id="alerta" class="font-weight-bold"></span> es incorrecto
                  </div>
                </div>
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
        <a class="btn btn-outline-white" href="../index.html" target="_self" role="button">Ven y Conócenos
          <i class="fas fa-users ml-2"></i>
        </a>
        <a class="btn btn-outline-white" href="../form.html" target="_self" role="button">Contratar Servicio
            <i class="fas fa-pen ml-2"></i>
        </a>
      </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js" integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/locales/bootstrap-datepicker.es.min.js" integrity="sha512-5pjEAV8mgR98bRTcqwZ3An0MYSOleV04mwwYj2yw+7PBhFVf/0KcE+NEox0XrFiU5+x5t5qidmo5MgBkDD9hEw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript" src="../js/validarComprobante.js"></script>
    <!-- Initializations -->
    <script type="text/javascript">
      // Animations initialization
      $('.input-group.date').datepicker({
          language: "es",
          daysOfWeekDisabled: "1,2,3,4",
          format: "dd/mm/yyyy"
      });

      new WOW().init();
    </script>
  </body>
</html>
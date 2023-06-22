<?php
   header("Access-Control-Allow-Origin: *");
   header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
   header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
   header("Allow: GET, POST, OPTIONS, PUT, DELETE");

   include("db.php");
   session_start();
   if(isset($_SESSION["usuario"])){
		$usuario = $_SESSION["usuario"];
	}
	else{
    header("Location: ../login_admin.html");
	}

   $id = "";
   $nombre = "";
   $a_pat = "";
   $a_mat = "";
   $curp = "";
   $correo = "";
   $calle = "";
   $num = "";
   $colonia = "";
   $codigo = "";
   $alc = "";
   $entidad = "";
   $lugar = "";
   $fecha = "";
   $hora = "";
   $evento = "";
   $desc = "";
   $menu = "";
   $personas = "";


   if  (isset($_GET['id'])) {
      $id = $_GET['id'];
      $query = "SELECT *, DATE_FORMAT(fecha, '%d/%m/%Y') as fec FROM evento WHERE id_evento=$id";
      $result = mysqli_query($conexion, $query);
      if (mysqli_num_rows($result) == 1) {
         $row = mysqli_fetch_array($result);
         $nombre = $row['nombre'];
         $a_pat = $row['a_paterno'];
         $a_mat = $row['a_materno'];
         $curp = $row['curp'];
         $correo = $row['correo'];
         $calle = $row['calle'];
         $num = $row['numero'];
         $colonia = $row['colonia'];
         $codigo = $row['cp'];
         $alc = $row['alcaldia'];
         $entidad = $row['entidad'];
         $lugar = $row['sede'];
         $fecha = $row['fec'];
         $hora = $row['hora'];
         $evento = $row['tipo'];
         $menu = $row['menu'];
         $personas = $row['no_personas'];
      }
      }
   
      if (isset($_POST['update'])) {
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
         $fecha = $_POST['fecha'];
         $hora = $_POST['hora'];
         $evento = $_POST['evento'];
         $menu = $_POST['menu'];
         $personas = $_POST['personas'];
         $id = $_POST['id'];
         $folio = $curp.$lugar.$fecha.$hora;

         $sql = "UPDATE evento set folio = '$folio',sede = '$lugar',fecha = STR_TO_DATE('$fecha', '%d/%m/%Y'),tipo = '$evento',menu = '$menu',no_personas ='$personas',nombre ='$nombre',a_paterno = '$a_pat',a_materno = '$a_mat',curp = '$curp',correo = '$correo',calle = '$calle',numero = '$num',colonia = '$colonia',cp = '$codigo',alcaldia = '$alc',entidad = '$entidad',hora = '$hora' WHERE id_evento = $id";

         $res = mysqli_query($conexion, $sql);
         if (!$res) {
            die("Error en query");
         }
         $_SESSION['message'] = 'Los datos del evento han sido actualizados.';
         $_SESSION['type'] = 'primary';
         header("Location: index_crud.php");
      }
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Actualizar</title>
    <link rel="icon" href="../img/icono.png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="../css/style.min.css" rel="stylesheet">
    <!-- picker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css" integrity="sha512-34s5cpvaNG3BknEWSuOncX28vz97bRI59UnVtEEpFX536A7BtZSJHsDyFoCl8S7Dt2TPzcrCEoHBGeM4SUBDBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.standalone.min.css" integrity="sha512-D5/oUZrMTZE/y4ldsD6UOeuPR4lwjLnfNMWkjC0pffPTCVlqzcHTNvkn3dhL7C0gYifHQJAIrRTASbMvLmpEug==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker3.min.css" integrity="sha512-aQb0/doxDGrw/OC7drNaJQkIKFu6eSWnVMAwPN64p6sZKeJ4QCDYL42Rumw2ZtL8DB9f66q4CnLIUnAw28dEbg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker3.standalone.min.css" integrity="sha512-t+00JqxGbnKSfg/4We7ulJjd3fGJWsleNNBSXRk9/3417ojFqSmkBfAJ/3+zpTFfGNZyKxPVGwWvaRuGdtpEEA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
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
      @media (min-width: 768px) and (max-width: 1200px) {

        .form-row{
          display: flex;
          flex-direction: column;
          justify-content: space-around;
        }
        .form-row .col-md-6, .mr-4{
          max-width: 100%;
        }
      }
      @media (max-width: 1200px) {
        .md-form label{
          font-size: .8rem;
        }
        .md-form{
          margin-bottom: 0px;
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
              <a class="nav-link" href="index_crud.php" target="_self">Menu Administrador
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
  
    <!-- Full Page Intro -->
    <main style="background-image: url('../img/form.jpg'); background-repeat:no-repeat; background-size: cover;">
      <!-- Mask & flexbox options-->
      <div class="mask rgba-black-light justify-content-center align-items-center">
        <!-- Content -->
        <div class="container"><br><br><br><br>
          <!--Card-->
          <div class="card">
            <!--Card content-->
            <div class="card-body">
              <!-- Form -->
              <form name="contratacion" action="editar.php" id="contratacion" method="POST" class="m-4">
                <!-- Heading -->
                <h3 class="dark-grey-text text-center font-weight-bold">Actualizar Evento</h3>
                <!-- Grid row -->
                <div class="row wow fadeIn mt-4 d-flex justify-content-around">
                  <!-- Grid column -->
                  <div class="col-md-5 col-xl-6">
                    <h6 class="grey-text text-center"><strong>CONTACTO</strong></h6>
                    <hr>
                    <fieldset>
                      <div class="form-row mt-3">
                        <div class="form-group col-md-12">
                          <div class="md-form m-0">
                            <i class="fas fa-user prefix grey-text"></i>
                            <input type="text" name="nombre" id="nombre"  class="form-control h" required>
                            <label for="nombre"> Nombre(s)</label>
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <div class="md-form m-0 mr-4">
                            <input type="text" id="a_paterno" name="a_paterno" class="form-control h" required>
                            <label for="a_paterno">Apellido paterno</label>
                          </div>
                        </div>
                        <div class="form-group col-md-6">
                          <div class="md-form m-0">
                            <input type="text" id="a_materno" name="a_materno" class="form-control h" required>
                            <label for="a_materno"> Apellido materno</label>
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-12">
                          <div class="md-form  m-0">
                            <i class="fas fa-id-badge prefix grey-text"></i>
                            <input type="text" id="CURP" name="curp" class="form-control h" required>
                            <label for="CURP"> CURP</label>
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-12">
                          <div class="md-form m-0">
                            <i class="fas fa-envelope prefix grey-text"></i>
                            <input type="email" name="correo" id="correo" class="form-control h" required>
                            <label for="correo"> Correo electrónico</label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="md-form m-0">
                          <i class="fas fa-map-marker-alt prefix grey-text"></i>
                          <label> Dirección</label>
                        </div>
                      </div>
                      <br>
                      <div class="form-row mt-3">
                        <div class="form-group col-md-6">
                          <div class="md-form mr-4 m-0">
                            <input type="text" name="calle" id="calle" class="form-control h" required>
                            <label for="calle">Calle</label>
                          </div>
                        </div>
                        <div class="form-group col-md-6">
                          <div class="md-form m-0">
                            <input type="number" name="num" id="num" class="form-control h" >
                            <label for="num"> Número</label>
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <div class="md-form mr-4 m-0">
                            <input type="text" name="colonia" id="colonia" class="form-control h" required>
                            <label for="colonia"> Colonia</label>
                          </div>
                        </div>
                        <div class="form-group col-md-6">
                          <div class="md-form m-0">
                            <input type="number" maxlength="5" name="codigo" id="codigo" class="form-control h" required>
                            <label for="codigo"> Código Postal</label>
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <div class="md-form mr-4 m-0">
                            <label for="alcaldia"> Alcaldía o municipio</label><br><br>
                            <select class="custom-select mr-sm-2" name="alcaldia" id="alcaldia" required>
                              <option value="Álvaro Obregón" selected>Álvaro Obregón</option>
                              <option value="Azcapotzalco">Azcapotzalco</option>
                              <option value="Benito Juárez">Benito Juárez</option>
                              <option value="Coyoacán">Coyoacán</option>
                              <option value="Cuajimalpa de Morelos">Cuajimalpa de Morelos</option>
                              <option value="Cuauhtémoc">Cuauhtémoc</option>
                              <option value="Gustavo A. Madero">Gustavo A. Madero</option>
                              <option value="Iztacalco">Iztacalco</option>
                              <option value="Iztapalapa">Iztapalapa</option>
                              <option value="La Magdalena Contreras">La Magdalena Contreras</option>
                              <option value="Miguel Hidalgo">Miguel Hidalgo</option>
                              <option value="Milpa Alta">Milpa Alta</option>
                              <option value="Tláhuac">Tláhuac</option>
                              <option value="Tlalpan">Tlalpan</option>
                              <option value="Venustiano Carranza">Venustiano Carranza</option>
                              <option value="Xochimilco">Xochimilco</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group col-md-6">
                          <div class="md-form m-0">
                            <label for="entidad"> Entidad federativa</label><br><br>
                            <select class="custom-select mr-sm-2" name="estado" id="entidad" required>
                              <option value="Aguascalientes">Aguascalientes</option>
                              <option value="Baja California">Baja California</option>
                              <option value="Baja California Sur">Baja California Sur</option>
                              <option value="Campeche">Campeche</option>
                              <option value="Chiapas">Chiapas</option>
                              <option value="Chihuahua">Chihuahua</option>
                              <option value="CDMX" selected>Ciudad de México</option>
                              <option value="Coahuila">Coahuila</option>
                              <option value="Colima">Colima</option>
                              <option value="Durango">Durango</option>
                              <option value="Estado de México">Estado de México</option>
                              <option value="Guanajuato">Guanajuato</option>
                              <option value="Guerrero">Guerrero</option>
                              <option value="Hidalgo">Hidalgo</option>
                              <option value="Jalisco">Jalisco</option>
                              <option value="Michoacán">Michoacán</option>
                              <option value="Morelos">Morelos</option>
                              <option value="Nayarit">Nayarit</option>
                              <option value="Nuevo León">Nuevo León</option>
                              <option value="Oaxaca">Oaxaca</option>
                              <option value="Puebla">Puebla</option>
                              <option value="Querétaro">Querétaro</option>
                              <option value="Quintana Roo">Quintana Roo</option>
                              <option value="San Luis Potosí">San Luis Potosí</option>
                              <option value="Sinaloa">Sinaloa</option>
                              <option value="Sonora">Sonora</option>
                              <option value="Tabasco">Tabasco</option>
                              <option value="Tamaulipas">Tamaulipas</option>
                              <option value="Tlaxcala">Tlaxcala</option>
                              <option value="Veracruz">Veracruz</option>
                              <option value="Yucatán">Yucatán</option>
                              <option value="Zacatecas">Zacatecas</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-12">
                          <div class="md-form  m-0">
                            <div class="form-group col-md-12 mt-4" id="otro_estado" style="display: none;">
                              <div class="md-form ml-n2  m-0">
                                <input type="text" id="col" name="otro" class="form-control h" >
                                <label for="col">Especificar Municipio</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </fieldset>
                  </div> 
                  
                  <!-- /.Grid column -->
                  
                  <!-- Grid column -->
                  <div class="col-md-5 col-xl-6 mb-4 ">
                    <h6 class="grey-text text-center"><strong>EVENTO</strong></h6>
                    <hr>
                    <fieldset>
                      <div class="form-row mt-3">
                        <div class="form-group col-md-12">
                          <div class="md-form m-0">
                            <i class="fas fa-map-marked-alt prefix grey-text"></i>
                            <label for="lugar"> Sede del evento</label><br><br>
                            <select class="custom-select mr-sm-2" id="lugar" name="lugar" required >
                              <option hidden disabled selected value> Selecciona un lugar </option>
                              <option value="S1">Gran Salón del Valle</option>
                              <option value="S2">Lion's Palace</option>
                              <option value="J1">Jardín Santa Fe</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <div class="md-form mr-4 m-0">
                            <i class="fas fa-calendar prefix grey-text"></i>
                            <label for="fecha">Fecha</label><br><br>
                            <!-- Date Picker -->
                            <div class="input-group date">
                              <input type="text" id="fecha" name="fecha" class="form-control" required><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                            </div>
                            <!-- // Date Picker --> 
                          </div>
                        </div>
                        <div class="form-group col-md-6">
                          <div class="md-form m-0">
                            <i class="fas fa-clock prefix grey-text"></i>
                            <label for="horario"> Horario</label><br><br>
                            <select class="custom-select mr-sm-2" name="hora" id="horario" required>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-12">
                          <div class="md-form m-0">
                            <i class="fas fa-music prefix grey-text"></i>
                            <label for="OpcionSeleccionada"> Tipo de evento</label><br><br>
                            <select class="custom-select mr-sm-2" id="OpcionSeleccionada" name="evento" onchange="showTextField(this)" required>
                              <option value="Bautizo" selected>Bautizo</option>
                              <option value="Primera Comunión">Primera Comunión</option>
                              <option value="XV años">XV años</option>
                              <option value="Boda">Boda</option>
                              <option value="Cumpleaños">Cumpleaños</option>
                              <option value="otro">Otro</option>
                            </select>
                          </div>
                          <div class="form-group col-md-12 mt-4" id="contenerdorOtraOpcion" style="display: none;">
                            <div class="md-form ml-n2  m-0">
                              <input type="text" id="otra_opc" name="otra_opc" class="form-control" placeholder="Ingresa los detalles de tu evento">
                              <label for="otra_opc">Especificar evento</label>
                            </div>
                          </div>
                          <script>
                            document.forms["contratacion"].addEventListener("reset", (event) => {
                              var otherOptionContainer = document.getElementById("contenerdorOtraOpcion");
                              var otherOptionInput = document.getElementById("otra_opc");
                              otherOptionContainer.style.display = "none";
                                otherOptionInput.required = false;

                              document.getElementById("otro_estado").style.display = "none";
                              document.getElementById("col").style.display = "none";
                            });
                            function showTextField(selectElement) {
                              var otherOptionContainer = document.getElementById("contenerdorOtraOpcion");
                              var otherOptionInput = document.getElementById("otra_opc");
                              if (selectElement.value === "otro") {
                                otherOptionContainer.style.display = "block";
                                otherOptionInput.required = true;

                                otherOptionInput.name = "evento"
                                otherOptionInput.required = true
                                document.getElementById("OpcionSeleccionada").name = "otra_opc"
                                document.getElementById("OpcionSeleccionada").required = false
                              } else {
                                otherOptionContainer.style.display = "none";
                                otherOptionInput.required = false;

                                otherOptionInput.name = "otra_opc"
                                otherOptionInput.required = false
                                document.getElementById("OpcionSeleccionada").name = "evento"
                                document.getElementById("OpcionSeleccionada").required = true
                              }
                            }
                          </script>
                        </div>
                      </div>
                      <div class="form-row d-flex align-items-end">
                        <div class="form-group col-md-6">
                          <div class="md-form mr-4 m-0">
                            <i class="fas fa-tag prefix grey-text"></i>
                            <label for="menu"> Menú</label><br><br>
                            <select class="custom-select mr-sm-2" name="menu" id="menu" required>
                              <option value="Economico">Menú económico</option>
                              <option value="Completo">Menú completo</option>
                              <option value="Ejecutivo">Menú ejecutivo</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group col-md-6">
                          <div class="md-form m-0">
                            <i class="fas fa-users prefix grey-text"></i>
                            <input type="number" name="personas" id="personas" class="form-control h" required>
                            <label for="personas"> Número de personas</label>
                            <input value="<?php echo $id; ?>" name="id" style="display: none;">
                          </div>
                        </div>
                      </div>
                      <div class="form-group mt-3">
                        <div class="text-center">
                          <button class="btn btn-dark" type="reset"><i class="fas fa-eraser prefix mr-2"></i>Limpiar</button>
                          <button class="btn btn-dark" name="update" style="display: none;" id="fin" type="submit"></button>
                          <button type="button" onclick="val()" class="btn btn-dark">
                            <i class="fas fa-sync prefix mr-2"></i>Actualizar
                          </button>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="alert alert-danger text-center" role="alert">
                              ERROR<br>El campo <span id="alerta" class="font-weight-bold"></span> es incorrecto
                            </div>
                          </div>
                        </div>
                        <!-- Modal -->
                        <!-- Modal -->
                        <div class="modal fade" id="exito" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="alert alert-succes text-center" role="alert">
                              Datos ingresados correctamente
                            </div>
                          </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="confirmar" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h6 class="modal-title text-center" id="staticBackdropLabel">Hola <?php echo($usuario) ?>, verifica que los datos ingresados sean correctos:</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <p><span style="font-weight: bold;">Nombre: </span> <span id="nom"></span></p>
                                <p><span style="font-weight: bold;">Apellido Paterno: </span> <span id="pat"></span></p>
                                <p><span style="font-weight: bold;">Apellido Materno: </span> <span id="mat"></span></p>
                                <p><span style="font-weight: bold;">CURP: </span> <span id="cur"></span></p>
                                <p><span style="font-weight: bold;">Correo Electrónico: </span> <span id="cor"></span></p>
                                <p><span style="font-weight: bold;">Dirección</span></p>
                                <p><span style="font-weight: bold;">Calle: </span> <span id="cal"></span></p>
                                <p><span style="font-weight: bold;">Número: </span> <span id="nu"></span></p>
                                <p><span style="font-weight: bold;">Colonia: </span> <span id="co"></span></p>
                                <p><span style="font-weight: bold;">Código Postal: </span> <span id="c"></span></p>
                                <p><span style="font-weight: bold;">Alcaldía o Municipio: </span> <span id="mu"></span></p>
                                <p><span style="font-weight: bold;">Entidad Federativa: </span> <span id="es"></span></p>
                                <p><span style="font-weight: bold;">Sede del Evento: </span> <span id="sed"></span></p>
                                <p><span style="font-weight: bold;">Fecha: </span> <span id="fec"></span></p>
                                <p><span style="font-weight: bold;">Hora: </span><span id="hor"></span></p>
                                <p><span style="font-weight: bold;">Evento: </span> <span id="des"></span></p>
                                <p><span style="font-weight: bold;">Menú: </span> <span id="men"></span></p>
                                <p><span style="font-weight: bold;">Número de personas: </span> <span id="per"></span></p>
                                <p><span style="font-weight: bold;">Folio: </span> <span id="folio"></span></p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-caution" data-dismiss="modal">Regresar</button>
                                <button type="button" name="form" id="btnYes" class="btn btn-dark">Aceptar y actualizar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Modal -->
                        
                        <!-- Modal -->
                      </div> 
                    </fieldset>
                  </div>
                  <!-- /Grid column -->
                </div>
                <!--Grid row-->   
              </form>
              <!-- /.Form -->
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
    <!--Copyright-->
      <div class="footer-copyright py-3">© 2023 Copyright:
        <a href="../index.html" target="_self"> RhythmMakers</a>
      </div>
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
   <script type="text/javascript">
      $("#entidad").on('change',function(){
        console.log(this.value);
      var otherOptionContainer = document.getElementById("otro_estado");
      var otherOptionInput = document.getElementById("col");
   if (this.value == "CDMX") {
         otherOptionContainer.style.display = "none";
         otherOptionInput.required = false;

         otherOptionInput.name = "otro"
         otherOptionInput.required = false
         document.getElementById("alcaldia").name = "alcaldia"
         document.getElementById("alcaldia").required = true
         document.getElementById("alcaldia").disabled = false
      } else {
         otherOptionContainer.style.display = "block";
         otherOptionInput.required = true;

         otherOptionInput.name = "alcaldia"
         otherOptionInput.required = true
         document.getElementById("alcaldia").name = "otro"
         document.getElementById("alcaldia").required = false
         document.getElementById("alcaldia").disabled = true
      }
    
   
})

      var otherOptionContainer = document.getElementById("otro_estado");
      var otherOptionInput = document.getElementById("col");
      if ("<?php echo $entidad; ?>" == "CDMX") {
         otherOptionContainer.style.display = "none";
         otherOptionInput.required = false;

         otherOptionInput.name = "otro"
         otherOptionInput.required = false
         document.getElementById("alcaldia").value =  "<?php echo $alc; ?>"
         document.getElementById("alcaldia").name = "alcaldia"
         document.getElementById("alcaldia").required = true
         document.getElementById("alcaldia").disabled = false
      } else {
         otherOptionContainer.style.display = "block";
         otherOptionInput.required = true;

         otherOptionInput.name = "alcaldia"
         otherOptionInput.required = true
         otherOptionInput.value = "<?php echo $alc; ?>"
         document.getElementById("alcaldia").name = "otro"
         document.getElementById("alcaldia").required = false
         document.getElementById("alcaldia").disabled = true
      }
      
      var contenedorOtro = document.getElementById("contenerdorOtraOpcion");
      var otraEntrada = document.getElementById("otra_opc");
      if ("<?php echo $evento; ?>" == "Bautizo" || "<?php echo $evento; ?>" == "Primera Comunión" || "<?php echo $evento; ?>" == "XV años" || "<?php echo $evento; ?>" == "Boda" || "<?php echo $evento; ?>" == "Cumpleaños") {  

        contenedorOtro.style.display = "none";
        otraEntrada.required = false;

        otraEntrada.name = "otra_opc"
        otraEntrada.required = false
        document.getElementById("OpcionSeleccionada").value = "<?php echo $evento; ?>"
        document.getElementById("OpcionSeleccionada").name = "evento"
        document.getElementById("OpcionSeleccionada").required = true
        document.getElementById("OpcionSeleccionada").disabled = false

      } else {
      contenedorOtro.style.display = "block";
      otraEntrada.required = true;

      otraEntrada.name = "evento"
      otraEntrada.required = true
      otraEntrada.value = "<?php echo $evento; ?>"
      document.getElementById("OpcionSeleccionada").name = "otra_opc"
      document.getElementById("OpcionSeleccionada").required = false
      document.getElementById("OpcionSeleccionada").value = "otro"
      }


      let fecha = "<?php echo $fecha; ?>"
      document.getElementById("horario").innerHTML = '';
      let dateString = fecha;
      let [day, month, year] = dateString.split('/')
      const fe = new Date(+year, +month - 1, +day)
      date = fe.toLocaleDateString('en-GB');
      console.log(date)
      document.getElementById("fecha").value= date;
      if (fe.getDay() == 0) {
        document.getElementById("horario").innerHTML += '<option value="9">09 - 14 hrs</option>'
      }else if(fe.getDay() == 6){
         if (Object.keys(obj).includes(fecha)) {
            let pos = Object.keys(obj).indexOf(fecha)
            let oc = Object.values(obj)[pos]
            console.log(oc)
            if (oc == 14) {
              document.getElementById("horario").innerHTML += '<option value="21">21 - 02 hrs</option>'
            }else{
            document.getElementById("horario").innerHTML += '<option value="14">14 - 19 hrs</option>'
         }
      }else{
         document.getElementById("horario").innerHTML += '<option value="14">14 - 19 hrs</option>'
         document.getElementById("horario").innerHTML += '<option value="21">21 - 02 hrs</option>'
         }
      }else{
         if (Object.keys(obj).includes(fecha)) {
            let pos = Object.keys(obj).indexOf(fecha)
            let oc = Object.values(obj)[pos]
            console.log(oc)
            if (oc == 12) {
              document.getElementById("horario").innerHTML += '<option value="19">19 - 00 hrs</option>'
            }else{
              document.getElementById("horario").innerHTML += '<option value="12">12 - 17 hrs</option>'
            }
            }else{
              document.getElementById("horario").innerHTML += '<option value="12">12 - 17 hrs</option>'
              document.getElementById("horario").innerHTML += '<option value="19">19 - 00 hrs</option>'
            }
      }
      document.getElementById("horario").disabled = false;

      const $horario = document.querySelector('#horario');
      $horario.value = "<?php echo $hora; ?>"

      const $lugar = document.querySelector('#lugar');
      $lugar.value = "<?php echo $lugar; ?>"
      const $estado = document.querySelector('#entidad');
      $estado.value = "<?php echo $entidad; ?>"
      
      console.log("<?php echo $menu; ?>")
      $estado.value = "<?php echo $entidad; ?>"
      const $menu = document.querySelector('#menu');
      $menu.value = "<?php echo $menu; ?>"
      console.log($menu.value)

      document.getElementById("nombre").value="<?php echo $nombre; ?>"
      document.getElementById("a_paterno").value="<?php echo $a_pat; ?>"
      document.getElementById("a_materno").value="<?php echo $a_mat; ?>"
      document.getElementById("CURP").value="<?php echo $curp; ?>"
      document.getElementById("correo").value="<?php echo $correo; ?>"
      document.getElementById("calle").value="<?php echo $calle; ?>"
      document.getElementById("num").value="<?php echo $num; ?>"
      document.getElementById("colonia").value="<?php echo $colonia; ?>"
      document.getElementById("codigo").value="<?php echo $codigo; ?>"
      document.getElementById("personas").value="<?php echo $personas; ?>"
      $(document).ready(function () {
         $('.h').trigger( "focus" );
      });
   </script>
   
  </body>
</html>
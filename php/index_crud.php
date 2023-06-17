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

      .dtHorizontalVerticalExampleWrapper {
        max-width: 600px;
        margin: 0 auto;
      }
      #dtHorizontalVerticalExample th, td {
        white-space: nowrap;
      }
      table.dataTable thead .sorting:after,
      table.dataTable thead .sorting:before,
      table.dataTable thead .sorting_asc:after,
      table.dataTable thead .sorting_asc:before,
      table.dataTable thead .sorting_asc_disabled:after,
      table.dataTable thead .sorting_asc_disabled:before,
      table.dataTable thead .sorting_desc:after,
      table.dataTable thead .sorting_desc:before,
      table.dataTable thead .sorting_desc_disabled:after,
      table.dataTable thead .sorting_desc_disabled:before {
        bottom: .5em;
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
    <h6 class="text-dark ml-4" style="margin-top:7%;">Bienvenido <?php echo $usuario ?></h6>
        <div class="container mt-5">
        <table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm" cellspacing="0"
    width="75%">
          <thead>
            <tr>
              <th>Folio</th>
              <th>Nombre(s)</th>
              <th>Apellido paterno</th>
              <th>Apellido materno</th>
              <th>CURP</th>
              <th>Correo</th>
              <th>Calle</th>
              <th>Número</th>
              <th>Colonia</th>
              <th>Código postal</th>
              <th>Alcaldía</th>
              <th>Estado</th>
              <th>Lugar</th>
              <th>Fecha</th>
              <th>Hora</th>
              <th>Evento</th>
              <th>Menú</th>
              <th>No. de personas</th>
              <th>Editar</th>
              <th>Eliminar</th>
            </tr>
          </thead>
          <tbody id="tabla">
            
          </tbody>
        </table>
        </div>
      <div class="container">
        <a  href="../form.html"><button type="button"  class="btn btn-primary btn-lg">Agregar evento</button></a>
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
    <script type="text/javascript" src="../js/addons/datatables.min.js"></script>
    <script>
      new WOW().init();
      $(document).ready(function () {
        $('#dtHorizontalVerticalExample').DataTable({
          "scrollX": true,
          "scrollY": true,
          "searching": false,
          "paging": false,
          "bInfo" : false

        });
        $('.dataTables_length').addClass('bs-select');
        tabla()
      });

      function borrar(elemento) {
        let nombre = elemento.getAttribute("name")
        console.log(nombre)
        let data = {
          id: nombre
        }
        fetch('borrar.php', {
          method: 'POST',
          mode: "cors",
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(data)
        }).then()
        .then(result => {
          tabla()
          $('#dtHorizontalVerticalExample').DataTable().columns.adjust()
          })
        .catch(error => {
          console.error('Error:', error);
        });
      }

      function tabla() {
        let currentDate = new Date();
        let dia = new Date(currentDate);
        dia.setDate(currentDate.getDate() - 1);
        let n_dia = dia.toLocaleDateString('en-GB');
        let data = {
          fecha: n_dia
        };
        fetch('tabla.php', {
          method: 'POST',
          body: data,
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(data) 
        }).then(response => response.json())
        .then(result => {
          console.log(result);
          console.log(result.length);
          let tr = ''
          document.getElementById("tabla").innerHTML = tr; 
          result.forEach(element => {
            tr += 
            `
            <tr>
              <td>`+element.folio+`</td>
              <td>`+element.nombre+`</td>
              <td>`+element.a_paterno+`</td>
              <td>`+element.a_materno+`</td>
              <td>`+element.curp+`</td>
              <td>`+element.correo+`</td>
              <td>`+element.calle+`</td>
              <td>`+element.numero+`</td>
              <td>`+element.colonia+`</td>
              <td>`+element.cp+`</td>
              <td>`+element.alcaldia+`</td>
              <td>`+element.entidad+`</td>
              <td>`+element.sede+`</td>
              <td>`+element.fecha+`</td>
              <td>`+element.hora+`</td>
              <td>`+element.tipo+`</td>
              <td>`+element.menu+`</td>
              <td>`+element.no_personas+`</td>
              <td><a href="editar.php?id=`+element.id_evento+`"  class="btn btn-info btn-sm" name="">
                  <i class="fas fa-marker"></i>
                </a>
              </td>
              <td><a onclick="borrar(this)" class="btn btn-danger btn-sm" name="`+element.id_evento+`">
                <i class="far fa-trash-alt"></i>
                </a>
              </td>
            </tr>
            `
          });
          document.getElementById("tabla").innerHTML = tr;
          $('#dtHorizontalVerticalExample').DataTable().columns.adjust()
          })
        .catch(error => {
          console.error('Error:', error);
        });
      }
    </script>
  </body>
</html>

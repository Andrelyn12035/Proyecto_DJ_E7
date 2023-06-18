<?php
   include("db.php");
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

      echo "Nombre: " . $nombre . "<br>";
      echo "Apellido Paterno: " . $a_pat . "<br>";
      echo "Apellido Materno: " . $a_mat . "<br>";
      echo "CURP: " . $curp . "<br>";
      echo "Correo: " . $correo . "<br>";
      echo "Calle: " . $calle . "<br>";
      echo "Número: " . $num . "<br>";
      echo "Colonia: " . $colonia . "<br>";
      echo "Código Postal: " . $codigo . "<br>";
      echo "Alcaldía: " . $alc . "<br>";
      echo "Estado: " . $entidad . "<br>";
      echo "Lugar: " . $lugar . "<br>";
      echo "Fecha: " . $fecha . "<br>";
      echo "Hora: " . $hora . "<br>";
      echo "Evento: " . $evento . "<br>";
      echo "Descripción: " . $desc . "<br>";
      echo "Menú: " . $menu . "<br>";
      echo "Personas: " . $personas . "<br>";

      $sql = "INSERT INTO evento(folio, sede, fecha, tipo, menu, no_personas, nombre, a_paterno, a_materno, curp, correo, calle, numero, colonia, cp, alcaldia, entidad, hora) VALUES ('$folio', '$lugar', STR_TO_DATE('$fecha', '%d/%m/%Y') , '$evento', '$menu', '$personas', '$nombre', '$a_pat', '$a_mat', '$curp', '$correo', '$calle', '$num', '$colonia', '$codigo', '$alc', '$entidad', '$hora')";
      $res = mysqli_query($conexion, $sql);
      if (!$res) {
         die("Error en query");
      }
   }
?>

<div class='modal-footer'>
   <button type='button' class='btn btn-caution' data-dismiss='modal' onclick='goBack()'>Modificar</button>
   <button type='button' name='form' id='btnYes' class='btn btn-dark' onclick="window.open('fpdf/generar_pdf.php', '_blank')">GENERAR PDF</button>

</div>

<script>
   function goBack() {
      window.history.back();
   }
</script>
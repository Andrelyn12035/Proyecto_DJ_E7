<?php
   header("Access-Control-Allow-Origin: *");
   header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
   header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
   header("Allow: GET, POST, OPTIONS, PUT, DELETE");
   
   include("db.php");
   

   if (isset($_POST)) {
      $data = json_decode(file_get_contents('php://input'), true);

      // Access the JavaScript variable sent from the fetch request
      $lugar = $data['lugar'];
      $fecha = $data['fecha'];
      $sql = "SELECT DATE_FORMAT(fecha, '%d/%m/%Y') as fecha, hora FROM evento
      WHERE sede = '$lugar' AND fecha > (STR_TO_DATE('$fecha', '%d/%m/%Y'));";
      $res = mysqli_query($conexion, $sql);

      if (!$res) {
         die("Error en query");
      }
      // Send a response back to JavaScript
      $emparray = array();
      while($row = mysqli_fetch_assoc($res))
      {
         $emparray[] = $row;
      }
      echo json_encode($emparray);
   }

?>
<?php
   include("db.php");
   session_start();
   if(isset($_SESSION["usuario"])){
		$usuario = $_SESSION["usuario"];
	}
	else{
    header("Location: ../login_admin.html");
	}

   if (isset($_POST)){
      $data = json_decode(file_get_contents('php://input'), true);
      $id = $data['id'];
      $query = "DELETE FROM evento WHERE id_evento = $id";
      $result = mysqli_query($conexion, $query);
      if (!$result) {
         die("Error");
      }
      $_SESSION['message'] = 'Los datos del evento han sido eliminados.';
      header("Location: index_crud.php");
   }
?>

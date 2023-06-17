<?php
  require("db.php");
	$usuario = $_POST["usuario_admin"];
	$contraseña = $_POST["contra_admin"];
  
  $consultaSQL = sprintf("SELECT * FROM administrador WHERE usuario LIKE '%s' AND contraseña LIKE '%s'", $usuario, $contraseña);
	$tabla = mysqli_query($conexion, $consultaSQL);
	$registro = mysqli_fetch_assoc($tabla);
	$cantidad = mysqli_num_rows($tabla);

  if(isset($_SESSION["usuario"])){
		header("Location: ../index.html");
	}

  if($cantidad == 1){
    session_start();
    $_SESSION["usuario"] = $registro["usuario"];
    $_SESSION["contraseña"] = $registro["contraseña"];
    header("location: index_crud.php?".SID);
	}
	else{
        header("location: login_error.php");    
	}	
?>

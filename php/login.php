<?php
  $usuario = 'user';
  $contraseña = 12345;
	$usuario_admin=$_POST["usuario_admin"];
	$contra_admin=$_POST["contra_admin"];

	if($usuario_admin == $usuario && $contra_admin == $contraseña){
    include("index_crud.php");
	}
	else{
        include("header_login.php");
        echo "<main style='background:linear-gradient(rgba(1, 37, 83, 0.6), rgba(42, 41, 49, 0.6));'>";
        echo "<div style='width: 100%; max-width: 330px; padding: 15px; margin: auto;'>";
        echo "<div class='card ml-n5' style='width: 132%; margin-top: 9rem; margin-bottom: 3.45rem'>";
        echo "<div class='card-body'>";
        echo "<div class='text-center'>";
        echo "<i class='fas fa-lock text-muted text-center' style='font-size: 5rem; text-align: center;'></i>";
        echo "</div>";
        echo "<h3 class='text-muted text-center font-weight-bold mt-3'>ERROR</h3>";
        echo "<h5 class='grey-text text-center mt-4'>Acceso a administrador denegado</h5>";
        echo "<h6 class='grey-text text-center mt-5 mb-3'>El usuario o contraseña ingresados son incorrectos.</h6>";
        echo "<a class='btn btn-dark btn-block mt-3 mb-3' href='../login_admin.html' target='_self' role='button'>Volver a Intentarlo
            <i class='fas fa-chevron-left ml-2'></i></a>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</main>";
        include("footer.php");
	}	
?>
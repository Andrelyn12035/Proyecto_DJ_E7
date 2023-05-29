<?php
    echo "<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.11.2/css/all.css'>";
    echo "<link href='../css/bootstrap.min.css' rel='stylesheet'>";
    echo "<link href='../css/mdb.min.css' rel='stylesheet'>";
    echo "<link href='../css/style.min.css' rel='stylesheet'>";
    $usuario = 'user';
    $contraseña = 12345;
	$usuario_admin=$_POST["usuario_admin"];
	$contra_admin=$_POST["contra_admin"];

	if($usuario_admin == $usuario && $contra_admin == $contraseña){
    
	}
	else{
        echo "<nav class='navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar'>";
        echo "<div class='container'>";
        echo "<a class='navbar-brand' href='../index.html'><img src='../img/logo.png' style='height: 35px;'><strong>RHM</strong></a>";
        echo "<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent'
          aria-expanded='false' aria-label='Toggle navigation'>
          <span class='navbar-toggler-icon'></span></button>";
        echo "<div class='collapse navbar-collapse' id='navbarSupportedContent'>";
        echo "<ul class='navbar-nav mr-auto'>";
        echo "<li class='nav-item'>
            <a class='nav-link' href='../index.html' target='_self'>Inicio<span class='sr-only'>(current)</span></a>
            </li>";
        echo "<li class='nav-item'>
            <a class='nav-link' href='../form.html' target='_self'>Contratación</a>
            </li>";
        echo "<li class='nav-item'>
              <a class='nav-link' href='' target='_self'>Comprobante</a>
            </li>";
        echo "<li class='nav-item active'>
              <a class='nav-link' href='../login_admin.html' target='_self'>Administrador</a>
            </li>";
        echo "</ul>";
        echo "<ul class='navbar-nav nav-flex-icons'>
            <li class='nav-item'>
              <a href='index.html' class='nav-link border border-light rounded'>
                <i class='fas fa-music mr-2'></i>RhythmMakers
              </a>
            </li>";
        echo "</ul>";
        echo "</div>";
        echo "</div>";
        echo "</nav>";

        echo "<main style='background:linear-gradient(rgba(1, 37, 83, 0.6), rgba(42, 41, 49, 0.6));'>";
        echo "<div style='width: 100%; max-width: 330px; padding: 15px; margin: auto;'>";
        echo "<div class='card ml-n5' style='width: 132%; margin-top: 6rem; margin-bottom: 3.45rem'>";
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

        echo "<footer class='page-footer text-center font-small wow fadeIn'>";
        echo "<div class='footer-copyright py-3'>© 2023 Copyright:";
        echo "<a href='../index.html' target='_self'> RhythmMakers</a>";
        echo "</div>";
        echo "</footer>";
	}	
?>
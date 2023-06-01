<?php
	session_start();
	if(isset($_GET["cerrar"]))
	{
		$_SESSION["usuario"]=NULL;
		$_SESSION["contraseña"]=NULL;

		unset($_SESSION["usuario"]);
		unset($_SESSION["contraseña"]);
		session_unset();

		if (ini_get("sesion.use_cookies")){
			$params=session.get_cookie_params();
			setcokie(session_name(),'',time()-42000, $params["path"], $params["domain"], $params["secure"],$params["httponly"]);
		}
		session_destroy();
		header("Location: ../index.html");
	}
?>
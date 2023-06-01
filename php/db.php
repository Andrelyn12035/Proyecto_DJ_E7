<?php
   session_start();
   $conexion = mysqli_connect(
   'localhost',//Host
   'root',//user
   '',//password
   'bd_proyecto'//database
   ) or die(mysqli_erro($mysqli));
?>
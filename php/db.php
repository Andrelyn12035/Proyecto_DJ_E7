<?php
   session_start();

   $conn = mysqli_connect(
   'localhost:3307',//Host
   'root',//user
   '',//password
   'bd_proyecto'//database
   ) or die(mysqli_erro($mysqli));
   
?>
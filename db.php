<?php
   session_start();

   $conn = mysqli_connect(
   'proyecto-dj.cvnwmcsl2fhb.us-east-1.rds.amazonaws.com',//Host
   'admin',//user
   'antonioselacome',//password
   'music'//database
   ) or die(mysqli_erro($mysqli));
      
?>
<?php
include("./functions/conexionMysql.php");

   session_start();

   $user_check = $_SESSION['login'];

   $ses_sql = mysqli_query($conmysql,"select idusuario from usuario where idusuario = '$user_check' ");

   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $login_session = $row['idusuario'];

   if(!isset($_SESSION['login'])){
      header("location:./index.php");
      die();
   }
?>

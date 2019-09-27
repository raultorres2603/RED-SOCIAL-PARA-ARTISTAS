<?php
include("./conexionMysql.php");

$usuario 	= $_POST["usuario"];
$pass		= $_POST["pass"];

$sql		= "SELECT usuario,password FROM usuario WHERE (usuario = '$usuario' AND password = '$pass')";
$exito		= mysqli_query($conmysql,$sql);
$num_rows	= mysqli_num_rows($exito);

if($num_rows >= 1) {
	
echo("CORRECTO");

session_start();

$_SESSION["login"] = $usuario;

} Else {

echo("ERRONEO");

}
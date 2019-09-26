
<?php
include("./conexionMysql.php");

$email 		= $_POST["email"];
$usuario	= $_POST["usuario"];
$pass		= $_POST["pass"];

$sql		= "SELECT email FROM usuario WHERE email = '$email'";
$exito		= mysqli_query($conmysql,$sql);
$num_rows	= mysqli_num_rows($exito);

if($num_rows >= 1) {
	
echo("YA_REGISTRADO");

} Else {

$sql1	= "INSERT INTO usuario(email,usuario,password) VALUES ('$email','$usuario','$pass')";
$exito1	= mysqli_query($conmysql,$sql1);

echo("NO_REGISTRADO");

}
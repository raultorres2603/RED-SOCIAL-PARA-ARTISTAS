<?php
/*
Author: Raúl Torres ©
Name: Notes&Chords
*/
include("./functions/conexionMysql.php");
include("./functions/session.php");
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>
<html>
<head>
<title>Perfil </title>
<?php
/* Include de links */
include("./ext/links/head.php");
?>
</head>
<body id="index">
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
		<?php
		/* Include de la barra de navegación */
		include("./ext/nav/nav.php");
    /* Consulta para sacar datos del usuario */
    $sql  = "SELECT * FROM usuario WHERE idusuario = '$_SESSION[login]'";
    $result = mysqli_query($conmysql,$sql);
    $extraido = mysqli_fetch_assoc($result);
    $usuario  = $extraido["usuario"];
    $password = $extraido["password"];
    $nombre = $extraido["nombre"];
    $apellido = $extraido["apellido"];
    $edad = $extraido["edad"];
    $telefono = $extraido["telefono"];
    $sexo = $extraido["sexo"];
    $ciudad = $extraido["ciudad"];
    $avatar = $extraido["avatar"];
    /* Fin de consultas */
		?>
    <!-- Aquí irá la parte derecha del perfil -->
    <div id="modal_perfil">
    <div id="parte_izquierda_perfil" class="pull-left">
      <?php
        If ($avatar === NULL) {
      ?>
      <img id="imgPerfil" src="./perfiles/empty-avatar.png">
      <?php
    }
       ?>
		</div>
	</div>
</div>
</body>
</html>

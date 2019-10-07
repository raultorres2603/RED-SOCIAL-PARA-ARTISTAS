<?php
/*
Author: Raúl Torres ©
Name: Notes&Chords

*/
include("./functions/conexionMysql.php");
session_start();
?>
<html>
<head>
<title>Notes&Chords </title>
<?php
include("./ext/links/head.php");
?>
</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
		<?php
		include_once("./ext/nav/nav.php");
		include_once("./ext/carrousel.php");
		?>

	</div>
</div>
</body>
<?php
/*
Author: Raúl Torres ©
Name: Notes&Chords

*/
include_once("./functions/conexionMysql.php");
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
		include("./ext/nav/nav.php");
		include("./ext/carrousel.php");
		?>

	</div>
</div>
</body>
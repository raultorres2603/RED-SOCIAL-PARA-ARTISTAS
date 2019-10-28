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
		/* Include del carrousel */
		include("./ext/carrousel.php");
		?>

	</div>
</div>
</body>
</html>

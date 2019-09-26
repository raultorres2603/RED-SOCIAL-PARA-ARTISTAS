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
<title>Notes&Chords</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/maincss.css">
</head>
<body>
<input type="hidden" id="emaildeconsultas" value="<?php echo($email)?>">
<script>
$(document).ready(function(){
    $("#registrarbotonuser").click(function(){
        var email = $("#exampleInputEmail1").val();
        var usuario = $("#exampleInputText1").val();
        var pass = $("#exampleInputPassword1").val();
		
        $.ajax({
            type: "POST",
            url: "./functions/registrar_usuario.php",
            data: {email:email, usuario:usuario, pass:pass},
			success: function(response) {
				
				if (response.match("YA_REGISTRADO")) {
					
					alert("Éste e-mail ya está registrado. Prueba con otro.");
					
				} else if (response.match("NO_REGISTRADO")) {
					
					alert("Cuenta registrada!");
				}
                      }
        });
    });
});
</script>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
		
	<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Notes&Chords </a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Inicio</a></li>
      <li data-toggle="modal" data-target="#myModal"><a>¿Quienes somos?</a></li>
       <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" id="menu">Buscar anuncios
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
		<?php
		$sql = "SELECT genero FROM generomusical";
	$result = mysqli_query($conmysql,$sql);
	while ($row = mysqli_fetch_assoc($result)) {
		$genero = $row["genero"];
		?>
          <li><a href="#">- <?php echo($genero);?></a></li>
		  <?php
	}
		  ?>
        </ul>
      </li>
      <li><a href="#">Publicar anuncio</a></li>
	  <form class="navbar-form navbar-left" action="/action_page.php">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
	<button class="btn btn-danger navbar-btn"  data-toggle="modal" data-target="#myModal2">Sign up / Login</button>
    </ul>
  </div>
</nav>
							<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
	<center>
      <img src="img/welcome.jpg" alt="Los Angeles">
	  </center>
    </div>
	<div class="item">
	<center>
      <img src="img/hazteconocer.jpg" alt="Los Angeles">
	</center>
    </div>	

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
		</div>
	</div>
</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> Notes&Chords </h4>
      </div>
      <div class="modal-body">
        <p>
		<?php
		$sql 		=	"SELECT idQuienesSomos,texto FROM quienessomos WHERE idQuienesSomos = (SELECT MAX(idQuienesSomos) FROM quienessomos)";
		$consulta 	= 	mysqli_query($conmysql,$sql);
		$extraido 	=	mysqli_fetch_assoc($consulta);
		$textohtml	=	$extraido["texto"];
		echo($textohtml);
		?>
		</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="botoncerrarmodal" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>	
    <?php $cont = file_get_contents("./paginatonta.php"); echo $cont;?>
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> Sign up! </h4>
      </div>
      <div class="modal-body">
        <form method="POST" action="./functions/registrar_usuario.php">
  <div class="form-group">
    <label for="exampleInputEmail1">Correo electrónico</label>
	 <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Introduce tu e-mail" required>
    <small id="emailHelp" class="form-text text-muted">Se recomienda un e-mail principal o de uso. </small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Usuario</label>
    <input type="text" class="form-control" id="exampleInputText1" name="usuario" aria-describedby="emailHelp" placeholder="Introduce tu usuario" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Contraseña</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="pass" placeholder="Introduce aquí tu contraseña" required>
	    <small id="emailHelp" class="form-text text-muted"> La contraseña debe tener letras y números. </small>
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
    <label class="form-check-label" for="exampleCheck1">Acepto las Politicas de uso de la aplicación Notes&Chords </label>
  </div>
  <button type="button" class="btn btn-primary" id="registrarbotonuser">Registrarme!</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="botoncerrarmodal" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>	
</body>
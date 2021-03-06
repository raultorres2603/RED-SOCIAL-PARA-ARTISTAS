
	<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Notes&Chords </a>
    </div>
		<div id="boton_menu">
			<span class="glyphicon glyphicon-th-list pull-right" id="boton_menu_moviles"></span>
		</div>
    <ul class="nav navbar-nav" id="conjunto_navbar">
      <li><a href="index.php">Inicio</a></li>
      <li data-toggle="modal" data-target="#myModal"><a>¿Quienes somos?</a></li>
       <li class="dropdown" id="menu">
        <a class="dropdown-toggle" data-toggle="dropdown" id="conjunto_menu_anuncios">Buscar anuncios
        <span class="caret"></span></a>
        <ul class="dropdown-menu" id="dropdown_anuncios">
		<?php
		$sql = "SELECT genero FROM generomusical";
	$result = mysqli_query($conmysql,$sql);
	while ($row = mysqli_fetch_assoc($result)) {
		$genero = $row["genero"];
		?>
          <li><a href="anuncios.php?genero=$genero">- <?php echo($genero);?></a></li>
		  <?php
	}
		  ?>
        </ul>
      </li>
	<?php
	If (!isset($_SESSION["login"])) {
	?>
	  <li><a data-toggle="modal" data-target="#myModal2">Publicar anuncio</a></li>
	<button class="btn btn-danger navbar-btn" id="registrareiniciarsesion" data-toggle="modal" data-target="#myModal2">Registrar / Iniciar sesión</button>
	<?php
	} Else if (isset($_SESSION["login"])) {
	?>
	<li><a href="#">Publicar anuncio</a></li>
	<a href="./perfil.php"><button class="btn btn-danger navbar-btn"><?php echo("Usuario: " . $_SESSION["login"]);?></button></a>
	<a href="./functions/destroy_session.php"><img id="iconosalir" src="./img/icono-salir.png"></a>
	<?php
	}
	?>
    </ul>
	</div>
</nav>

<!-- MODAL QUIENES SOMOS -->

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
    <br>
    <br>
    Utilizamos tecnologia <b>Dolby</b> en vuestras covers. Aquí una ejemplo:
    <audio controls>
  <source src="ext/media/AUDIO 8D.mp3" type="audio/ogg">
</audio>
		</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="botoncerrarmodal" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script>
var c = document.getElementById("myCanvas");
var ctx = c.getContext("2d");

// Create gradient
var grd = ctx.createRadialGradient(75, 50, 5, 90, 60, 100);
grd.addColorStop(0, "blue");
grd.addColorStop(1, "white");

// Fill with gradient
ctx.fillStyle = grd;
ctx.fillRect(10, 10, 150, 80); 
</script>
<!-- MODAL REGISTRO/LOGIN USUARIO -->

<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
	<div id="registro">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> Registro! </h4>
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
</div>
<div id="login" hidden>
 <div class="modal-header">
        <h4 class="modal-title"> Iniciar sesión! </h4>
      </div>
	  <div class="modal-body">
        <form method="POST" action="./functions/logear_usuario.php">
   <div class="form-group">
    <label for="exampleInputEmail1">Usuario</label>
    <input type="text" class="form-control" id="exampleInputText2" name="usuario" aria-describedby="emailHelp" placeholder="Introduce tu usuario" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Contraseña</label>
    <input type="password" class="form-control" id="exampleInputPassword2" name="passlogin" placeholder="Introduce aquí tu contraseña" required>
  </div>
  <button type="button" class="btn btn-primary" id="logearbotonuser">Iniciar sesión</button>
</form>
	  </div>
	  </div>
	   <center>
	  	<button id="cambiarform" type="button" class="btn btn-danger navbar-btn">Registrar / Iniciar sesión</button>
		<center>
    </div>
  </div>
</div>

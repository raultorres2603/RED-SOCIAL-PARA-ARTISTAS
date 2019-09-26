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
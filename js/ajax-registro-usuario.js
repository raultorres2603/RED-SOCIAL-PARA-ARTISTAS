$(document).ready(function(){
	
    $("#registrarbotonuser").click(function(){
		/**
		*@type{email}
		*/
        var email = $("#exampleInputEmail1").val();
		/**
		*@type{text}
		*/
        var usuario = $("#exampleInputText1").val();
		/**
		*@type{password}
		*/
        var pass = $("#exampleInputPassword1").val();
		
        $.ajax({
            type: "POST",
            url: "./functions/registrar_usuario.php",
            data: {email:email, usuario:usuario, pass:pass},
			/**
			*@summary Nos devolverá una alerta dependiendo de si el e-mail está registrado o no.
			*/
			success: function(response) {
				
				if (response.match("YA_REGISTRADO")) {
					
					alert("Éste e-mail ya está registrado. Prueba con otro.");
					
				} else if (response.match("NO_REGISTRADO")) {
					
					alert("Cuenta registrada!");
				}
                      }
        });
    });
	
	$("#logearbotonuser").click(function(){
		/**
		*@type{text}
		*/
        var usuario = $("#exampleInputText2").val();
		/**
		*@type{password}
		*/
        var pass = $("#exampleInputPassword2").val();
		
        $.ajax({
            type: "POST",
            url: "./functions/logear_usuario.php",
            data: {usuario:usuario, pass:pass},
			/**
			*@summary Nos devolverá una alerta dependiendo de si el usuario y la contraseña són correctas o no.
			*/
			success: function(response) {
				if (response.match("ERRONEO")) {
					
					alert("Email o contraseña erroneas.");
					
					
				} else {
					alert("Login correcto! Re-carga la página para continuar! ")
				}
                      }
        });
    });
});

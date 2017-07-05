$("#btn-sesion").click(function(){
	var usuario = "";
	var pwd = "";

	usuario = $("#usuario").val();
	if (usuario == ""){
		$("#user-error").removeClass("hidden");
	}else{
		$("#user-error").addClass("hidden");
	}
	pwd = $("#pwd").val();
	if (pwd == ""){
		$("#pwd-error").removeClass("hidden");
	}else{
		$("#pwd-error").addClass("hidden");
	}

	if (usuario != "" && pwd != ""){
	// window.location.href = "Pagina_Inicio.html"	
		var parametros="usuario="+usuario+"&pwd="+pwd;
		$.ajax({
			url:"../ajax/administrar_sesion.php?opcion=2",
			method:"POST",
			data:parametros,
			dataType:"json",
			success: function(respuesta){
				if (respuesta["codigo"] == 1) {
					window.location.href = "pagina_principal.php"
				}else{
					$("#prueba").html(respuesta["mensaje"]);
				}
				//$("#prueba").html(respuesta);// se usa este para depurar, junto con dataType:html
			},
			error: function (jqXHR, exception) {
					var msg = '';
					if (jqXHR.status === 0) {
						msg = 'Not connect.\n Verify Network.';
					} else if (jqXHR.status == 404) {
						msg = 'Requested page not found. [404]';
					} else if (jqXHR.status == 500) {
						msg = 'Internal Server Error [500].';
					} else if (exception === 'parsererror') {
						msg = 'Requested JSON parse failed.';
					} else if (exception === 'timeout') {
						msg = 'Time out error.';
					} else if (exception === 'abort') {
						msg = 'Ajax request aborted.';
					} else {
						msg = 'Uncaught Error.\n' + jqXHR.responseText;
					}
					$("#prueba").html(msg);
			}
		});
	}

});

$(document).ready(function(){
            var margen_izquierdo =(screen.height- 400) /2;
            var argumento = margen_izquierdo+"px auto"
            $("#login").css("margin", argumento);
            $("#login").css("margin-bottom", "0px");
        });
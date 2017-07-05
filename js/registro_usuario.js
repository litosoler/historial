$("#btn-registro").click(function(){
	var pwd = "";
	var usuario = "";
	var nombre = "";
	var apellido = "";
	var pwd2 = "";
	
	nombre = $("#nombre").val();
	if (nombre == ""){
		$("#div-nombre").addClass("has-error");
	}else{
		$("#div-nombre").removeClass("has-error");
	}
	apellido = $("#apellido").val();
	if (apellido == ""){
		$("#div-apellido").addClass("has-error");
	}else{
		$("#div-apellido").removeClass("has-error");
	}

	usuario = $("#usuario").val();
	if (usuario == ""){
		$("#div-usuario").addClass("has-error");
	}else{
		$("#div-usuario").removeClass("has-error");
	}

	pwd = $("#pwd").val();
	pwd2 = $("#pwd2").val();
	if (pwd == "" || pwd2==""){
		$("#div-pwd").addClass("has-error");
	}else{
		if (pwd != pwd2) {
		$("#div-pwd").addClass("has-error");
		}else
		$("#div-pwd").removeClass("has-error");
	}

	if (nombre!= "" && apellido!= "" &&  usuario != "" && pwd != ""){
		var parametro = "nombre="+nombre+"&apellido="+apellido+"&pwd="+pwd+"&usuario="+usuario;

		$.ajax({
			url:"../ajax/administrar_sesion.php?opcion=1",
			method:"POST",
			data:parametro,
			dataType:"json",
			success: function(respuesta){
				if (respuesta["codigo"] == 1) {
					window.location.href = "inicio_sesion.html"
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
					alert(msg);
			}
		});
	}

});
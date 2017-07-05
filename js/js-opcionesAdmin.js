// $(".secciones").height(($(window).height() - 230)/2);

$("#guardar-clase").click(function(){
	$("#guardar-clase").button("loading");
	var codigo_carrera, codigo_clase, nombre, uv, carreras_requisito, requisito1, requisito2, requisito3, requisitos = "";
	
	codigo_carrera = $("select[id=carreras]").val();
	if (codigo_carrera == 0 ){
		$("select[id=carreras]").parent().addClass("has-error");
		$("#guardar-clase").button("reset");
	}else{
		$("select[id=carreras]").parent().removeClass("has-error");
	}
	carreras_requisito = $("select[id=carreras_requisito]").val();
	if (carreras_requisito == 0 ){
		$("select[id=carreras_requisito]").parent().addClass("has-error");
		$("#guardar-clase").button("reset");
	}else{
		$("select[id=carreras_requisito]").parent().removeClass("has-error");
	}

	// alert(codigo_clase);
	codigo_clase = $("#codigo-clase").val();
	if (codigo_clase == "" ){
		$("#codigo-clase").parent().addClass("has-error");
		$("#guardar-clase").button("reset");

	}else{
		$("#codigo-clase").parent().removeClass("has-error");
	}

	nombre = $("#nombre-clase").val();
	if (nombre == "" ){
		$("#nombre-clase").parent().addClass("has-error");
		$("#guardar-clase").button("reset");

	}else{
		$("#nombre-clase").parent().removeClass("has-error");
	}
	uv = $("#uv-clase").val();
	if (uv == "" ){
		$("#uv-clase").parent().addClass("has-error");
		$("#guardar-clase").button("reset");

	}else{
		$("#uv-clase").parent().removeClass("has-error");
	}
	requisitos = $('input[type=radio]:checked').val();
	if(requisitos == 0){
		requisitos = true;
	}else if (requisitos == 1) {
		requisito1 = $("select[id=requisito1]").val();
		requisito2="";
		requisito3="";
		if (requisito1 == 0 ){
			$("select[id=requisito1]").parent().addClass("has-error");
			$("#guardar-clase").button("reset");
			requisitos = false;
		}else{
			$("select[id=requisito1]").parent().removeClass("has-error");
			requisitos =true;
		}
	}else if (requisitos == 2) {
		requisito1 = $("select[id=requisito1]").val();
		requisito2 = $("select[id=requisito2]").val();
		requisito3="";
		if (requisito1 == 0 || requisito2 == 0 ){
			$("select[id=requisito1]").parent().addClass("has-error");
			if (requisito1 !=0){
				$("select[id=requisito1]").parent().removeClass("has-error");
			}
			$("select[id=requisito2]").parent().addClass("has-error");
			if (requisito2!=0){
				$("select[id=requisito2]").parent().removeClass("has-error");
			}
			$("#guardar-clase").button("reset");
			requisitos = false;
		}else{
			$("select[id=requisito1]").parent().removeClass("has-error");
			$("select[id=requisito2]").parent().removeClass("has-error");
			requisitos =true;
		}
	}else{
		requisito1 = $("select[id=requisito1]").val();
		requisito2 = $("select[id=requisito2]").val();
		requisito3 = $("select[id=requisito3]").val();
		if (requisito1 == 0 || requisito2 == 0 || requisito3==0){
			$("select[id=requisito1]").parent().addClass("has-error");
			if (requisito1 !=0){
				$("select[id=requisito1]").parent().removeClass("has-error");
			}
			$("select[id=requisito2]").parent().addClass("has-error");
			if (requisito2!=0){
				$("select[id=requisito2]").parent().removeClass("has-error");
			}
			$("select[id=requisito3]").parent().addClass("has-error");
			if (requisito3!=0){
				$("select[id=requisito3]").parent().removeClass("has-error");
			}
			$("#guardar-clase").button("reset");
			requisitos = false;
		}else{
			$("select[id=requisito1]").parent().removeClass("has-error");
			$("select[id=requisito2]").parent().removeClass("has-error");
			$("select[id=requisito3]").parent().removeClass("has-error");
			requisitos =true;
		}
	}

	if (codigo_carrera != "" && carreras_requisito!= "" && codigo_clase != "" && nombre != "" && uv!=""&&requisitos==true) {
	parametros = "codigo_carrera="+codigo_carrera+"&carreras_requisito="+carreras_requisito+"&codigo_clase="+codigo_clase+"&nombre="+nombre+"&uv="+uv+"&requisito1="+requisito1+"&requisito2="+requisito2+"&requisito3="+requisito3+"&numero_requisitos="+$('input[type=radio]:checked').val();
		alert(parametros);
		$.ajax({
			url:"../ajax/administrar_contenido.php?opcion=1",
			method:"POST",
			data: parametros,
			dataType: "html",
			success:function(respuesta){
			// 	$("#guardar-clase").button("reset");
			// 	if (respuesta.codigo==1) {
			// 	$("#prueba").html(respuesta.mensaje);
			// 	$("#codigo-clase").val("");
			// 	$("#nombre-clase").val("");
			// 	$("#uv-clase").val("");
			// }else{
			// 	$("#prueba").html(respuesta.mensaje);
			// }
				$("#guardar-clase").button("reset");
				$("#prueba").html(respuesta);
			}
		});
	}
});

$('input[type=radio]').change(function(){
   if ($(this).val() == 0) {
   		$("select[id=requisito1]").parent().addClass("hidden");
   		$("select[id=requisito2]").parent().addClass("hidden");
   		$("select[id=requisito3]").parent().addClass("hidden");
   }
   if ($(this).val() == 1) {
   		$("select[id=requisito1]").parent().removeClass("hidden");
   		$("select[id=requisito1]").parent().removeClass("col-md-6");
   		$("select[id=requisito2]").parent().addClass("hidden");
   		$("select[id=requisito3]").parent().addClass("hidden");
   }
   if ($(this).val() == 2) {
   		$("select[id=requisito1]").parent().removeClass("hidden");
   		$("select[id=requisito1]").parent().addClass("col-md-6");
   		$("select[id=requisito2]").parent().removeClass("hidden");
   		$("select[id=requisito2]").parent().addClass("col-md-6");
   		$("select[id=requisito3]").parent().addClass("hidden");
   }
   if ($(this).val() == 3) {
   		$("select[id=requisito1]").parent().removeClass("hidden");
   		$("select[id=requisito2]").parent().removeClass("hidden");
   		$("select[id=requisito3]").parent().removeClass("hidden");
   }
});

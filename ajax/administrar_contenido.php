<?php 
	include_once("../class/class-conexion.php");

	$conexion = new Conexion();//crea la variable y establece una conexion con la bd



	switch ($_GET["opcion"]) {
		// logica para guardar una clase
		case 1:
			$sql= sprintf("INSERT INTO CLASES(id_carrera, codigo_clase, nombre_clase, unidades_valorativas) VALUES ('%s','%s','%s','%s');",
			$conexion->getEnlace()->real_escape_string(stripslashes( $_POST["codigo_carrera"])),
			$conexion->getEnlace()->real_escape_string(stripslashes( $_POST["codigo_clase"])),
			$conexion->getEnlace()->real_escape_string(stripslashes( $_POST["nombre"])),
			$conexion->getEnlace()->real_escape_string(stripslashes( $_POST["uv"]))
			);
			$consulta = $conexion->ejecutar($sql);
			$resultado=array();
			if ($consulta === TRUE) {
				if ($_POST["numero_requisitos"] == 0) {
					$resultado["codigo"]=1;
					$resultado["mensaje"]="Exito, el  registro fue almacenado";
				}else if ($_POST["numero_requisitos"] == 1) {
					$sql = sprintf("select id_clase from CLASES WHERE nombre_clase= '%s';",
						$conexion->getEnlace()->real_escape_string(stripslashes( $_POST["nombre"]))
						);
					$consulta = $conexion->ejecutar($sql);
					$fila = $conexion->obtenerFila($consulta);
					$sql = sprintf("INSERT INTO REQUISITOS(clase, requisito, id_carrera) VALUES ('%s','%s','%s');",
					$conexion->getEnlace()->real_escape_string(stripslashes( $fila["id_clase"])),
					$conexion->getEnlace()->real_escape_string(stripslashes( $_POST["requisito1"])),
					$conexion->getEnlace()->real_escape_string(stripslashes( $_POST["carreras_requisito"]))
					);
					$consulta = $conexion->ejecutar($sql);
					if ($consulta === TRUE) {
						$resultado["codigo"]=1;
						$resultado["mensaje"]="Exito, el  registro fue almacenado";
					}else {
						$resultado["codigo"]=0;
						$resultado["mensaje"]="No se pudo registrar el requisito. Error: " . $sql . "<br>" . $conexion->getEnlace()->error;
					}
				}else if ($_POST["numero_requisitos"] == 2) {
					$sql = sprintf("select id_clase from CLASES WHERE nombre_clase= '%s';",
						$conexion->getEnlace()->real_escape_string(stripslashes( $_POST["nombre"]))
						);
					$consulta = $conexion->ejecutar($sql);
					$fila = $conexion->obtenerFila($consulta);
					$sql = sprintf("INSERT INTO REQUISITOS(clase, requisito, id_carrera) VALUES ('%s','%s','%s');",
					$conexion->getEnlace()->real_escape_string(stripslashes( $fila["id_clase"])),
					$conexion->getEnlace()->real_escape_string(stripslashes( $_POST["requisito1"])),
					$conexion->getEnlace()->real_escape_string(stripslashes( $_POST["carreras_requisito"]))
					);
					$consulta = $conexion->ejecutar($sql);
					$sql = sprintf("INSERT INTO REQUISITOS(clase, requisito, id_carrera) VALUES ('%s','%s','%s');",
					$conexion->getEnlace()->real_escape_string(stripslashes( $fila["id_clase"])),
					$conexion->getEnlace()->real_escape_string(stripslashes( $_POST["requisito2"])),
					$conexion->getEnlace()->real_escape_string(stripslashes( $_POST["carreras_requisito"]))
					);
					$consulta2 = $conexion->ejecutar($sql);
					if ($consulta === TRUE && $consulta2 === TRUE) {
						$resultado["codigo"]=1;
						$resultado["mensaje"]="Exito, el  registro fue almacenado";
					}else {
						$resultado["codigo"]=0;
						$resultado["mensaje"]="No se pudo registrar el requisito. Error: " . $sql . "<br>" . $conexion->getEnlace()->error;
					}
				}else if ($_POST["numero_requisitos"] == 3) {
					$sql = sprintf("select id_clase from CLASES WHERE nombre_clase= '%s';",
						$conexion->getEnlace()->real_escape_string(stripslashes( $_POST["nombre"]))
						);
					$consulta = $conexion->ejecutar($sql);
					$fila = $conexion->obtenerFila($consulta_clases);
					$sql = sprintf("INSERT INTO REQUISITOS(clase, requisito, id_carrera) VALUES ('%s','%s','%s');",
					$conexion->getEnlace()->real_escape_string(stripslashes( $fila["id_clase"])),
					$conexion->getEnlace()->real_escape_string(stripslashes( $_POST["requisito1"])),
					$conexion->getEnlace()->real_escape_string(stripslashes( $_POST["carreras_requisito"]))
					);
					$consulta = $conexion->ejecutar($sql);
					$sql = sprintf("INSERT INTO REQUISITOS(clase, requisito, id_carrera) VALUES ('%s','%s','%s');",
					$conexion->getEnlace()->real_escape_string(stripslashes( $fila["id_clase"])),
					$conexion->getEnlace()->real_escape_string(stripslashes( $_POST["requisito2"])),
					$conexion->getEnlace()->real_escape_string(stripslashes( $_POST["carreras_requisito"]))
					);
					$consulta2 = $conexion->ejecutar($sql);
					$sql = sprintf("INSERT INTO REQUISITOS(clase, requisito, id_carrera) VALUES ('%s','%s','%s');",
					$conexion->getEnlace()->real_escape_string(stripslashes( $fila["id_clase"])),
					$conexion->getEnlace()->real_escape_string(stripslashes( $_POST["requisito3"])),
					$conexion->getEnlace()->real_escape_string(stripslashes( $_POST["carreras_requisito"]))
					);
					$consulta3 = $conexion->ejecutar($sql);
					if ($consulta === TRUE && $consulta2 === TRUE && $consulta3 === TRUE) {
						$resultado["codigo"]=1;
						$resultado["mensaje"]="Exito, el  registro fue almacenado";
					}else {
						$resultado["codigo"]=0;
						$resultado["mensaje"]="No se pudo registrar el requisito. Error: " . $sql . "<br>" . $conexion->getEnlace()->error;
					}
				} else{
					$resultado["codigo"]=0;
					$resultado["mensaje"]="No se pudo registrar el requisito. Error: " . $sql . "<br>" . $conexion->getEnlace()->error;
				}
			} else{
				$resultado["codigo"]=0;
				$resultado["mensaje"]="Error: " . $sql . "<br>" . $conexion->getEnlace()->error;
			}
			echo json_encode($resultado);
		break;
		// 
		case 2:
			// $resultado = array();

			//  $sql = sprintf("SELECT ID_USUARIOS, CONTRASENA FROM USUARIOS WHERE USUARIO= '%s';",
			//  		$conexion->getEnlace()->real_escape_string(stripslashes( $_POST["usuario"]))
			//  		);
			//  $consulta = $conexion->ejecutar($sql);
			//  $fila = $conexion->obtenerFila($consulta);
			
			//  if (isset($fila)) {
			// 	if ($fila["CONTRASENA"] == $_POST["pwd"]){
			// 		$resultado["codigo"]=1;
			// 		$resultado["mensaje"]="exitos";
			// 		$_SESSION["ID_USUARIO"] = $fila["ID_USUARIOS"];
			// 		$_SESSION["CONTRASENA"] = $fila["CONTRASENA"];
			// 		$_SESSION["USUARIO"] = $_POST["usuario"];


			// 	} else {
			// 		$resultado["codigo"]=0;
			// 		$resultado["mensaje"]="Las Contraseñas no coinsiden";
			// 	}
			// }else{
			// 	$resultado["codigo"]=0;
			// 	$resultado["mensaje"]="El usuario no esta registrado en nuestro sitio.";
			// }

			// echo json_encode($resultado);
			break;
		default:
		echo "has ingresado un indice erroneo, no hay nada que hacer";
		break;
	}




	$conexion->cerrarConexion();//cierra la concexion para salvar recursos
	?>
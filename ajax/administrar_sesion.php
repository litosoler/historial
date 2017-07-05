<?php 
	include_once("../class/class-conexion.php");

	session_start();
	$conexion = new Conexion();//crea la variable y establece una conexion con la bd



	switch ($_GET["opcion"]) {
		// logica para registrar un usuario
		case 1:
		$sql= sprintf("INSERT INTO USUARIOS(NOMBRE_USUARIOS, APELLIDO_USUARIOS, USUARIO, CONTRASENA) VALUES ('%s','%s','%s','%s');",
			$conexion->getEnlace()->real_escape_string(stripslashes( $_POST["nombre"])),
			$conexion->getEnlace()->real_escape_string(stripslashes( $_POST["apellido"])),
			$conexion->getEnlace()->real_escape_string(stripslashes( $_POST["usuario"])),
			$conexion->getEnlace()->real_escape_string(stripslashes( $_POST["pwd"]))
			);
		$consulta = $conexion->ejecutar($sql);
		$resultado=array();
		if ($consulta === TRUE) {
			$resultado["codigo"]=1;
			$resultado["mensaje"]="Exito, el  registro fue almacenado";
		} else {
			$resultado["codigo"]=0;
			$resultado["mensaje"]="Error: " . $sql . "<br>" . $conexion->getEnlace()->error;
		}
		echo json_encode($resultado);
		break;
		// logica para iniciar sesion
		case 2:
			$resultado = array();

			 $sql = sprintf("SELECT ID_USUARIOS, CONTRASENA FROM USUARIOS WHERE USUARIO= '%s';",
			 		$conexion->getEnlace()->real_escape_string(stripslashes( $_POST["usuario"]))
			 		);
			 $consulta = $conexion->ejecutar($sql);
			 $fila = $conexion->obtenerFila($consulta);
			
			 if (isset($fila)) {
				if ($fila["CONTRASENA"] == $_POST["pwd"]){
					$resultado["codigo"]=1;
					$resultado["mensaje"]="exitos";
					$_SESSION["ID_USUARIO"] = $fila["ID_USUARIOS"];
					$_SESSION["CONTRASENA"] = $fila["CONTRASENA"];
					$_SESSION["USUARIO"] = $_POST["usuario"];


				} else {
					$resultado["codigo"]=0;
					$resultado["mensaje"]="Las Contraseñas no coinsiden";
				}
			}else{
				$resultado["codigo"]=0;
				$resultado["mensaje"]="El usuario no esta registrado en nuestro sitio.";
			}

			echo json_encode($resultado);
			break;
		default:
		echo "has ingresado un indice erroneo, no hay nada que hacer";
		break;
	}




	$conexion->cerrarConexion();//cierra la concexion para salvar recursos
	?>
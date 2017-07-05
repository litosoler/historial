<?php
	include_once("../class/class-conexion.php");

	$conexion = new Conexion();//crea la variable y establece una conexion con la bd
	// consulatas
	
	
  ?>

<!DOCTYPE html>
<html lang="es">
  <head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	    <title>Youtube</title>

	    <!-- Bootstrap -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	    <link rel="stylesheet" type="text/css" href="../css/css-opcionesAdmin.css">
	    
	    
  </head>
  <body>

	    <!-- cuerpo -->
    	<div class="container">
    	
    		<div class="row">
    			<div class="col-md-5 ">
	    			<div class="secciones">
		    			<div id="" class="fichas">
		    				<h3>Administrar Usuario/Canal</h3>
		    				<br>
		    				<div class="btn-large">
		    				<button class="btn btn-default" data-toggle="modal" data-target="#quitar-usuario">QUITAR</button>
		    				</div>
		    			</div>
		    		</div>
	    		</div>
	    		
	    		<div class="col-md-offset-2 col-md-5 ">
	        		<div class="secciones">
		    			<div id="" class="fichas">
		    				<h3>Administrar Video/Playlist</h3>
		    				<br>
		    				<div class="btn-large">
		    				<button class="btn btn-default" data-toggle="modal" data-target="#quitar-video">QUITAR</button>
		    				</div>
		    			</div>
		    		</div>
	        	</div>
        	</div>
        	<div class="row">
	    		<div class="col-md-5 ">
		    		<div class="secciones">
		    			<div id="" class="fichas">
		    				<h3>Administrar Clases</h3>
		    				<br>
		    				<div class="btn-group">
		    				<button class="btn btn-default" data-toggle="modal" data-target="#clase-añadir">AÑADIR</button>
		    				<button class="btn btn-default" data-toggle="modal" data-target="#clase-quitar">QUITAR</button>
		    				</div>
		    			</div>
		    		</div>
	    		</div>
	    		<div class="col-md-offset-2 col-md-5 ">
	    			<div class="secciones">
		    			<div id="" class="fichas">
		    				<h3>Administrar Reportes</h3>
		    				<br>
		    				<div class="btn-group">
		    				<button class="btn btn-default" data-toggle="modal" data-target="#reporte-añadir">VER</button>
		    				<button class="btn btn-default" data-toggle="modal" data-target="#reporte-quitar">QUITAR</button>
		    				</div>
		    			</div>
		    		</div>
	    		</div>
        	</div>
    	</div>
	
 		
		<!-- ventanas modales -->
		<!--Estamos trabajando en esta funcionalidad  -->
		<!-- <div id="enProceso" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<!-- <div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title">Lo sentimos, estamos trabajando en esta Funcionalidad.</h3>
					</div>
					<div class="modal-body">
						<img src="../img/icono-enfermo.png" class="img-responsive">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>

			</div>
		</div> -->
		<!-- formulario quitar usuario/canal -->
		<div id="quitar-usuario" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<div>
							<h3>Eliminar Usuario/Canal</h3>
							<div class="form-group">
								<div class="form-group">
									<label for="opcion">Elimar:</label>
									<select id="opcion" class="form-control">
										<option>Quiero eliminar un...</option>
										<option>Usuario</option>
										<option>canal</option>
									</select>
								</div>
								<div class="form-group">
									<label for="nombre">Nombre del Usuario/Canal:</label>
									<input type="text" id="nombre" class="form-control">
								</div>
								<div class="form-group">
									<label for="correo">Correo electronico asociado.</label>
									<input type="text" id="correo" class="form-control">
								</div>
								<div class="form-group">
									<button class="btn btn-default">Enviar</button>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		<!-- formulario quitar video/playlist -->
		<div id="quitar-video" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<div>
							<h3>Eliminar Video/Playlist</h3>
							<div class="form-group">
								<div class="form-group">
									<label for="opcion">Elimar:</label>
									<select id="opcion" class="form-control">
										<option>Quiero eliminar un...</option>
										<option>Video</option>
										<option>Playlist</option>
									</select>
								</div>
								<div class="form-group">
									<label for="nombre">url del Video/Playlist:</label>
									<input type="text" id="nombre" class="form-control">
								</div>
								<div class="form-group">
									<button class="btn btn-default">Enviar</button>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		<!-- administrar Clases -->
		<!-- añadir -->
		<div id="clase-añadir" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<h3 >Añadir Categoria</h3>
					</div>
					<div class="modal-body">
						<div>
							<div class="form-group">
								<label for='carreras'>Carreras:</label>
								<select class='form-control' id='carreras'>
									<option value='0'>---Secliona una Carrera---</option>
									<?php 
									$sql = "select * from CARRERAS;";
									$consulta_carreras = $conexion->ejecutar($sql);
									while($fila_carrera = $conexion->obtenerFila($consulta_carreras)){
										echo "<option value='".$fila_carrera["id_carrera"]."'>".$fila_carrera["nombre_carrera"]."</option>\n\t\t\t\t\t\t\t\t\t\t";
									}
									?>
								</select>
							</div>
							<div class="form-group" id="clases-anadir-codigo">
								<label for="codigo-clase">Codigo Clase:</label>
								<input type="text" id="codigo-clase" class="form-control">
							</div>
							<div class="form-group" id="clases-anadir-nombre">
								<label for="nombre-clase">Nombre Clase:</label>
								<input type="text" id="nombre-clase" class="form-control">
							</div>
							<div class="form-group" id="clases-anadir-uv">
								<label for="uv-clase">Unidades Valorativas:</label>
								<input type="number" id="uv-clase" class="form-control">
							</div>
							<div class="col-md-12">
							<div  class="form-group col-md-6">
								<label for="requisitos">Numero de Requisitos:</label>
								<div id="requisitos" class="radio">
									<label class="radio-inline"><input type="radio" value="0" name="optradio" checked="checked">0</label>
									<label class="radio-inline"><input type="radio" value="1" name="optradio">1</label>
									<label class="radio-inline"><input type="radio" value="2" name="optradio">2</label>
									<label class="radio-inline"><input type="radio" value="3" name="optradio">3</label>
								</div>
							</div>
							<div class="form-group col-md-6 ">
								<label for='carreras_requisito'>Carrera requisito:</label>
								<select class='form-control' id='carreras_requisito'>
									<option value='0'>---Secliona una Carrera---</option>
									<?php 
									$sql = "select * from CARRERAS;";
									$consulta_carreras = $conexion->ejecutar($sql);
									while($fila_carrera = $conexion->obtenerFila($consulta_carreras)){
										echo "<option value='".$fila_carrera["id_carrera"]."'>".$fila_carrera["nombre_carrera"]."</option>\n\t\t\t\t\t\t\t\t\t\t";
									}
									?>
								</select>
							</div>
							</div>
							<div class="form-group hidden ">
								<label for='requisito1'>Requisto 1:</label>
								<select class='form-control' id='requisito1'>
									<option value='0'>---Selecciona una clase---</option>
									<?php 
									$sql = "select * from CLASES;";
									$consulta_clases = $conexion->ejecutar($sql);
									while($fila_clase = $conexion->obtenerFila($consulta_clases)){
										echo "<option value='".$fila_clase["id_clase"]."'>".$fila_clase["nombre_clase"]."</option>\n\t\t\t\t\t\t\t\t\t\t";
									}
									?>
								</select>
							</div>
							<div class="form-group hidden " >
								<label for='requisito2'>Requisto 2:</label>
								<select class='form-control' id='requisito2'>
									<option value='0'>---Selecciona una clase---</option>
									<?php 
									$sql = "select * from CLASES;";
									$consulta_clases = $conexion->ejecutar($sql);
									while($fila_clase = $conexion->obtenerFila($consulta_clases)){
										echo "<option value='".$fila_clase["id_clase"]."'>".$fila_clase["nombre_clase"]."</option>\n\t\t\t\t\t\t\t\t\t\t";
									}
									?>
								</select>
							</div>
							<div class="form-group hidden">
								<label for='requisito3'>Requisto 3:</label>
								<select class='form-control' id='requisito3'>
									<option value='0'>---Selecciona una clase---</option>
									<?php 
									$sql = "select * from CLASES;";
									$consulta_clases = $conexion->ejecutar($sql);
									while($fila_clase = $conexion->obtenerFila($consulta_clases)){
										echo "<option value='".$fila_clase["id_clase"]."'>".$fila_clase["nombre_clase"]."</option>\n\t\t\t\t\t\t\t\t\t\t";
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<p id="prueba"></p>
								<button id="guardar-clase" class="btn btn-default">Guardar</button>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- quitar -->
	<div id="clase-quitar" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<div>
							<h3>Quitar Categoria</h3>
							<div class="form-group">
								<div class="form-group">
									<label for="nombre-quitarCategoria">Nombre de la categoria:</label>
									<select id="nombre-quitarCategoria" class="form-control">
											<option>---escoga una categoria---</option>
											<?php  
												for ($i=0; $i < sizeof($listaCategorias); $i++) { 
													echo "<option>".$listaCategorias[$i]."</option>";
												}
											?>
									</select>
								</div>
								<div class="form-group">
									<label for="nombre-quitarCategoria2">Confirmar categoria:</label>
									<select id="nombre-quitarCategoria2" class="form-control">
										<option>---confirme la categoria---</option>
										<?php  
												for ($i=0; $i < sizeof($listaCategorias); $i++) { 
													echo "<option>".$listaCategorias[$i]."</option>";
												}
											?>
									</select>
								</div>
								<div class="form-group">
									<button class="btn btn-default">Guardar</button>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>

		<!-- administrar reportes -->
		<!-- añadir -->
		<div id="reporte-añadir" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<div>
							<h3>Aqui Mostraremos los reportes</h3>
						</div>
					</div>
				</div>

			</div>
		</div>
		<!-- quitar -->
		<div id="reporte-quitar" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<div>
							<h3>Eliminar Reportes</h3>
							<div class="form-group">
								<div class="form-group">
									<label for="nombre-quitarReporte">Reporte:</label>
									<select id="nombre-quitarRerporte" class="form-control">
											<option>---numero---</option>
											<?php  
												for ($i=0; $i < sizeof($listaCategorias); $i++) { 
													echo "<option>Reporte #: $i </option>";
												}
											?>
									</select>
								</div>
								<div class="form-group">
									<label for="nombre-quitarRerporte2">Reporte escogido:</label>
									<textarea  id="nombre-quitarRerporte2"  class="form-control" disabled="true" rows="5">Aqui se mostraran el reporte seleccionado Aqui se mostraran el reporte seleccionado Aqui se mostraran el reporte seleccionado Aqui se mostraran el reporte seleccionado
									</textarea>
								</div>
								<div class="form-group">
									<button class="btn btn-default">Guardar</button>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
     <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<script src="../js/js-opcionesAdmin.js" type="text/javascript"></script>
  </body>
</html>
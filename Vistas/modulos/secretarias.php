<?php

if($_SESSION["rol"] != "Administrador"){

	echo'<script>

	window.location = "inicio"
	</script>';


	return;

}

?>

<div class="content-wrapper">
	
	<section class="content-header">
		
		<h1>Gestor de Asistentes</h1>

	</section>

	<section class="content">
		
		<div class="box">
			
			<div class="box-header">
				
				<button class="btn btn-primary btn" data-toggle="modal" data-target="#CrearSecretaria"> <span><i class="fa fa-plus"></i> Crear Asistente
				</button>	

			</div>


			<div class="box-body">
				
				<table class="table table-bordered table-hover table-striped dt-responsive DT">
					
					<thead>
						
						<tr>
							
							<th>N°</th>
							<th>Apellido</th>
							<th>Nombre</th>
							<th>Foto</th>
							<th>Usuario</th>
							<th>Contraseña</th>
							<th>Borrar</th>
																					

						</tr>

					</thead>

					<tbody>


						<?php 

						$resultado = SecretariasC::VerSecretariasC();

						foreach ($resultado as $key => $value) {
							echo'

							<tr>
							
							<td>'.($key+1).'</td>

							<td>'.$value["apellido"].'</td>
							<td>'.$value["nombre"].'</td>';
							
							if ($value["foto"] == "") {
								
								echo'
							<td>

								<img src="Vistas/img/defecto.png" width="40px">

							</td>
								';

							}else{
								echo'
							<td>

								<img src="'.$value["foto"].'" width="40px">

							</td>
								';								
							}

							echo'

							

							<td>'.$value["usuario"].'</td>

							<td>'.$value["clave"].'</td>

							<td>
								
								<div class="">
									
								<a href="http://localhost/clinica/editar-secretaria/'.$value["id"].'">

								<button class="btn btn-success" ><i class="fa fa-pencil"></i> Editar</button>

								</a>

						

									<button class="btn btn-danger EliminarSecretaria" Sid="'.$value["id"].'" imgS="'.$value["foto"].'"><i class="fa fa-times"></i> Borrar</button>

								

								</div>

							</td>

						</tr>';
						}

						 ?>
					

							

							

						

						

						

					</tbody>

				</table>

			</div>

		</div>

	</section>

</div>

<!-- MODAL PARA CREAR Secretaria -->
<div class="modal fade" rol="dialog" id="CrearSecretaria">
	
	<div class="modal-dialog">
		
		<div class="modal-content">
			
			<form method="post" role=form>
				
				<div class="modal-body">
					
					<div class="box-body">
						
						<div class="form-group">
							
							<h4>Apellido: </h4>

							<input type="text" class="form-control input"  name="apellido" required>

							<input type="hidden" name="rolS" value="Secretaria" required>

						</div>

						<div class="form-group">
							
							<h4>Nombre: </h4>

							<input type="text" class="form-control input"  name="nombre" required>

						</div>

						<div class="form-group">
											

						<div class="form-group">
							
							<h4>Usuario: </h4>

							<input type="text" class="form-control input"  name="usuario" required>

						</div>

						<div class="form-group">
							
							<h4>Contraseña: </h4>

							<input type="text" class="form-control input"  name="clave" required>

						</div>

					</div>

				</div>

				<div class="modal-footer">
					
					<button type="submit" class="btn btn-primary">Crear</button>

					<button type="submit" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

				</div>

				<?php

				$crear = new SecretariasC();
				$crear -> CrearSecretariaC();

				?>

			</form>

		</div>

	</div>

</div>




<?php

	$borrarD = new SecretariasC();
	$borrarD -> BorrarSecretariaC();





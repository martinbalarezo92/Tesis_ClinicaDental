<?php

if($_SESSION["rol"] != "Secretaria" && $_SESSION["rol"] != "Administrador" && $_SESSION["rol"] != "Doctor"){

	echo'<script>

	window.location = "inicio"
	</script>';


	return;

}

?>

<div class="content-wrapper">
	
	<section class="content-header">
		
		<h1>Gestor de Especialidades</h1>

	</section>

	<section class="content">
		
		<div class="box">
			
			<div class="box-header">
				
				<form method="post">
					
					<div class="col-md-6 col-xs-12">

						<input type="text" class="form-control" name="especialidadN" placeholder="Ingrese Nueva Especialidad" required>
					
					</div>

					<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Crear Especialidad</button>

				</form>

				<?php

				$crearE = new EspecialidadesC();
				$crearE -> CrearEspecialidadC();


				?>

			</div>


			<div class="box-body">
				
				<table class="table table-bordered table-hover table-striped DT">
					
					<thead>
						
						<tr>
							
							<th>N°</th>
							<th>Nombre</th>
							<th>Editar / Borrar</th>

						</tr>

					</thead>

					<tbody>
						
						<?php

						$columna = null;
						$valor = null;

						$resultado = EspecialidadesC::VerEspecialidadesC($columna, $valor);

						foreach ($resultado as $key => $value) {
							# code...

							echo '

							<tr>
							
							<td>'.($key+1).'</td>

							<td>'.$value["nombre_especialidad"].'</td>

							<td>
								
								<div class="sbtn-group">
									

									<a  href=http://localhost/clinica/editar-especialidad/'.$value["id"].'>
										
										<button class="btn btn-success"><i class="fa fa-pencil"></i> Editar</button>

									</a>

									
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmarEspecialidad'.$value["id"].'"><i class="fa fa-times"></i> Borrar</button>
									

									<!-- Modal -->
													<div class="modal fade" id="confirmarEspecialidad'.$value["id"].'" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
													  <div class="modal-dialog modal-dialog-centered" role="document">
													    <div class="modal-content">
													      <div class="modal-header">
													        <h3 class="alert-heading modal-title" id="ModalLongTitle">¿Eliminar Especialidad?</h3>
													        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
													          <span aria-hidden="true">&times;</span>
													        </button>
													      </div>
													      <div class="modal-body alert alert-warning">
													       
													        ¿Desea eliminar la especialidad: '.$value["nombre_especialidad"].'? <br>
													        



													      </div>
													      <div class="modal-footer">
													        	      			
															<a href="http://localhost/clinica/especialidades/'.$value["id"].'">
										
																<button class="btn btn-success"><i class="fa fa-trash"></i> Sí, Eliminar</button>

															</a>
															
															<button type="button" class="btn btn-danger"  data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>No</button>
																	
													      </div>
													    </div>
													  </div>
													</div>



								</div>

							</td>

						</tr>

							';

						}

						?>

						

					</tbody>

				</table>

			</div>

		</div>

	</section>

</div>


<?php

	$borrarE = new EspecialidadesC();
	$borrarE -> BorrarEspecialidadC();




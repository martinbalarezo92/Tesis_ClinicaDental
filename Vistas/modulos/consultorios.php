<?php

if($_SESSION["rol"] != "Secretaria" && $_SESSION["rol"] != "Administrador"){

	echo'<script>

	window.location = "inicio"
	</script>';


	return;

}

?>

<div class="content-wrapper">
	
	<section class="content-header">
		
		<h1>Gestor de Consultorios</h1>

	</section>

	<section class="content">
		
		<div class="box">
			
			<div class="box-header">
				
				<form method="post">
					
					<div class="col-md-6 col-xs-12">
						<input type="text" class="form-control" name="consultorioN" placeholder="Ingrese Nuevo Consultorio" required>
					</div>

					<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Crear Consultorio</button>

				</form>

				<?php

				$crearC = new ConsultoriosC();
				$crearC -> CrearConsultorioC()


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

						$resultado = ConsultoriosC::VerConsultoriosC($columna, $valor);

						foreach ($resultado as $key => $value) {
							# code...

							echo '

							<tr>
							
							<td>'.($key+1).'</td>

							<td>'.$value["nombre"].'</td>

							<td>
								
								<div class="">
									
									<a href=http://localhost/clinica/E-C/'.$value["id"].'>
										
										<button class="btn btn-success"><i class="fa fa-pencil"></i> Editar</button>

									</a>

									

									<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmarEliminarConsultorio'.$value["id"].'"><i class="fa fa-times"></i> Borrar</button>

										<!-- Modal -->
													<div class="modal fade" id="confirmarEliminarConsultorio'.$value["id"].'" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
													  <div class="modal-dialog modal-dialog-centered" role="document">
													    <div class="modal-content">
													      <div class="modal-header">
													        <h3 class="alert-heading modal-title" id="ModalLongTitle">¿Eliminar Doctor?</h3>
													        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
													          <span aria-hidden="true">&times;</span>
													        </button>
													      </div>
													      <div class="modal-body alert alert-warning">
													        ¿Desea eliminar el consultorio: '.$value["nombre"].'? <br>
													       


													      </div>
													      <div class="modal-footer">
													        	      			
															<a href="http://localhost/clinica/consultorios/'.$value["id"].'">
																
																<button class="btn btn-danger"><i class="fa fa-times"></i> Borrar</button>

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

	$borrarC = new ConsultoriosC();
	$borrarC -> BorrarConsultorioC();




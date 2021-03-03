<?php
// Turn off all error reporting
error_reporting(0);
?>



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
		
		<h1>Gestor de Doctores</h1>

			

	</section>

	<section class="content">
		
		<div class="box">
			
			<div class="box-header">
				
				<button class="btn btn-primary" data-toggle="modal" data-target="#CrearDoctor"><span><i class="fa fa-plus"></i> Crear Doctor</span> 
				</button>	

			</div>


			<div class="box-body">
				
				<table class="table table-bordered table-hover table-striped DT">
					
					<thead>
						
						<tr>
							
							<th>N°</th>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Cédula</th>
							<th>Consultorio</th>
							<th>Especialidad</th>
							<th>Usuario</th>
							<th>Contraseña</th>
							<th>Color Cita</th>
							<th>Editar / Borrar</th>
																					

						</tr>

					</thead>

					<tbody>


						
						<?php

						$columna = null;
						$valor = null;

						$resultado = DoctoresC::VerDoctoresC($columna, $valor);

						foreach ($resultado as $key => $value) {
							# code...

							echo '

							<tr>
							
							<td>'.($key+1).'</td>

							<td>'.$value["nombre"].'</td>
							<td>'.$value["apellido"].'</td>
							<td>'.$value["cedula_doctor"].'</td>

							';

							$columna = "id";

							$valor = $value["id_consultorio"];

							$consultorio = ConsultoriosC::VerConsultoriosC("id", $valor);

							echo'<td>'.$consultorio["nombre"].'';

							if (empty($consultorio["nombre"]) == 1) {
								echo'<div class="alert-sm alert-warning" style="text-align:center"> <i class="fa fa-warning"></i> Sin Consultorios</div>';
							}
							echo'</td>';

/*							
							if($value["foto"] == ""){

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
*/
							$columna = "id";
							$valor = $value["id_especialidad"];

							$especialidad = EspecialidadesC::VerEspecialidadesC($columna, $valor);

							echo'<td>'.$especialidad["nombre_especialidad"];

							if (empty($especialidad["nombre_especialidad"]) == 1) {
								echo'<div class="alert-sm alert-warning" style="text-align:center"> <i class="fa fa-warning"></i> Sin especialidad</div>';
							}

							echo'</td>

							<td>'.$value["usuario"].'</td>

							

							<td> * * * * * </td>

							<td style="background-color: '.$value["colorCita"].'; width: 90px"></td>

							<td>
								
								<div class="">
									
																	
										<button class="btn btn-success EditarDoctor" Did="'.$value["id"].'" data-toggle="modal" data-target="#EditarDoctor"><i class="fa fa-pencil"></i> Editar</button>

									
									
										
										

							


										<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmarEliminarDoctor'.$value["id"].'"><i class="fa fa-times"></i> Borrar</button>

										<!-- Modal -->
													<div class="modal fade" id="confirmarEliminarDoctor'.$value["id"].'" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
													  <div class="modal-dialog modal-dialog-centered" role="document">
													    <div class="modal-content">
													      <div class="modal-header">
													        <h3 class="alert-heading modal-title" id="ModalLongTitle">¿Eliminar Doctor?</h3>
													        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
													          <span aria-hidden="true">&times;</span>
													        </button>
													      </div>
													      <div class="modal-body alert alert-warning">
													        ¿Desea eliminar al Dr(a). '.$value["nombre"].' '.$value["apellido"].'? <br>
													        


													      </div>
													      <div class="modal-footer">
													        	      			
															<button class="btn btn-success EliminarDoctor" Did="'.$value["id"].'" imgD="'.$value["foto"].'"><i class="fa fa-trash"></i> Sí, Eliminar Doctor</button>
															
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

<!-- MODAL PARA CREAR DOCTOR -->
<div class="modal fade" rol="dialog" id="CrearDoctor">
	
	<div class="modal-dialog">
		
		<div class="modal-content">
			
			<form method="post" role=form>
				
				<div class="modal-body">
					
					<div class="box-body">
							
						<div class="form-group">
							
							<h4>Nombre: </h4>

							<input type="text" class="form-control input"  name="nombre" required>

						</div>

						<div class="form-group">
							
							<h4>Apellido: </h4>

							<input type="text" class="form-control input"  name="apellido" required>

							<input type="hidden" name="rolD" value="Doctor" required>

						</div>

						<div class="form-group">
							
							<h4>Cédula: </h4>

							<input type="text" class="form-control input"  name="cedula" required>

						</div>

						<div class="form-group">
							
							<h4>Sexo:</h4>

							<select class="form-control input" name="sexo" required="">
								
								<option value="" disabled selected>Sexo . . . </option>

								<option value="Masculino">Masculino</option>

								<option value="Femenino">Femenino</option>

							</select>

						</div>


						<div class="form-group">
							
							<h4>Especialidad:</h4>

							<select class="form-control input" name="especialidad" required="">
								
								<option value="" disabled selected>Especialidad . . .</option>

								<?php

								$columna = null;

								$valor = null;

								$resultado = EspecialidadesC::VerEspecialidadesC($columna, $valor);

								foreach ($resultado as $key => $value) {
									# code...
									echo'

										<option value='.$value["id"].'>'.$value["nombre_especialidad"].'</option>

									';

								}

								?>

							</select>

						</div>	


						<div class="form-group">
							
							<h4>Consultorio:</h4>

							<select class="form-control input" name="consultorio" required="">
								
								<option value="" disabled selected>Consultorio . . .</option>

								<?php

								$columna = null;

								$valor = null;

								$resultado = ConsultoriosC::VerConsultoriosC($columna, $valor);

								foreach ($resultado as $key => $value) {
									# code...
									echo'

										<option value='.$value["id"].'>'.$value["nombre"].'</option>

									';

								}

								?>

							</select>

						</div>	




						<div class="form-group">
							
							<h4>Usuario: </h4>

							<input type="text" class="form-control input"  name="usuario" required>

						</div>

						<div class="form-group">
							
							<h4>Contraseña: </h4>

							<input type="text" class="form-control input"  name="clave" required>

						</div>

						<div class="form-group">
							
							<h4>Color Cita: </h4>

							<input type="color" class="form-control input"  name="color" required>

						</div>

					</div>

				</div>

				<div class="modal-footer">
					
					<button type="submit" class="btn btn-primary">Crear</button>

					<button type="submit" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

				</div>

				<?php

				$crear = new DoctoresC();
				$crear -> CrearDoctorC();

				?>

			</form>

		</div>

	</div>

</div>


<!-- MODAL PARA EDITAR DOCTOR -->
<div class="modal fade" rol="dialog" id="EditarDoctor" onload="javascript:myFunction()">
	
	<div class="modal-dialog">
		
		<div class="modal-content">
			
			<form method="post" role="form">
				
				<div class="modal-body">
					
					<div class="box-body">

						<div class="form-group">
							
							<h4>Nombre:</h4>

							<input type="text" class="form-control input" id="nombreE" name="nombreE" required>

						</div>

						<div class="form-group">
							
							<h4>Apellido:</h4>

							<input type="text" class="form-control input" id="apellidoE" name="apellidoE" required>

							<input type="hidden" id="Did" name="Did">

						</div>

						<div class="form-group">
							
							<h4>Cédula: </h4>

							<input type="text" class="form-control input" id="cedulaE" name="cedulaE" required>

						</div>


						<div class="form-group">
							
							<h4>Consultorio: </h4>

							<select class="form-control input" name="consultorioE" required="true" id="consultorioE">
								


								<option  selected disabled="true" value=""> Consultorio . . . </option>

								<?php 

								$columna = null;

								$valor = null;

								$resultado = ConsultoriosC::VerConsultoriosC($columna, $valor);

								foreach ($resultado as $key => $value) {
									# code...
									echo'

										<option value='.$value["id"].'>'.$value["nombre"].'</option>

									';

								}

								?>

							</select> 

						</div>


						<div class="form-group">
							
							<h4>Sexo:</h4>

							<select class="form-control input" name="sexoE" required>
								
								<option id="sexoE"></option>

								<option value="Masculino">Masculino</option>

								<option value="Femenino">Femenino</option>

							</select>

						</div>

						<div class="form-group">
							
							<h4>Especialidad:</h4>

							<!--<input type="text" name="especialidadE" id="especialidadE" >	
							
							 <button type="button" onclick="myFunction()">Try it</button>

							<script type="text/javascript">
								
								function myFunction() {
								var x = document.getElementById("especialidadE").value;
								document.getElementById("demo").innerHTML = x;
										}

								
							</script>

							demo:<p id="demo"></p> -->

							<select class="form-control input" name="especialidadE" required="true" id="especialidadE">
								


								<option  selected disabled="true" value=""> Especialidad . . . </option>

								<?php 

								$columna = null;

								$valor = null;

								$resultado = EspecialidadesC::VerEspecialidadesC($columna, $valor);

								foreach ($resultado as $key => $value) {
									# code...
									echo'

										<option value='.$value["id"].'>'.$value["nombre_especialidad"].'</option>

									';

								}

								?>

							</select> 

						</div>	

			
							<div class="form-group">
							
							<h4>Usuario: </h4>

							<input type="text" class="form-control input" id="usuarioE" name="usuarioE" required>

						</div>

						<div class="form-group">
							
							<h4>Contraseña: </h4>

							<input type="text" class="form-control input" id="claveE" name="claveE" required>

						</div>

						<div class="form-group">
							
							<h4>Color Cita: </h4>

							<input type="color"  class="form-control input" id="colorE" name="colorE" required>

							

						</div>

					</div>

				</div>

				<div class="modal-footer">
					
					<button type="submit" class="btn btn-success">Guardar Cambios</button>

					<button type="submit" class="btn btn-danger" data-dismiss="modal">Cancelar</button>



				</div>

				<?php

				 $actualizar = new DoctoresC();
				 $actualizar -> ActualizarDoctorC();

				?>

				

			</form>

		</div>

	</div>

</div>




<?php

	$borrarD = new DoctoresC();
	$borrarD -> BorrarDoctorC();





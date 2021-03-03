<?php
// Turn off all error reporting
error_reporting(0);
?>


<?php

if($_SESSION["rol"] != "Secretaria" && $_SESSION["rol"] != "Doctor" && $_SESSION["rol"] != "Administrador"){

	echo'<script>

	window.location = "inicio"
	</script>';


	return;

}

?>

<div class="content-wrapper">
	
	<section class="content-header">
		
		<h1>Historial de Citas Médicas</h1>

	</section>

	<section class="content">
		
		<div class="box">

			<div class="box-body">
				
				<table id="historial" class="table table-bordered table-hover table-striped DT-historial">
					
					<thead>
						
						<tr>
							
							<th>Fecha y Hora</th>
							<th>Doctor</th>
							<th>Paciente</th>
							<!-- <th>Consultorio</th> -->
							<th>Observaciones</th>
							<th>Ver</th>
																					

						</tr>

					</thead>

					<tbody>


						<?php

						$resultado = CitasC::VerCitasC();

						foreach ($resultado as $key => $value) {
							

							echo '

							<tr>


								<td>'.$value["inicio"].'</td>';

								$columna = "id";
								$valor = $value["id_doctor"];

								$doctor = DoctoresC::DoctorC($columna, $valor);

								#echo '<td> aa </td>';
								echo '

								<td>'.$doctor["apellido"].' '.$doctor["nombre"].'';
					
								if (empty($doctor["nombre"]) == 1 && empty($doctor["apellido"]) == 1) 
								{
								echo'<div class="alert-sm alert-warning" style="text-align:center"> <i class="fa fa-warning"></i> Sin Doctor</div>';
								}

								echo'

								</td>
								<td>'.$value["nyaP"].'

								';
								if (empty($value["nyaP"]) == 1) 
								{
								echo'<div class="alert-sm alert-warning" style="text-align:center"> <i class="fa fa-warning"></i> Sin Doctor</div>';
								}

								echo'</td>';

								$valor = $value["id_consultorio"];

								$consulotrio = ConsultoriosC::VerConsultoriosC($columna, $valor);


								// echo'

								// <td>'.$consulotrio["nombre"].'';

								// if (empty($consulotrio["nombre"]) == 1) 
								// {
								// #echo'<div class="alert-sm alert-warning" style="text-align:center"> <i class="fa fa-warning"></i> Sin Consultorio</div>';
								// }

								// echo'</td>';

								echo'
								<td>'.$value["documento"].'</td>';



							echo'

								<td>

									<a href="http://localhost/clinica/EditarCita/'.$value["id"].'">
										<button style="" type="button" class="btn btn-success" data-toggle="modal" data-target="#CrearPaciente">
												<i class="fa fa-pencil" aria-hidden="true"></i>
													
										</button>
									</a>


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






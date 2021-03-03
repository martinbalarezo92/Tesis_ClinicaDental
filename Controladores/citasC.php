<?php


class CitasC{
	
	///Pedir Cita Paciente
	public function EnviarCitaC(){

		if(isset($_POST["Did"])){

			$tablaBD = "citas";

			$Did = substr($_GET["url"], 7);

			$datosC = array("Did"=>$_POST["Did"], "Pid"=>$_POST["Pid"], "nyaC"=>$_POST["nyaC"], "Cid"=>$_POST["Cid"], "documentoC"=>$_POST["documentoC"], "fyhIC"=>$_POST["fyhIC"], "fyhFC"=>$_POST["fyhFC"]);

			$resultado = CitasM::EnviarCitaM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

					window.location = "Doctor/"'.$Did.';
				</script>';

			}

		}

	}

	//MOstrar citas

	public function VerCitasC(){

		$tablaBD = "citas";

		$resultado = CitasM::VerCitasM($tablaBD);

		return $resultado;


	}


	public function VerCitaC($id_cita){

		$tablaBD = "citas";

		$resultado = CitasM::VerCitaM($tablaBD, $id_cita);

		return $resultado;
	}


	public function EditarCita(){


		$id_cita = substr($_GET["url"],11);

		$cita = CitasC::VerCitaC($id_cita);

		
				echo'

					<div class="container col-md-12">
		
						<div class="row">              
							
							<div class="box-body">

								<div class="col-md-2">

									<div class="form-group">
																	

										<div class="container">

											<div class="row">
												
												<div class="col-md-12">
													
													<h4>Paciente:</h4>

													<input type="hidden" id="telf_pac">
													<input type="hidden" value="'.$id_cita.'" readonly name="id_cita_Editar">


													<select class="form-control input pacientes" name="nombreP_Editar" required>';

													$columna = "id";
													$valor_p = $cita["id_paciente"];
													
													$paciente = PacientesC::VerPacientesC($columna, $valor_p);
                  
                  									echo'
                  									<option telf_pac="'.$paciente["telefono_01"].'" id_paciente="'.$paciente["id"].'" selected>'.$paciente["apellido"].' '.$paciente["nombre"].'</option>';

                  									$columna = null;
									                $valor = null;

									                $resultado = PacientesC::VerPacientesC($columna, $valor);

									                foreach ($resultado as $key => $value) {
									                  
									                  echo '<option id_paciente="'.$value["id"].'" value="'.$value["nombre"].' '.$value["apellido"].'">'.$value["apellido"].' '.$value["nombre"].'</option>';

									                }

                  									echo'

                  									</select>
													<input id="Pid" class="form-control" type="hidden" name="id_paciente_Editar" value="'.$cita["id_paciente"].'"readonly>													
												</div>					

												<div class="col-md-12">
													
													<h4>Doctor: (Transferir cita)</h4>

													<select class="form-control input doctores" name="nombreD_Editar" required>';

													$columna = "id";
													$valor = $cita["id_doctor"];
													$doctor = DoctoresC::DoctorC($columna, $valor);
                  
                  									echo'

                  									<option style="background: white" doc_id="'.$doctor["id"].'" selected>' .$doctor["apellido"].' '.$doctor["nombre"].' </option>';

                  									$columna = null;
									                $valor = null;

									                $resultado = DoctoresC::VerDoctoresC($columna, $valor);

									                foreach ($resultado as $key => $value) {
									                  
									                echo
									                '<option color_doctor="'.$value["colorCita"].'" id_consultorio="'.$value["id_consultorio"].'" doc_id="'.$value["id"].'" value="'.$value["nombre"].' '.$value["apellido"].'">'.$value["apellido"].' '.$value["nombre"].'</option>';


									                }

                  									echo'
                  									</select>
														
                  									<input id="doc_id" class="form-control" type="hidden" name="id_doctor_Editar" value="'.$cita["id_doctor"].'"readonly>


												</div>							

											</div>

										</div>


										<div class="container">

											<div class="row">
												
																						

											</div>

										</div>

										';

										
   										$fecha = explode(" ", $cita["inicio"]); 
   										$hora_inicio = explode(" ", $cita["inicio"]); 
   										$hora_fin = explode(" ", $cita["fin"]);

										echo'

										<div class="container">

											<div class="row">

												<div class="col-md-4">


													<h4>Fecha:</h4> 

													<input class="form-control" type="date" onchange="fechayhoraOC()" id="fechaC" value="'.$fecha[0].'" name="fechaC_Editar" required="true">


											
												</div>

												<div class="col-md-4">

													<h4>Hora Inicio:</h4><input onchange="fechayhoraOC()" class="form-control" type="time" id="horaC" value="'.$hora_inicio[1].'">

												</div>

												<div class="col-md-4">

													<h4>Hora Fin:</h4><input onchange="fechayhoraFINOC()" onfocusout="validarFecha()" class="form-control" type="time" id="horaCF"  value="'.$hora_fin[1].'">

												</div>

											</div>

										</div>



										 <input type="hidden" class="hinicio_editar form-control input" name="fyhIC_Editar" id="fyhIC_Editar" value="'.$cita["inicio"].'">

         							     <input type="hidden" class="hfin_editar form-control input" name="fyhFC_Editar" id="fyhFC_Editar" value="'.$cita["fin"].'">


										<div class="container">

											<div class="row">
												
												<div class="col-md-6">
													
													<h4>Descripcion:</h4> <textarea class="input" placeholder="Observaciones" type="text" name="descripcion_Editar" cols="150" rows="6">'.$cita["documento"].'</textarea>	
													
												</div>											

											</div>

										</div>
											
									</div>

								</div>					

							</div>

						</div>

						<button type="submit" class="btn btn-primary">Actualizar</button>

						<button type="button" class="btn btn-danger" onclick="goBack()">Cancelar</button>

							<script>

								function goBack() 
								{
								  window.history.back();
								}

							</script>

						</div>			

					';

					
	}

	//Pedir cita como doctor
	public function PedirCitaDoctorC(){

		if(isset($_POST["Did"])){

			$tablaBD = "citas";

			$Did = substr($_GET["url"], 6);

			$datosC = array("Did"=>$_POST["Did"], "Cid"=>$_POST["Cid"], "id_paciente" => $_POST["Pid"], "nombreP"=>$_POST["nombreP"], "colorCita" => $_POST["colorCita"], "documentoP"=>$_POST["documentoP"], "fyhIC"=>$_POST["fyhIC"], "fyhFC"=>$_POST["fyhFC"], "colorCita" => $_POST["colorCita"]);

			$resultado = CitasM::PedirCitaDoctorM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				window.location = "'.$Did.'";
				</script>';

			}

		}

	}

	public function ActualizarCitaC(){

		

		if(isset($_POST["id_cita_Editar"])){

		

			$tablaBD = "citas";

		//	$doctor = $_POST["id_cita_Editar"];

			$datosC = array("id" => $_POST["id_cita_Editar"], "id_doctor" => $_POST["id_doctor_Editar"], "id_paciente" => $_POST["id_paciente_Editar"], "nyaP" => $_POST["nombreP_Editar"], "observaciones" => $_POST["descripcion_Editar"], "inicio" => $_POST["fyhIC_Editar"], "fin" => $_POST["fyhFC_Editar"]);

			$resultado = CitasM::ActualizarCitaM($tablaBD, $datosC);
			
			if($resultado == true){

				if ($_SESSION["rol"]=="Secretaria") {

				echo '<script>

					window.location = "http://localhost/clinica/inicio";
					
				
				</script>';

				} 

				if ($_SESSION["rol"]=="Doctor") {

				echo '<script>

					window.location = "http://localhost/clinica/Citas/'.$_SESSION["id"].'";
					
				
				</script>';

				}

				



			}

		}

		
	}

}
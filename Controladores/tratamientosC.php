<?php 

class TratamientosC
{
	
	public function verTratamientosC()
	{
		
		$tablaBD = "tratamientos";
		
		$id = substr($_GET["url"], 13);
		//$id = 1;

		$resultado = TratamientosM::VerTratamientosM($tablaBD, $id);		

		return $resultado;	

	}

	public function verDiagnosticosC()
	{

		$tablaBD = "diagnostico";

		$id = substr($_GET["url"], 13);

		$resultado = TratamientosM::VerDiagnosticosM($tablaBD, $id);		

		return $resultado;	

	}




		public function verDiagnosticoDetalleC($id_diagnostico)
	{

		$tablaBD = "diagnostico";

		$resultado = TratamientosM::VerTraramientoM($tablaBD, $id_diagnostico);

		return $resultado;	

	}

	public function BorrarDiagnosticoC(){

		//if(isset($_GET["Diagnostico_id"])){

			$tablaBD = "diagnostico";

			$id = substr($_GET["url"], 21);

			
			$resultado = TratamientosM::BorrarDiagnosticoM($tablaBD, $id);

			if($resultado == true){

				echo'

				
				<script>

					window.history.back();

				</script>';

			}

		//}

	}

	public function BorrarTraramientoSesionC(){

		//if(isset($_GET["Diagnostico_id"])){

			$tablaBD = "tratamiento_paciente";

			$id = substr($_GET["url"], 27);

			
			$resultado = TratamientosM::BorrarTratamientoSesionM($tablaBD, $id);

			if($resultado == true){

				echo'

				
				<script>

					window.history.back();

				</script>';

			}

		//}

	}



	public function EditarDiagnosticoC(){


		

		if (substr($_GET["url"], 0, 20) == "eliminar-diagnostico") {
			
			$id_diagnostico = substr($_GET["url"], 21);
		}
		if (substr($_GET["url"], 0, 18) == "editar-diagnostico") {
			
			$id_diagnostico = substr($_GET["url"], 19);
		}

		//$id_diagnostico = substr($_GET["url"], 19);



		$EditarDiagnostico = TratamientosC::verDiagnosticoDetalleC($id_diagnostico);

		$EditarDiagnostico["id_paciente"];

		

		echo'

		<div class="container col-md-12">
		
		<div class="row">              

		<div class="box-body">

		<div class="col-md-2">

		<div class="form-group">
									
	
		</div>

		</div>

		<div class="col-md-12">

		<div class="form-group">

		<h4>DIAGNÓSTICO: </h4>

		<input type="text" class="form-control"  name="diagnosticoActualizar" placeholder="INGRESE DIAGNÓSTICO" value="'.$EditarDiagnostico["diagnostico"].'" required>

		<input type="hidden" class="form-control"  name="id_diagnosticoActualizar" placeholder="INGRESE DIAGNÓSTICO" value="'.$EditarDiagnostico["id"].'" required>

		<input type="hidden" class="form-control"  name="id_paciente" placeholder="INGRESE DIAGNÓSTICO" value="'.$EditarDiagnostico["id_paciente"].'" required>


		</div>

		</div>



		<div class="col-md-12">

		<div class="form-group">

		<h4>CIE: </h4>

		<input type="text" class="form-control"  name="CIEActualizar" placeholder="INGRESE PROCEDIMIENTOS" value="'.$EditarDiagnostico["cie"].'" required>

		</div>

		</div>


		<div class="col-md-12">

		<div class="form-group">

		<h4>PRESUNTIVO (PRE) - DEFINIFIVO (DEF): </h4>

		<input type="text" class="form-control"  name="pre_defActualizar" placeholder="INGRESE PRESCRIPCIONES" value="'.$EditarDiagnostico["pre_def"].'" required>

		</div>  

		</div>


		</div>


		</div>


		<button type="submit" class="btn btn-primary">Actualizar</button>

		<button type="button" class="btn btn-danger" onclick="goBack()">Cancelar</button>







		



		';

		

		  	//$borrarT = new TratamientosC();
			//$borrarT -> BorrarDiagnosticoC();

 

		echo'




		<script>
		function goBack() {
			window.history.back();
		}
		</script>
		</div>

		';

	}

	public function verTratamientoDetalleC(){

		$tablaBD = "tratamiento_paciente";

		$id = substr($_GET["url"], 13);
		//$id = 1;

		$resultado = TratamientosM::verTratamientoDetalleM($tablaBD, $id);		

		return $resultado;	

	}

	public function verTratamientoDetalleCountC(){

		$tablaBD = "tratamiento_paciente";

		$id = substr($_GET["url"], 13);
		//$id = 1;

		$resultado = TratamientosM::verTratamientoDetalleCountM($tablaBD, $id);		

		return $resultado;	

	}

	public function verTratamientoC($id_tratamiento){

			$tablaBD = "tratamiento_paciente";

			$resultado = TratamientosM::VerTraramientoM($tablaBD, $id_tratamiento);

			return $resultado;	

	}

	public function crearDiagnosticoC(){

		$id_paciente = substr($_GET["url"], 18);



		echo'

		<div class="container col-md-12">
    
    <div class="row">              

      <div class="box-body">

        <div class="col-md-2">

          <div class="form-group">
            
            
          </div>

        </div>

        <div class="col-md-12">

          <div class="form-group">

            <h4>DIAGNÓSTICO: </h4>

            <input type="text" class="form-control"  name="diagnosticoCrear" placeholder="INGRESE DIAGNÓSTICO" value="" required>

            <input type="hidden" class="form-control"  name="id_diagnosticoCrear" placeholder="INGRESE DIAGNÓSTICO" value="" required>

            <input type="hidden" class="form-control"  name="id_pacienteCrear" placeholder="INGRESE DIAGNÓSTICO" value="'.$id_paciente.'" required>


          </div>

        </div>



        <div class="col-md-12">

          <div class="form-group">

            <h4>CIE: </h4>

            <input type="text" class="form-control"  name="CIECrear" placeholder="CIE" value="" required>

          </div>

        </div>


        <div class="col-md-12">

          <div class="form-group">

            <h4>PRESUNTIVO (PRE) - DEFINIFIVO (DEF): </h4>

            <input type="text" class="form-control"  name="pre_defCrear" placeholder="PRE_DEF" value="" required>

          </div>  

        </div>


      </div>


    </div>
    <button type="submit" class="btn btn-primary">Crear</button>

    <button type="button" class="btn btn-danger" onclick="goBack()">Cancelar</button>


    <script>
      function goBack() {
        window.history.back();
      }
    </script>
  </div>

		';

		if(isset($_POST["id_pacienteCrear"])){

			$tablaBD = "diagnostico";

			$datosC = array("id_paciente" => $id_paciente, "diagnostico" => $_POST["diagnosticoCrear"],  "cie" => $_POST["CIECrear"],  "pre_def" => $_POST["pre_defCrear"]);


			$resultado = TratamientosM::crearDiagnosticoM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				window.location = "http://localhost/clinica/tratamientos/'.$_POST["id_pacienteCrear"].'";
				</script>';

			}else{
					echo '<script>

				alert("Hubo un error al crear la sesion!!");
				</script>';
			}

		}

	}


	public function crearTratamientoSesionC(){

		$id_paciente = substr($_GET["url"], 20);

		echo'
		<div class="container col-md-12">
		
						<div class="row">              
							
							<div class="box-body">

								<div class="col-md-2">

									<div class="form-group">

										<h4>Fecha: </h4>

										<input type="date" class="form-control" style="width: 150%" name="fechaCrear" required>

										<input type="hidden" name="id_paciente" value="'.$id_paciente.'">

									</div>

								</div>



								<div class="col-md-12">

									<div class="form-group">

										<h4>DIAGNÓSTICO Y COMPLICACIONES: </h4>

										<input type="text" class="form-control"  name="diagnostico_y_complicacionesCrear" placeholder="INGRESE DIAGNÓSTICO Y COMPLICACIONES" required>

									</div>

								</div>



								<div class="col-md-12">

									<div class="form-group">

										<h4>PROCEDIMIENTOS: </h4>

										<input type="text" class="form-control"  name="procedimientosCrear" placeholder="INGRESE PROCEDIMIENTOS" required>

									</div>

								</div>


								<div class="col-md-12">

									<div class="form-group">

										<h4>PRESCRIPCIONES: </h4>

										<input type="text" class="form-control"  name="prescripcionesCrear" placeholder="INGRESE PRESCRIPCIONES" required>

									</div>  

								</div>



								<div class="col-md-6">

									<div class="form-group">

										<h4>CÓDIGO: </h4>

										<input type="text" class="form-control"  name="codigoCrear" placeholder="INGRESE CÓDIGO" required>

									</div>  

								</div>




								<div class="col-md-6">

									<div class="form-group">

										<h4>FIRMA: </h4>

										<input type="text" class="form-control"  name="firmaCrear" placeholder="INGRESE FIRMA (C.I.)" required>

									</div>  

								</div>

							</div>


						</div>
						<button type="submit" class="btn btn-primary">Crear</button>

						<button type="button" class="btn btn-danger" onclick="goBack()">Cancelar</button>


							<script>
								function goBack() {
								  window.history.back();
								}
							</script>
					</div>

		';

		if(isset($_POST["id_paciente"])){

			$tablaBD = "tratamiento_paciente";

			$datosC = array("id_paciente" => $id_paciente, "diagnostico_y_complicaciones" => $_POST["diagnostico_y_complicacionesCrear"],  "procedimientos" => $_POST["procedimientosCrear"],  "fecha_tratamiento" => $_POST["fechaCrear"],   "prescripciones" => $_POST["prescripcionesCrear"],    "codigo" => $_POST["codigoCrear"],     "firma" => $_POST["firmaCrear"]);


			$resultado = TratamientosM::crearTratamientoSesiontM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				window.location = "http://localhost/clinica/tratamientos/'.$_POST["id_paciente"].'";
				</script>';

			}else{
					echo '<script>

				alert("Hubo un error al crear la sesion!!");
				</script>';
			}

		}

	}



	public function crearTratamientoC(){
		
		$tablaBD = "tratamientos";

		$id_paciente = array("id_paciente" => substr($_GET["url"], 13));

		$resultado = TratamientosM::CrearTratamienetoM($tablaBD, $id_paciente);	

		if($resultado == true){

			echo '<script>
			//window.location = "http://localhost/clinica/inicio";
			window.location = "http://localhost/clinica/tratamientos/'.$id_paciente["id_paciente"].'";
			</script>';

		}

	}


	public function EditarTratamientosC(){

		$resultado_tratamientos = TratamientosC::verTratamientosC();

		$columna = null;
		$valor = null;
		$resultado_tratamiento_detalle = TratamientosC::verTratamientoDetalleC();
		$resultado_diagnostico = TratamientosC::verDiagnosticosC();
		$resultado_tratamiento_detalleCount = TratamientosC::verTratamientoDetalleCountC();
		//$resultado_hc_aaa = "aaa";

		$id_paciente = substr($_GET["url"], 13);

		$resultado_paciente = PacientesC::VerPacientesC("id", $id_paciente);
		
		echo'

		<input type="hidden" name="id_tratamiento" value="'.$resultado_paciente["id"].'">
		<input type="hidden" name="id_paciente" value="'.$id_paciente.'">';

			if (isset($resultado_tratamientos["id"]) == false) {

			

			echo'
			<div class="alert alert-warning" role="alert">
			  El paciente no tiene un tratamiento!
			</div>

				
			'; 

			
			$crearHC = new TratamientosC();
			$crearHC -> crearTratamientoC();

			


		} 
	
		else{

		echo'
		<!-- 10 PLANES DE DIAGNÓSTICO, TEREPÉUTICO Y EDUCACIONAL -->

						<div class="container">

							<div class="row">								

								<div class="col-5"><h3>10 PLANES DE DIAGNÓSTICO, TEREPÉUTICO Y EDUCACIONAL</h3>							

									<div class="container">
										
										<div class="row">
											
											<div class="col-md-3">

												<div class="row">
													
													<div class="col-md-7"><label for="biometria">BIOMETRÍA</label></div>
													<div class="col-md-3">

														<input class="form-check-input" type="checkbox" onclick="pdte_biometria_Check()" id="biometria" value="biometria">
														<input type="hidden" id="PDTE1" name="biometria">

													</div>

												</div>

											</div>


											<div class="col-md-3">

												<div class="row">
													
													<div class="col-md-7"><label for="quimica_sanguinea">QUÍMICA SANGUÍNEA</label></div>
													<div class="col-md-3">

														<input class="form-check-input" type="checkbox" onclick="pdte_quimica_sanguinea_Check()" id="quimica_sanguinea" value="quimica_sanguinea">
														<input type="hidden" id="PDTE2" name="quimica_sanguinea">

													</div>

												</div>

											</div>


											<div class="col-md-3">

												<div class="row">
													
													<div class="col-md-7"><label for="rayos_x">RAYOS - X</label></div>
													<div class="col-md-3">

														<input class="form-check-input" type="checkbox" onclick="pdte_rayos_x_Check()" id="rayos_x" value="rayos_x">
														<input type="hidden" id="PDTE3" name="rayos_x">
													</div>

												</div>

											</div>


											<div class="col-md-3">

												<div class="row">
													
													<div class="col-md-7"><label for="otros">OTROS</label></div>

													<div class="col-md-3">

														<input class="form-check-input" type="checkbox" onclick="pdte_otros_Check()" id="otros" value="otros">
														<input type="hidden" id="PDTE4" name="otros">

													</div>

												</div>

											</div>								

										</div>

									</div>

										<div class="row">

											<div class="col-md-11">
											
												<textarea class="input-sm" name="txt_area_planes" rows="5" cols="100" placeholder="Descripción">'.$resultado_tratamientos["planes_descripcion"].'</textarea> 	

											</div>

										</div>

								</div>				

							</div>

						</div>

						<!-- 11 DIAGNÓSTICO  -->				
				
						<div class="container">
						
								<div style="float: right">


									<a  href="http://localhost/clinica/nuevo-diagnostico/'.$id_paciente.'">
										
										<button class="btn btn-primary" type="button">
											<i class="fa fa-plus" aria-hidden="true"></i> 
											NUEVO DIAGNÓSTICO
										
										</button>
									</a>


								</div>
							<div class="row">

								<input type="hidden" id="d_pre01" name="d_pre01">
								<input type="hidden" id="d_def01" name="d_def01">

								<input type="hidden" id="d_pre02" name="d_pre02">
								<input type="hidden" id="d_def02" name="d_def02">

								<input type="hidden" id="d_pre03" name="d_pre03">
								<input type="hidden" id="d_def03" name="d_def03">

								<input type="hidden" id="d_pre04" name="d_pre04">
								<input type="hidden" id="d_def04" name="d_def04">


								<div class="col-5"><h3>11 DIAGNÓSTICO</h3>

								<!-- CABECERA  -->

									

									<div clas="row">
										
										<div class="col-md-11">
																	
											<div class="col-md-1"></div>
											<div class="col-md-7">DIAGNOTSICO</div>
											<div class="col-md-2">CIE</div>
											<div class="col-md-2">PRE - DEF</div>
											


											
										</div>

										<div class="col-md-1">											
												
												<div class="col-md-12">Editar</div>
									
										</div>
													

									</div>
									
									';

									foreach ($resultado_diagnostico as $key => $value) {
									
									echo'

									<div clas="row">
										
										<div class="col-md-11">
											
											<div id="row_diagnotico_01" class="row">
												
												<div class="col-md-1">

													<small><strong>'.($key+1).'</strong></small>

												</div>

												<div class="col-md-7">

													<input readonly class="input-sm" style="width: 100%" type="text" name="diagnostico_01" value="'.$value["diagnostico"].'">

												</div>

												<div class="col-md-2">

													<input readonly class="input-sm" placeholder="CIE" style="width: 100%" type="text" name="cie_01" value="'.$value["cie"].'">

												</div>

												<div class="col-md-2">

													<input readonly class="input-sm" style="width: 100%" type="text" name="diagnostico_01" value="'.$value["pre_def"].'">

												</div>

												

											</div>

										</div>	
									
										<div class="col-md-1">

											<div class="col-md-7">

												<a href="http://localhost/clinica/editar-diagnostico/'.$value["id"].'">
													<button style="width: 85px" type="button" class="btn btn-primary" data-toggle="modal" data-target="#CrearPaciente">
	  													<i class="fa fa-pencil" aria-hidden="true"></i>
		  													Editar
													</button>
												</a>
												
  											
  											</div>							


											<div class="col-md-7">

												<a href="http://localhost/clinica/eliminar-diagnostico/'.$value["id"].'">
													<button style="width: 85px" type="button" class="btn btn-danger" data-toggle="modal" data-target="#CrearPaciente">
	  													<i class="fa fa-times"></i>
		  													Eliminar
													</button>
												</a>
  											
  											</div>

										</div>

									</div>		
									
									<br><br><br>
									<hr>
									

									';
								}

									echo'
									<br><br><br>


									<div class="row">
										
										<div class="col-md-2">
											
											<div class="row">
												
												<div class="col-md-10">FECHA DE APERTURA</div>
												<div class="col-md-6"><input style="width: 200%" class="input-sm" type="date" name="fecha_apertura" id="fecha_apertura" value="'.$resultado_tratamientos["fecha_apertura"].'"></div>

											</div>

										</div>
										<div class="col-md-2">
											
											<div class="row">
												
												<div class="col-md-10">FECHA DE CONTROL</div>
												<div class="col-md-6"><input style="width: 200%" class="input-sm" type="date" name="fecha_control" id="fecha_control" value="'.$resultado_tratamientos["fecha_control"].'"></div>

											</div>

										</div>
										<div class="col-md-4">
											
											<div class="row">
												
												<div class="col-md-10">PROFESIONAL</div>
												<div class="col-md-6">
												<input style="width: 100%" class="input-sm" type="text" value="'.$resultado_tratamientos["profesional"].'" name="profesional" id="profesional"></div>
												<div class="col-md-6">
												<input style="width: 100%" class="input-sm" type="text" value="'.$resultado_tratamientos["codigo"].'" name="codigo" id="codigo" placeholder="CÓDIGO"></div>

											</div>

										</div>
										<div class="col-md-2">
											
											<div class="row">
												
												<div class="col-md-10">FIRMA</div>
												<div class="col-md-6"><input class="input-sm" type="text" value="'.$resultado_tratamientos["firma"].'" name="firma" id="firma" placeholder="CÉDULA"></div>

											</div>

										</div>
										<div class="col-md-2">
											
											<div class="row">
												
												<div class="col-md-10">NÚMERO DE HOJA</div>
												<div class="col-md-6">
												<input class="input-sm" style="width: 100%" min="1" type="number" value="'.$resultado_tratamientos["numero_hoja"].'" name="numero_hoja" onkeypress="return isNumber(event)" id="numero_hoja"></div>

											</div>

										</div>
										
									</div>

								</div>				

						

						<!-- 12 TRATAMIENTO  -->
						<hr>
								<div> 

									<h3>12 TRATAMIENTO</h3>

								</div>


						<div class="container">
														

								<div style="float: right">

									<a href="http://localhost/clinica/tratamientos-sesion/'.$id_paciente.'">
										
										<button class="btn btn-primary" type="button">
											<i class="fa fa-plus" aria-hidden="true"></i> 
											NUEVO TRATAMIENTO
										
										</button>
									</a>

								</div>


							<div class="row">

								<div class="container">
								
									<div class="row">

										<div class="col-md-11">

											<div class="col-md-2 centrado"><h4>SESIÓN Y FECHA</h4></div>

											<div class="col-md-3 centrado"><h4>DIAGNÓSTICO Y COMPLICACIONES</h4></div>

											<div class="col-md-3 centrado"><h4>PROCEDIMIENTOS</h4></div>

											<div class="col-md-2 centrado"><h4>PRESCRIPCIONES</h4></div>

											<div class="col-md-2 centrado"><h4>CÓDIGO Y FIRMA</h4></div>

										</div>

										<div class="col-md-1">

											<div class="col-md-12 centrado"><h4>EDITAR</h4></div>									

										</div>

									</div>
									

								';


								

								foreach ($resultado_tratamiento_detalle as $key => $value) {
									
									echo'

									<div class="row">

										<div class="col-md-11">	
											<div class="col-md-2 centrado">


												<div class="row">
													<div class="col-md-2">SESIÓN:</div>
													<div class="col-md-8"><strong>'.($key+1).'</strong></div>
												</div>

												<div class="row">
													<div class="col-md-12 centrado">FECHA</div>												
												</div>

												<div class="row">
													<div class="col-md-12"><input readonly class="input-sm" style="width: 98%" type="text" name="" value="'.$value["fecha_tratamiento"].'"></div>
													
												</div>

											</div>

											<div class="col-md-3">

												<textarea class="input-sm" readonly name="txt_area_diagnostico" rows="3" cols="30" placeholder="DIAGNOSTICOS Y COMPLICACIONES">'.$value["diagnostico_y_complicaciones"].'</textarea> 

											</div>

											<div class="col-md-3">

												<textarea class="input-sm" readonly name="txt_area_procedimientos" rows="3" cols="30" placeholder="PROCEDIMIENTOS">'.$value["procedimientos"].'</textarea> 

											</div>

											<div class="col-md-2">

												<textarea class="input-sm" readonly name="txt_area_prescripciones" rows="3" cols="16" placeholder="PRESCRIPCIONES">'.$value["prescripciones"].'</textarea>

											</div>

											<div class="col-md-2 centrado">

												<div class="row">
													<div class="col-md-4 centrado">CÓDIGO</div>
													<div class="col-md-8 centrado"><input readonly class="input-sm" type="text" style="width: 95%" name="" value="'.$value["codigo"].'"></div>
												</div>
												<div class="row">
													<div class="col-md-12 centrado">FIRMA</div>												
												</div>
												<div class="row">
													<div class="col-md-12"><input readonly style="width: 95%" class="input-sm" type="text" name="" value="'.$value["firma"].'"></div>												
												</div>

											</div>

										</div>

										<div class="col-md-1">

											<div class="col-md-7">

												<a href="http://localhost/clinica/editar-tratamiento/'.$value["id"].'">
													<button style="width: 85px" type="button" class="btn btn-primary" data-toggle="modal" data-target="#CrearPaciente">
	  													<i class="fa fa-pencil" aria-hidden="true"></i>
		  													Editar
													</button>
												</a>
												
  											
  											</div>							


											<div class="col-md-7">

												<a href="http://localhost/clinica/eliminar-tratamientoSesion/'.$value["id"].'">
													<button style="width: 85px" type="button" class="btn btn-danger" data-toggle="modal" data-target="#CrearPaciente">
	  													<i class="fa fa-times" aria-hidden="true"></i>
		  													Eliminar
													</button>
												</a>
  											
  											</div>

										</div>

									</div>
									<hr>
									

									';
								}


									echo'
								
									</div>											

							</div>

						</div>

					<p><button type="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button></p>


	

		';

		echo'
		<!-- Script para comprabar el valor de los check box -->
		<script type="text/javascript" src="http://localhost/clinica/Vistas/js/planes_de_diagnostico.js"></script>
		<script type="text/javascript" src="http://localhost/clinica/Vistas/js/isNumberValidate.js"></script>
		';

		//scripts
		
		if ($resultado_tratamientos["biometria"] == 1) {
						echo'
						<script>
						document.getElementById("biometria").setAttribute("checked", "");
						document.getElementById("PDTE1").value = "1"; 
						</script>';
					}else{
						echo'
						<script>
						document.getElementById("PDTE1").value = "0";
						</script>';
					}
		if ($resultado_tratamientos["quimica_sanguinea"] == 1) {
						echo'
						<script>
						document.getElementById("quimica_sanguinea").setAttribute("checked", "");
						document.getElementById("PDTE2").value = "1"; 
						</script>';
					}else{
						echo'
						<script>
						document.getElementById("PDTE2").value = "0";
						</script>';
					}
		if ($resultado_tratamientos["rayos_x"] == 1) {
						echo'
						<script>
						document.getElementById("rayos_x").setAttribute("checked", "");
						document.getElementById("PDTE3").value = "1"; 
						</script>';
					}else{
						echo'
						<script>
						document.getElementById("PDTE3").value = "0";
						</script>';
					}
		if ($resultado_tratamientos["otros"] == 1) {
						echo'
						<script>
						document.getElementById("otros").setAttribute("checked", "");
						document.getElementById("PDTE4").value = "1"; 
						</script>';
					}else{
						echo'
						<script>
						document.getElementById("PDTE4").value = "0";
						</script>';
					}
		}

					/*
		if ($resultado_tratamientos["pre_01"] == 1) {
						echo'
						<script>
						document.getElementById("pre01").setAttribute("checked", "");
						document.getElementById("d_pre01").value = "1"; 
						</script>';
					}else{
						echo'
						<script>
						document.getElementById("d_pre01").value = "0";
						</script>';
					}

		if ($resultado_tratamientos["pre_02"] == 1) {
						echo'
						<script>
						document.getElementById("pre02").setAttribute("checked", "");
						document.getElementById("d_pre02").value = "1"; 
						</script>';
					}else{
						echo'
						<script>
						document.getElementById("d_pre02").value = "0";
						</script>';
					}
							
		if ($resultado_tratamientos["pre_03"] == 1) {
						echo'
						<script>
						document.getElementById("pre03").setAttribute("checked", "");
						document.getElementById("d_pre03").value = "1"; 
						</script>';
					}else{
						echo'
						<script>
						document.getElementById("d_pre03").value = "0";
						</script>';
					}
							
		if ($resultado_tratamientos["pre_04"] == 1) {
						echo'
						<script>
						document.getElementById("pre04").setAttribute("checked", "");
						document.getElementById("d_pre04").value = "1"; 
						</script>';
					}else{
						echo'
						<script>
						document.getElementById("d_pre04").value = "0";
						</script>';
					}






		if ($resultado_tratamientos["def_01"] == 1) {
						echo'
						<script>
						document.getElementById("def01").setAttribute("checked", "");
						document.getElementById("d_def01").value = "1"; 
						</script>';
					}else{
						echo'
						<script>
						document.getElementById("d_def01").value = "0";
						</script>';
					}

		if ($resultado_tratamientos["def_02"] == 1) {
						echo'
						<script>
						document.getElementById("def02").setAttribute("checked", "");
						document.getElementById("d_def02").value = "1"; 
						</script>';
					}else{
						echo'
						<script>
						document.getElementById("d_def02").value = "0";
						</script>';
					}
							
		if ($resultado_tratamientos["def_03"] == 1) {
						echo'
						<script>
						document.getElementById("def03").setAttribute("checked", "");
						document.getElementById("d_def03").value = "1"; 
						</script>';
					}else{
						echo'
						<script>
						document.getElementById("d_def03").value = "0";
						</script>';
					}
							
		if ($resultado_tratamientos["def_04"] == 1) {
						echo'
						<script>
						document.getElementById("def04").setAttribute("checked", "");
						document.getElementById("d_def04").value = "1"; 
						</script>';
					}else{
						echo'
						<script>
						document.getElementById("d_def04").value = "0";
						</script>';
					}		*/				

	}

	public function ActualizarTratamientoC(){

		if(isset($_POST["id_tratamiento"])){

			$tablaBD = "tratamientos";

			$datosC = array("id" => $_POST["id_paciente"], "biometria" => $_POST["biometria"], "quimica_sanguinea" => $_POST["quimica_sanguinea"], "rayos_x" => $_POST["rayos_x"], "otros" => $_POST["otros"], "planes_descripcion" => $_POST["txt_area_planes"], "fecha_apertura" => $_POST["fecha_apertura"], "fecha_control" => $_POST["fecha_control"], "profesional" => $_POST["profesional"], "codigo" => $_POST["codigo"], "firma" => $_POST["firma"], "numero_hoja" => $_POST["numero_hoja"]);



			$resultado = TratamientosM::ActualizarTratamientosM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>
				window.location = "http://localhost/clinica/tratamientos/'.$_POST["id_paciente"].'";
				</script>';

			}

		}

	}

	public function ActualizarDiagnosticoC(){

		if(isset($_POST["id_diagnosticoActualizar"])) {

			$tablaBD = "diagnostico";

			

			$datosC = array("id" => $_POST["id_diagnosticoActualizar"], "diagnostico" => $_POST["diagnosticoActualizar"], "cie" => $_POST["CIEActualizar"], "pre_def" => $_POST["pre_defActualizar"] );

			//$datosC = array("id" => 14, "diagnostico_y_complicaciones" => $_POST["diagnostico_y_complicacionesActualizar"]);

			$resultado = TratamientosM::ActualizarDiagnosticoM($tablaBD, $datosC);

			if($resultado == true){

				echo '

				<script>
				window.location = "http://localhost/clinica/tratamientos/'.$_POST["id_paciente"].'";
				</script>';

			}
		}

	}

	public function EditarTratamientosSesionC(){

		if (substr($_GET["url"], 0, 26) == "eliminar-tratamientoSesion") {
			
			$id_tratamiento = substr($_GET["url"], 27);
		}
		if (substr($_GET["url"], 0, 18) == "editar-tratamiento") {
			
			//echo 'substr($_GET["url"], 0, 18)';
			$id_tratamiento = substr($_GET["url"], 19);
		}



		//$id_tratamiento = substr($_GET["url"], 19);

		
		$editarTratamiento = TratamientosC::verTratamientoC($id_tratamiento);

		$editarTratamiento["diagnostico_y_complicaciones"];

		

					echo'

					<div class="container col-md-12">
		
						<div class="row">              
							
							<div class="box-body">

								<div class="col-md-2">

									<div class="form-group">
										
										<h4>Fecha: </h4>										

										<input type="date" class="form-control" style="width: 150%" name="fechaActualizar" value="'.$editarTratamiento["fecha_tratamiento"].'" required> 

										<input type="hidden" name="id_tratamientoActualizar" readonly value="'.$editarTratamiento["id"].'">
										<input type="hidden" name="id_paciente" readonly value="'.$editarTratamiento["id_paciente"].'">

									</div>

								</div>



								<div class="col-md-12">

									<div class="form-group">

										<h4>DIAGNÓSTICO Y COMPLICACIONES: </h4>

										<input autocomplete="off" type="text" class="form-control"  name="diagnostico_y_complicacionesActualizar" placeholder="INGRESE DIAGNÓSTICO Y COMPLICACIONES" value="'.$editarTratamiento["diagnostico_y_complicaciones"].'"  required>

									</div>

								</div>



								<div class="col-md-12">

									<div class="form-group">

										<h4>PROCEDIMIENTOS: </h4>

										<input autocomplete="off" type="text" class="form-control"  name="procedimientosActualizar" placeholder="INGRESE PROCEDIMIENTOS" value="'.$editarTratamiento["procedimientos"].'" required>

									</div>

								</div>


								<div class="col-md-12">

									<div class="form-group">

										<h4>PRESCRIPCIONES: </h4>

										<input autocomplete="off" type="text" class="form-control"  name="prescripcionesActualizar" placeholder="INGRESE PRESCRIPCIONES" value="'.$editarTratamiento["prescripciones"].'" required>

									</div>  

								</div>



								<div class="col-md-6">

									<div class="form-group">

										<h4>CÓDIGO: </h4>

										<input autocomplete="off" type="text" class="form-control"  name="codigoActualizar" placeholder="INGRESE CÓDIGO" value="'.$editarTratamiento["codigo"].'" required>

									</div>  

								</div>




								<div class="col-md-6">

									<div class="form-group">

										<h4>FIRMA: </h4>

										<input autocomplete="off" type="text" class="form-control"  name="firmaActualizar" placeholder="INGRESE FIRMA (C.I.)" value="'.$editarTratamiento["firma"].'" required>

									</div>  

								</div>

							</div>


						</div>
						<button type="submit" class="btn btn-primary">Actualizar</button>

						<button type="button" class="btn btn-danger" onclick="goBack()">Cancelar</button>


							<script>
								function goBack() {
								  window.history.back();
								}
							</script>
					</div>
					
					 ';

	}


	public function ActualizarTratamientoSesionC(){

		if(isset($_POST["id_tratamientoActualizar"])) {

			$tablaBD = "tratamiento_paciente";

			

			$datosC = array("id" => $_POST["id_tratamientoActualizar"], "diagnostico_y_complicaciones" => $_POST["diagnostico_y_complicacionesActualizar"], "procedimientos" => $_POST["procedimientosActualizar"], "fecha_tratamiento" => $_POST["fechaActualizar"], "prescripciones" => $_POST["prescripcionesActualizar"], "codigo" => $_POST["codigoActualizar"], "firma" => $_POST["firmaActualizar"] );

			//$datosC = array("id" => 14, "diagnostico_y_complicaciones" => $_POST["diagnostico_y_complicacionesActualizar"]);

			$resultado = TratamientosM::ActualizarTratamientoSesionM($tablaBD, $datosC);

			if($resultado == true){

				echo '

				<script>
				window.location = "http://localhost/clinica/tratamientos/'.$_POST["id_paciente"].'";
				</script>';

			}
		}

	}





}

 ?>
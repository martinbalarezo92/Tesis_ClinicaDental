<?php 

class HistoriaClinicaC 
{
	
	public function verHistoriaClinicaC()
	{
		
		$tablaBD = "historiaclinicatest";
		
		$id = substr($_GET["url"], 16);
		//$id = 1;

		$resultado = HistoriaClinicaM::VerHistoriaClinicaM($tablaBD, $id);		

		return $resultado;	

	}


	public function crearHistoriaClinicaC(){
		$tablaBD = "historiaclinicatest";

		$id_paciente = array("id_paciente" => substr($_GET["url"], 16));

		$resultado = HistoriaClinicaM::CrearHistoriaClinicaM($tablaBD, $id_paciente);	

		if($resultado == true){

			echo '<script>
			window.location = "http://localhost/clinica/historiaClinica/'.$id_paciente["id_paciente"].'";
			</script>';

		}

	}

	public function EditarHistoriaClinicaC(){

		$resultado_hc = HistoriaClinicaC::verHistoriaClinicaC();

		//$resultado_hc_aaa = "aaa";

		$id_paciente = substr($_GET["url"], 16);

		$resultado_paciente = PacientesC::VerPacientesC("id", $id_paciente);
		
		echo'
		<input type="hidden" name="id_paciente" value="'.$resultado_paciente["id"].'">
		
		';

		if (isset($resultado_hc["id"]) == false) {

			

			echo'
			<div class="alert alert-warning" role="alert">
			  El paciente no tiene una historia de clínica!
			</div>

				
			'; 

			
			$crearHC = new HistoriaClinicaC();
			$crearHC -> crearHistoriaClinicaC();

			


		} 


		else {
		
		
		//<!-- DATOS PERSONALES -->
		echo'

					<div class="container" style="-webkit-print-color-adjust:exact !important;">
					<h4>DATOS PERSONALES</h4>
						<div class="row">
							
							<div class="col-md-4">
							Establecimineto
							<br>
							<input  class="input-sm" type="text" style="width:100%"  id="hc-establecimiento" name="hc-establecimiento" value="San Antonio">
							</div>

							<div class="col-md-4">
							Nombre
							<br>
							<input class="input-sm" style="width:100%" type="text" name="hc-nombre" id="hc-nombre" disabled readonly value="'.$resultado_paciente["nombre"].'">
							</div>

							<div class="col-md-4">
							Apellido
							<br>
							<input class="input-sm" style="width:100%" type="text" name="hc-apellido" id="hc-apellido" disabled readonly value="'.$resultado_paciente["apellido"].'">
							</div>
							</div>

							
							<div class="row">
							<div class="col-md-4">
							Sexo
							<br>
							<input class="input-sm" style="width:100%" type="text" placeholder="M ó F" maxlength="1" onkeyup="this.value = this.value.toUpperCase();" name="hc-sexo" value="'.$resultado_hc["sexo"].'">

							</div>

							<div class="col-md-4">
							Edad
							<br>
							<input class="input-sm" style="width:100%" type="number" onkeypress="return isNumber(event)" min="0" name="hc-edad" value="'.$resultado_hc["edad"].'">
							</div>

							<div class="col-md-4">
							 N° HISTORIA CLÍNICA 
							<br>
							<input class="input-sm" style="width:100%" readonly disabled  type="text" name="hc-numero" value="'.$resultado_paciente["documento"].'">
							</div>

							
						</div>
					</div>
				</div>

		';
	
	//<!-- EDAD ESTIMADA -->	
	echo'

	<input type="hidden" value="" onkeypress="return isNumber(event)" id="EE1" name="EE1" style="width: 30px"> 
	<input type="hidden" value="" onkeypress="return isNumber(event)" id="EE2" name="EE2" style="width: 30px"> 
	<input type="hidden" value="" onkeypress="return isNumber(event)" id="EE3" name="EE3" style="width: 30px"> 
	<input type="hidden" value="" onkeypress="return isNumber(event)" id="EE4" name="EE4" style="width: 30px"> 
	<input type="hidden" value="" onkeypress="return isNumber(event)" id="EE5" name="EE5" style="width: 30px"> 
	<input type="hidden" value="" onkeypress="return isNumber(event)" id="EE6" name="EE6" style="width: 30px"> 
	<input type="hidden" value="" onkeypress="return isNumber(event)" id="EE7" name="EE7" style="width: 30px"> 
	<input type="hidden" value="" onkeypress="return isNumber(event)" id="EE8" name="EE8" style="width: 30px"> 

	';



	echo '
	
					<div class="container">

						<h4 class="margenSubTitulo">EDAD ESTIMADA</h4>

						<div class="row">


							<div class="col-md-3 form-check columna">

								<div class="row">

									<div class="col-md-10 alinear-derecha">
										<label for="menor_de_1_anio">Menor de 1 Año</label> 
									</div>

									<div class="col-md-2">
										<input class="form-check-input" onclick="OnChangeRadio_EdadEstimada1 (this)" type="radio" name="edad_estimada" id="menor_de_1_anio" value="menor_de_1_anio">
									</div>


								</div>

							</div>


							<div class="col-md-3 form-check columna">

								<div class="row">

									<div class="col-md-10 alinear-derecha">
										<label for="1_a_4_anios">1 - 4 Años</label> 
									</div>

									<div class="col-md-2">
										<input class="form-check-input" onclick="OnChangeRadio_EdadEstimada2 (this)" type="radio" name="edad_estimada" id="1_a_4_anios" value="1_a_4_anios">
									</div>

								</div> 

							</div>

							<div class="col-md-3 form-check columna">

								<div class="row">

									<div class="col-md-10 alinear-derecha">
										<label for="5_a_9_anios_programado">5 - 9 Años Programado</label> 
									</div>

									<div class="col-md-2">
										<input class="form-check-input" onclick="OnChangeRadio_EdadEstimada3 (this)" type="radio" name="edad_estimada" id="5_a_9_anios_programado" value="5_a_9_anios_programado">
									</div>

								</div> 

							</div>

							<div class="col-md-3 form-check columna">

								<div class="row">

									<div class="col-md-10 alinear-derecha">
										<label for="5_a_14_anios_programado">5 - 14 Años Programado</label> 
									</div>

									<div class="col-md-2">
										<input class="form-check-input" onclick="OnChangeRadio_EdadEstimada4 (this)" type="radio" name="edad_estimada" id="5_a_14_anios_programado" value="5_a_14_anios_programado">
									</div>

								</div> 


							</div>
							<br><br>
							<div class="col-md-3 form-check columna">


								<div class="row">

									<div class="col-md-10 alinear-derecha">
										<label for="10_a_14_anios_programado">10 - 14 Años PROGRAMADO  </label> 
									</div>

									<div class="col-md-2">
										<input class="form-check-input" onclick="OnChangeRadio_EdadEstimada5 (this)" type="radio" name="edad_estimada" id="10_a_14_anios_programado" value="10_a_14_anios_programado">
									</div>

								</div> 

							</div>


							<div class="col-md-3 form-check columna">


								<div class="row">

									<div class="col-md-10 alinear-derecha">
										<label for="5_a_19_anios">5 - 19 Años </label> 
									</div>

									<div class="col-md-2">
										<input class="form-check-input" onclick="OnChangeRadio_EdadEstimada6 (this)" type="radio" name="edad_estimada" id="5_a_19_anios" value="5_a_19_anios">
									</div>

								</div> 

							</div>

							<div class="col-md-3 form-check columna">

								<div class="row">

									<div class="col-md-10 alinear-derecha">
										<label for="mayor_de_20_anios">Mayor de 20 Años</label> 
									</div>

									<div class="col-md-2">
										<input class="form-check-input" onclick="OnChangeRadio_EdadEstimada7 (this)" type="radio" name="edad_estimada" id="mayor_de_20_anios" value="mayor_de_20_anios">
									</div>

								</div> 

							</div>

							<div class="col-md-3 form-check columna">

								<div class="row">
									<div class="col-md-10 alinear-derecha">
										<label for="embarazada">Embarazada</label> 
									</div>

									<div class="col-md-2">
										<input class="form-check-input" type="checkbox" name="embarazada" value="embarazada" onclick="embarazadaCheck()" id="embarazada">
									</div>									
								</div>


							</div>
';

						  ///////// aqui Eliminé un /DIV
					  ///////// aqui Eliminé un /DIV

	echo'

	<!-- 1 MOTIVO CONSULTA -->

					<div class="container margenSubTitulo">

						<div class="row">

							<div class="col-md-5"> <h4>1 MOTIVO CONSULTA</h4> </div>
							<div class="col-md-7 text bg-info alinear-derecha" style="font-size: 12px"> ANOTAR LA CAUSA DEL PROBLEMA EN LA VERSIÓN DEL INFORMANTE </div>

						</div>	

						<div class="row">

							<div class="col-md-12">
								
								<textarea class="input-sm" name="hc-motivoConsulta" rows="5" cols="150" placeholder="Motivo de la consulta" >'.$resultado_hc["motivo_consulta"].'</textarea>
								<!-- <input class="input-sm" style="width: 700px" type="text" name=""> -->



							</div>

						</div>

					</div>	

	';

	echo'

	<!-- 2 ENFERMEDAD O PROBLEMA ACTUAL -->

					<div class="container margenSubTitulo">
						<div class="row">
							<div class="col-md-5"> <h4>2 ENFERMEDAD O PROBLEMA ACTUAL</h4> </div>
							<div class="col-md-7 text bg-info alinear-derecha" style="font-size: 12px"> REGISTRAR SÍNTOMAS: CRONOLOGÍA, LOCALIZACIÓN, CARACTERÍSTICAS, INTENSIDAD, CAUSA APARENTE, SÍNTOMAS ASOCIADOS, EVOLUCIÓN, ESTADO ACTUAL. </div>
						</div>


						<div class="row">

							<div class="col-md-12">

								

								<textarea class="input-sm" name="hc-enfermedad_problema_actual" rows="5" cols="150" placeholder="Enfermedad o problema actual">'.$resultado_hc["enfermedad_problema_actual"].'</textarea>


							
								<!-- <input class="input-sm" style="width: 700px" type="text" name=""> -->


							</div>

						</div>
					</div>	

	';


	//<!-- 3 ANTECEDENTES PERSONALES Y FAMILIARES -->
	echo'

	<input type="hidden" onkeypress="return isNumber(event)" id="EPA1" name="EPA1" value="">
	<input type="hidden" onkeypress="return isNumber(event)" id="EPA2" name="EPA2" value="">
	<input type="hidden" onkeypress="return isNumber(event)" id="EPA3" name="EPA3" value="">
	<input type="hidden" onkeypress="return isNumber(event)" id="EPA4" name="EPA4" value="">
	<input type="hidden" onkeypress="return isNumber(event)" id="EPA5" name="EPA5" value="">
	<input type="hidden" onkeypress="return isNumber(event)" id="EPA6" name="EPA6" value="">
	<input type="hidden" onkeypress="return isNumber(event)" id="EPA7" name="EPA7" value="">
	<input type="hidden" onkeypress="return isNumber(event)" id="EPA8" name="EPA8" value="">
	<input type="hidden" onkeypress="return isNumber(event)" id="EPA9" name="EPA9" value="">
	<input type="hidden" onkeypress="return isNumber(event)" id="EPA10" name="EPA10" value="">


	';

	echo'

					<div class="container">
						<h4>3 ANTECEDENTES PERSONALES Y FAMILIARES </h4>

						<div class="row">


							<div class="col-md-3 form-check columna">

								<div class="row">

									<div class="col-md-10 alinear-derecha">
										<label for="alergia_antibiotico"> 1. ALERGIA ANTIBIÓTICO	</label>			
									</div>

									<div class="col-md-2">


										<input class="form-check-input" type="checkbox" onclick="epa1Check()" name="antecedentes" id="alergia_antibiotico" value="alergia_antibiotico">



									</div>


								</div>

							</div>


							<div class="col-md-3 form-check columna">

								<div class="row">

									<div class="col-md-10 alinear-derecha">
										<label for="alergia_anestesia">2. ALERGIA ANESTESIA	</label>			
									</div>

									<div class="col-md-2">


										<input class="form-check-input" type="checkbox" onclick="epa2Check()" name="antecedentes" id="alergia_anestesia" value="alergia_anestesia">	      	


									</div>

								</div> 

							</div>

							<div class="col-md-3 form-check columna">

								<div class="row">

									<div class="col-md-10 alinear-derecha">
										<label for="hemorragias">3. HEMORRAGIAS</label>			
									</div>

									<div class="col-md-2">


										<input class="form-check-input" type="checkbox" onclick="epa3Check()" name="antecedentes" id="hemorragias" value="hemorragias">


									</div>

								</div> 

							</div>

							<div class="col-md-3 form-check columna">

								<div class="row">

									<div class="col-md-10 alinear-derecha">
										<label for="vih_sida">4. VIH/SIDA</label>			
									</div>

									<div class="col-md-2">


										<input class="form-check-input" type="checkbox" onclick="epa4Check()" name="antecedentes" id="vih_sida" value="vih_sida">



									</div>

								</div> 


							</div>

							<div class="col-md-3 form-check columna">


								<div class="row">

									<div class="col-md-10 alinear-derecha">
										<label for="tuberculosis">5. TUBERCULOSIS	</label>		
									</div>

									<div class="col-md-2">


										<input class="form-check-input" type="checkbox" onclick="epa5Check()" name="antecedentes" id="tuberculosis" value="tuberculosis">



									</div>

								</div> 

							</div>

							<div class="col-md-3 form-check columna">


								<div class="row">

									<div class="col-md-10 alinear-derecha">
										<label for="asma">6. ASMA	</label>		
									</div>

									<div class="col-md-2">


										<input class="form-check-input" type="checkbox" onclick="epa6Check()" name="antecedentes" id="asma" value="asma">



									</div>

								</div> 

							</div>

							<div class="col-md-3 form-check columna">


								<div class="row">

									<div class="col-md-10 alinear-derecha">
										<label for="diabetes">7. DIABETES	</label>	
									</div>

									<div class="col-md-2">


										<input class="form-check-input" type="checkbox" onclick="epa7Check()" name="antecedentes" id="diabetes" value="diabetes">



									</div>

								</div> 

							</div>

							<div class="col-md-3 form-check columna">

								<div class="row">

									<div class="col-md-10 alinear-derecha">
										<label for="hipertension">8. HIPERTENSIÓN	</label>		
									</div>

									<div class="col-md-2">


										<input class="form-check-input" type="checkbox" onclick="epa8Check()" name="antecedentes" id="hipertension" value="hipertension">



									</div>

								</div> 

							</div>

							<div class="col-md-3 form-check columna">

								<div class="row">

									<div class="col-md-10 alinear-derecha">
										<label for="enf_cardiaca">9. ENF. CARDIACA	</label>					
									</div>

									<div class="col-md-2">


										<input class="form-check-input" type="checkbox" onclick="epa9Check()" name="antecedentes" id="enf_cardiaca" value="enf_cardiaca">



									</div>

								</div> 

							</div>

							<div class="col-md-3 form-check columna">

								<div class="row">

									<div class="col-md-10 alinear-derecha">
										<label for="otro_antecedentes">10. OTRO <br> </label>

									</div>

									<div class="col-md-2">

										<input class="form-check-input" type="checkbox" onclick="epa10Check()" name="antecedentes" id="otro_antecedentes" value="otro_antecedentes">

									</div>

								</div> 

							</div>




							<div class="col-md-12">						 
								
								<textarea class="input-sm" name="hc-epa-descripcion" rows="5" cols="150" placeholder="Especificaciones">'.$resultado_hc["especificaciones_antecedentes"].'</textarea>
													 
							</div>

						</div>
					</div>

	';

echo'

	<!-- 4 SIGNOS VITALES -->		
		<div class="container">
			<h4>4 SIGNOS VITALES</h4>
			<div class="row">

				<br>
				<div class="col-md-8">

					<div class="container">

						<div class="row" style="margin-bottom: 20px">

							<div class="col-md-2 alinear-derecha">PRESIÓN ARTERIAL</div>
							
							<div class="col-md-2">
							<input class="input-sm" style="width: 50%" id="presion_arterial" type="text" name="presion_arterial" value="'.$resultado_hc["presion_arterial"].'"></div>
							


							<div class="col-md-2 alinear-derecha">FRECUENCIA CARDIACA min.</div>
							
							<div class="col-md-2">
							<input class="input-sm" style="width: 50%" id="frecuencia_cardiaca" type="text" name="frecuencia_cardiaca" value="'.$resultado_hc["frecuencia_cardiaca"].'"></div>
							


						</div>

					</div>

					<div class="container">

						<div class="row">

							<div class="col-md-2 alinear-derecha">TEMPERATURA °C</div>
							
							<div class="col-md-2">
							<input class="input-sm" style="width: 50%" id="temperatura" type="text" name="temperatura" value="'.$resultado_hc["temperatura"].'"></div>
							


							<div class="col-md-2 alinear-derecha">F. RESPIRAT. min.</div>
							
							<div class="col-md-2">
							<input class="input-sm" style="width: 50%" id="f_respiratoria" type="text" name="f_respiratoria" value="'.$resultado_hc["f_respiratoria"].'"></div>
							


						</div>

					</div>



				</div>

				


			</div>
			<br>
			<div> OBSERVACIONES:<br>
					
					<textarea class="input-sm" name="observaciones_signos_vitales" rows="5" cols="150" id="observaciones_signos_vitales" placeholder="Observaciones">'.$resultado_hc["observaciones_signos_vitales"].'</textarea> 
					


				</div>
		</div>

	';

//<!--5  EXAMEN DEL SISTEMA ESTOMATOGNÁTICO -->		
	echo'

<input type="hidden" onkeypress="return isNumber(event) "id="ESE1" name="ESE1">
<input type="hidden" onkeypress="return isNumber(event) "id="ESE2" name="ESE2">
<input type="hidden" onkeypress="return isNumber(event) "id="ESE3" name="ESE3">
<input type="hidden" onkeypress="return isNumber(event) "id="ESE4" name="ESE4">
<input type="hidden" onkeypress="return isNumber(event) "id="ESE5" name="ESE5">
<input type="hidden" onkeypress="return isNumber(event) "id="ESE6" name="ESE6">
<input type="hidden" onkeypress="return isNumber(event) "id="ESE7" name="ESE7">
<input type="hidden" onkeypress="return isNumber(event) "id="ESE8" name="ESE8">
<input type="hidden" onkeypress="return isNumber(event) "id="ESE9" name="ESE9">
<input type="hidden" onkeypress="return isNumber(event) "id="ESE10" name="ESE10">
<input type="hidden" onkeypress="return isNumber(event) "id="ESE11" name="ESE11">
<input type="hidden" onkeypress="return isNumber(event) "id="ESE12" name="ESE12">


	';

	echo'

	
					<div class="container margenSubTitulo">

						<div class="row ">
							<div class="col-md-5"> <h4>5 EXAMEN DEL SISTEMA ESTOMATOGNÁTICO </h4> </div>
							<div class="col-md-7 text bg-info alinear-derecha" style="font-size: 11px"> DESCRIBIR ABAJO LA PATOLOGÍA DE LA REGIÓN AFECTADA ANOTANDO EL NUMERO </div>
						</div>

						<div class="row">


							<div class="col-md-3 form-check columna">

								<div class="row">

									<div class="col-md-10 alinear-derecha">
										<label for="labios">1. LABIOS	</label>							
									</div>

									<div class="col-md-2">
										<input class="form-check-input" type="checkbox" onclick="ese1Check()" name= "antecedentes" id="labios" value="option1">
									</div>


								</div>

							</div>


							<div class="col-md-3 form-check columna">

								<div class="row">

									<div class="col-md-10 alinear-derecha">
										<label for="mejillas">2. MEJILLAS	</label>							
									</div>

									<div class="col-md-2">
										<input class="form-check-input" type="checkbox" onclick="ese2Check()" name= "antecedentes" id="mejillas" value="option2">
									</div>

								</div> 

							</div>

							<div class="col-md-3 form-check columna">

								<div class="row">

									<div class="col-md-10 alinear-derecha">
										<label for="maxilar_superior">3. MAXILAR SUPERIOR	</label>						
									</div>

									<div class="col-md-2">
										<input class="form-check-input" type="checkbox" onclick="ese3Check()" name= "antecedentes" id="maxilar_superior" value="option3">
									</div>

								</div> 

							</div>

							<div class="col-md-3 form-check columna">

								<div class="row">

									<div class="col-md-10 alinear-derecha">
										<label for="maxilar_inferior">4. MAXILAR INFERIOR	</label>						
									</div>

									<div class="col-md-2">
										<input class="form-check-input" type="checkbox" onclick="ese4Check()" name= "antecedentes" id="maxilar_inferior" value="option4">
									</div>

								</div> 


							</div>

							<div class="col-md-3 form-check columna">


								<div class="row">

									<div class="col-md-10 alinear-derecha">
										<label for="lengua">5. LENGUA</label>							
									</div>

									<div class="col-md-2">
										<input class="form-check-input" type="checkbox" onclick="ese5Check()" name= "antecedentes" id="lengua" value="option5">
									</div>

								</div> 

							</div>

							<div class="col-md-3 form-check columna">


								<div class="row">

									<div class="col-md-10 alinear-derecha">
										<label for="paladar">6. PALADAR</label>							
									</div>

									<div class="col-md-2">
										<input class="form-check-input" type="checkbox" onclick="ese6Check()" name= "antecedentes" id="paladar" value="option6">
									</div>

								</div> 

							</div>

							<div class="col-md-3 form-check columna">


								<div class="row">

									<div class="col-md-10 alinear-derecha">
										<label for="piso">7. PISO	</label>			
									</div>

									<div class="col-md-2">
										<input class="form-check-input" type="checkbox" onclick="ese7Check()" name= "antecedentes" id="piso" value="option7">
									</div>

								</div> 

							</div>

							<div class="col-md-3 form-check columna">

								<div class="row">

									<div class="col-md-10 alinear-derecha">
										<label for="carrillos">8. CARRILLOS</label>							
									</div>

									<div class="col-md-2">
										<input class="form-check-input" type="checkbox" onclick="ese8Check()" name= "antecedentes" id="carrillos" value="option7">
									</div>

								</div> 

							</div>

							<div class="col-md-3 form-check columna">

								<div class="row">

									<div class="col-md-10 alinear-derecha">
										<label for="gandulas_salivales">9. GLÁNDULAS SALIVALES	</label>										
									</div>

									<div class="col-md-2">
										<input class="form-check-input" type="checkbox" onclick="ese9Check()" name= "antecedentes" id="gandulas_salivales" value="option7">
									</div>

								</div> 

							</div>

							<div class="col-md-3 form-check columna">

								<div class="row">

									<div class="col-md-10 alinear-derecha">
										<label for="oro_faringe">10. ORO FARINGE	</label>			 

									</div>

									<div class="col-md-2">
										<input class="form-check-input" type="checkbox" onclick="ese10Check()" name= "antecedentes" id="oro_faringe" value="option7">
									</div>

								</div> 

							</div>

							<div class="col-md-3 form-check columna">

								<div class="row">

									<div class="col-md-10 alinear-derecha">
										<label for="atm">11. A. T. M.</label>			 

									</div>

									<div class="col-md-2">
										<input class="form-check-input" type="checkbox" onclick="ese11Check()" name= "antecedentes" id="atm" value="option7">
									</div>

								</div> 

							</div>

							<div class="col-md-3 form-check columna">

								<div class="row">

									<div class="col-md-10 alinear-derecha">
										<label for="ganglios">12.  GANGLIOS	</label>
									</div>

									<div class="col-md-2">
										<input class="form-check-input" type="checkbox" onclick="ese12Check()" name= "antecedentes" id="ganglios" value="option7">
									</div>

								</div> 

							</div>
							<br><br><br>

							<div class="col-md-12">
					
								<textarea class="input-sm" name="especificaciones_estomatognatico" rows="5" cols="150" placeholder="Especificaciones">'.$resultado_hc["especificaciones_estomatognatico"].'</textarea>
							
							</div>

						</div>
					</div>

	';


	echo'

	<!--6  ODONTOGRAMA -->
					<div class="container margenSubTitulo">

						<div class="row ">

							<div class="col-md-5 page-break"> <h4>6 ODONTOGRAMA</h4> </div>

							<div class="col-md-7 text bg-info alinear-derecha" style="font-size: 11px"> "PINTAR CON: AZUL PARA  TRATAMIENTO REALIZADO  -   ROJO PARA PATOLOGÍA ACTUAL MOVILIDAD Y RECESIÓN: MARCAR ""X"" (1, 2 ó 3), SI APLICA" </div>
						</div>

						<div class="row" style="margin-bottom: 1%">


							<div class="col col-sm-1">
								RECESIÓN								
							</div>

							<div class="col col-md-11">
								<div class="row">

									<div class="col-md-5">
										
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="recesion_1_01" value="'.$resultado_hc["recesion_1_01"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="recesion_1_02" value="'.$resultado_hc["recesion_1_02"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="recesion_1_03" value="'.$resultado_hc["recesion_1_03"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="recesion_1_04" value="'.$resultado_hc["recesion_1_04"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="recesion_1_05" value="'.$resultado_hc["recesion_1_05"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="recesion_1_06" value="'.$resultado_hc["recesion_1_06"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="recesion_1_07" value="'.$resultado_hc["recesion_1_07"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="recesion_1_08" value="'.$resultado_hc["recesion_1_08"].'">
										

									</div>


									<div class="col-md-5">
										
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="recesion_1_09" value="'.$resultado_hc["recesion_1_09"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="recesion_1_10" value="'.$resultado_hc["recesion_1_10"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="recesion_1_11" value="'.$resultado_hc["recesion_1_11"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="recesion_1_12" value="'.$resultado_hc["recesion_1_12"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="recesion_1_13" value="'.$resultado_hc["recesion_1_13"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="recesion_1_14" value="'.$resultado_hc["recesion_1_14"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="recesion_1_15" value="'.$resultado_hc["recesion_1_15"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="recesion_1_16" value="'.$resultado_hc["recesion_1_16"].'">
										

									</div>

								</div>

							</div>

						</div>

						<div class="row" style="margin-bottom: 1%">
							<div class="col col-sm-1">
								MOVILIDAD								
							</div>

							<div class="col col-md-11">
								<div class="row">

									<div class="col-md-5">
										
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="movilidad_1_01" value="'.$resultado_hc["movilidad_1_01"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="movilidad_1_02" value="'.$resultado_hc["movilidad_1_02"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="movilidad_1_03" value="'.$resultado_hc["movilidad_1_03"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="movilidad_1_04" value="'.$resultado_hc["movilidad_1_04"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="movilidad_1_05" value="'.$resultado_hc["movilidad_1_05"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="movilidad_1_06" value="'.$resultado_hc["movilidad_1_06"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="movilidad_1_07" value="'.$resultado_hc["movilidad_1_07"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="movilidad_1_08" value="'.$resultado_hc["movilidad_1_08"].'">
										
									</div>


									<div class="col-md-5">
										
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="movilidad_1_09" value="'.$resultado_hc["movilidad_1_09"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="movilidad_1_10" value="'.$resultado_hc["movilidad_1_10"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="movilidad_1_11" value="'.$resultado_hc["movilidad_1_11"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="movilidad_1_12" value="'.$resultado_hc["movilidad_1_12"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="movilidad_1_13" value="'.$resultado_hc["movilidad_1_13"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="movilidad_1_14" value="'.$resultado_hc["movilidad_1_14"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="movilidad_1_15" value="'.$resultado_hc["movilidad_1_15"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="movilidad_1_16" value="'.$resultado_hc["movilidad_1_16"].'">
										
									</div>

								</div>

							</div>

						</div>





						<div class="row margenSubTitulo" >

							<div class="col col-sm-1" style=" display: flex; justify-content: center; align-items: center;">

							</div>

							<div class="col col-md-11">
								<div class="row">

									<div class="col-md-12">
										<div class="row">
											<div class="col-md-1 cent-texto">18</div>
											<div class="col-md-1 cent-texto">17</div>
											<div class="col-md-1 cent-texto">16</div>
											<div class="col-md-1 cent-texto">15</div>
											<div class="col-md-1 cent-texto">14</div>
											<div class="col-md-1 cent-texto">13</div>
											<div class="col-md-1 cent-texto">12</div>
											<div class="col-md-1 cent-texto">11</div>
										</div>


									</div>


								</div>

							</div>

						</div>



<div class="row">
	<input id="hc_v_sup_18" name="hc_v_sup_18" type="hidden">
	<input id="hc_v_der_18" name="hc_v_der_18" type="hidden">
	<input id="hc_v_inf_18" name="hc_v_inf_18" type="hidden">
	<input id="hc_v_izq_18" name="hc_v_izq_18" type="hidden">
	<input id="hc_v_cen_18" name="hc_v_cen_18" type="hidden">
</div>
<div class="row">
	<input id="hc_v_sup_17" name="hc_v_sup_17" type="hidden">
	<input id="hc_v_der_17" name="hc_v_der_17" type="hidden">
	<input id="hc_v_inf_17" name="hc_v_inf_17" type="hidden">
	<input id="hc_v_izq_17" name="hc_v_izq_17" type="hidden">
	<input id="hc_v_cen_17" name="hc_v_cen_17" type="hidden">
</div>
<div class="row">
	<input id="hc_v_sup_16" name="hc_v_sup_16" type="hidden">
	<input id="hc_v_der_16" name="hc_v_der_16" type="hidden">
	<input id="hc_v_inf_16" name="hc_v_inf_16" type="hidden">
	<input id="hc_v_izq_16" name="hc_v_izq_16" type="hidden">
	<input id="hc_v_cen_16" name="hc_v_cen_16" type="hidden">
</div>
<div class="row">
	<input id="hc_v_sup_15" name="hc_v_sup_15" type="hidden">
	<input id="hc_v_der_15" name="hc_v_der_15" type="hidden">
	<input id="hc_v_inf_15" name="hc_v_inf_15" type="hidden">
	<input id="hc_v_izq_15" name="hc_v_izq_15" type="hidden">
	<input id="hc_v_cen_15" name="hc_v_cen_15" type="hidden">
</div>
<div class="row">
	<input id="hc_v_sup_14" name="hc_v_sup_14" type="hidden">
	<input id="hc_v_der_14" name="hc_v_der_14" type="hidden">
	<input id="hc_v_inf_14" name="hc_v_inf_14" type="hidden">
	<input id="hc_v_izq_14" name="hc_v_izq_14" type="hidden">
	<input id="hc_v_cen_14" name="hc_v_cen_14" type="hidden">
</div>
<div class="row">
	<input id="hc_v_sup_13" name="hc_v_sup_13" type="hidden">
	<input id="hc_v_der_13" name="hc_v_der_13" type="hidden">
	<input id="hc_v_inf_13" name="hc_v_inf_13" type="hidden">
	<input id="hc_v_izq_13" name="hc_v_izq_13" type="hidden">
	<input id="hc_v_cen_13" name="hc_v_cen_13" type="hidden">
</div>
<div class="row">
	<input id="hc_v_sup_12" name="hc_v_sup_12" type="hidden">
	<input id="hc_v_der_12" name="hc_v_der_12" type="hidden">
	<input id="hc_v_inf_12" name="hc_v_inf_12" type="hidden">
	<input id="hc_v_izq_12" name="hc_v_izq_12" type="hidden">
	<input id="hc_v_cen_12" name="hc_v_cen_12" type="hidden">
</div>
<div class="row">
	<input id="hc_v_sup_11" name="hc_v_sup_11" type="hidden">
	<input id="hc_v_der_11" name="hc_v_der_11" type="hidden">
	<input id="hc_v_inf_11" name="hc_v_inf_11" type="hidden">
	<input id="hc_v_izq_11" name="hc_v_izq_11" type="hidden">
	<input id="hc_v_cen_11" name="hc_v_cen_11" type="hidden">
</div>


<div class="row">
	<input id="hc_v_sup_21" name="hc_v_sup_21" type="hidden">
	<input id="hc_v_der_21" name="hc_v_der_21" type="hidden">
	<input id="hc_v_inf_21" name="hc_v_inf_21" type="hidden">
	<input id="hc_v_izq_21" name="hc_v_izq_21" type="hidden">
	<input id="hc_v_cen_21" name="hc_v_cen_21" type="hidden">
</div>
<div class="row">
	<input id="hc_v_sup_22" name="hc_v_sup_22" type="hidden">
	<input id="hc_v_der_22" name="hc_v_der_22" type="hidden">
	<input id="hc_v_inf_22" name="hc_v_inf_22" type="hidden">
	<input id="hc_v_izq_22" name="hc_v_izq_22" type="hidden">
	<input id="hc_v_cen_22" name="hc_v_cen_22" type="hidden">
</div>
<div class="row">
	<input id="hc_v_sup_23" name="hc_v_sup_23" type="hidden">
	<input id="hc_v_der_23" name="hc_v_der_23" type="hidden">
	<input id="hc_v_inf_23" name="hc_v_inf_23" type="hidden">
	<input id="hc_v_izq_23" name="hc_v_izq_23" type="hidden">
	<input id="hc_v_cen_23" name="hc_v_cen_23" type="hidden">
</div>
<div class="row">
	<input id="hc_v_sup_24" name="hc_v_sup_24" type="hidden">
	<input id="hc_v_der_24" name="hc_v_der_24" type="hidden">
	<input id="hc_v_inf_24" name="hc_v_inf_24" type="hidden">
	<input id="hc_v_izq_24" name="hc_v_izq_24" type="hidden">
	<input id="hc_v_cen_24" name="hc_v_cen_24" type="hidden">
</div>
<div class="row">
	<input id="hc_v_sup_25" name="hc_v_sup_25" type="hidden">
	<input id="hc_v_der_25" name="hc_v_der_25" type="hidden">
	<input id="hc_v_inf_25" name="hc_v_inf_25" type="hidden">
	<input id="hc_v_izq_25" name="hc_v_izq_25" type="hidden">
	<input id="hc_v_cen_25" name="hc_v_cen_25" type="hidden">
</div>
<div class="row">
	<input id="hc_v_sup_26" name="hc_v_sup_26" type="hidden">
	<input id="hc_v_der_26" name="hc_v_der_26" type="hidden">
	<input id="hc_v_inf_26" name="hc_v_inf_26" type="hidden">
	<input id="hc_v_izq_26" name="hc_v_izq_26" type="hidden">
	<input id="hc_v_cen_26" name="hc_v_cen_26" type="hidden">
</div>
<div class="row">
	<input id="hc_v_sup_27" name="hc_v_sup_27" type="hidden">
	<input id="hc_v_der_27" name="hc_v_der_27" type="hidden">
	<input id="hc_v_inf_27" name="hc_v_inf_27" type="hidden">
	<input id="hc_v_izq_27" name="hc_v_izq_27" type="hidden">
	<input id="hc_v_cen_27" name="hc_v_cen_27" type="hidden">
</div>
<div class="row">
	<input id="hc_v_sup_28" name="hc_v_sup_28" type="hidden">
	<input id="hc_v_der_28" name="hc_v_der_28" type="hidden">
	<input id="hc_v_inf_28" name="hc_v_inf_28" type="hidden">
	<input id="hc_v_izq_28" name="hc_v_izq_28" type="hidden">
	<input id="hc_v_cen_28" name="hc_v_cen_28" type="hidden">
</div>


<div class="row">
	<input id="hc_v_sup_48" name="hc_v_sup_48" type="hidden">
	<input id="hc_v_der_48" name="hc_v_der_48" type="hidden">
	<input id="hc_v_inf_48" name="hc_v_inf_48" type="hidden">
	<input id="hc_v_izq_48" name="hc_v_izq_48" type="hidden">
	<input id="hc_v_cen_48" name="hc_v_cen_48" type="hidden">
</div>
<div class="row">
	<input id="hc_v_sup_47" name="hc_v_sup_47" type="hidden">
	<input id="hc_v_der_47" name="hc_v_der_47" type="hidden">
	<input id="hc_v_inf_47" name="hc_v_inf_47" type="hidden">
	<input id="hc_v_izq_47" name="hc_v_izq_47" type="hidden">
	<input id="hc_v_cen_47" name="hc_v_cen_47" type="hidden">
</div>
<div class="row">
	<input id="hc_v_sup_46" name="hc_v_sup_46" type="hidden">
	<input id="hc_v_der_46" name="hc_v_der_46" type="hidden">
	<input id="hc_v_inf_46" name="hc_v_inf_46" type="hidden">
	<input id="hc_v_izq_46" name="hc_v_izq_46" type="hidden">
	<input id="hc_v_cen_46" name="hc_v_cen_46" type="hidden">
</div>
<div class="row">
	<input id="hc_v_sup_45" name="hc_v_sup_45" type="hidden">
	<input id="hc_v_der_45" name="hc_v_der_45" type="hidden">
	<input id="hc_v_inf_45" name="hc_v_inf_45" type="hidden">
	<input id="hc_v_izq_45" name="hc_v_izq_45" type="hidden">
	<input id="hc_v_cen_45" name="hc_v_cen_45" type="hidden">
</div>
<div class="row">
	<input id="hc_v_sup_44" name="hc_v_sup_44" type="hidden">
	<input id="hc_v_der_44" name="hc_v_der_44" type="hidden">
	<input id="hc_v_inf_44" name="hc_v_inf_44" type="hidden">
	<input id="hc_v_izq_44" name="hc_v_izq_44" type="hidden">
	<input id="hc_v_cen_44" name="hc_v_cen_44" type="hidden">
</div>
<div class="row">
	<input id="hc_v_sup_43" name="hc_v_sup_43" type="hidden">
	<input id="hc_v_der_43" name="hc_v_der_43" type="hidden">
	<input id="hc_v_inf_43" name="hc_v_inf_43" type="hidden">
	<input id="hc_v_izq_43" name="hc_v_izq_43" type="hidden">
	<input id="hc_v_cen_43" name="hc_v_cen_43" type="hidden">
</div>
<div class="row">
	<input id="hc_v_sup_42" name="hc_v_sup_42" type="hidden">
	<input id="hc_v_der_42" name="hc_v_der_42" type="hidden">
	<input id="hc_v_inf_42" name="hc_v_inf_42" type="hidden">
	<input id="hc_v_izq_42" name="hc_v_izq_42" type="hidden">
	<input id="hc_v_cen_42" name="hc_v_cen_42" type="hidden">
</div>
<div class="row">
	<input id="hc_v_sup_41" name="hc_v_sup_41" type="hidden">
	<input id="hc_v_der_41" name="hc_v_der_41" type="hidden">
	<input id="hc_v_inf_41" name="hc_v_inf_41" type="hidden">
	<input id="hc_v_izq_41" name="hc_v_izq_41" type="hidden">
	<input id="hc_v_cen_41" name="hc_v_cen_41" type="hidden">
</div>


<div class="row">
	<input id="hc_v_sup_31" name="hc_v_sup_31" type="hidden">
	<input id="hc_v_der_31" name="hc_v_der_31" type="hidden">
	<input id="hc_v_inf_31" name="hc_v_inf_31" type="hidden">
	<input id="hc_v_izq_31" name="hc_v_izq_31" type="hidden">
	<input id="hc_v_cen_31" name="hc_v_cen_31" type="hidden">
</div>
<div class="row">
	<input id="hc_v_sup_32" name="hc_v_sup_32" type="hidden">
	<input id="hc_v_der_32" name="hc_v_der_32" type="hidden">
	<input id="hc_v_inf_32" name="hc_v_inf_32" type="hidden">
	<input id="hc_v_izq_32" name="hc_v_izq_32" type="hidden">
	<input id="hc_v_cen_32" name="hc_v_cen_32" type="hidden">
</div>
<div class="row">
	<input id="hc_v_sup_33" name="hc_v_sup_33" type="hidden">
	<input id="hc_v_der_33" name="hc_v_der_33" type="hidden">
	<input id="hc_v_inf_33" name="hc_v_inf_33" type="hidden">
	<input id="hc_v_izq_33" name="hc_v_izq_33" type="hidden">
	<input id="hc_v_cen_33" name="hc_v_cen_33" type="hidden">
</div>
<div class="row">
	<input id="hc_v_sup_34" name="hc_v_sup_34" type="hidden">
	<input id="hc_v_der_34" name="hc_v_der_34" type="hidden">
	<input id="hc_v_inf_34" name="hc_v_inf_34" type="hidden">
	<input id="hc_v_izq_34" name="hc_v_izq_34" type="hidden">
	<input id="hc_v_cen_34" name="hc_v_cen_34" type="hidden">
</div>
<div class="row">
	<input id="hc_v_sup_35" name="hc_v_sup_35" type="hidden">
	<input id="hc_v_der_35" name="hc_v_der_35" type="hidden">
	<input id="hc_v_inf_35" name="hc_v_inf_35" type="hidden">
	<input id="hc_v_izq_35" name="hc_v_izq_35" type="hidden">
	<input id="hc_v_cen_35" name="hc_v_cen_35" type="hidden">
</div>
<div class="row">
	<input id="hc_v_sup_36" name="hc_v_sup_36" type="hidden">
	<input id="hc_v_der_36" name="hc_v_der_36" type="hidden">
	<input id="hc_v_inf_36" name="hc_v_inf_36" type="hidden">
	<input id="hc_v_izq_36" name="hc_v_izq_36" type="hidden">
	<input id="hc_v_cen_36" name="hc_v_cen_36" type="hidden">
</div>
<div class="row">
	<input id="hc_v_sup_37" name="hc_v_sup_37" type="hidden">
	<input id="hc_v_der_37" name="hc_v_der_37" type="hidden">
	<input id="hc_v_inf_37" name="hc_v_inf_37" type="hidden">
	<input id="hc_v_izq_37" name="hc_v_izq_37" type="hidden">
	<input id="hc_v_cen_37" name="hc_v_cen_37" type="hidden">
</div>
<div class="row">
	<input id="hc_v_sup_38" name="hc_v_sup_38" type="hidden">
	<input id="hc_v_der_38" name="hc_v_der_38" type="hidden">
	<input id="hc_v_inf_38" name="hc_v_inf_38" type="hidden">
	<input id="hc_v_izq_38" name="hc_v_izq_38" type="hidden">
	<input id="hc_v_cen_38" name="hc_v_cen_38" type="hidden">
</div>


<div class="row">
	<input id="hc_l_sup_55" name="hc_l_sup_55" type="hidden">
	<input id="hc_l_der_55" name="hc_l_der_55" type="hidden">
	<input id="hc_l_inf_55" name="hc_l_inf_55" type="hidden">
	<input id="hc_l_izq_55" name="hc_l_izq_55" type="hidden">
	<input id="hc_l_cen_55" name="hc_l_cen_55" type="hidden">
</div>
<div class="row">
	<input id="hc_l_sup_54" name="hc_l_sup_54" type="hidden">
	<input id="hc_l_der_54" name="hc_l_der_54" type="hidden">
	<input id="hc_l_inf_54" name="hc_l_inf_54" type="hidden">
	<input id="hc_l_izq_54" name="hc_l_izq_54" type="hidden">
	<input id="hc_l_cen_54" name="hc_l_cen_54" type="hidden">
</div>
<div class="row">
	<input id="hc_l_sup_53" name="hc_l_sup_53" type="hidden">
	<input id="hc_l_der_53" name="hc_l_der_53" type="hidden">
	<input id="hc_l_inf_53" name="hc_l_inf_53" type="hidden">
	<input id="hc_l_izq_53" name="hc_l_izq_53" type="hidden">
	<input id="hc_l_cen_53" name="hc_l_cen_53" type="hidden">
</div>
<div class="row">
	<input id="hc_l_sup_52" name="hc_l_sup_52" type="hidden">
	<input id="hc_l_der_52" name="hc_l_der_52" type="hidden">
	<input id="hc_l_inf_52" name="hc_l_inf_52" type="hidden">
	<input id="hc_l_izq_52" name="hc_l_izq_52" type="hidden">
	<input id="hc_l_cen_52" name="hc_l_cen_52" type="hidden">
</div>
<div class="row">
	<input id="hc_l_sup_51" name="hc_l_sup_51" type="hidden">
	<input id="hc_l_der_51" name="hc_l_der_51" type="hidden">
	<input id="hc_l_inf_51" name="hc_l_inf_51" type="hidden">
	<input id="hc_l_izq_51" name="hc_l_izq_51" type="hidden">
	<input id="hc_l_cen_51" name="hc_l_cen_51" type="hidden">
</div>
<div class="row">
	<input id="hc_l_sup_61" name="hc_l_sup_61" type="hidden">
	<input id="hc_l_der_61" name="hc_l_der_61" type="hidden">
	<input id="hc_l_inf_61" name="hc_l_inf_61" type="hidden">
	<input id="hc_l_izq_61" name="hc_l_izq_61" type="hidden">
	<input id="hc_l_cen_61" name="hc_l_cen_61" type="hidden">
</div>
<div class="row">
	<input id="hc_l_sup_62" name="hc_l_sup_62" type="hidden">
	<input id="hc_l_der_62" name="hc_l_der_62" type="hidden">
	<input id="hc_l_inf_62" name="hc_l_inf_62" type="hidden">
	<input id="hc_l_izq_62" name="hc_l_izq_62" type="hidden">
	<input id="hc_l_cen_62" name="hc_l_cen_62" type="hidden">
</div>
<div class="row">
	<input id="hc_l_sup_63" name="hc_l_sup_63" type="hidden">
	<input id="hc_l_der_63" name="hc_l_der_63" type="hidden">
	<input id="hc_l_inf_63" name="hc_l_inf_63" type="hidden">
	<input id="hc_l_izq_63" name="hc_l_izq_63" type="hidden">
	<input id="hc_l_cen_63" name="hc_l_cen_63" type="hidden">
</div>
<div class="row">
	<input id="hc_l_sup_64" name="hc_l_sup_64" type="hidden">
	<input id="hc_l_der_64" name="hc_l_der_64" type="hidden">
	<input id="hc_l_inf_64" name="hc_l_inf_64" type="hidden">
	<input id="hc_l_izq_64" name="hc_l_izq_64" type="hidden">
	<input id="hc_l_cen_64" name="hc_l_cen_64" type="hidden">
</div>
<div class="row">
	<input id="hc_l_sup_65" name="hc_l_sup_65" type="hidden">
	<input id="hc_l_der_65" name="hc_l_der_65" type="hidden">
	<input id="hc_l_inf_65" name="hc_l_inf_65" type="hidden">
	<input id="hc_l_izq_65" name="hc_l_izq_65" type="hidden">
	<input id="hc_l_cen_65" name="hc_l_cen_65" type="hidden">
</div>

<div class="row">
	<input id="hc_l_sup_85" name="hc_l_sup_85" type="hidden">
	<input id="hc_l_der_85" name="hc_l_der_85" type="hidden">
	<input id="hc_l_inf_85" name="hc_l_inf_85" type="hidden">
	<input id="hc_l_izq_85" name="hc_l_izq_85" type="hidden">
	<input id="hc_l_cen_85" name="hc_l_cen_85" type="hidden">
</div>
<div class="row">
	<input id="hc_l_sup_84" name="hc_l_sup_84" type="hidden">
	<input id="hc_l_der_84" name="hc_l_der_84" type="hidden">
	<input id="hc_l_inf_84" name="hc_l_inf_84" type="hidden">
	<input id="hc_l_izq_84" name="hc_l_izq_84" type="hidden">
	<input id="hc_l_cen_84" name="hc_l_cen_84" type="hidden">
</div>
<div class="row">
	<input id="hc_l_sup_83" name="hc_l_sup_83" type="hidden">
	<input id="hc_l_der_83" name="hc_l_der_83" type="hidden">
	<input id="hc_l_inf_83" name="hc_l_inf_83" type="hidden">
	<input id="hc_l_izq_83" name="hc_l_izq_83" type="hidden">
	<input id="hc_l_cen_83" name="hc_l_cen_83" type="hidden">
</div>
<div class="row">
	<input id="hc_l_sup_82" name="hc_l_sup_82" type="hidden">
	<input id="hc_l_der_82" name="hc_l_der_82" type="hidden">
	<input id="hc_l_inf_82" name="hc_l_inf_82" type="hidden">
	<input id="hc_l_izq_82" name="hc_l_izq_82" type="hidden">
	<input id="hc_l_cen_82" name="hc_l_cen_82" type="hidden">
</div>
<div class="row">
	<input id="hc_l_sup_81" name="hc_l_sup_81" type="hidden">
	<input id="hc_l_der_81" name="hc_l_der_81" type="hidden">
	<input id="hc_l_inf_81" name="hc_l_inf_81" type="hidden">
	<input id="hc_l_izq_81" name="hc_l_izq_81" type="hidden">
	<input id="hc_l_cen_81" name="hc_l_cen_81" type="hidden">
</div>
<div class="row">
	<input id="hc_l_sup_71" name="hc_l_sup_71" type="hidden">
	<input id="hc_l_der_71" name="hc_l_der_71" type="hidden">
	<input id="hc_l_inf_71" name="hc_l_inf_71" type="hidden">
	<input id="hc_l_izq_71" name="hc_l_izq_71" type="hidden">
	<input id="hc_l_cen_71" name="hc_l_cen_71" type="hidden">
</div>
<div class="row">
	<input id="hc_l_sup_72" name="hc_l_sup_72" type="hidden">
	<input id="hc_l_der_72" name="hc_l_der_72" type="hidden">
	<input id="hc_l_inf_72" name="hc_l_inf_72" type="hidden">
	<input id="hc_l_izq_72" name="hc_l_izq_72" type="hidden">
	<input id="hc_l_cen_72" name="hc_l_cen_72" type="hidden">
</div>
<div class="row">
	<input id="hc_l_sup_73" name="hc_l_sup_73" type="hidden">
	<input id="hc_l_der_73" name="hc_l_der_73" type="hidden">
	<input id="hc_l_inf_73" name="hc_l_inf_73" type="hidden">
	<input id="hc_l_izq_73" name="hc_l_izq_73" type="hidden">
	<input id="hc_l_cen_73" name="hc_l_cen_73" type="hidden">
</div>
<div class="row">
	<input id="hc_l_sup_74" name="hc_l_sup_74" type="hidden">
	<input id="hc_l_der_74" name="hc_l_der_74" type="hidden">
	<input id="hc_l_inf_74" name="hc_l_inf_74" type="hidden">
	<input id="hc_l_izq_74" name="hc_l_izq_74" type="hidden">
	<input id="hc_l_cen_74" name="hc_l_cen_74" type="hidden">
</div>
<div class="row">
	<input id="hc_l_sup_75" name="hc_l_sup_75" type="hidden">
	<input id="hc_l_der_75" name="hc_l_der_75" type="hidden">
	<input id="hc_l_inf_75" name="hc_l_inf_75" type="hidden">
	<input id="hc_l_izq_75" name="hc_l_izq_75" type="hidden">
	<input id="hc_l_cen_75" name="hc_l_cen_75" type="hidden">
</div>





						<div class="row" style="margin-bottom: 0%; ">

							<div class="col col-sm-1" style="height: 100px;  display: flex; justify-content: center; align-items: center;">
								VESTIBULAR											
							</div>

							<div class="col col-md-11">
								<div class="row">

									<div class="col-md-12">
										<div class="row">



											<div class="col-md-1">

												<div onclick="click_vestibular_sup_18()" id="v-sup-18" class="vestibular-sup v-sup-18"></div>
												<div onclick="click_vestibular_der_18()" id="v-der-18" class="vestibular-der v-der-18"></div>
												<div onclick="click_vestibular_inf_18()" id="v-inf-18" class="vestibular-inf v-inf-18"></div>
												<div onclick="click_vestibular_izq_18()" id="v-izq-18" class="vestibular-izq v-izq-18"></div>
												<div onclick="click_vestibular_cen_18()" id="v-cen-18" class="vestibular-cen v-cen-18"></div>

											</div>


											<div class="col-md-1">

												<div onclick="click_vestibular_sup_17()" id="v-sup-17" class="vestibular-sup v-sup-17"></div>
												<div onclick="click_vestibular_der_17()" id="v-der-17" class="vestibular-der v-der-17"></div>
												<div onclick="click_vestibular_inf_17()" id="v-inf-17" class="vestibular-inf v-inf-17"></div>
												<div onclick="click_vestibular_izq_17()" id="v-izq-17" class="vestibular-izq v-izq-17"></div>
												<div onclick="click_vestibular_cen_17()" id="v-cen-17" class="vestibular-cen v-cen-17"></div>

											</div>

											<div class="col-md-1">

												<div onclick="click_vestibular_sup_16()" id="v-sup-16" class="vestibular-sup v-sup-16"></div>
												<div onclick="click_vestibular_der_16()" id="v-der-16" class="vestibular-der v-der-16"></div>
												<div onclick="click_vestibular_inf_16()" id="v-inf-16" class="vestibular-inf v-inf-16"></div>
												<div onclick="click_vestibular_izq_16()" id="v-izq-16" class="vestibular-izq v-izq-16"></div>
												<div onclick="click_vestibular_cen_16()" id="v-cen-16" class="vestibular-cen v-cen-16"></div>

											</div>

											<div class="col-md-1">

												<div onclick="click_vestibular_sup_15()" id="v-sup-15" class="vestibular-sup v-sup-15"></div>
												<div onclick="click_vestibular_der_15()" id="v-der-15" class="vestibular-der v-der-15"></div>
												<div onclick="click_vestibular_inf_15()" id="v-inf-15" class="vestibular-inf v-inf-15"></div>
												<div onclick="click_vestibular_izq_15()" id="v-izq-15" class="vestibular-izq v-izq-15"></div>
												<div onclick="click_vestibular_cen_15()" id="v-cen-15" class="vestibular-cen v-cen-15"></div>

											</div>

											<div class="col-md-1">

												<div onclick="click_vestibular_sup_14()" id="v-sup-14" class="vestibular-sup v-sup-14"></div>
												<div onclick="click_vestibular_der_14()" id="v-der-14" class="vestibular-der v-der-14"></div>
												<div onclick="click_vestibular_inf_14()" id="v-inf-14" class="vestibular-inf v-inf-14"></div>
												<div onclick="click_vestibular_izq_14()" id="v-izq-14" class="vestibular-izq v-izq-14"></div>
												<div onclick="click_vestibular_cen_14()" id="v-cen-14" class="vestibular-cen v-cen-14"></div>

											</div>

											<div class="col-md-1">

												<div onclick="click_vestibular_sup_13()" id="v-sup-13" class="vestibular-sup v-sup-13"></div>
												<div onclick="click_vestibular_der_13()" id="v-der-13" class="vestibular-der v-der-13"></div>
												<div onclick="click_vestibular_inf_13()" id="v-inf-13" class="vestibular-inf v-inf-13"></div>
												<div onclick="click_vestibular_izq_13()" id="v-izq-13" class="vestibular-izq v-izq-13"></div>
												<div onclick="click_vestibular_cen_13()" id="v-cen-13" class="vestibular-cen v-cen-13"></div>

											</div>

											<div class="col-md-1">

												<div onclick="click_vestibular_sup_12()" id="v-sup-12" class="vestibular-sup v-sup-12"></div>
												<div onclick="click_vestibular_der_12()" id="v-der-12" class="vestibular-der v-der-12"></div>
												<div onclick="click_vestibular_inf_12()" id="v-inf-12" class="vestibular-inf v-inf-12"></div>
												<div onclick="click_vestibular_izq_12()" id="v-izq-12" class="vestibular-izq v-izq-12"></div>
												<div onclick="click_vestibular_cen_12()" id="v-cen-12" class="vestibular-cen v-cen-12"></div>

											</div>

											<div class="col-md-1">

												<div onclick="click_vestibular_sup_11()" id="v-sup-11" class="vestibular-sup v-sup-11"></div>
												<div onclick="click_vestibular_der_11()" id="v-der-11" class="vestibular-der v-der-11"></div>
												<div onclick="click_vestibular_inf_11()" id="v-inf-11" class="vestibular-inf v-inf-11"></div>
												<div onclick="click_vestibular_izq_11()" id="v-izq-11" class="vestibular-izq v-izq-11"></div>
												<div onclick="click_vestibular_cen_11()" id="v-cen-11" class="vestibular-cen v-cen-11"></div>

											</div>

											<div class="col-md-4">


												<div style="position: absolute;">
												OBSERVACIONES ODONTOGRAMA
													<textarea class="input-sm" name="hc-obs-odontograma" rows="9" cols="45" placeholder="Observaciones odontograma" >'.$resultado_hc["observaciones_odontograma"].'</textarea>
												</div>
											</div>

										</div>


									</div>


								</div>

							</div>

						</div>



						<div class="row" >

							<div class="col col-sm-1" style=" display: flex; justify-content: center; align-items: center;">

							</div>

							<div class="col col-md-11 ">
								<div class="row ">

									<div class="col-md-12">
										<div class="row">
											<div class="col-md-1 cent-texto">21</div>
											<div class="col-md-1 cent-texto">22</div>
											<div class="col-md-1 cent-texto">23</div>
											<div class="col-md-1 cent-texto">24</div>
											<div class="col-md-1 cent-texto">25</div>
											<div class="col-md-1 cent-texto">26</div>
											<div class="col-md-1 cent-texto">27</div>
											<div class="col-md-1 cent-texto">28</div>
										</div>


									</div>


								</div>

							</div>

						</div>

						<div class="row" style="margin-bottom: 1%">

							<div class="col col-sm-1" style="height: 100px;  display: flex; justify-content: center; align-items: center;">
								VESTIBULAR											
							</div>

							<div class="col col-md-11">
								<div class="row">

									<div class="col-md-12">
										<div class="row">

											<div class="col-md-1">

												<div onclick="click_vestibular_sup_21()" id="v-sup-21" class="vestibular-sup v-sup-21"></div>
												<div onclick="click_vestibular_der_21()" id="v-der-21" class="vestibular-der v-der-21"></div>
												<div onclick="click_vestibular_inf_21()" id="v-inf-21" class="vestibular-inf v-inf-21"></div>
												<div onclick="click_vestibular_izq_21()" id="v-izq-21" class="vestibular-izq v-izq-21"></div>
												<div onclick="click_vestibular_cen_21()" id="v-cen-21" class="vestibular-cen v-cen-21"></div>

											</div>

											<div class="col-md-1">

												<div onclick="click_vestibular_sup_22()" id="v-sup-22" class="vestibular-sup v-sup-22"></div>
												<div onclick="click_vestibular_der_22()" id="v-der-22" class="vestibular-der v-der-22"></div>
												<div onclick="click_vestibular_inf_22()" id="v-inf-22" class="vestibular-inf v-inf-22"></div>
												<div onclick="click_vestibular_izq_22()" id="v-izq-22" class="vestibular-izq v-izq-22"></div>
												<div onclick="click_vestibular_cen_22()" id="v-cen-22" class="vestibular-cen v-cen-22"></div>

											</div>

											<div class="col-md-1">

												<div onclick="click_vestibular_sup_23()" id="v-sup-23" class="vestibular-sup v-sup-23"></div>
												<div onclick="click_vestibular_der_23()" id="v-der-23" class="vestibular-der v-der-23"></div>
												<div onclick="click_vestibular_inf_23()" id="v-inf-23" class="vestibular-inf v-inf-23"></div>
												<div onclick="click_vestibular_izq_23()" id="v-izq-23" class="vestibular-izq v-izq-23"></div>
												<div onclick="click_vestibular_cen_23()" id="v-cen-23" class="vestibular-cen v-cen-23"></div>

											</div>

											<div class="col-md-1">

												<div onclick="click_vestibular_sup_24()" id="v-sup-24" class="vestibular-sup v-sup-24"></div>
												<div onclick="click_vestibular_der_24()" id="v-der-24" class="vestibular-der v-der-24"></div>
												<div onclick="click_vestibular_inf_24()" id="v-inf-24" class="vestibular-inf v-inf-24"></div>
												<div onclick="click_vestibular_izq_24()" id="v-izq-24" class="vestibular-izq v-izq-24"></div>
												<div onclick="click_vestibular_cen_24()" id="v-cen-24" class="vestibular-cen v-cen-24"></div>

											</div>

											<div class="col-md-1">

												<div onclick="click_vestibular_sup_25()" id="v-sup-25" class="vestibular-sup v-sup-25"></div>
												<div onclick="click_vestibular_der_25()" id="v-der-25" class="vestibular-der v-der-25"></div>
												<div onclick="click_vestibular_inf_25()" id="v-inf-25" class="vestibular-inf v-inf-25"></div>
												<div onclick="click_vestibular_izq_25()" id="v-izq-25" class="vestibular-izq v-izq-25"></div>
												<div onclick="click_vestibular_cen_25()" id="v-cen-25" class="vestibular-cen v-cen-25"></div>

											</div>

											<div class="col-md-1">

												<div onclick="click_vestibular_sup_26()" id="v-sup-26" class="vestibular-sup v-sup-26"></div>
												<div onclick="click_vestibular_der_26()" id="v-der-26" class="vestibular-der v-der-26"></div>
												<div onclick="click_vestibular_inf_26()" id="v-inf-26" class="vestibular-inf v-inf-26"></div>
												<div onclick="click_vestibular_izq_26()" id="v-izq-26" class="vestibular-izq v-izq-26"></div>
												<div onclick="click_vestibular_cen_26()" id="v-cen-26" class="vestibular-cen v-cen-26"></div>

											</div>

											<div class="col-md-1">

												<div onclick="click_vestibular_sup_27()" id="v-sup-27" class="vestibular-sup v-sup-27"></div>
												<div onclick="click_vestibular_der_27()" id="v-der-27" class="vestibular-der v-der-27"></div>
												<div onclick="click_vestibular_inf_27()" id="v-inf-27" class="vestibular-inf v-inf-27"></div>
												<div onclick="click_vestibular_izq_27()" id="v-izq-27" class="vestibular-izq v-izq-27"></div>
												<div onclick="click_vestibular_cen_27()" id="v-cen-27" class="vestibular-cen v-cen-27"></div>

											</div>

											<div class="col-md-1">

												<div onclick="click_vestibular_sup_28()" id="v-sup-28" class="vestibular-sup v-sup-28"></div>
												<div onclick="click_vestibular_der_28()" id="v-der-28" class="vestibular-der v-der-28"></div>
												<div onclick="click_vestibular_inf_28()" id="v-inf-28" class="vestibular-inf v-inf-28"></div>
												<div onclick="click_vestibular_izq_28()" id="v-izq-28" class="vestibular-izq v-izq-28"></div>
												<div onclick="click_vestibular_cen_28()" id="v-cen-28" class="vestibular-cen v-cen-28"></div>

											</div>

										</div>


									</div>


								</div>

							</div>

						</div>


						<div class="row">

							<div class="col col-sm-1" >

							</div>

							<div class="col col-md-11">

								<div class="row">

									<div class="col-md-6">
										<div class="row">
											<div class="col-md-2" style="display: flex; justify-content: center; align-items: center;">55</div>
											<div class="col-md-2" style="display: flex; justify-content: center; align-items: center;">54</div>
											<div class="col-md-2" style="display: flex; justify-content: center; align-items: center;">53</div>
											<div class="col-md-2" style="display: flex; justify-content: center; align-items: center;">52</div>
											<div class="col-md-2" style="display: flex; justify-content: center; align-items: center;">51</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="row">
											<div class="col-md-2" style="display: flex; justify-content: center; align-items: center;">61</div>
											<div class="col-md-2" style="display: flex; justify-content: center; align-items: center;">62</div>
											<div class="col-md-2" style="display: flex; justify-content: center; align-items: center;">63</div>
											<div class="col-md-2" style="display: flex; justify-content: center; align-items: center;">64</div>
											<div class="col-md-2" style="display: flex; justify-content: center; align-items: center;">65</div>
										</div> 
									</div>
								</div>



							</div>

						</div>

						<div class="row">

							<div class="col col-sm-1" style="height: 100px;  display: flex; justify-content: center; align-items: center;">
								LINGUAL										
							</div>

							<div class="col col-md-11">

								<div class="row">

									<div class="col-md-6">
										<div class="row">
											<div class="col-md-2">

												<div onclick="click_lingual_sup_55()" id="l-sup-55" class="lingual-sup l-sup-55"></div> 
												<div onclick="click_lingual_der_55()" id="l-der-55" class="lingual-der l-der-55"></div>
												<div onclick="click_lingual_inf_55()" id="l-inf-55" class="lingual-inf l-inf-55"></div>
												<div onclick="click_lingual_izq_55()" id="l-izq-55" class="lingual-izq l-izq-55"></div>
												<div onclick="click_lingual_cen_55()" id="l-cen-55" class="lingual-cen l-cen-55"></div>

											</div>

											<div class="col-md-2">

												<div onclick="click_lingual_sup_54()" id="l-sup-54" class="lingual-sup l-sup-54"></div>
												<div onclick="click_lingual_der_54()" id="l-der-54" class="lingual-der l-der-54"></div>
												<div onclick="click_lingual_inf_54()" id="l-inf-54" class="lingual-inf l-inf-54"></div>
												<div onclick="click_lingual_izq_54()" id="l-izq-54" class="lingual-izq l-izq-54"></div>
												<div onclick="click_lingual_cen_54()" id="l-cen-54" class="lingual-cen l-cen-54"></div>
											</div>

											<div class="col-md-2">

												<div onclick="click_lingual_sup_53()" id="l-sup-53" class="lingual-sup l-sup-53"></div>
												<div onclick="click_lingual_der_53()" id="l-der-53" class="lingual-der l-der-53"></div>
												<div onclick="click_lingual_inf_53()" id="l-inf-53" class="lingual-inf l-inf-53"></div>
												<div onclick="click_lingual_izq_53()" id="l-izq-53" class="lingual-izq l-izq-53"></div>
												<div onclick="click_lingual_cen_53()" id="l-cen-53" class="lingual-cen l-cen-53"></div>
											</div>

											<div class="col-md-2">

												<div onclick="click_lingual_sup_52()" id="l-sup-52" class="lingual-sup l-sup-52"></div>
												<div onclick="click_lingual_der_52()" id="l-der-52" class="lingual-der l-der-52"></div>
												<div onclick="click_lingual_inf_52()" id="l-inf-52" class="lingual-inf l-inf-52"></div>
												<div onclick="click_lingual_izq_52()" id="l-izq-52" class="lingual-izq l-izq-52"></div>
												<div onclick="click_lingual_cen_52()" id="l-cen-52" class="lingual-cen l-cen-52"></div>
											</div>

											<div class="col-md-2">

												<div onclick="click_lingual_sup_51()" id="l-sup-51" class="lingual-sup l-sup-51"></div>
												<div onclick="click_lingual_der_51()" id="l-der-51" class="lingual-der l-der-51"></div>
												<div onclick="click_lingual_inf_51()" id="l-inf-51" class="lingual-inf l-inf-51"></div>
												<div onclick="click_lingual_izq_51()" id="l-izq-51" class="lingual-izq l-izq-51"></div>
												<div onclick="click_lingual_cen_51()" id="l-cen-51" class="lingual-cen l-cen-51"></div>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="row">
											<div class="col-md-2">

												<div onclick="click_lingual_sup_61()" id="l-sup-61" class="lingual-sup l-sup-61"></div> 
												<div onclick="click_lingual_der_61()" id="l-der-61" class="lingual-der l-der-61"></div>
												<div onclick="click_lingual_inf_61()" id="l-inf-61" class="lingual-inf l-inf-61"></div>
												<div onclick="click_lingual_izq_61()" id="l-izq-61" class="lingual-izq l-izq-61"></div>
												<div onclick="click_lingual_cen_61()" id="l-cen-61" class="lingual-cen l-cen-61"></div>

											</div>

											<div class="col-md-2">

												<div onclick="click_lingual_sup_62()" id="l-sup-62" class="lingual-sup l-sup-62"></div>
												<div onclick="click_lingual_der_62()" id="l-der-62" class="lingual-der l-der-62"></div>
												<div onclick="click_lingual_inf_62()" id="l-inf-62" class="lingual-inf l-inf-62"></div>
												<div onclick="click_lingual_izq_62()" id="l-izq-62" class="lingual-izq l-izq-62"></div>
												<div onclick="click_lingual_cen_62()" id="l-cen-62" class="lingual-cen l-cen-62"></div>
											</div>

											<div class="col-md-2">

												<div onclick="click_lingual_sup_63()" id="l-sup-63" class="lingual-sup l-sup-63"></div>
												<div onclick="click_lingual_der_63()" id="l-der-63" class="lingual-der l-der-63"></div>
												<div onclick="click_lingual_inf_63()" id="l-inf-63" class="lingual-inf l-inf-63"></div>
												<div onclick="click_lingual_izq_63()" id="l-izq-63" class="lingual-izq l-izq-63"></div>
												<div onclick="click_lingual_cen_63()" id="l-cen-63" class="lingual-cen l-cen-63"></div>
											</div>

											<div class="col-md-2">

												<div onclick="click_lingual_sup_64()" id="l-sup-64" class="lingual-sup l-sup-64"></div>
												<div onclick="click_lingual_der_64()" id="l-der-64" class="lingual-der l-der-64"></div>
												<div onclick="click_lingual_inf_64()" id="l-inf-64" class="lingual-inf l-inf-64"></div>
												<div onclick="click_lingual_izq_64()" id="l-izq-64" class="lingual-izq l-izq-64"></div>
												<div onclick="click_lingual_cen_64()" id="l-cen-64" class="lingual-cen l-cen-64"></div>
											</div>

											<div class="col-md-2">

												<div onclick="click_lingual_sup_65()" id="l-sup-65" class="lingual-sup l-sup-65"></div>
												<div onclick="click_lingual_der_65()" id="l-der-65" class="lingual-der l-der-65"></div>
												<div onclick="click_lingual_inf_65()" id="l-inf-65" class="lingual-inf l-inf-65"></div>
												<div onclick="click_lingual_izq_65()" id="l-izq-65" class="lingual-izq l-izq-65"></div>
												<div onclick="click_lingual_cen_65()" id="l-cen-65" class="lingual-cen l-cen-65"></div>
											</div>
										</div> 
									</div>
								</div>

							</div>

						</div>



						<div class="row">

							<div class="col col-sm-1" style=" display: flex; justify-content: center; align-items: center;">

							</div>

							<div class="col col-md-11">

								<div class="row">

									<div class="col-md-6">
										<div class="row">
											<div class="col-md-2" style="display: flex; justify-content: center; align-items: center;">85</div>
											<div class="col-md-2" style="display: flex; justify-content: center; align-items: center;">84</div>
											<div class="col-md-2" style="display: flex; justify-content: center; align-items: center;">83</div>
											<div class="col-md-2" style="display: flex; justify-content: center; align-items: center;">82</div>
											<div class="col-md-2" style="display: flex; justify-content: center; align-items: center;">81</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="row">
											<div class="col-md-2" style="display: flex; justify-content: center; align-items: center;">71</div>
											<div class="col-md-2" style="display: flex; justify-content: center; align-items: center;">72</div>
											<div class="col-md-2" style="display: flex; justify-content: center; align-items: center;">73</div>
											<div class="col-md-2" style="display: flex; justify-content: center; align-items: center;">74</div>
											<div class="col-md-2" style="display: flex; justify-content: center; align-items: center;">75</div>
										</div> 
									</div>
								</div>



							</div>

						</div>



						<div class="row">

							<div class="col col-sm-1" style="height: 80px;  display: flex; justify-content: center; align-items: center;">
								LINGUAL										
							</div>

							<div class="col col-md-11">

								<div class="row">

									<div class="col-md-6">
										<div class="row">
											<div class="col-md-2">

												<div onclick="click_lingual_sup_85()" id="l-sup-85" class="lingual-sup l-sup-85"></div> 
												<div onclick="click_lingual_der_85()" id="l-der-85" class="lingual-der l-der-85"></div>
												<div onclick="click_lingual_inf_85()" id="l-inf-85" class="lingual-inf l-inf-85"></div>
												<div onclick="click_lingual_izq_85()" id="l-izq-85" class="lingual-izq l-izq-85"></div>
												<div onclick="click_lingual_cen_85()" id="l-cen-85" class="lingual-cen l-cen-85"></div>

											</div>

											<div class="col-md-2">

												<div onclick="click_lingual_sup_84()" id="l-sup-84" class="lingual-sup l-sup-84"></div>
												<div onclick="click_lingual_der_84()" id="l-der-84" class="lingual-der l-der-84"></div>
												<div onclick="click_lingual_inf_84()" id="l-inf-84" class="lingual-inf l-inf-84"></div>
												<div onclick="click_lingual_izq_84()" id="l-izq-84" class="lingual-izq l-izq-84"></div>
												<div onclick="click_lingual_cen_84()" id="l-cen-84" class="lingual-cen l-cen-84"></div>
											</div>

											<div class="col-md-2">

												<div onclick="click_lingual_sup_83()" id="l-sup-83" class="lingual-sup l-sup-83"></div>
												<div onclick="click_lingual_der_83()" id="l-der-83" class="lingual-der l-der-83"></div>
												<div onclick="click_lingual_inf_83()" id="l-inf-83" class="lingual-inf l-inf-83"></div>
												<div onclick="click_lingual_izq_83()" id="l-izq-83" class="lingual-izq l-izq-83"></div>
												<div onclick="click_lingual_cen_83()" id="l-cen-83" class="lingual-cen l-cen-83"></div>
											</div>

											<div class="col-md-2">

												<div onclick="click_lingual_sup_82()" id="l-sup-82" class="lingual-sup l-sup-82"></div>
												<div onclick="click_lingual_der_82()" id="l-der-82" class="lingual-der l-der-82"></div>
												<div onclick="click_lingual_inf_82()" id="l-inf-82" class="lingual-inf l-inf-82"></div>
												<div onclick="click_lingual_izq_82()" id="l-izq-82" class="lingual-izq l-izq-82"></div>
												<div onclick="click_lingual_cen_82()" id="l-cen-82" class="lingual-cen l-cen-82"></div>
											</div>

											<div class="col-md-2">

												<div onclick="click_lingual_sup_81()" id="l-sup-81" class="lingual-sup l-sup-81"></div>
												<div onclick="click_lingual_der_81()" id="l-der-81" class="lingual-der l-der-81"></div>
												<div onclick="click_lingual_inf_81()" id="l-inf-81" class="lingual-inf l-inf-81"></div>
												<div onclick="click_lingual_izq_81()" id="l-izq-81" class="lingual-izq l-izq-81"></div>
												<div onclick="click_lingual_cen_81()" id="l-cen-81" class="lingual-cen l-cen-81"></div>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="row">
											<div class="col-md-2">

												<div onclick="click_lingual_sup_71()" id="l-sup-71" class="lingual-sup l-sup-71"></div> 
												<div onclick="click_lingual_der_71()" id="l-der-71" class="lingual-der l-der-71"></div>
												<div onclick="click_lingual_inf_71()" id="l-inf-71" class="lingual-inf l-inf-71"></div>
												<div onclick="click_lingual_izq_71()" id="l-izq-71" class="lingual-izq l-izq-71"></div>
												<div onclick="click_lingual_cen_71()" id="l-cen-71" class="lingual-cen l-cen-71" style=" "></div>

											</div>

											<div class="col-md-2">

												<div onclick="click_lingual_sup_72()" id="l-sup-72" class="lingual-sup l-sup-72"></div>
												<div onclick="click_lingual_der_72()" id="l-der-72" class="lingual-der l-der-72"></div>
												<div onclick="click_lingual_inf_72()" id="l-inf-72" class="lingual-inf l-inf-72"></div>
												<div onclick="click_lingual_izq_72()" id="l-izq-72" class="lingual-izq l-izq-72"></div>
												<div onclick="click_lingual_cen_72()" id="l-cen-72" class="lingual-cen l-cen-72"></div>
											</div>

											<div class="col-md-2">

												<div onclick="click_lingual_sup_73()" id="l-sup-73" class="lingual-sup l-sup-73"></div>
												<div onclick="click_lingual_der_73()" id="l-der-73" class="lingual-der l-der-73"></div>
												<div onclick="click_lingual_inf_73()" id="l-inf-73" class="lingual-inf l-inf-73"></div>
												<div onclick="click_lingual_izq_73()" id="l-izq-73" class="lingual-izq l-izq-73"></div>
												<div onclick="click_lingual_cen_73()" id="l-cen-73" class="lingual-cen l-cen-73"></div>
											</div>

											<div class="col-md-2">

												<div onclick="click_lingual_sup_74()" id="l-sup-74" class="lingual-sup l-sup-74"></div>
												<div onclick="click_lingual_der_74()" id="l-der-74" class="lingual-der l-der-74"></div>
												<div onclick="click_lingual_inf_74()" id="l-inf-74" class="lingual-inf l-inf-74"></div>
												<div onclick="click_lingual_izq_74()" id="l-izq-74" class="lingual-izq l-izq-74"></div>
												<div onclick="click_lingual_cen_74()" id="l-cen-74" class="lingual-cen l-cen-74"></div>
											</div>

											<div class="col-md-2">

												<div onclick="click_lingual_sup_75()" id="l-sup-75" class="lingual-sup l-sup-75"></div>
												<div onclick="click_lingual_der_75()" id="l-der-75" class="lingual-der l-der-75"></div>
												<div onclick="click_lingual_inf_75()" id="l-inf-75" class="lingual-inf l-inf-75"></div>
												<div onclick="click_lingual_izq_75()" id="l-izq-75" class="lingual-izq l-izq-75"></div>
												<div onclick="click_lingual_cen_75()" id="l-cen-75" class="lingual-cen l-cen-75"></div>
											</div>
										</div> 
									</div>
								</div>



							</div>

						</div>

						<div class="row margenSubTitulo" >

							<div class="col col-sm-1" style=" display: flex; justify-content: center; align-items: center;">

							</div>

							<div class="col col-md-11 ">
								<div class="row ">

									<div class="col-md-12">
										<div class="row">

											<div class="col-md-1 cent-texto">48</div>
											<div class="col-md-1 cent-texto">47</div>
											<div class="col-md-1 cent-texto">46</div>
											<div class="col-md-1 cent-texto">45</div>
											<div class="col-md-1 cent-texto">44</div>
											<div class="col-md-1 cent-texto">43</div>
											<div class="col-md-1 cent-texto">42</div>
											<div class="col-md-1 cent-texto">41</div>

										</div>


									</div>


								</div>

							</div>

						</div>

						<div class="row" style="margin-bottom: 1%">

							<div class="col col-sm-1" style="height: 80px;  display: flex; justify-content: center; align-items: center;">
								VESTIBULAR											
							</div>

							<div class="col col-md-11">
								<div class="row">

									<div class="col-md-12">
										<div class="row">

											<div class="col-md-1">

												<div onclick="click_vestibular_sup_48()" id="v-sup-48" class="vestibular-sup v-sup-48"></div> 
												<div onclick="click_vestibular_der_48()" id="v-der-48" class="vestibular-der v-der-48"></div>
												<div onclick="click_vestibular_inf_48()" id="v-inf-48" class="vestibular-inf v-inf-48"></div>
												<div onclick="click_vestibular_izq_48()" id="v-izq-48" class="vestibular-izq v-izq-48"></div>
												<div onclick="click_vestibular_cen_48()" id="v-cen-48" class="vestibular-cen v-cen-48"></div>

											</div>

											<div class="col-md-1">

												<div onclick="click_vestibular_sup_47()" id="v-sup-47" class="vestibular-sup v-sup-47"></div> 
												<div onclick="click_vestibular_der_47()" id="v-der-47" class="vestibular-der v-der-47"></div>
												<div onclick="click_vestibular_inf_47()" id="v-inf-47" class="vestibular-inf v-inf-47"></div>
												<div onclick="click_vestibular_izq_47()" id="v-izq-47" class="vestibular-izq v-izq-47"></div>
												<div onclick="click_vestibular_cen_47()" id="v-cen-47" class="vestibular-cen v-cen-47"></div>

											</div>

											<div class="col-md-1">

												<div onclick="click_vestibular_sup_46()" id="v-sup-46" class="vestibular-sup v-sup-46"></div> 
												<div onclick="click_vestibular_der_46()" id="v-der-46" class="vestibular-der v-der-46"></div>
												<div onclick="click_vestibular_inf_46()" id="v-inf-46" class="vestibular-inf v-inf-46"></div>
												<div onclick="click_vestibular_izq_46()" id="v-izq-46" class="vestibular-izq v-izq-46"></div>
												<div onclick="click_vestibular_cen_46()" id="v-cen-46" class="vestibular-cen v-cen-46"></div>

											</div>

											<div class="col-md-1">

												<div onclick="click_vestibular_sup_45()" id="v-sup-45" class="vestibular-sup v-sup-45"></div> 
												<div onclick="click_vestibular_der_45()" id="v-der-45" class="vestibular-der v-der-45"></div>
												<div onclick="click_vestibular_inf_45()" id="v-inf-45" class="vestibular-inf v-inf-45"></div>
												<div onclick="click_vestibular_izq_45()" id="v-izq-45" class="vestibular-izq v-izq-45"></div>
												<div onclick="click_vestibular_cen_45()" id="v-cen-45" class="vestibular-cen v-cen-45"></div>

											</div>

											<div class="col-md-1">

												<div onclick="click_vestibular_sup_44()" id="v-sup-44" class="vestibular-sup v-sup-44"></div> 
												<div onclick="click_vestibular_der_44()" id="v-der-44" class="vestibular-der v-der-44"></div>
												<div onclick="click_vestibular_inf_44()" id="v-inf-44" class="vestibular-inf v-inf-44"></div>
												<div onclick="click_vestibular_izq_44()" id="v-izq-44" class="vestibular-izq v-izq-44"></div>
												<div onclick="click_vestibular_cen_44()" id="v-cen-44" class="vestibular-cen v-cen-44"></div>

											</div>

											<div class="col-md-1">

												<div onclick="click_vestibular_sup_43()" id="v-sup-43" class="vestibular-sup v-sup-43"></div> 
												<div onclick="click_vestibular_der_43()" id="v-der-43" class="vestibular-der v-der-43"></div>
												<div onclick="click_vestibular_inf_43()" id="v-inf-43" class="vestibular-inf v-inf-43"></div>
												<div onclick="click_vestibular_izq_43()" id="v-izq-43" class="vestibular-izq v-izq-43"></div>
												<div onclick="click_vestibular_cen_43()" id="v-cen-43" class="vestibular-cen v-cen-43"></div>

											</div>

											<div class="col-md-1">

												<div onclick="click_vestibular_sup_42()" id="v-sup-42" class="vestibular-sup v-sup-42"></div> 
												<div onclick="click_vestibular_der_42()" id="v-der-42" class="vestibular-der v-der-42"></div>
												<div onclick="click_vestibular_inf_42()" id="v-inf-42" class="vestibular-inf v-inf-42"></div>
												<div onclick="click_vestibular_izq_42()" id="v-izq-42" class="vestibular-izq v-izq-42"></div>
												<div onclick="click_vestibular_cen_42()" id="v-cen-42" class="vestibular-cen v-cen-42"></div>

											</div>

											<div class="col-md-1">

												<div onclick="click_vestibular_sup_41()" id="v-sup-41" class="vestibular-sup v-sup-41"></div> 
												<div onclick="click_vestibular_der_41()" id="v-der-41" class="vestibular-der v-der-41"></div>
												<div onclick="click_vestibular_inf_41()" id="v-inf-41" class="vestibular-inf v-inf-41"></div>
												<div onclick="click_vestibular_izq_41()" id="v-izq-41" class="vestibular-izq v-izq-41"></div>
												<div onclick="click_vestibular_cen_41()" id="v-cen-41" class="vestibular-cen v-cen-41"></div>

											</div>

										</div>


									</div>


								</div>

							</div>

						</div>

						<div class="row" >

							<div class="col col-sm-1" style=" display: flex; justify-content: center; align-items: center;">

							</div>

							<div class="col col-md-11 ">
								<div class="row ">

									<div class="col-md-12">
										<div class="row">
											<div class="col-md-1 cent-texto">31</div>
											<div class="col-md-1 cent-texto">32</div>
											<div class="col-md-1 cent-texto">33</div>
											<div class="col-md-1 cent-texto">34</div>
											<div class="col-md-1 cent-texto">35</div>
											<div class="col-md-1 cent-texto">36</div>
											<div class="col-md-1 cent-texto">37</div>
											<div class="col-md-1 cent-texto">38</div>
										</div>


									</div>


								</div>

							</div>

						</div>

						<div class="row" style="margin-bottom: 1%">

							<div class="col col-sm-1" style="height: 100px;  display: flex; justify-content: center; align-items: center;">
								VESTIBULAR											
							</div>

							<div class="col col-md-11">
								<div class="row">

									<div class="col-md-12">
										<div class="row">

											<div class="col-md-1">

												<div onclick="click_vestibular_sup_31()" id="v-sup-31" class="vestibular-sup v-sup-31"></div> 
												<div onclick="click_vestibular_der_31()" id="v-der-31" class="vestibular-der v-der-31"></div>
												<div onclick="click_vestibular_inf_31()" id="v-inf-31" class="vestibular-inf v-inf-31"></div>
												<div onclick="click_vestibular_izq_31()" id="v-izq-31" class="vestibular-izq v-izq-31"></div>
												<div onclick="click_vestibular_cen_31()" id="v-cen-31" class="vestibular-cen v-cen-31"></div>

											</div>

											<div class="col-md-1">

												<div onclick="click_vestibular_sup_32()" id="v-sup-32" class="vestibular-sup v-sup-32"></div> 
												<div onclick="click_vestibular_der_32()" id="v-der-32" class="vestibular-der v-der-32"></div>
												<div onclick="click_vestibular_inf_32()" id="v-inf-32" class="vestibular-inf v-inf-32"></div>
												<div onclick="click_vestibular_izq_32()" id="v-izq-32" class="vestibular-izq v-izq-32"></div>
												<div onclick="click_vestibular_cen_32()" id="v-cen-32" class="vestibular-cen v-cen-32"></div>

											</div>

											<div class="col-md-1">

												<div onclick="click_vestibular_sup_33()" id="v-sup-33" class="vestibular-sup v-sup-33"></div> 
												<div onclick="click_vestibular_der_33()" id="v-der-33" class="vestibular-der v-der-33"></div>
												<div onclick="click_vestibular_inf_33()" id="v-inf-33" class="vestibular-inf v-inf-33"></div>
												<div onclick="click_vestibular_izq_33()" id="v-izq-33" class="vestibular-izq v-izq-33"></div>
												<div onclick="click_vestibular_cen_33()" id="v-cen-33" class="vestibular-cen v-cen-33"></div>

											</div>

											<div class="col-md-1">

												<div onclick="click_vestibular_sup_34()" id="v-sup-34" class="vestibular-sup v-sup-34"></div> 
												<div onclick="click_vestibular_der_34()" id="v-der-34" class="vestibular-der v-der-34"></div>
												<div onclick="click_vestibular_inf_34()" id="v-inf-34" class="vestibular-inf v-inf-34"></div>
												<div onclick="click_vestibular_izq_34()" id="v-izq-34" class="vestibular-izq v-izq-34"></div>
												<div onclick="click_vestibular_cen_34()" id="v-cen-34" class="vestibular-cen v-cen-34"></div>

											</div>

											<div class="col-md-1">

												<div onclick="click_vestibular_sup_35()" id="v-sup-35" class="vestibular-sup v-sup-35"></div> 
												<div onclick="click_vestibular_der_35()" id="v-der-35" class="vestibular-der v-der-35"></div>
												<div onclick="click_vestibular_inf_35()" id="v-inf-35" class="vestibular-inf v-inf-35"></div>
												<div onclick="click_vestibular_izq_35()" id="v-izq-35" class="vestibular-izq v-izq-35"></div>
												<div onclick="click_vestibular_cen_35()" id="v-cen-35" class="vestibular-cen v-cen-35"></div>

											</div>

											<div class="col-md-1">

												<div onclick="click_vestibular_sup_36()" id="v-sup-36" class="vestibular-sup v-sup-36"></div> 
												<div onclick="click_vestibular_der_36()" id="v-der-36" class="vestibular-der v-der-36"></div>
												<div onclick="click_vestibular_inf_36()" id="v-inf-36" class="vestibular-inf v-inf-36"></div>
												<div onclick="click_vestibular_izq_36()" id="v-izq-36" class="vestibular-izq v-izq-36"></div>
												<div onclick="click_vestibular_cen_36()" id="v-cen-36" class="vestibular-cen v-cen-36"></div>

											</div>

											<div class="col-md-1">

												<div onclick="click_vestibular_sup_37()" id="v-sup-37" class="vestibular-sup v-sup-37"></div> 
												<div onclick="click_vestibular_der_37()" id="v-der-37" class="vestibular-der v-der-37"></div>
												<div onclick="click_vestibular_inf_37()" id="v-inf-37" class="vestibular-inf v-inf-37"></div>
												<div onclick="click_vestibular_izq_37()" id="v-izq-37" class="vestibular-izq v-izq-37"></div>
												<div onclick="click_vestibular_cen_37()" id="v-cen-37" class="vestibular-cen v-cen-37"></div>

											</div>

											<div class="col-md-1">

												<div onclick="click_vestibular_sup_38()" id="v-sup-38" class="vestibular-sup v-sup-38"></div> 
												<div onclick="click_vestibular_der_38()" id="v-der-38" class="vestibular-der v-der-38"></div>
												<div onclick="click_vestibular_inf_38()" id="v-inf-38" class="vestibular-inf v-inf-38"></div>
												<div onclick="click_vestibular_izq_38()" id="v-izq-38" class="vestibular-izq v-izq-38"></div>
												<div onclick="click_vestibular_cen_38()" id="v-cen-38" class="vestibular-cen v-cen-38"></div>

											</div>

										</div>


									</div>


								</div>

							</div>

						</div>

						<div class="row" style="margin-bottom: 1%">


							<div class="col col-sm-1">
								RECESIÓN								
							</div>

							<div class="col col-md-11">
								<div class="row">

									<div class="col-md-5">
										
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="recesion_2_01" value="'.$resultado_hc["recesion_2_01"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="recesion_2_02" value="'.$resultado_hc["recesion_2_02"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="recesion_2_03" value="'.$resultado_hc["recesion_2_03"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="recesion_2_04" value="'.$resultado_hc["recesion_2_04"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="recesion_2_05" value="'.$resultado_hc["recesion_2_05"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="recesion_2_06" value="'.$resultado_hc["recesion_2_06"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="recesion_2_07" value="'.$resultado_hc["recesion_2_07"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="recesion_2_08" value="'.$resultado_hc["recesion_2_08"].'">
										
									</div>


									<div class="col-md-5">
										
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="recesion_2_09" value="'.$resultado_hc["recesion_2_09"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="recesion_2_10" value="'.$resultado_hc["recesion_2_10"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="recesion_2_11" value="'.$resultado_hc["recesion_2_11"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="recesion_2_12" value="'.$resultado_hc["recesion_2_12"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="recesion_2_13" value="'.$resultado_hc["recesion_2_13"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="recesion_2_14" value="'.$resultado_hc["recesion_2_14"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="recesion_2_15" value="'.$resultado_hc["recesion_2_15"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="recesion_2_16" value="'.$resultado_hc["recesion_2_16"].'">
										
									</div>

								</div>

							</div>

						</div>

						<div class="row" style="margin-bottom: 1%">
							<div class="col col-sm-1">
								MOVILIDAD								
							</div>

							<div class="col col-md-11">
								<div class="row">

									<div class="col-md-5">
										
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="movilidad_2_01" value="'.$resultado_hc["movilidad_2_01"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="movilidad_2_02" value="'.$resultado_hc["movilidad_2_02"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="movilidad_2_03" value="'.$resultado_hc["movilidad_2_03"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="movilidad_2_04" value="'.$resultado_hc["movilidad_2_04"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="movilidad_2_05" value="'.$resultado_hc["movilidad_2_05"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="movilidad_2_06" value="'.$resultado_hc["movilidad_2_06"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="movilidad_2_07" value="'.$resultado_hc["movilidad_2_07"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="movilidad_2_08" value="'.$resultado_hc["movilidad_2_08"].'">
										
									</div>


									<div class="col-md-5">
										
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="movilidad_2_09" value="'.$resultado_hc["movilidad_2_09"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="movilidad_2_10" value="'.$resultado_hc["movilidad_2_10"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="movilidad_2_11" value="'.$resultado_hc["movilidad_2_11"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="movilidad_2_12" value="'.$resultado_hc["movilidad_2_12"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="movilidad_2_13" value="'.$resultado_hc["movilidad_2_13"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="movilidad_2_14" value="'.$resultado_hc["movilidad_2_14"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="movilidad_2_15" value="'.$resultado_hc["movilidad_2_15"].'">
										<input type="text" maxlength="2" class="input-sm" style="width: 45px" onkeypress="return isNumber(event)" name="movilidad_2_16" value="'.$resultado_hc["movilidad_2_16"].'">
										
									</div>

								</div>

							</div>

						</div>
					</div>


	';




	echo'

<div>
<input type="hidden" name="isb_pd16" id="isb_pd16">
<input type="hidden" name="isb_pd17" id="isb_pd17">
<input type="hidden" name="isb_pd55" id="isb_pd55">

<input type="hidden" name="isb_pd11" id="isb_pd11">
<input type="hidden" name="isb_pd21" id="isb_pd21">
<input type="hidden" name="isb_pd51" id="isb_pd51">

<input type="hidden" name="isb_pd26" id="isb_pd26">
<input type="hidden" name="isb_pd27" id="isb_pd27">
<input type="hidden" name="isb_pd65" id="isb_pd65">

<input type="hidden" name="isb_pd36" id="isb_pd36">
<input type="hidden" name="isb_pd37" id="isb_pd37">
<input type="hidden" name="isb_pd75" id="isb_pd75">

<input type="hidden" name="isb_pd31" id="isb_pd31">
<input type="hidden" name="isb_pd41" id="isb_pd41">
<input type="hidden" name="isb_pd71" id="isb_pd71">

<input type="hidden" name="isb_pd46" id="isb_pd46">
<input type="hidden" name="isb_pd47" id="isb_pd47">
<input type="hidden" name="isb_pd85" id="isb_pd85">
</div>


					<!--7  INDICADORES DE SALUD BUCAL -->
					<div class="container margenSubTitulo">

						<div class="row ">

							<div class="col-md-5" > <h5>7 INDICADORES DE SALUD BUCAL</h5> </div>

						</div>


						<div class="row">

							<div class="col-md-6 centrado"> <h5> <strong> HIGIENE ORAL SIMPLIFICADA</strong></h5>

								<div class="row">

									<div class="col-md-6 centrado"> <h5>PIEZAS DENTALES</h5>
									</div>


									<div class="col-md-2 centrado" >PLACA <br> <small> 0-1-2-3-9</small>


									</div>
									<div class="col-md-2 centrado" >CÁLCULO <br> <small> 0 - 1 - 2 - 3</small>


									</div>
									<div class="col-md-2 centrado" >GINGIVITIS <br> <small> 0 - 1 </small>


									</div>



								</div>


							</div>	

							<div class="col-md-2 centrado cent-texto"> <strong> ENFERMEDAD PERIODONTAL</strong>			

							</div>

							<div class="col-md-2 centrado cent-texto"> <strong>MAL OCLUSIÓN</strong>

							</div>

							<div class="col-md-2 centrado cent-texto"> <strong>FLUOROSIS</strong>

							</div>

						</div>

						<div class="row">

							<div class="col-md-3">

								<div class="row">

									<div class="col-md-2 cent-texto" style="height: 30px;"><label for="pieza-dental-16">16</label></div>
									<div class="col-md-2 cent-texto"> <input onclick="isb_pd16Check()" class="form-check-input" type="checkbox" name="" value="" id="pieza-dental-16"> </div>
									<div class="col-md-2 cent-texto"><label for="pieza-dental-17">17</label></div>
									<div class="col-md-2 cent-texto"> <input onclick="isb_pd17Check()" class="form-check-input" type="checkbox" name="" value="" id="pieza-dental-17"> </div>
									<div class="col-md-2 cent-texto"><label for="pieza-dental-55">55</label></div>
									<div class="col-md-2 cent-texto"> <input onclick="isb_pd55Check()" class="form-check-input" type="checkbox" name="" value="" id="pieza-dental-55"> </div>

								</div>
								<div class="row">
									<div class="col-md-2 cent-texto" style="height: 30px; "><label for="pieza-dental-11">11</label></div>
									<div class="col-md-2 cent-texto"> <input onclick="isb_pd11Check()" class="form-check-input" type="checkbox" name="" value="" id="pieza-dental-11"> </div>
									<div class="col-md-2 cent-texto"><label for="pieza-dental-21">21</label></div>
									<div class="col-md-2 cent-texto"> <input onclick="isb_pd21Check()" class="form-check-input" type="checkbox" name="" value="" id="pieza-dental-21"> </div>
									<div class="col-md-2 cent-texto"><label for="pieza-dental-51">51</label></div>
									<div class="col-md-2 cent-texto"> <input onclick="isb_pd51Check()" class="form-check-input" type="checkbox" name="" value="" id="pieza-dental-51"> </div>
								</div>
								<div class="row">
									<div class="col-md-2 cent-texto" style="height: 30px;  "><label for="pieza-dental-26">26</label></div>
									<div class="col-md-2 cent-texto"> <input onclick="isb_pd26Check()" class="form-check-input" type="checkbox" name="" value="" id="pieza-dental-26"> </div>
									<div class="col-md-2 cent-texto"><label for="pieza-dental-27">27</label></div>
									<div class="col-md-2 cent-texto"> <input onclick="isb_pd27Check()" class="form-check-input" type="checkbox" name="" value="" id="pieza-dental-27"> </div>
									<div class="col-md-2 cent-texto"><label for="pieza-dental-65">65</label></div>
									<div class="col-md-2 cent-texto"> <input onclick="isb_pd65Check()" class="form-check-input" type="checkbox" name="" value="" id="pieza-dental-65"> </div>
								</div>
								<div class="row">
									<div class="col-md-2 cent-texto" style="height: 30px;  "><label for="pieza-dental-36">36</label></div>
									<div class="col-md-2 cent-texto"> <input onclick="isb_pd36Check()" class="form-check-input" type="checkbox" name="" value="" id="pieza-dental-36"> </div>
									<div class="col-md-2 cent-texto"><label for="pieza-dental-37">37</label></div>
									<div class="col-md-2 cent-texto"> <input onclick="isb_pd37Check()" class="form-check-input" type="checkbox" name="" value="" id="pieza-dental-37"> </div>
									<div class="col-md-2 cent-texto"><label for="pieza-dental-75">75</label></div>
									<div class="col-md-2 cent-texto"> <input onclick="isb_pd75Check()" class="form-check-input" type="checkbox" name="" value="" id="pieza-dental-75"> </div>
								</div>
								<div class="row">
									<div class="col-md-2 cent-texto" style="height: 30px;  "><label for="pieza-dental-31">31</label></div>
									<div class="col-md-2 cent-texto"> <input onclick="isb_pd31Check()" class="form-check-input" type="checkbox" name="" value="" id="pieza-dental-31"> </div>
									<div class="col-md-2 cent-texto"><label for="pieza-dental-41">41</label></div>
									<div class="col-md-2 cent-texto"> <input onclick="isb_pd41Check()" class="form-check-input" type="checkbox" name="" value="" id="pieza-dental-41"> </div>
									<div class="col-md-2 cent-texto"><label for="pieza-dental-71">71</label></div>
									<div class="col-md-2 cent-texto"> <input onclick="isb_pd71Check()" class="form-check-input" type="checkbox" name="" value="" id="pieza-dental-71"> </div>
								</div>
								<div class="row">
									<div class="col-md-2 cent-texto" style="height: 30px;"><label for="pieza-dental-46">46</label></div>
									<div class="col-md-2 cent-texto"> <input onclick="isb_pd46Check()" class="form-check-input" type="checkbox" name="" value="" id="pieza-dental-46"> </div>
									<div class="col-md-2 cent-texto"><label for="pieza-dental-47">47</label></div>
									<div class="col-md-2 cent-texto"> <input onclick="isb_pd47Check()" class="form-check-input" type="checkbox" name="" value="" id="pieza-dental-47"> </div>
									<div class="col-md-2 cent-texto"><label for="pieza-dental-85">85</label></div>
									<div class="col-md-2 cent-texto"> <input onclick="isb_pd85Check()" class="form-check-input" type="checkbox" name="" value="" id="pieza-dental-85"> </div>
								</div>

							</div>

							<div class="col-md-3">

								<div class="row">
									
									<div class="col-md-4 cent-texto"> <input type="text" onkeypress="return isNumber(event)" name="placa_01" class="input-sm" style="width: 80%;" value="'.$resultado_hc["placa_01"].'"></div>
									<div class="col-md-4 cent-texto"> <input type="text" onkeypress="return isNumber(event)" name="calculo_01" class="input-sm" style="width: 80%;" value="'.$resultado_hc["calculo_01"].'"></div>
									<div class="col-md-4 cent-texto"> <input type="text" onkeypress="return isNumber(event)" name="gingivitis_01" class="input-sm" style="width: 80%;" value="'.$resultado_hc["gingivitis_01"].'"></div>


								</div>

								<div class="row">
									
									<div class="col-md-4 cent-texto"> <input type="text" onkeypress="return isNumber(event)" name="placa_02" class="input-sm" style="width: 80%;" value="'.$resultado_hc["placa_02"].'"></div>
									<div class="col-md-4 cent-texto"> <input type="text" onkeypress="return isNumber(event)" name="calculo_02" class="input-sm" style="width: 80%;" value="'.$resultado_hc["calculo_02"].'"></div>
									<div class="col-md-4 cent-texto"> <input type="text" onkeypress="return isNumber(event)" name="gingivitis_02" class="input-sm" style="width: 80%;" value="'.$resultado_hc["gingivitis_02"].'"></div>


								</div>

								<div class="row">
									
									<div class="col-md-4 cent-texto"> <input type="text" onkeypress="return isNumber(event)" name="placa_03" class="input-sm" style="width: 80%;" value="'.$resultado_hc["placa_03"].'"></div>
									<div class="col-md-4 cent-texto"> <input type="text" onkeypress="return isNumber(event)" name="calculo_03" class="input-sm" style="width: 80%;" value="'.$resultado_hc["calculo_03"].'"></div>
									<div class="col-md-4 cent-texto"> <input type="text" onkeypress="return isNumber(event)" name="gingivitis_03" class="input-sm" style="width: 80%;" value="'.$resultado_hc["gingivitis_03"].'"></div>


								</div>

								<div class="row">
									
									<div class="col-md-4 cent-texto"> <input type="text" onkeypress="return isNumber(event)" name="placa_04" class="input-sm" style="width: 80%;" value="'.$resultado_hc["placa_04"].'"></div>
									<div class="col-md-4 cent-texto"> <input type="text" onkeypress="return isNumber(event)" name="calculo_04" class="input-sm" style="width: 80%;" value="'.$resultado_hc["calculo_04"].'"></div>
									<div class="col-md-4 cent-texto"> <input type="text" onkeypress="return isNumber(event)" name="gingivitis_04" class="input-sm" style="width: 80%;" value="'.$resultado_hc["gingivitis_04"].'"></div>


								</div>

								<div class="row">
									
									<div class="col-md-4 cent-texto"> <input type="text" onkeypress="return isNumber(event)" id="placa_05" name="placa_05" class="input-sm" style="width: 80%;" value="'.$resultado_hc["placa_05"].'"></div>
									<div class="col-md-4 cent-texto"> <input type="text" onkeypress="return isNumber(event)" name="calculo_05" class="input-sm" style="width: 80%;" value="'.$resultado_hc["calculo_05"].'"></div>
									<div class="col-md-4 cent-texto"> <input type="text" onkeypress="return isNumber(event)" name="gingivitis_05" class="input-sm" style="width: 80%;" value="'.$resultado_hc["gingivitis_05"].'"></div>


								</div>

								<div class="row">
									
									<div class="col-md-4 cent-texto"> <input type="text" onkeypress="return isNumber(event)" id="placa_06" name="placa_06" class="input-sm" style="width: 80%;" value="'.$resultado_hc["placa_06"].'"></div>
									<div class="col-md-4 cent-texto"> <input type="text" onkeypress="return isNumber(event)" name="calculo_06" class="input-sm" style="width: 80%;" value="'.$resultado_hc["calculo_06"].'"></div>
									<div class="col-md-4 cent-texto"> <input type="text" onkeypress="return isNumber(event)" name="gingivitis_06" class="input-sm" style="width: 80%;" value="'.$resultado_hc["gingivitis_06"].'"></div>


								</div>

							</div>


							<div class="col-md-2">

								<div class="row">

									<div class="col-md-9 cent-texto" style="height: 60px">
									<label for="enf-periodontal-leve">LEVE</label></div>
									<div class="col-md-3 cent-texto">

										<input class="form-check-input" type="radio" name="enf-dental" onclick="OnChangeRadio_isb_enf_p_leve (this)" id="enf-periodontal-leve" value="">

									</div>

								</div>

								<div class="row">

									<div class="col-md-9 cent-texto" style="height: 60px">
									<label for="enf-periodontal-moderada">MODERADA</label></div>
									<div class="col-md-3 cent-texto">

										<input class="form-check-input" type="radio" name="enf-dental" onclick="OnChangeRadio_isb_enf_p_moderada (this)" id="enf-periodontal-moderada" value="">

									</div>

								</div>

								<div class="row">

									<div class="col-md-9 cent-texto" style="height: 60px">
									<label for="enf-periodontal-severa">SEVERA</label></div>
									<div class="col-md-3 cent-texto">

										<input class="form-check-input" type="radio" name="enf-dental" onclick="OnChangeRadio_isb_enf_p_severa (this)" id="enf-periodontal-severa" value="">

									</div>

								</div>

							</div>			

							<div class="col-md-2">

								<div class="row">

									<div class="col-md-9 cent-texto" style="height: 60px">
									<label for="mal-oclusion-angleI">ANGLE I</label>

									</div>
									<div class="col-md-3 cent-texto">

										<input class="form-check-input" type="radio" name="mal-oclusion" onclick="OnChangeRadio_isb_mal_o_angleI (this)" id="mal-oclusion-angleI" value="">

									</div>

								</div>

								<div class="row">

									<div class="col-md-9 cent-texto" style="height: 60px">
									<label for="mal-oclusion-angleII">ANGLE II</label></div>
									<div class="col-md-3 cent-texto">

										<input class="form-check-input" type="radio" name="mal-oclusion" onclick="OnChangeRadio_isb_mal_o_angleII (this)" id="mal-oclusion-angleII" value="">

									</div>

								</div>

								<div class="row">

									<div class="col-md-9 cent-texto" style="height: 60px">
									<label for="mal-oclusion-angleIII">ANGLE III</label></div>
									<div class="col-md-3 cent-texto">

										<input class="form-check-input" type="radio" name="mal-oclusion" onclick="OnChangeRadio_isb_mal_o_angleIII (this)" id="mal-oclusion-angleIII" value="">

									</div>

								</div>

							</div>

							<div class="col-md-2">

								<div class="row">

									<div class="col-md-9 cent-texto" style="height: 60px">
									<label for="fluorosis-leve">LEVE</label></div>
									<div class="col-md-3 cent-texto">

										<input class="form-check-input" type="radio" name="fluorosis" onclick="OnChangeRadio_isb_fluorosis_leve (this)" id="fluorosis-leve" value="">

									</div>

								</div>

								<div class="row">

									<div class="col-md-9 cent-texto" style="height: 60px">
									<label for="fluorosis-moderada">MODERADA</label></div>
									<div class="col-md-3 cent-texto">

										<input class="form-check-input" type="radio" name="fluorosis" onclick="OnChangeRadio_isb_fluorosis_moderada (this)" id="fluorosis-moderada" value="">

									</div>

								</div>

								<div class="row">

									<div class="col-md-9 cent-texto" style="height: 60px">
									<label for="fluorosis-severa">SEVERA</label></div>
									<div class="col-md-3 cent-texto">

										<input class="form-check-input" type="radio" name="fluorosis" onclick="OnChangeRadio_isb_fluorosis_severa (this)" id="fluorosis-severa" value="">

									</div>

								</div>

							</div>		

						</div>

						<div class="row">
							 
	';


							$placaTOTAL = $resultado_hc["placa_01"] + $resultado_hc["placa_02"] + $resultado_hc["placa_03"] + $resultado_hc["placa_04"] + $resultado_hc["placa_05"] +$resultado_hc["placa_06"];

							$calculoTOTAL = $resultado_hc["calculo_01"] + $resultado_hc["calculo_02"] + $resultado_hc["calculo_03"] + $resultado_hc["calculo_04"] + $resultado_hc["calculo_05"] +$resultado_hc["calculo_06"];

							$gingivitisTOTAL = $resultado_hc["gingivitis_01"] + $resultado_hc["gingivitis_02"] + $resultado_hc["gingivitis_03"] + $resultado_hc["gingivitis_04"] + $resultado_hc["gingivitis_05"] +$resultado_hc["gingivitis_06"];

		echo'
							
							<div class="col-md-3 cent-texto" style="height: 50px;"> <h5>TOTALES</h5></div>
							<div class="col-md-1 cent-texto"> <input class="input-sm totalbg" type="text" style="width: 80%;" readonly id="placa-total" name="placa_total" value="'.$placaTOTAL.'"> </div>
							<div class="col-md-1 cent-texto"> <input class="input-sm totalbg" type="text" style="width: 80%;" readonly id="calculo-total" name="calculo-total" value="'.$calculoTOTAL.'"> </div>
							<div class="col-md-1 cent-texto"> <input class="input-sm totalbg" type="text" style="width: 80%;" readonly id="gingivitis-total" name="gingivitis-total" value="'.$gingivitisTOTAL.'"> </div>



						</div>
					</div>
		';



	echo'



	<input type="hidden" onkeypress="return isNumber(event)" name="enf_periodontal_leve" id="enf_periodontal_leve">
	<input type="hidden" onkeypress="return isNumber(event)" name="enf_periodontal_moderada" id="enf_periodontal_moderada">
	<input type="hidden" onkeypress="return isNumber(event)" name="enf_periodontal_severa" id="enf_periodontal_severa">

	<input type="hidden" onkeypress="return isNumber(event)" name="mal_oclusion_angleI" id="mal_oclusion_angleI">
	<input type="hidden" onkeypress="return isNumber(event)" name="mal_oclusion_angleII" id="mal_oclusion_angleII">
	<input type="hidden" onkeypress="return isNumber(event)" name="mal_oclusion_angleIII" id="mal_oclusion_angleIII">

	<input type="hidden" onkeypress="return isNumber(event)" name="fluorosis_leve" id="fluorosis_leve">
	<input type="hidden" onkeypress="return isNumber(event)" name="fluorosis_moderada" id="fluorosis_moderada">
	<input type="hidden" onkeypress="return isNumber(event)" name="fluorosis_severa" id="fluorosis_severa">

	
	<!-- 8 ÍNDICES CPO - ceo -->
					<div class="container margenSubTitulo">

						<div class="row ">

							<div class="col-md-5" > <h4>8 ÍNDICES CPO - ceo</h4> </div>

						</div>


						<div class="row">

							<div class="col-md-8">

								<div class="row">

									<div class="col-md-1 cent-texto" style="height: 40px"><h2>D</h2> </div>
									<div class="col-md-3 cent-texto">C</div>
									<div class="col-md-3 cent-texto">P</div>
									<div class="col-md-3 cent-texto">O</div>
									<div class="col-md-2 cent-texto">TOTAL</div>

								</div>

								<div class="row">
									<div class="col-md-1 cent-texto" style="height: 40px"></div>
									
									<div class="col-md-3 cent-texto"><input type="text" onkeypress="return isNumber(event)" name="indices_CPO_C" class="input-sm" style="width: 40%;" value="'.$resultado_hc["indices_CPO_C"].'"></div>
									<div class="col-md-3 cent-texto"><input type="text" onkeypress="return isNumber(event)" name="indices_CPO_P" class="input-sm" style="width: 40%;" value="'.$resultado_hc["indices_CPO_P"].'"></div>
									<div class="col-md-3 cent-texto"><input type="text" onkeypress="return isNumber(event)" name="indices_CPO_O" class="input-sm" style="width: 40%;" value="'.$resultado_hc["indices_CPO_O"].'"></div>
									';

									$total_CPO = $resultado_hc["indices_CPO_C"] + $resultado_hc["indices_CPO_P"] + $resultado_hc["indices_CPO_O"];
									echo'
									<div class="col-md-2 cent-texto"><input type="text" name="" readonly="" class="input-sm totalbg" style="width: 60%" value="'.$total_CPO.'"></div>
																	


								</div>

								<hr style="height:2px;border-width:0;color:gray;background-color:gray">

								<div class="row">

									<div class="col-md-1 cent-texto" style="height: 40px"><h2>d</h2></div>
									<div class="col-md-3 cent-texto">c</div>
									<div class="col-md-3 cent-texto">e</div>
									<div class="col-md-3 cent-texto">o</div>
									<div class="col-md-2 cent-texto">TOTAL</div>

								</div>

								<div class="row">
									<div class="col-md-1 cent-texto in" style="height: 40px"></div>
									
									<div class="col-md-3 cent-texto"><input type="text" onkeypress="return isNumber(event)" name="indices_ceo_c" class="input-sm" style="width: 40%;" value="'.$resultado_hc["indices_ceo_c"].'"></div>
									<div class="col-md-3 cent-texto"><input type="text" onkeypress="return isNumber(event)" name="indices_ceo_e" class="input-sm" style="width: 40%;" value="'.$resultado_hc["indices_ceo_e"].'"></div>
									<div class="col-md-3 cent-texto"><input type="text" onkeypress="return isNumber(event)" name="indices_ceo_o" class="input-sm" style="width: 40%;" value="'.$resultado_hc["indices_ceo_o"].'"></div>
									';
									$total_ceo = $resultado_hc["indices_ceo_c"] + $resultado_hc["indices_ceo_e"] + $resultado_hc["indices_ceo_o"];
									echo'
									<div class="col-md-2 cent-texto"><input type="text" readonly="" name="" class="input-sm totalbg" style="width: 60%" value="'.$total_ceo.'"></div>
																	


								</div>

							</div>



						</div>
					</div>

	';


	echo'

	<br>
	
	<p align="right" style="padding-right: 50px">		<button type="button" class="btn-lg btn-primary" data-toggle="modal" data-target="#GuardarHC">Guardar Cambios</button> </p>



	<!-- Modal -->
		<div class="modal fade" id="GuardarHC" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="ModalLongTitle">GUARDAR CAMBIOS - HISTORIA CLÍNICA</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        ¿Desea guardar los cambios realizados en la historia clínica del paciente '.$resultado_paciente["nombre"].' '.$resultado_paciente["apellido"].'?
		      </div>
		      <div class="modal-footer">
		        	      			
				<button type="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
				
				<button type="button" class="btn btn-danger"  data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>Cancelar</button>
						
		      </div>
		    </div>
		  </div>
		</div>

						<br>

					

				</div>					
			</form>


	';




include "php/php.php";


//include "php/php.php";



echo'

<!-- Script para cambiar el color del DIV con un clic -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="http://localhost/clinica/Vistas/js/linguales-vestibulares.js"></script>

<!-- Script para comprabar el valor de los radio buton -->
<script type="text/javascript" src="http://localhost/clinica/Vistas/js/edad_estimada_rb_check.js"></script>

<script type="text/javascript" src="http://localhost/clinica/Vistas/js/getColor_ves_lin.js"></script>

<script type="text/javascript" src="http://localhost/clinica/Vistas/js/isNumberValidate.js"></script>
';




					if($resultado_hc["menor_1_anio"] == 1)
					{
						echo'
						<script>
						document.getElementById("menor_de_1_anio").setAttribute("checked", ""); 
						document.getElementById("menor_de_1_anio").click();


						</script>';

					}else if ($resultado_hc["1_4_anios"] == 1) {
						echo'
						<script>
						document.getElementById("1_a_4_anios").setAttribute("checked", ""); 
						document.getElementById("1_a_4_anios").click();
						</script>';
					}  

					else if ($resultado_hc["5_9_anios_prog"] == 1) {
						echo'
						<script>
						document.getElementById("5_a_9_anios_programado").setAttribute("checked", ""); 
						document.getElementById("5_a_9_anios_programado").click();
						</script>';
					}

					else if ($resultado_hc["5_14_anios_prog"] == 1) {
						echo'
						<script>
						document.getElementById("5_a_14_anios_programado").setAttribute("checked", "");
						document.getElementById("5_a_14_anios_programado").click();

						</script>';
					}

					else if ($resultado_hc["10_14_anios_prog"] == 1) {
						echo'
						<script>
						document.getElementById("10_a_14_anios_programado").setAttribute("checked", ""); 
						document.getElementById("10_a_14_anios_programado").click();
						</script>';
					}

					
					else if ($resultado_hc["5_a_19_anios"] == 1) {
						echo'
						<script>
						document.getElementById("5_a_19_anios").setAttribute("checked", ""); 
						document.getElementById("5_a_19_anios").click();
						</script>';
					}


					else if ($resultado_hc["mayor_20_anios"] == 1) {
						echo'
						<script>
						document.getElementById("mayor_de_20_anios").setAttribute("checked", ""); 
						document.getElementById("mayor_de_20_anios").click();
						</script>';
					}


					if ($resultado_hc["embarazada"] == 1) { 
						echo'
						<script>
						document.getElementById("embarazada").setAttribute("checked", ""); 
						document.getElementById("EE8").value = "1";
						</script>';
					} else{
						echo'
						<script>
						document.getElementById("EE8").value = "0";
						</script>';
					}


	
					// 3 ANTECEDENTES PERSONALES Y FAMILIARES 


					if ($resultado_hc["alergia_antibiotico"] == 1) {
						echo'
						<script>
						document.getElementById("alergia_antibiotico").setAttribute("checked", "");
						document.getElementById("EPA1").value = "1"; 
						</script>';
					}else{
						echo'
						<script>
						document.getElementById("EPA1").value = "0";
						</script>';
					}



					if ($resultado_hc["alergia_anestesia"] == 1) {
						echo'
						<script>
						document.getElementById("alergia_anestesia").setAttribute("checked", ""); 
						document.getElementById("EPA2").value = "1";
						</script>';
					}else{
						echo'
						<script>
						document.getElementById("EPA2").value = "0";
						</script>';
					}



					if ($resultado_hc["hemorragias"] == 1) {
						echo'
						<script>
						document.getElementById("hemorragias").setAttribute("checked", "");
						document.getElementById("EPA3").value = "1"; 
						</script>';
					}else{
						echo'
						<script>
						document.getElementById("EPA3").value = "0";
						</script>';
					}



					if ($resultado_hc["vih_sida"] == 1) {
						echo'
						<script>
						document.getElementById("vih_sida").setAttribute("checked", "");
						document.getElementById("EPA4").value = "1"; 
						</script>';
					}else{
						echo'
						<script>
						document.getElementById("EPA4").value = "0";
						</script>';
					}



					if ($resultado_hc["tuberculosis"] == 1) {
						echo'
						<script>
						document.getElementById("tuberculosis").setAttribute("checked", "");
						document.getElementById("EPA5").value = "1"; 
						</script>';
					}else{
						echo'
						<script>
						document.getElementById("EPA5").value = "0";
						</script>';
					}



					if ($resultado_hc["asma"] == 1) {
						echo'
						<script>
						document.getElementById("asma").setAttribute("checked", ""); 
						document.getElementById("EPA6").value = "1";
						</script>';
					}else{
						echo'
						<script>
						document.getElementById("EPA6").value = "0";
						</script>';
					}



					if ($resultado_hc["diabetes"] == 1) {
						echo'
						<script>
						document.getElementById("diabetes").setAttribute("checked", "");
						document.getElementById("EPA7").value = "1"; 
						</script>';
					}else{
						echo'
						<script>
						document.getElementById("EPA7").value = "0";
						</script>';
					}



					if ($resultado_hc["hipertension"] == 1) {
						echo'
						<script>
						document.getElementById("hipertension").setAttribute("checked", ""); 
						document.getElementById("EPA8").value = "1";
						</script>';
					}else{
						echo'
						<script>
						document.getElementById("EPA8").value = "0";
						</script>';
					}



					if ($resultado_hc["enf_cardiaca"] == 1) {
						echo'
						<script>
						document.getElementById("enf_cardiaca").setAttribute("checked", ""); 
						document.getElementById("EPA9").value = "1";
						</script>';
					}else{
						echo'
						<script>
						document.getElementById("EPA9").value = "0";
						</script>';
					}



					if ($resultado_hc["otro_antecedentes"] == 1) {
						echo'
						<script>
						document.getElementById("otro_antecedentes").setAttribute("checked", "");
						document.getElementById("EPA10").value = "1"; 
						</script>';
					}else{
						echo'
						<script>
						document.getElementById("EPA10").value = "0";
						</script>';
					}








					// 5 EXAMEN DEL SISTEMA ESTOMATOGNÁTICO 

					if ($resultado_hc["labios"] == 1) {
						echo'
						<script>
						document.getElementById("labios").setAttribute("checked", "");
						document.getElementById("ESE1").value = "1";  
						</script>';
					}else{
						echo'
						<script>
						document.getElementById("ESE1").value = "0";
						</script>';
					}



					if ($resultado_hc["mejillas"] == 1) {
						echo'
						<script>
						document.getElementById("mejillas").setAttribute("checked", "");
						document.getElementById("ESE2").value = "1";  
						</script>';
					}else{
						echo'
						<script>
						document.getElementById("ESE2").value = "0";
						</script>';
					}



					if ($resultado_hc["maxilar_superior"] == 1) {
						echo'
						<script>
						document.getElementById("maxilar_superior").setAttribute("checked", "");
						document.getElementById("ESE3").value = "1";  
						</script>';
					}else{
						echo'
						<script>
						document.getElementById("ESE3").value = "0";
						</script>';
					}



					if ($resultado_hc["maxilar_inferior"] == 1) {
						echo'
						<script>
						document.getElementById("maxilar_inferior").setAttribute("checked", "");
						document.getElementById("ESE4").value = "1";  
						</script>';
					}else{
						echo'
						<script>
						document.getElementById("ESE4").value = "0";
						</script>';
					}



					if ($resultado_hc["lengua"] == 1) {
						echo'
						<script>
						document.getElementById("lengua").setAttribute("checked", "");
						document.getElementById("ESE5").value = "1";  
						</script>';
					}else{
						echo'
						<script>
						document.getElementById("ESE5").value = "0";
						</script>';
					}



					if ($resultado_hc["paladar"] == 1) {
						echo'
						<script>
						document.getElementById("paladar").setAttribute("checked", "");
						document.getElementById("ESE6").value = "1";  
						</script>';
					}else{
						echo'
						<script>
						document.getElementById("ESE6").value = "0";
						</script>';
					}



					if ($resultado_hc["piso"] == 1) {
						echo'
						<script>
						document.getElementById("piso").setAttribute("checked", "");
						document.getElementById("ESE7").value = "1";  
						</script>';
					}else{
						echo'
						<script>
						document.getElementById("ESE7").value = "0";
						</script>';
					}



					if ($resultado_hc["carrillos"] == 1) {
						echo'
						<script>
						document.getElementById("carrillos").setAttribute("checked", "");
						document.getElementById("ESE8").value = "1";  
						</script>';
					}else{
						echo'
						<script>
						document.getElementById("ESE8").value = "0";
						</script>';
					}



					if ($resultado_hc["gandulas_salivales"] == 1) {
						echo'
						<script>
						document.getElementById("gandulas_salivales").setAttribute("checked", "");
						document.getElementById("ESE9").value = "1";  
						</script>';
					}else{
						echo'
						<script>
						document.getElementById("ESE9").value = "0";
						</script>';
					}



					if ($resultado_hc["oro_faringe"] == 1) {
						echo'
						<script>
						document.getElementById("oro_faringe").setAttribute("checked", "");
						document.getElementById("ESE10").value = "1";  
						</script>';
					}else{
						echo'
						<script>
						document.getElementById("ESE10").value = "0";
						</script>';
					}



					if ($resultado_hc["atm"] == 1) {
						echo'
						<script>
						document.getElementById("atm").setAttribute("checked", "");
						document.getElementById("ESE11").value = "1";  
						</script>';
					}else{
						echo'
						<script>
						document.getElementById("ESE11").value = "0";
						</script>';
					}



					if ($resultado_hc["ganglios"] == 1) {
						echo'
						<script>
						document.getElementById("ganglios").setAttribute("checked", "");
						document.getElementById("ESE12").value = "1";  
						</script>';
					}else{
						echo'
						<script>
						document.getElementById("ESE12").value = "0";
						</script>';
					}


			}
	




	}


	public function ActualizarHistoriaClinicaC(){

		if(isset($_POST["id_paciente"])){

			

		$tablaBD = "historiaclinicatest";
		
		

		$datosDatosPersonales = array("id" => $_POST["id_paciente"], "establecimiento" => $_POST["hc-establecimiento"], "sexo" => $_POST["hc-sexo"], "edad" => $_POST["hc-edad"], "numero" => $_POST["hc-numero"]);

		$datosEdadEstimada = array("EE1" => $_POST["EE1"], "EE2" => $_POST["EE2"], "EE3" => $_POST["EE3"], "EE4" => $_POST["EE4"],	"EE5" => $_POST["EE5"], "EE6" => $_POST["EE6"], "EE7" => $_POST["EE7"], "EE8" => $_POST["EE8"]);

		$datosMotivoConsulta = array("hc-motivoConsulta" => $_POST["hc-motivoConsulta"]);

		$datosEnfermedadActual = array("hc-enfermedad_problema_actual" => $_POST["hc-enfermedad_problema_actual"]);

		$datosAntecedentes = array("EPA1" => $_POST["EPA1"], "EPA2" => $_POST["EPA2"], "EPA3" => $_POST["EPA3"], "EPA4" => $_POST["EPA4"], "EPA5" => $_POST["EPA5"], "EPA6" => $_POST["EPA6"], "EPA7" => $_POST["EPA7"], "EPA8" => $_POST["EPA8"], "EPA9" => $_POST["EPA9"], "EPA10" => $_POST["EPA10"], "hc_epa_descripcion" => $_POST["hc-epa-descripcion"]);

		$datosSignosVitales = array("presion_arterial" => $_POST["presion_arterial"], "frecuencia_cardiaca" => $_POST["frecuencia_cardiaca"], "temperatura" => $_POST["temperatura"], "f_respiratoria" => $_POST["f_respiratoria"], "observaciones_signos_vitales" => $_POST["observaciones_signos_vitales"]);

		$datosExamenEstomatognatico = array("ESE1" => $_POST["ESE1"], "ESE2" => $_POST["ESE2"], "ESE3" => $_POST["ESE3"], "ESE4" => $_POST["ESE4"], "ESE5" => $_POST["ESE5"], "ESE6" => $_POST["ESE6"], "ESE7" => $_POST["ESE7"], "ESE8" => $_POST["ESE8"], "ESE9" => $_POST["ESE9"], "ESE10" => $_POST["ESE10"], "ESE11" => $_POST["ESE11"], "ESE12" => $_POST["ESE12"], "especificaciones_estomatognatico"  => $_POST["especificaciones_estomatognatico"]);

		$datosOdontograma = array("observaciones_odontograma" => $_POST["hc-obs-odontograma"] ,  "recesion_1_01" => $_POST["recesion_1_01"], "recesion_1_02" => $_POST["recesion_1_02"], "recesion_1_03" => $_POST["recesion_1_03"], "recesion_1_04" => $_POST["recesion_1_04"], "recesion_1_05" => $_POST["recesion_1_05"], "recesion_1_06" => $_POST["recesion_1_06"], "recesion_1_07" => $_POST["recesion_1_07"], "recesion_1_08" => $_POST["recesion_1_08"], "recesion_1_09" => $_POST["recesion_1_09"], "recesion_1_10" => $_POST["recesion_1_10"], "recesion_1_11" => $_POST["recesion_1_11"], "recesion_1_12" => $_POST["recesion_1_12"], "recesion_1_13" => $_POST["recesion_1_13"], "recesion_1_14" => $_POST["recesion_1_14"], "recesion_1_15" => $_POST["recesion_1_15"], "recesion_1_16" => $_POST["recesion_1_16"], "recesion_2_01" => $_POST["recesion_2_01"], "recesion_2_02" => $_POST["recesion_2_02"], "recesion_2_03" => $_POST["recesion_2_03"], "recesion_2_04" => $_POST["recesion_2_04"], "recesion_2_05" => $_POST["recesion_2_05"], "recesion_2_06" => $_POST["recesion_2_06"], "recesion_2_07" => $_POST["recesion_2_07"], "recesion_2_08" => $_POST["recesion_2_08"], "recesion_2_09" => $_POST["recesion_2_09"], "recesion_2_10" => $_POST["recesion_2_10"], "recesion_2_11" => $_POST["recesion_2_11"], "recesion_2_12" => $_POST["recesion_2_12"], "recesion_2_13" => $_POST["recesion_2_13"], "recesion_2_14" => $_POST["recesion_2_14"], "recesion_2_15" => $_POST["recesion_2_15"], "recesion_2_16" => $_POST["recesion_2_16"], "movilidad_1_01" => $_POST["movilidad_1_01"], "movilidad_1_02" => $_POST["movilidad_1_02"], "movilidad_1_03" => $_POST["movilidad_1_03"], "movilidad_1_04" => $_POST["movilidad_1_04"], "movilidad_1_05" => $_POST["movilidad_1_05"], "movilidad_1_06" => $_POST["movilidad_1_06"], "movilidad_1_07" => $_POST["movilidad_1_07"], "movilidad_1_08" => $_POST["movilidad_1_08"], "movilidad_1_09" => $_POST["movilidad_1_09"], "movilidad_1_10" => $_POST["movilidad_1_10"], "movilidad_1_11" => $_POST["movilidad_1_11"], "movilidad_1_12" => $_POST["movilidad_1_12"], "movilidad_1_13" => $_POST["movilidad_1_13"], "movilidad_1_14" => $_POST["movilidad_1_14"], "movilidad_1_15" => $_POST["movilidad_1_15"], "movilidad_1_16" => $_POST["movilidad_1_16"], "movilidad_2_01" => $_POST["movilidad_2_01"], "movilidad_2_02" => $_POST["movilidad_2_02"], "movilidad_2_03" => $_POST["movilidad_2_03"], "movilidad_2_04" => $_POST["movilidad_2_04"], "movilidad_2_05" => $_POST["movilidad_2_05"], "movilidad_2_06" => $_POST["movilidad_2_06"], "movilidad_2_07" => $_POST["movilidad_2_07"], "movilidad_2_08" => $_POST["movilidad_2_08"], "movilidad_2_09" => $_POST["movilidad_2_09"], "movilidad_2_10" => $_POST["movilidad_2_10"], "movilidad_2_11" => $_POST["movilidad_2_11"], "movilidad_2_12" => $_POST["movilidad_2_12"], "movilidad_2_13" => $_POST["movilidad_2_13"], "movilidad_2_14" => $_POST["movilidad_2_14"], "movilidad_2_15" => $_POST["movilidad_2_15"], "movilidad_2_16" => $_POST["movilidad_2_16"], "hc_v_sup_18" => $_POST["hc_v_sup_18"], "hc_v_der_18" => $_POST["hc_v_der_18"], "hc_v_inf_18" => $_POST["hc_v_inf_18"], "hc_v_izq_18" => $_POST["hc_v_izq_18"], "hc_v_cen_18" => $_POST["hc_v_cen_18"],  "hc_v_sup_17" => $_POST["hc_v_sup_17"], "hc_v_der_17" => $_POST["hc_v_der_17"], "hc_v_inf_17" => $_POST["hc_v_inf_17"], "hc_v_izq_17" => $_POST["hc_v_izq_17"], "hc_v_cen_17" => $_POST["hc_v_cen_17"], "hc_v_sup_16" => $_POST["hc_v_sup_16"], "hc_v_der_16" => $_POST["hc_v_der_16"], "hc_v_inf_16" => $_POST["hc_v_inf_16"], "hc_v_izq_16" => $_POST["hc_v_izq_16"], "hc_v_cen_16" => $_POST["hc_v_cen_16"], "hc_v_sup_15" => $_POST["hc_v_sup_15"], "hc_v_der_15" => $_POST["hc_v_der_15"], "hc_v_inf_15" => $_POST["hc_v_inf_15"], "hc_v_izq_15" => $_POST["hc_v_izq_15"], "hc_v_cen_15" => $_POST["hc_v_cen_15"], "hc_v_sup_14" => $_POST["hc_v_sup_14"], "hc_v_der_14" => $_POST["hc_v_der_14"], "hc_v_inf_14" => $_POST["hc_v_inf_14"], "hc_v_izq_14" => $_POST["hc_v_izq_14"], "hc_v_cen_14" => $_POST["hc_v_cen_14"], "hc_v_sup_13" => $_POST["hc_v_sup_13"], "hc_v_der_13" => $_POST["hc_v_der_13"], "hc_v_inf_13" => $_POST["hc_v_inf_13"], "hc_v_izq_13" => $_POST["hc_v_izq_13"], "hc_v_cen_13" => $_POST["hc_v_cen_13"], "hc_v_sup_12" => $_POST["hc_v_sup_12"], "hc_v_der_12" => $_POST["hc_v_der_12"], "hc_v_inf_12" => $_POST["hc_v_inf_12"], "hc_v_izq_12" => $_POST["hc_v_izq_12"], "hc_v_cen_12" => $_POST["hc_v_cen_12"], "hc_v_sup_11" => $_POST["hc_v_sup_11"], "hc_v_der_11" => $_POST["hc_v_der_11"], "hc_v_inf_11" => $_POST["hc_v_inf_11"], "hc_v_izq_11" => $_POST["hc_v_izq_11"], "hc_v_cen_11" => $_POST["hc_v_cen_11"], "hc_v_sup_21" => $_POST["hc_v_sup_21"], "hc_v_der_21" => $_POST["hc_v_der_21"], "hc_v_inf_21" => $_POST["hc_v_inf_21"], "hc_v_izq_21" => $_POST["hc_v_izq_21"], "hc_v_cen_21" => $_POST["hc_v_cen_21"], "hc_v_sup_22" => $_POST["hc_v_sup_22"], "hc_v_der_22" => $_POST["hc_v_der_22"], "hc_v_inf_22" => $_POST["hc_v_inf_22"], "hc_v_izq_22" => $_POST["hc_v_izq_22"], "hc_v_cen_22" => $_POST["hc_v_cen_22"], "hc_v_sup_23" => $_POST["hc_v_sup_23"], "hc_v_der_23" => $_POST["hc_v_der_23"], "hc_v_inf_23" => $_POST["hc_v_inf_23"], "hc_v_izq_23" => $_POST["hc_v_izq_23"], "hc_v_cen_23" => $_POST["hc_v_cen_23"], "hc_v_sup_24" => $_POST["hc_v_sup_24"], "hc_v_der_24" => $_POST["hc_v_der_24"], "hc_v_inf_24" => $_POST["hc_v_inf_24"], "hc_v_izq_24" => $_POST["hc_v_izq_24"], "hc_v_cen_24" => $_POST["hc_v_cen_24"], "hc_v_sup_25" => $_POST["hc_v_sup_25"], "hc_v_der_25" => $_POST["hc_v_der_25"], "hc_v_inf_25" => $_POST["hc_v_inf_25"], "hc_v_izq_25" => $_POST["hc_v_izq_25"], "hc_v_cen_25" => $_POST["hc_v_cen_25"], "hc_v_sup_26" => $_POST["hc_v_sup_26"], "hc_v_der_26" => $_POST["hc_v_der_26"], "hc_v_inf_26" => $_POST["hc_v_inf_26"], "hc_v_izq_26" => $_POST["hc_v_izq_26"], "hc_v_cen_26" => $_POST["hc_v_cen_26"], "hc_v_sup_27" => $_POST["hc_v_sup_27"], "hc_v_der_27" => $_POST["hc_v_der_27"], "hc_v_inf_27" => $_POST["hc_v_inf_27"], "hc_v_izq_27" => $_POST["hc_v_izq_27"], "hc_v_cen_27" => $_POST["hc_v_cen_27"], "hc_v_sup_28" => $_POST["hc_v_sup_28"], "hc_v_der_28" => $_POST["hc_v_der_28"], "hc_v_inf_28" => $_POST["hc_v_inf_28"], "hc_v_izq_28" => $_POST["hc_v_izq_28"], "hc_v_cen_28" => $_POST["hc_v_cen_28"], "hc_v_sup_48" => $_POST["hc_v_sup_48"], "hc_v_der_48" => $_POST["hc_v_der_48"], "hc_v_inf_48" => $_POST["hc_v_inf_48"], "hc_v_izq_48" => $_POST["hc_v_izq_48"], "hc_v_cen_48" => $_POST["hc_v_cen_48"], "hc_v_sup_47" => $_POST["hc_v_sup_47"], "hc_v_der_47" => $_POST["hc_v_der_47"], "hc_v_inf_47" => $_POST["hc_v_inf_47"], "hc_v_izq_47" => $_POST["hc_v_izq_47"], "hc_v_cen_47" => $_POST["hc_v_cen_47"], "hc_v_sup_46" => $_POST["hc_v_sup_46"], "hc_v_der_46" => $_POST["hc_v_der_46"], "hc_v_inf_46" => $_POST["hc_v_inf_46"], "hc_v_izq_46" => $_POST["hc_v_izq_46"], "hc_v_cen_46" => $_POST["hc_v_cen_46"], "hc_v_sup_45" => $_POST["hc_v_sup_45"], "hc_v_der_45" => $_POST["hc_v_der_45"], "hc_v_inf_45" => $_POST["hc_v_inf_45"], "hc_v_izq_45" => $_POST["hc_v_izq_45"], "hc_v_cen_45" => $_POST["hc_v_cen_45"], "hc_v_sup_44" => $_POST["hc_v_sup_44"], "hc_v_der_44" => $_POST["hc_v_der_44"], "hc_v_inf_44" => $_POST["hc_v_inf_44"], "hc_v_izq_44" => $_POST["hc_v_izq_44"], "hc_v_cen_44" => $_POST["hc_v_cen_44"], "hc_v_sup_43" => $_POST["hc_v_sup_43"], "hc_v_der_43" => $_POST["hc_v_der_43"], "hc_v_inf_43" => $_POST["hc_v_inf_43"], "hc_v_izq_43" => $_POST["hc_v_izq_43"], "hc_v_cen_43" => $_POST["hc_v_cen_43"], "hc_v_sup_42" => $_POST["hc_v_sup_42"], "hc_v_der_42" => $_POST["hc_v_der_42"], "hc_v_inf_42" => $_POST["hc_v_inf_42"], "hc_v_izq_42" => $_POST["hc_v_izq_42"], "hc_v_cen_42" => $_POST["hc_v_cen_42"], "hc_v_sup_41" => $_POST["hc_v_sup_41"], "hc_v_der_41" => $_POST["hc_v_der_41"], "hc_v_inf_41" => $_POST["hc_v_inf_41"], "hc_v_izq_41" => $_POST["hc_v_izq_41"], "hc_v_cen_41" => $_POST["hc_v_cen_41"], "hc_v_sup_31" => $_POST["hc_v_sup_31"], "hc_v_der_31" => $_POST["hc_v_der_31"], "hc_v_inf_31" => $_POST["hc_v_inf_31"], "hc_v_izq_31" => $_POST["hc_v_izq_31"], "hc_v_cen_31" => $_POST["hc_v_cen_31"], "hc_v_sup_32" => $_POST["hc_v_sup_32"], "hc_v_der_32" => $_POST["hc_v_der_32"], "hc_v_inf_32" => $_POST["hc_v_inf_32"], "hc_v_izq_32" => $_POST["hc_v_izq_32"], "hc_v_cen_32" => $_POST["hc_v_cen_32"], "hc_v_sup_33" => $_POST["hc_v_sup_33"], "hc_v_der_33" => $_POST["hc_v_der_33"], "hc_v_inf_33" => $_POST["hc_v_inf_33"], "hc_v_izq_33" => $_POST["hc_v_izq_33"], "hc_v_cen_33" => $_POST["hc_v_cen_33"], "hc_v_sup_34" => $_POST["hc_v_sup_34"], "hc_v_der_34" => $_POST["hc_v_der_34"], "hc_v_inf_34" => $_POST["hc_v_inf_34"], "hc_v_izq_34" => $_POST["hc_v_izq_34"], "hc_v_cen_34" => $_POST["hc_v_cen_34"], "hc_v_sup_35" => $_POST["hc_v_sup_35"], "hc_v_der_35" => $_POST["hc_v_der_35"], "hc_v_inf_35" => $_POST["hc_v_inf_35"], "hc_v_izq_35" => $_POST["hc_v_izq_35"], "hc_v_cen_35" => $_POST["hc_v_cen_35"], "hc_v_sup_36" => $_POST["hc_v_sup_36"], "hc_v_der_36" => $_POST["hc_v_der_36"], "hc_v_inf_36" => $_POST["hc_v_inf_36"], "hc_v_izq_36" => $_POST["hc_v_izq_36"], "hc_v_cen_36" => $_POST["hc_v_cen_36"], "hc_v_sup_37" => $_POST["hc_v_sup_37"], "hc_v_der_37" => $_POST["hc_v_der_37"], "hc_v_inf_37" => $_POST["hc_v_inf_37"], "hc_v_izq_37" => $_POST["hc_v_izq_37"], "hc_v_cen_37" => $_POST["hc_v_cen_37"], "hc_v_sup_38" => $_POST["hc_v_sup_38"], "hc_v_der_38" => $_POST["hc_v_der_38"], "hc_v_inf_38" => $_POST["hc_v_inf_38"], "hc_v_izq_38" => $_POST["hc_v_izq_38"], "hc_v_cen_38" => $_POST["hc_v_cen_38"], "hc_l_sup_55" => $_POST["hc_l_sup_55"], "hc_l_der_55" => $_POST["hc_l_der_55"], "hc_l_inf_55" => $_POST["hc_l_inf_55"], "hc_l_izq_55" => $_POST["hc_l_izq_55"], "hc_l_cen_55" => $_POST["hc_l_cen_55"], "hc_l_sup_54" => $_POST["hc_l_sup_54"], "hc_l_der_54" => $_POST["hc_l_der_54"], "hc_l_inf_54" => $_POST["hc_l_inf_54"], "hc_l_izq_54" => $_POST["hc_l_izq_54"], "hc_l_cen_54" => $_POST["hc_l_cen_54"], "hc_l_sup_53" => $_POST["hc_l_sup_53"], "hc_l_der_53" => $_POST["hc_l_der_53"], "hc_l_inf_53" => $_POST["hc_l_inf_53"], "hc_l_izq_53" => $_POST["hc_l_izq_53"], "hc_l_cen_53" => $_POST["hc_l_cen_53"], "hc_l_sup_52" => $_POST["hc_l_sup_52"], "hc_l_der_52" => $_POST["hc_l_der_52"], "hc_l_inf_52" => $_POST["hc_l_inf_52"], "hc_l_izq_52" => $_POST["hc_l_izq_52"], "hc_l_cen_52" => $_POST["hc_l_cen_52"], "hc_l_sup_51" => $_POST["hc_l_sup_51"], "hc_l_der_51" => $_POST["hc_l_der_51"], "hc_l_inf_51" => $_POST["hc_l_inf_51"], "hc_l_izq_51" => $_POST["hc_l_izq_51"], "hc_l_cen_51" => $_POST["hc_l_cen_51"], "hc_l_sup_61" => $_POST["hc_l_sup_61"], "hc_l_der_61" => $_POST["hc_l_der_61"], "hc_l_inf_61" => $_POST["hc_l_inf_61"], "hc_l_izq_61" => $_POST["hc_l_izq_61"], "hc_l_cen_61" => $_POST["hc_l_cen_61"], "hc_l_sup_62" => $_POST["hc_l_sup_62"], "hc_l_der_62" => $_POST["hc_l_der_62"], "hc_l_inf_62" => $_POST["hc_l_inf_62"], "hc_l_izq_62" => $_POST["hc_l_izq_62"], "hc_l_cen_62" => $_POST["hc_l_cen_62"], "hc_l_sup_63" => $_POST["hc_l_sup_63"], "hc_l_der_63" => $_POST["hc_l_der_63"], "hc_l_inf_63" => $_POST["hc_l_inf_63"], "hc_l_izq_63" => $_POST["hc_l_izq_63"], "hc_l_cen_63" => $_POST["hc_l_cen_63"], "hc_l_sup_64" => $_POST["hc_l_sup_64"], "hc_l_der_64" => $_POST["hc_l_der_64"], "hc_l_inf_64" => $_POST["hc_l_inf_64"], "hc_l_izq_64" => $_POST["hc_l_izq_64"], "hc_l_cen_64" => $_POST["hc_l_cen_64"], "hc_l_sup_65" => $_POST["hc_l_sup_65"], "hc_l_der_65" => $_POST["hc_l_der_65"], "hc_l_inf_65" => $_POST["hc_l_inf_65"], "hc_l_izq_65" => $_POST["hc_l_izq_65"], "hc_l_cen_65" => $_POST["hc_l_cen_65"], "hc_l_sup_85" => $_POST["hc_l_sup_85"], "hc_l_der_85" => $_POST["hc_l_der_85"], "hc_l_inf_85" => $_POST["hc_l_inf_85"], "hc_l_izq_85" => $_POST["hc_l_izq_85"], "hc_l_cen_85" => $_POST["hc_l_cen_85"], "hc_l_sup_84" => $_POST["hc_l_sup_84"], "hc_l_der_84" => $_POST["hc_l_der_84"], "hc_l_inf_84" => $_POST["hc_l_inf_84"], "hc_l_izq_84" => $_POST["hc_l_izq_84"], "hc_l_cen_84" => $_POST["hc_l_cen_84"], "hc_l_sup_83" => $_POST["hc_l_sup_83"], "hc_l_der_83" => $_POST["hc_l_der_83"], "hc_l_inf_83" => $_POST["hc_l_inf_83"], "hc_l_izq_83" => $_POST["hc_l_izq_83"], "hc_l_cen_83" => $_POST["hc_l_cen_83"], "hc_l_sup_82" => $_POST["hc_l_sup_82"], "hc_l_der_82" => $_POST["hc_l_der_82"], "hc_l_inf_82" => $_POST["hc_l_inf_82"], "hc_l_izq_82" => $_POST["hc_l_izq_82"], "hc_l_cen_82" => $_POST["hc_l_cen_82"], "hc_l_sup_81" => $_POST["hc_l_sup_81"], "hc_l_der_81" => $_POST["hc_l_der_81"], "hc_l_inf_81" => $_POST["hc_l_inf_81"], "hc_l_izq_81" => $_POST["hc_l_izq_81"], "hc_l_cen_81" => $_POST["hc_l_cen_81"], "hc_l_sup_71" => $_POST["hc_l_sup_71"], "hc_l_der_71" => $_POST["hc_l_der_71"], "hc_l_inf_71" => $_POST["hc_l_inf_71"], "hc_l_izq_71" => $_POST["hc_l_izq_71"], "hc_l_cen_71" => $_POST["hc_l_cen_71"], "hc_l_sup_72" => $_POST["hc_l_sup_72"], "hc_l_der_72" => $_POST["hc_l_der_72"], "hc_l_inf_72" => $_POST["hc_l_inf_72"], "hc_l_izq_72" => $_POST["hc_l_izq_72"], "hc_l_cen_72" => $_POST["hc_l_cen_72"], "hc_l_sup_73" => $_POST["hc_l_sup_73"], "hc_l_der_73" => $_POST["hc_l_der_73"], "hc_l_inf_73" => $_POST["hc_l_inf_73"], "hc_l_izq_73" => $_POST["hc_l_izq_73"], "hc_l_cen_73" => $_POST["hc_l_cen_73"], "hc_l_sup_74" => $_POST["hc_l_sup_74"], "hc_l_der_74" => $_POST["hc_l_der_74"], "hc_l_inf_74" => $_POST["hc_l_inf_74"], "hc_l_izq_74" => $_POST["hc_l_izq_74"], "hc_l_cen_74" => $_POST["hc_l_cen_74"], "hc_l_sup_75" => $_POST["hc_l_sup_75"], "hc_l_der_75" => $_POST["hc_l_der_75"], "hc_l_inf_75" => $_POST["hc_l_inf_75"], "hc_l_izq_75" => $_POST["hc_l_izq_75"], "hc_l_cen_75" => $_POST["hc_l_cen_75"]);

		$datosIndicadoresSaludBucal = array("isb_pd16" => $_POST["isb_pd16"], "isb_pd17" => $_POST["isb_pd17"], "isb_pd55" => $_POST["isb_pd55"], "isb_pd11" => $_POST["isb_pd11"], "isb_pd21" => $_POST["isb_pd21"], "isb_pd51" => $_POST["isb_pd51"], "isb_pd26" => $_POST["isb_pd26"], "isb_pd27" => $_POST["isb_pd27"], "isb_pd65" => $_POST["isb_pd65"], "isb_pd36" => $_POST["isb_pd36"], "isb_pd37" => $_POST["isb_pd37"], "isb_pd75" => $_POST["isb_pd75"], "isb_pd31" => $_POST["isb_pd31"], "isb_pd41" => $_POST["isb_pd41"], "isb_pd71" => $_POST["isb_pd71"], "isb_pd46" => $_POST["isb_pd46"], "isb_pd47" => $_POST["isb_pd47"], "isb_pd85" => $_POST["isb_pd85"], "placa_01" => $_POST["placa_01"], "calculo_01" => $_POST["calculo_01"], "gingivitis_01" => $_POST["gingivitis_01"], "placa_02" => $_POST["placa_02"], "calculo_02" => $_POST["calculo_02"], "gingivitis_02" => $_POST["gingivitis_02"], "placa_03" => $_POST["placa_03"], "calculo_03" => $_POST["calculo_03"], "gingivitis_03" => $_POST["gingivitis_03"], "placa_04" => $_POST["placa_04"], "calculo_04" => $_POST["calculo_04"], "gingivitis_04" => $_POST["gingivitis_04"], "placa_05" => $_POST["placa_05"], "calculo_05" => $_POST["calculo_05"], "gingivitis_05" => $_POST["gingivitis_05"], "placa_06" => $_POST["placa_06"], "calculo_06" => $_POST["calculo_06"], "gingivitis_06" => $_POST["gingivitis_06"], "enf_periodontal_leve" => $_POST["enf_periodontal_leve"], "enf_periodontal_moderada" => $_POST["enf_periodontal_moderada"], "enf_periodontal_severa" => $_POST["enf_periodontal_severa"], "mal_oclusion_angleI" => $_POST["mal_oclusion_angleI"], "mal_oclusion_angleII" => $_POST["mal_oclusion_angleII"], "mal_oclusion_angleIII" => $_POST["mal_oclusion_angleIII"], "fluorosis_leve" => $_POST["fluorosis_leve"], "fluorosis_moderada" => $_POST["fluorosis_moderada"], "fluorosis_severa" => $_POST["fluorosis_severa"]);

		$datosIndices = array("indices_CPO_C" => $_POST["indices_CPO_C"], "indices_CPO_P" => $_POST["indices_CPO_P"], "indices_CPO_O" => $_POST["indices_CPO_O"], "indices_ceo_c" => $_POST["indices_ceo_c"], "indices_ceo_e" => $_POST["indices_ceo_e"], "indices_ceo_o" => $_POST["indices_ceo_o"]);


		$datosC = array_merge($datosDatosPersonales,$datosEdadEstimada,$datosMotivoConsulta,$datosEnfermedadActual,$datosAntecedentes,$datosSignosVitales,$datosExamenEstomatognatico,    $datosOdontograma, $datosIndicadoresSaludBucal, $datosIndices);
	

		$resultado = HistoriaClinicaM::ActualizarHistoriaClinicaM($tablaBD, $datosC);

		if($resultado == true){

			echo '<script>
			window.location = "http://localhost/clinica/historiaClinica/'.$_POST["id_paciente"].'";
			</script>';

		}



	}



	}



}




?>
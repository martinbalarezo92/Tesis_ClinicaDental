<?php

if($_SESSION["id"] != substr($_GET["url"], 6)){

	echo'<script>

	window.location = "inicio"
	</script>';


	return;

}

?>


<style type="text/css">
  
  #calendar .fc-agenda-axis, #calendar .fc-widget-header{
  background-color: #D6EEFF;
  border-color: #AED0EA;
  font-weight: normal;
  padding: 3px;
  border-radius: 3px;
  
} 

	.fc-widget-content{
		  cursor: pointer;
	}


	.fc-today {
    background: #D6EEFF !important;

} 


	.fc-addEventButton-button {
		background-color: green;
		color: green;
	}

</style>	

<div class="content-wrapper">
	

	


	<script type="text/javascript">
		

	function fechayhoraOC() {

	  var fecha = document.getElementById("fechaC").value;

	  var hora_i = document.getElementById("horaC").value;

	   h1 = hora_i.split(":");

	   h1 = parseFloat(h1[0]);

	   hora_f = h1+1;


	  $('.hinicio').val(fecha + ' ' +  hora_i );
	  $('.hfin').val(fecha + ' ' +  hora_f+':00' );
	  $('#horaCF').val(h1+1+":00")



	}

	function fechayhoraFINOC() {

	  var fecha = document.getElementById("fechaC").value;
	  var hora_i = document.getElementById("horaC").value;
	  var hora_f = document.getElementById("horaCF").value;

	  $('.hfin').val(fecha + ' ' +  hora_f )

	}

	function validarFecha(){
		var fecha = document.getElementById("fechaC").value;
		var hora_i = document.getElementById("horaC").value;
	  	var hora_f = document.getElementById("horaCF").value;

  		   h1 = hora_i.split(":");
		   h1 = parseFloat(h1[0]);

		   h2 = hora_f.split(":");
		   h2 = parseFloat(h2[0]);

		   hora_mas_uno = h1+1;

	   	  if (h1>=h2)
	   	  	{
	   	  		alert("La hora final no puede ser inferior a la hora inicial");

	   	  		if (hora_mas_uno >= 10) {$("#horaCF").val(hora_mas_uno+":00");}

	   	  		if (hora_mas_uno < 10) {$("#horaCF").val("0"+hora_mas_uno+":00");}
	   	  		
	   	  		$('.hfin').val(fecha + ' ' +  hora_mas_uno + ":00");
	   		}

	}


	</script>







	<section class="content-header">
		
		

        

		<?php
/*
		$columna = "id";
		$valor = substr($_GET["url"], 6);

		$resultado = DoctoresC::DoctorC($columna, $valor);

		if ($resultado["sexo"] == "Femenino") {
			
			echo'<h1>Doctora: '.$resultado["apellido"].' '.$resultado["nombre"].'</h1>';

		}else{

			echo'<h1>Doctor: '.$resultado["apellido"].' '.$resultado["nombre"].'</h1>';

		}

		$columna = "id";
		$valor = $resultado["id_consultorio"];

		$consultorio = ConsultoriosC::VerConsultoriosC($columna, $valor);

		echo'

		<br>
		<h1>Consultorio de '.$consultorio["nombre"].'</h1>

		';
*/
		?>

<?php 


      if ($_SESSION["sexo"]=="Masculino") {
        echo'<h1>Dr. '.$_SESSION["nombre"].' '.$_SESSION["apellido"].'</h1>';
      }

      else {
        echo'<h1>Dra. '.$_SESSION["nombre"].' '.$_SESSION["apellido"].'</h1>';
      }

      

    


      $id_doctor = $_SESSION["id"];

      $id_consultorio = $_SESSION["id_consultorio"];

       ?>
		

	</section>

	<section class="content">
		
		<div class="box">
			
			

			<div class="box-body">
				
				<div id="calendar" class=""></div>

			</div>

		</div>

	</section>

</div>





<div class="modal fade" rol="dialog" id="CitaModal">
	
	<div class="modal-dialog">
		
		<div class="modal-content">
			
			<form method="post">
				
				<div class="modal-body">
					
					<div class="box-body">



               
             

						<?php

						$columna = "id";
						$valor = substr($_GET["url"], 6);

						$resultado = DoctoresC::DoctorC($columna, $valor);

						echo '<div class="form-group">			
							
							<input type="hidden" name="Did" value="'.$resultado["id"].'">
							  
							<input type="hidden" id="colorCita" class="colorCita"  name="colorCita" value="'.$resultado["colorCita"].'"> <br>


							</div>';			



						$columna = "id";
							$valor = $resultado["id_consultorio"];

							$consultorio = ConsultoriosC::VerConsultoriosC($columna, $valor);

							echo '<div class="form-group">
							
									<input type="hidden" name="Cid" value="'.$consultorio["id"].'">

								</div>';

						?>
						
						<div class="form-group">
							
							<h4>Seleccionar Paciente:</h4>

							<?php

							echo '<select class="form-control input pacientes" name="nombreP" required>
									
									<option disabled selected>Paciente...</option>';

								$columna = null;
								$valor = null;

								$resultado = PacientesC::VerPacientesC($columna, $valor);

								foreach ($resultado as $key => $value) {
									
									echo '<option id_paciente="'.$value["id"].'" value="'.$value["nombre"].' '.$value["apellido"].'">'.$value["apellido"].' '.$value["nombre"].'</option>';


								}
							 ?>
						

							</select>

							<input type="hidden" id="Pid" class="Pid" name="Pid" value="">


				               <script type="text/javascript">
				                 
				                  const selectElementPaciente = document.querySelector('.pacientes');

				                  selectElementPaciente.addEventListener('change', (event) => {
				                    
				                    const id_paciente = document.getElementById("Pid");
				               
				                    id_paciente.value = $(".pacientes option:selected").attr("id_paciente");


				                });

				               </script>

						</div>

						<div class="form-group">
						
							<h4>Observaciones: </h4>	
							<textarea rows="8" type="text" placeholder="Observaciones de la Cita" class="form-control input" name="documentoP" value=""></textarea>
							


						</div>

						<div class="form-group">
						
							<h4>Fecha: </h4>	

							<input type="date" onchange="fechayhoraOC()" class="form-control input" id="fechaC" required="true">
						


						</div>

						<div class="form-group">
						
							<h4>Hora Inicio</h4>

							<input type="time" onchange="fechayhoraOC()" class="form-control input" id="horaC" required="true">

							<h4>Hora Fin</h4>

							<input type="time" onchange="fechayhoraFINOC()" onfocusout="validarFecha()" class="form-control input" id="horaCF" required="true">


							


						</div>

						<div class="form-group">
			
							<input type="hidden" class="hinicio form-control input" name="fyhIC" id="fyhIC" value="">

							<input type="hidden" class="hfin form-control input" name="fyhFC" id="fyhFC" value="">

						</div>


					</div>

				</div>

				<div class="modal-footer">
					
					<button type="submint" class="btn btn-primary">Pedir cita</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

				</div>

				<?php

			$enviarC = new CitasC();
			$enviarC -> PedirCitaDoctorC();

			?>

			</form>

			

		</div>

	</div>

</div>





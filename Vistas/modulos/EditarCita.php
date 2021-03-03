<?php

if($_SESSION["rol"] != "Paciente" && $_SESSION["rol"] != "Administrador" && $_SESSION["rol"] != "Doctor" && $_SESSION["rol"] != "Secretaria"){

	echo'<script>

	window.location = "inicio"
	</script>';


	return;

}

?>

<div class="content-wrapper">
	
	

	<section class="content">
		
		<div class="box">
			
			<div class="box-body">
				
				

					<form method="post" enctype="multipart/form-data">

						<?php 

					$cita = new CitasC();	

					$cita -> EditarCita();

					$cita -> ActualizarCitaC();

					?>

				</form>

				

			</div>

		</div>

	</section>

</div>

<script type="text/javascript">

	const selectElement = document.querySelector('.doctores');

	selectElement.addEventListener('change', (event) => {

		const id_doctor = document.getElementById("doc_id");

		const colorCita = document.getElementById("colorCita");

		const id_consultorio = document.getElementById("Cid");


		id_doctor.value = $(".doctores option:selected").attr("doc_id");

		colorCita.value = $(".doctores option:selected").attr("color_doctor");

		id_consultorio.value = $(".doctores option:selected").attr("id_consultorio");

	});



	const selectElementPaciente = document.querySelector('.pacientes');

	selectElementPaciente.addEventListener('change', (event) => {

		const id_paciente = document.getElementById("Pid");

		const telf = document.getElementById("telf_pac");
		

		id_paciente.value = $(".pacientes option:selected").attr("id_paciente");

		telf = $(".pacientes option:selected").attr("telf_pac");




	});



	function fechayhoraOC() {

		var fecha = document.getElementById("fechaC").value;

		var hora_i = document.getElementById("horaC").value;

		h1 = hora_i.split(":");

		h1 = parseFloat(h1[0]);

		hora_f = h1+1;


		$('.hinicio_editar').val(fecha + ' ' +  hora_i);
		$('.hfin_editar').val(fecha + ' ' +  hora_f+':00' );
		
		if (h1<9) {
			$('#horaCF').val("0"+(h1+1)+":00")
		}

		if(h1>=9){
			$('#horaCF').val(h1+1+":00")
		}
		



	}


	function fechayhoraFINOC() {

		var fecha = document.getElementById("fechaC").value;
		var hora_i = document.getElementById("horaC").value;
		var hora_f = document.getElementById("horaCF").value;

		$('.hfin_editar').val(fecha + ' ' +  hora_f )

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

		if (h1>h2)
		{
			alert("La hora final no puede ser inferior a la hora inicial");

			if (hora_mas_uno >= 10) {$("#horaCF").val(hora_mas_uno+":00");}

			if (hora_mas_uno < 10)  {$("#horaCF").val("0"+hora_mas_uno+":00");}

			$('.hfin_editar').val(fecha + ' ' +  hora_mas_uno + ":00");
		}

	}


</script>


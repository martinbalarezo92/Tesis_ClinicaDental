<?php

if($_SESSION["rol"] != "Paciente"){

	echo '<script>

	window.location = "inicio";
	</script>';

	return;
}

?>

<div class="content-wrapper">

	<section class="content">

		<h1>Gestor de Perfil</h1>

	</section>

	<section>
		
		<div class="box">
			
			<table class="table table-bordered table-hover table-striped">
				
				<thead>
					
					<tr>
						
						<th>Usuario</th>
						<th>Contraseña</th>
						<th>Nombre</th>
						<th>Apellido</th>						
						<th>Foto</th>
						<th>Documento</th>
						
						<th>Editar</th>
										
						

					</tr>



				</thead>
				<tbody>

						<?php
							$perfil = new PacientesC();
							$perfil -> VerPerfilPacienteC();
						?>




						
				</tbody>

			</table>

		</div>

	</section>
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
		
		<h1>Editar Especialidad</h1>

	</section>

	<section class="content">
		
		<div class="box">
			
			<div class="box-body">
				
				<form method="post">
					
					<?php

					$editarE = new EspecialidadesC();
					$editarE -> EditarEspecialidadC();
					$editarE -> ActualizarEspecialidadC();
					
					?>			

				</form>

			</div>

		</div>

	</section>

</div>
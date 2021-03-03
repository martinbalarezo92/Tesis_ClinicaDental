<?php

if($_SESSION["rol"] != "Administrador"){

	echo'<script>

	window.location = "inicio"
	</script>';


	return;

}

?>

<div class="content-wrapper">
	
	<section class="content-header">
		
		<h1>Editar Asistente</h1>

	</section>

	<section class="content">
		
		<div class="box">
			

			<div class="box-body">
				
			<?php 

			$secretaria = new SecretariasC();

			$secretaria -> EditarPerfilSecretaria();

			$id_secretaria = substr($_GET["url"], 18);

			$secretaria -> ActualizarPerfilSecretariaC();

			 ?>

				
			</div>

		</div>

	</section>

</div>






<?php

if($_SESSION["rol"] != "Secretaria" && $_SESSION["rol"] != "Doctor" && $_SESSION["rol"] != "Administrador"){

	echo'<script>

	window.location = "inicio"
	</script>';


	return;

}

?>

<style type="text/css">
	.centrado{
		text-align: center;
	}

	.alinear-derecha{
		text-align: right;
	}
</style>


<div class="content-wrapper">

	<section class="content-header">

		<h1>CREAR UN NUEVO TRATAMIENTO</h1>

	</section>


	<section class="content">

		<div class="box">

			<div class="box-body">

				<form method="post" enctype="multipart/form-data">


					<?php 
					
					$crear = new TratamientosC();

					$crear -> crearTratamientoSesionC();
					
					

					?>

				</form>

			</div>

		</div>

	</div>


</form>


</div>

</div>

</section>
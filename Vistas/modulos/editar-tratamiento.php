<div class="content-wrapper">

	<section class="content-header">

		<h1>EDITAR TRATAMIENTO</h1>

	</section>


	<section class="content">

		<div class="box">

			<div class="box-body">

				<form method="post" enctype="multipart/form-data">

					<?php 
					


					 $actualizar = new TratamientosC();	
					 			
					 $actualizar -> EditarTratamientosSesionC();

					 $actualizar -> ActualizarTratamientoSesionC();

					 ?>

					
				

				</form>

 					
					
			</div>

		</div>

	</div>


</form>


</div>

</div>

</section>


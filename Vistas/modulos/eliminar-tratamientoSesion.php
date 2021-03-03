<div class="content-wrapper">

	<section class="content-header">

		<h1>ELIMINAR TRATAMIENTO</h1>

	</section>


	<section class="content">

		<div class="box">

			<div class="box-body">

				<form method="post" enctype="multipart/form-data">

					<?php 
					


					 $borrarT = new TratamientosC();		

					 $borrarT -> EditarTratamientosSesionC();

					 $borrarT -> BorrarTraramientoSesionC();

					 ?>

					
				

				</form>

 					
					
			</div>

		</div>

	</div>


</form>


</div>

</div>

</section>

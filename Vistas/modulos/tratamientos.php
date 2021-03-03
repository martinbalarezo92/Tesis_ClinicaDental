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

		div	{
				
		}


		.alinear-derecha{
			text-align: right;
			background-color: red;
		}

		/* print styles */
			
			@media print {

			  a, button, hr {
			  	width: 1px;
			    visibility: hidden;
			    font-size: 0px;
			   
			  }

			 @page {

				   size: landscape;
				   
				}

			

			  

			}

		</style>



		<div class="content-wrapper">

		<section class="content-header">

			<div class="container">


				<div class="row">

					<div class="col-md-1">

						<a href="http://localhost/clinica/hc-paciente"> 
							<button class="btn btn-primary" type="submit"> 
								<i class="fa fa-angle-left"></i>
							</button>
						</a>

					</div>

					<div style="font-size: 26px" class="col-md-9">

						<strong>TRATAMIENTOS</strong> 

					</div>

					<div class="col-md-2">

						<?php 
						$id_paciente = substr($_GET["url"] , 13) ;
						echo'
						<div style="display: flex; justify-content: center"><a href="http://localhost/clinica/historiaClinica/'.$id_paciente.'"> <button class="btn btn-primary">VER HISTORIA CLINICA DEL PACIENTE</button> </a></div>
						';?>

					</div>

				</div>

			</div>

		</section>


		<section class="content">

			<div class="box">

				<div class="box-body">

					<form method="post" enctype="multipart/form-data">
						
						<?php 							

						$editarTratamientos = new TratamientosC();

						$editarTratamientos -> EditarTratamientosC();

						$editarTratamientos -> ActualizarTratamientoC();					
						
						?>

						

					</form>



				</div>

			</div>

		</section>

	

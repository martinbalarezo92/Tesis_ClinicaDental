<?php

if($_SESSION["rol"] != "Secretaria" && $_SESSION["rol"] != "Doctor" && $_SESSION["rol"] != "Administrador"){

	echo'<script>

	window.location = "inicio"
	</script>';


	return;

}

?>


  	<div class="content-wrapper">

  		<section class="content-header">

  			<h1>Gestor de Pacientes</h1>

  		</section>

  		<section class="content">

  			<div class="box">

  				<div class="box-header">

  					<button class="btn btn-primary" data-toggle="modal" data-target="#CrearPaciente">
  						<i class="fa fa-plus" aria-hidden="true"></i>

  						Crear Paciente

  					</button>	

  				</div>


  				<div class="box-body" >

  					<table class="table table-bordered table-hover table-striped DT">

  						<thead>

  							<tr>

  								<th>N°</th>
  								<th>Apellido</th>
  								<th>Nombre</th>
  								<th>Cédula</th>
  							<!-- 	<th>Foto</th> -->

  								<th>Telefono 1</th>
  								<th>Telefono 2</th>
  								<th>Dirección</th>
  								<th>E-mail</th>

  								<th>Editar / Borrar</th>


  							</tr>

  						</thead>

  						<tbody>


  							<?php

  							$columna = null;
  							$valor = null;

  							$resultado = PacientesC::VerPacientesC($columna, $valor);

  							foreach ($resultado as $key => $value) {

  								echo'

  								<tr>

  								<td>'.($key+1).'</td>

  								<td>'.$value["apellido"].'</td>
  								<td>'.$value["nombre"].'</td>
  								<td>'.$value["documento"].'</td>';

  								// if($value["foto"] == ""){

  								// 	echo'	<td> <img src="Vistas/img/defecto.png" width="40px"> </td>';

  								// }else{

  								// 	echo'	<td> <img src="'.$value["foto"].'" width="40px"> </td>';

  								// }




  								echo'


  								<td>'.$value["telefono_01"].'</td>

  								<td>'.$value["telefono_02"].'</td>

  								<td>'.$value["e_mail"].'</td>

  								<td>'.$value["direccion"].'</td>

  								<td>

  								<div class="">


  								<button class="btn btn-success EditarPaciente" Pid="'.$value["id"].'" imgP="'.$value["foto"].'" data-toggle="modal" data-target="#EditarPaciente"><i class="fa fa-pencil"></i>Editar</button>




  								


                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmarEliminarPaciente'.$value["id"].'"><i class="fa fa-times"></i> Borrar</button>

                    <!-- Modal -->
                          <div class="modal fade" id="confirmarEliminarPaciente'.$value["id"].'" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h3 class="alert-heading modal-title" id="ModalLongTitle">¿Eliminar Doctor?</h3>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body alert alert-warning">
                                  ¿Desea eliminar el Paciente: '.$value["nombre"].' '.$value["apellido"].'? <br>
                                  Se eliminará su respectiva historia clinica y tratamientos. 


                                </div>
                                <div class="modal-footer">
                                                
                              <button class="btn btn-success EliminarPaciente" Pid="'.$value["id"].'" imgP="'.$value["foto"].'"><i class="fa fa-trash"></i> Sí, Eliminar</button>

                              <button type="button" class="btn btn-danger"  data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>No</button>

                              
                                  
                                </div>
                              </div>
                            </div>
                          </div>



  								</div>

  								</td>

  								</tr>

  								';

  							}

  							?>






  						</tbody>

  					</table>

  				</div>

  			</div>

  		</section>

  	</div>

  	<!-- MODAL PARA CREAR Paciente -->
  	<div class="modal fade" rol="dialog" id="CrearPaciente">

  		<div class="modal-dialog">

  			<div class="modal-content">

  				<form method="post" role=form>

  					<div class="modal-body">

              <div class="container col-md-12">

                <div class="row">              

    						<div class="box-body">

                <div class="col-md-6">

    							<div class="form-group">

    								<h4>Apellido: </h4>

    								<input type="text" class="form-control"  name="apellido" required>

    								<input type="hidden" name="rolP" value="Paciente" required>

    							</div>

                </div>



                <div class="col-md-6">
    							<div class="form-group">

    								<h4>Nombre: </h4>

    								<input type="text" class="form-control"  name="nombre" required>

    							</div>
                   </div>



                   <div class="col-md-6">
    							<div class="form-group">

    								<h4>Cédula: </h4>

    								<input type="text" class="form-control"  name="documento" required>

    							</div>
                   </div>


                   <div class="col-md-6">
                  <div class="form-group">

                    <h4>Dirección: </h4>

                    <input type="text" class="form-control"  name="direccion" required>

                  </div>  
                   </div>



                   <div class="col-md-6">
                  <div class="form-group">

                    <h4>Teléfono 1: </h4>

                    <input type="text" class="form-control"  name="telefono_01" required>

                  </div>  
                   </div>




                   <div class="col-md-6">
                  <div class="form-group">

                    <h4>Teléfono 2: </h4>

                    <input type="text" class="form-control"  name="telefono_02" required>

                  </div>  
                   </div>




                   <div class="col-md-6">
                  <div class="form-group">

                    <h4>E-mail: </h4>

                    <input type="email" placeholder="correo@dominio.com" class="form-control"  name="e_mail" required>

                  </div>  	
                   </div>




                   <div class="col-md-6">
    							<div class="form-group">

    								<!-- <h4>Usuario: </h4> -->

    								<?php 
                    echo'
                    <input type="hidden" class="form-control" id="usuario" name="usuario" value="'.rand().'" required>
                    ';
                     ?>

    							</div>
                   </div>



                   <div class="col-md-6">
    							<div class="form-group">

    								<!-- <h4>Contraseña: </h4> -->

    								<input type="hidden" class="form-control"  name="clave" value="passPaciente" required>

    							</div>
                   </div>

                   <div class="col-md-12">
                  <div class="form-group">

                    <!-- <h4>Foto: </h4> -->

                    
                  

                  </div>
                   </div>

    						</div>

                </div>

              </div>

  					</div>

  					<div class="modal-footer">

  						<button type="submit" class="btn btn-primary">Crear</button>

  						<button type="submit" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

  					</div>

  					<?php

  					$crear = new PacientesC();
  					$crear -> CrearPacienteC();

  					?>

  				</form>

  			</div>

  		</div>

  	</div>




  	<!-- MODAL PARA EDITAR PACIENTE -->
  	<div class="modal fade" rol="dialog" id="EditarPaciente">

  		<div class="modal-dialog">

  			<div class="modal-content">

  				<form method="post" role="form">

  					<div class="modal-body">

              <div class="container col-md-12">
    						
                <div class="row">

                  <div class="box-body">



                    <div class="col-md-6">

        							<div class="form-group">

        								<h4>Apellido:</h4>

        								<input type="text" class="form-control" id="apellidoE" name="apellidoE" required>

        								<input type="hidden" id="Pid" name="Pid">

        							</div>

                    </div>



                    <div class="col-md-6">
      							<div class="form-group">

      								<h4>Nombre:</h4>

      								<input type="text" class="form-control" id="nombreE" name="nombreE" required>

      							</div>
                    </div>


                    <div class="col-md-6">
      							<div class="form-group">

      								<h4>Cédula:</h4>

      								<input type="text" class="form-control" id="documentoE" name="documentoE" required>

      							</div>
                    </div>


                    <div class="col-md-6">
                    <div class="form-group">

                      <h4>Dirección:</h4>

                      <input type="text" class="form-control" id="direccionE" name="direccionE" required>

                    </div>
                    </div>


                    <div class="col-md-6">
                    <div class="form-group">

                      <h4>Teléfono 1:</h4>

                      <input type="text" class="form-control" id="telefono_01E" name="telefono_01E" >

                    </div>
                    </div>


                    <div class="col-md-6">
                    <div class="form-group">

                      <h4>Teléfono 1:</h4>

                      <input type="text" class="form-control" id="telefono_02E" name="telefono_02E" >

                    </div>
                    </div>


                    <div class="col-md-6">
                    <div class="form-group">

                      <h4>E-mail:</h4>

                      <input type="text" class="form-control" id="e_mailE" name="e_mailE" >

                    </div>
                    </div>

                    <!-- <div class="col-md-6">
      							<div class="form-group">

      								<h4>Usuario:</h4>

      								<input type="text" class="form-control" id="usuarioE" name="usuarioE" >

      							</div>
                    </div>



                    <div class="col-md-6">
      							<div class="form-group">

      								<h4>Contraseña:</h4>

      								<input type="text" class="form-control" id="claveE" name="claveE" >

      							</div>
                    </div> -->




      						</div>

                </div>

              </div>

  					</div>


  					<div class="modal-footer">

  						<button type="submit" class="btn btn-success">Guardar Cambios</button>

  						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

  					</div>

  					<?php

  					$actualizar = new PacientesC();
  					$actualizar -> ActualizarPacienteC();

  					?>

  				</form>

  			</div>

  		</div>

  	</div>


  	<?php

  	$borrarP = new PacientesC();
  	$borrarP -> BorrarPacienteC();





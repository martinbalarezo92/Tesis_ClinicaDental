<?php

class EspecialidadesC{

	//Crear consultorios
	public function CrearEspecialidadC(){

		if(isset($_POST["especialidadN"])){

			$tablaBD = "especialidades";

			$especialidad = array("nombre_especialidad"=>$_POST["especialidadN"]);

			$resultado = EspecialidadesM::CrearEspecialidadM($tablaBD, $especialidad);

			if($resultado == true){

				echo '<script>

				window.location = "http://localhost/clinica/especialidades";
				</script>';

			}

		}

	}


	//Ver Especialidades
	static public function VerEspecialidadesC($columna, $valor){

		$tablaBD = "especialidades";

		$resultado = EspecialidadesM::VerEspecialidadesM($tablaBD, $columna, $valor);

		return $resultado;

	}


	//Borrar Consultorios
	public function BorrarEspecialidadC(){

		if(substr($_GET["url"], 15)){

			$tablaBD = "especialidades";

			$id = substr($_GET["url"], 15);

			$resultado = EspecialidadesM::BorrarEspecialidadM($tablaBD, $id);

			if($resultado == true){

				echo '<script>

				window.location = "http://localhost/clinica/especialidades";
				
				</script>';

			}

		}

	}


	//Editar Consultorio
	public function EditarEspecialidadC(){

		$tablaBD = "especialidades";

		$id = substr($_GET["url"], 20);

		$resultado = EspecialidadesM::EditarEspecialidaM($tablaBD, $id);

		echo '

					<div class="form-group">
						
						<h4>Nombre: </h4>

						<input type="text" class="form-control input" name="especialidadE" value="'.$resultado["nombre_especialidad"].'">
						<input type="hidden" class="form-control input" name="Eid" value="'.$resultado["id"].'">								

						<br>

						<button class="btn btn-success" type="submit">Guardar</button>

					</div>

		';

	}


	//Actualizar Consultorio

	public function ActualizarEspecialidadC(){

		if(isset($_POST["especialidadE"])){

			$tablaBD = "especialidades";

			$datosC = array("id" => $_POST["Eid"], "nombre_especialidad" => $_POST["especialidadE"]);

			$resultado = EspecialidadesM::ActualizarEspecialidadM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				window.location = "http://localhost/clinica/especialidades";
				</script>';

			}

		}

		

		

	}


}


<?php

class ConsultoriosC{

	//Crear consultorios
	public function CrearConsultorioC(){

		if(isset($_POST["consultorioN"])){

			$tablaBD = "consultorios";

			$consultorio = array("nombre"=>$_POST["consultorioN"]);

			$resultado = ConsultoriosM::CrearConsultorioM($tablaBD, $consultorio);

			if($resultado == true){

				echo '<script>

				window.location = "http://localhost/clinica/consultorios";
				</script>';

			}

		}

	}


	//Ver Consultorios
	static public function VerConsultoriosC($columna, $valor){

		$tablaBD = "consultorios";

		$resultado = ConsultoriosM::VerConsultoriosM($tablaBD, $columna, $valor);

		return $resultado;

	}


	//Borrar Consultorios
	public function BorrarConsultorioC(){

		if(substr($_GET["url"], 13)){

			$tablaBD = "consultorios";

			$id = substr($_GET["url"], 13);

			$resultado = ConsultoriosM::BorrarConsultorioM($tablaBD, $id);

			if($resultado == true){

				echo '<script>

				window.location = "http://localhost/clinica/consultorios";
				</script>';

			}

		}

	}


	//Editar Consultorio
	public function EditarConsultorio(){

		$tablaBD = "consultorios";

		$id = substr($_GET["url"], 4);

		$resultado = ConsultoriosM::EditarConsultorioM($tablaBD, $id);

		echo '

					<div class="form-group">
						
						<h4>Nombre: </h4>

						<input type="text" class="form-control input" name="consultorioE" value="'.$resultado["nombre"].'">
						<input type="hidden" class="form-control input" name="Cid" value="'.$resultado["id"].'">								

						<br>

						<button class="btn btn-success" type="submit">Guardar</button>

					</div>

		';

	}


	//Actualizar Consultorio

	public function ActualizarConsultorioC(){

		if(isset($_POST["consultorioE"])){

			$tablaBD = "consultorios";

			$datosC = array("id" => $_POST["Cid"], "nombre" => $_POST["consultorioE"]);

			$resultado = ConsultoriosM::ActualizarConsultorioM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				window.location = "http://localhost/clinica/consultorios";
				</script>';

			}

		}

		

		

	}


}


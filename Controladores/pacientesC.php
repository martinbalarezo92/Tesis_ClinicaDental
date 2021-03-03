<?php

class PacientesC{
	
	static public function PacienteC($columna, $valor){

	$tablaBD = "pacientes";

	$resultado = PacientesC::VerPacientesM($tablaBD, $columna, $valor);

	return $resultado;

}

	//Crear Pacientes
	public function CrearPacienteC(){
		
		if(isset($_POST["rolP"])){

			//$rutaImg = $_POST["imgPerfilCrearPaciente"];
			$rutaImg = "qqq";



			if ($_FILES["imgPerfilCrearPaciente"]["type"] == "image/png") {
				# code...
					$nombre = mt_rand(100,999);

					$rutaImg = "Vistas/img/Pacientes/Paciente".$nombre.".png";

					$foto = imagecreatefrompng($_FILES["imgPerfilCrearPaciente"]["tmp_name"]);

					imagepng($foto, $rutaImg);

			}

			if($_FILES["imgPerfilCrearPaciente"]["type"] == "image/jpeg"){

					$nombre = mt_rand(100,999);

					$rutaImg = "Vistas/img/Pacientes/Paciente".$nombre.".jpg";

					$foto = imagecreatefromjpeg($_FILES["imgPerfilCrearPaciente"]["tmp_name"]);

					imagejpeg($foto, $rutaImg);

				}


			


			$tablaBD = "pacientes";

		
			$datosC = array("apellido"=> $_POST["apellido"], "nombre"=> $_POST["nombre"], "documento"=> $_POST["documento"], "usuario"=> $_POST["usuario"], "clave"=> $_POST["clave"], "rol" => $_POST["rolP"], "telefono_01" => $_POST["telefono_01"], "telefono_02" => $_POST["telefono_02"], "e_mail" => $_POST["e_mail"], "direccion" => $_POST["direccion"], "foto"=>$rutaImg);

			$resultado = PacientesM::CrearPacienteM($tablaBD, $datosC);

			if($resultado == true){

				echo'<script>

				window.location = "pacientes";

				</script>';

			}

		}

	}

	//Ver Paceitnes

	static public function VerPacientesC($columna, $valor){

		$tablaBD = "pacientes";

		$resultado = PacientesM::VerPacientesM($tablaBD, $columna, $valor);

		return $resultado;

	}

	//Borrar paciente
	public function BorrarPacienteC(){

		if(isset($_GET["Pid"])){

			$tablaBD = "pacientes";

			$id = $_GET["Pid"];

			if ($_GET["imgP"] != "") {
				# code...
				unlink($_GET["imgP"]);

			}

			$resultado = PacientesM::BorrarPacienteM($tablaBD, $id);

			if($resultado == true){

				echo'<script>

				window.location = "pacientes";

				</script>';

			}

		}

	}

	//Actualizar Paciente
	public function ActualizarPacienteC(){

		if(isset($_POST["Pid"])){



			$tablaBD = "pacientes";

			$datosC = array("id"=>$_POST["Pid"], "apellido"=>$_POST["apellidoE"], "nombre"=>$_POST["nombreE"], "documento"=>$_POST["documentoE"], "usuario"=>$_POST["usuarioE"], "clave"=>$_POST["claveE"], "telefono_01" => $_POST["telefono_01E"], "telefono_02" => $_POST["telefono_02E"], "e_mail" => $_POST["e_mailE"], "direccion" => $_POST["direccionE"]);

			$resultado = PacientesM::ActualizarPacienteM($tablaBD, $datosC);
			
			if($resultado == true){

				echo '<script>

				window.location = "pacientes";
				</script>';

			}

		}

	}

	// Ingreso de los pacientes
	public function IngresarPacienteC(){

		if(isset($_POST["usuario-Ing"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuario-Ing"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["clave-Ing"])){

				$tablaBD = "pacientes";

				$datosC = array("usuario"=> $_POST["usuario-Ing"], "clave"=> $_POST["clave-Ing"]);

				$resultado = PacientesM::IngresarPacienteM($tablaBD, $datosC);

				if($resultado["usuario"] == $_POST["usuario-Ing"] && $resultado["clave"] == $_POST["clave-Ing"]){

				$_SESSION["Ingresar"] = true;

				$_SESSION["id"] = $resultado["id"];
				$_SESSION["usuario"] = $resultado["usuario"];
				$_SESSION["clave"] = $resultado["clave"];
				$_SESSION["apellido"] = $resultado["apellido"];
				$_SESSION["nombre"] = $resultado["nombre"];
				$_SESSION["documento"] = $resultado["documento"];
				$_SESSION["foto"] = $resultado["foto"];
				$_SESSION["rol"] = $resultado["rol"];

				echo '<script>

				window.location = "inicio";
				</script>';

			}

			}

		}

	}

	//Ver perfil del Pacietne
	public function VerPerfilPacienteC(){

		$tablaBD = "pacientes";

		$id = $_SESSION["id"];

		$resultado = PacientesM::VerPerfilPacienteM($tablaBD, $id);

		echo 
			'<tr>
				
				<td>'.$resultado["usuario"].'</td>
				<td>'.$resultado["clave"].'</td>
				<td>'.$resultado["nombre"].'</td>
				<td>'.$resultado["apellido"].'</td>';

				if ($resultado["foto"] == "") {
					# code...
					echo '<td><img src=Vistas/img/defecto.png width="40px"></td>';

				}else{

					echo '<td><img src='.$resultado["foto"].' width="40px"></td>';

				}

		
		echo'
				<td>'.$resultado["documento"].'</td>
				<td>
					
					<a href="http://localhost/clinica/perfil-P/'.$resultado["id"].'">
						
						<button class="btn btn-success"><i class="fa fa-pencil"></i></button>

					</a>

				</td>

			</tr>
			';


	}

	//Editar perfil paciente

	public function EditarPerfilPaciente(){

		$tablaBD = "pacientes";

		$id = $_SESSION["id"];

		$resultado = PacientesM::VerPerfilPacienteM($tablaBD, $id);


		echo'

		<form method="post" enctype="multipart/form-data">
					
					<div class="row">
						
						<div class="col-md-6 col-xs-12">
							
							<h2>Nombre: </h2>
							<input type="text" class="input-lg" name="nombrePerfil" value="'.$resultado["nombre"].'">
							<input type="hidden" class="input-lg" name="Pid" value="'.$resultado["id"].'">

							<h2>Apellido: </h2>
							<input type="text" class="input-lg" name="apellidoPerfil" value="'.$resultado["apellido"].'">

							<h2>Usuario: </h2>
							<input type="text" class="input-lg" name="usuarioPerfil" value="'.$resultado["usuario"].'">

							<h2>Clave: </h2>
							<input type="text" class="input-lg" name="clavePerfil" value="'.$resultado["clave"].'">

							<h2>Documento: </h2>
							<input type="text" class="input-lg" name="documentoPerfil" value="'.$resultado["documento"].'">

						</div>

						<div class="col-md-6 col-xs-12">
							
							<input type="file" name="imgPerfil">
							<br>';

							if($resultado["foto"] != ""){

								echo'

								<img src="http://localhost/clinica/'.$resultado["foto"].'" width="200px" class="responsive">

								';


							}else{

								echo'

								<img src="http://localhost/clinica/Vistas/img/defecto.png" width="200px" class="responsive">

								';

							}


							
							echo' 

							<input type="text" name="imgActual" value="'.$resultado["foto"].'">

							<button type="submit" class="btn btn-success">Guardar Cambios</button>

							<br><br>

						</div>

					</div>

				</form>

		';

	}

	//Actualizar Pefil del paceitne

	public function ActualizarPerfilPacienteC(){

		if(isset($_POST["Pid"])){





			$rutaImg = $_POST["imgActual"];

			if(isset($_FILES["imgPerfil"]["tmp_name"]) && !empty($_FILES["imgPerfil"]["tmp_name"])){

				if(!empty($_POST["imgActual"])){

					unlink($_POST["imgActual"]);

				}



			if ($_FILES["imgPerfil"]["type"] == "image/png") {
				# code...
					$nombre = mt_rand(100,999);

					$rutaImg = "Vistas/img/Pacientes/Paciente".$nombre.".png";

					$foto = imagecreatefrompng($_FILES["imgPerfil"]["tmp_name"]);

					imagepng($foto, $rutaImg);

			}

			if($_FILES["imgPerfil"]["type"] == "image/jpeg"){

					$nombre = mt_rand(100,999);

					$rutaImg = "Vistas/img/Pacientes/Paciente".$nombre.".jpg";

					$foto = imagecreatefromjpeg($_FILES["imgPerfil"]["tmp_name"]);

					imagejpeg($foto, $rutaImg);

				}


			}



			$tablaBD = "pacientes";

			$datosC = array("id"=>$_POST["Pid"], "nombre"=>$_POST["nombrePerfil"], "apellido"=>$_POST["apellidoPerfil"], "usuario"=>$_POST["usuarioPerfil"], "clave"=>$_POST["clavePerfil"], "documento"=>$_POST["documentoPerfil"], "foto"=>$rutaImg);

			$resultado = PacientesM::ActualizarPerfilPacienteM($tablaBD, $datosC);

			if($resultado == true){

				echo'
				<script>
					window.location = "http://localhost/clinica/perfil-P/'.$_SESSION["id"].'";
				</script>
				';

			}

		}


	}
}
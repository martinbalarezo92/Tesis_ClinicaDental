<?php

class DoctoresC{

//Crear Doctores
	//Crear Doctores
	public function CrearDoctorC(){

		if(isset($_POST["rolD"])){

			$tablaBD = "doctores";

			$datosC = array("rol"=>$_POST["rolD"], "apellido"=>$_POST["apellido"], "nombre"=>$_POST["nombre"],"cedula_doctor" => $_POST["cedula"] , "sexo"=>$_POST["sexo"],  "id_consultorio"=>$_POST["consultorio"], "id_especialidad" => $_POST["especialidad"], "usuario"=>$_POST["usuario"], "clave"=>$_POST["clave"], "colorCita" => $_POST["color"]);

			$resultado = DoctoresM::CrearDoctorM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				window.location = "doctores";
				</script>';

			}

		}

	}

//Mostrat Doctores
	static public function VerDoctoresC($columna, $valor){

		$tablaBD = "doctores";

		$resultado = DoctoresM::VerDoctoresM($tablaBD, $columna, $valor);

		return $resultado;

	}

	//Editar Doctor
	static public function DoctorC($columna, $valor){

		$tablaBD = "doctores";

		$resultado = DoctoresM::DoctorM($tablaBD, $columna, $valor);

		return $resultado;

	}

	//Actualizar Doctor
	public function ActualizarDoctorC(){

		if(isset($_POST["Did"])){

			$tablaBD = "doctores";

			$datosC = array("id"=>$_POST["Did"], "apellido"=>$_POST["apellidoE"], "nombre"=>$_POST["nombreE"],"cedula_doctor" => $_POST["cedulaE"] , "sexo"=>$_POST["sexoE"], "usuario"=>$_POST["usuarioE"],"id_consultorio" => $_POST["consultorioE"], "clave"=>$_POST["claveE"], "colorCita" => $_POST["colorE"], "id_especialidad" => $_POST["especialidadE"]);

			$resultado = DoctoresM::ActualizarDoctorM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				window.location = "doctores";
				</script>';

			}

		}

	}





	//Borrar Doctor
	public function BorrarDoctorC(){

		if(isset($_GET["Did"])){

			$tablaBD = "doctores";

			$id = $_GET["Did"];

			if($_GET["imgD"] != ""){

				unlink($_GET["imgD"]);

			}

			$resultado = DoctoresM::BorrarDoctorM($tablaBD, $id);

			if($resultado == true){

				echo '<script>

				window.location = "doctores";
				</script>';

			}

		}

	}


	// Ingreso al sistema Doctor
	public function IngresarDoctorC(){

		if(isset($_POST["usuario-Ing"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuario-Ing"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["clave-Ing"])){

				$tablaBD = "doctores";

				$datosC = array("usuario"=> $_POST["usuario-Ing"], "clave"=> $_POST["clave-Ing"]);

				$resultado = DoctoresM::IngresarDoctorM($tablaBD, $datosC);

				if($resultado["usuario"] == $_POST["usuario-Ing"] && $resultado["clave"] == $_POST["clave-Ing"]){

					$_SESSION["Ingresar"] = true;

					$_SESSION["id"] = $resultado["id"];
					$_SESSION["usuario"] = $resultado["usuario"];
					$_SESSION["id_consultorio"] = $resultado["id_consultorio"];
					$_SESSION["clave"] = $resultado["clave"];
					$_SESSION["apellido"] = $resultado["apellido"];
					$_SESSION["nombre"] = $resultado["nombre"];
					$_SESSION["sexo"] = $resultado["sexo"];
					$_SESSION["foto"] = $resultado["foto"];
					$_SESSION["rol"] = $resultado["rol"];

					echo '<script>

					window.location = "Citas/'.$_SESSION["id"].'";

					</script>';

				}

				else{

			echo '<br><div class="alert alert-danger"><span><i class="fa fa-warning"></i></span> Credenciales proporcionadas inválidas</div>';

		}

			}

		}

	}

// Ver perfil doctor
	public function VerPerfilDoctorC(){

		$tablaBD = "doctores";

		$id = $_SESSION["id"];

		$resultado = DoctoresM::VerPerfilDoctorM($tablaBD, $id);

		echo'

		<tr>

		<td>'.$resultado["usuario"].'</td>
		<td> * * * * * * </td>
		<td>'.$resultado["nombre"].'</td>
		<td>'.$resultado["apellido"].'</td>';

		if ($resultado["foto"] == "") {
					# code...
			echo '<td><img src=Vistas/img/defecto.png width="40px"></td>';

		}else{

			echo '<td><img src='.$resultado["foto"].' width="40px"></td>';

		}

		$columna = "id";

		$valor_consultorio = $resultado["id_consultorio"];

		$consultorio = ConsultoriosC::VerConsultoriosC($columna, $valor_consultorio);

		$valor_especialidad = $resultado["id_especialidad"];

		$especialidad = EspecialidadesC::VerEspecialidadesC($columna, $valor_especialidad);

		echo'<td>'.$especialidad["nombre_especialidad"].'</td>';

		echo'<td style="background-color: '.$resultado["colorCita"].'; width: 80px"></td>';

		echo'
		<td>

		Desde: '.$resultado["horarioE"].'
		<br>
		Hasta: '.$resultado["horarioS"].'

		</td>

		<td>

		<a href="http://localhost/clinica/perfil-D/'.$resultado["id"].'">

		<button class="btn btn-success"><i class="fa fa-pencil"></i></button>

		</a>

		</td>

		</tr>

		';

	}

	//Editar Perfil Doctor

	public function EditarPerfilDoctor(){

		$tablaBD = "doctores";
		$id = $_SESSION["id"];

		$resultado = DoctoresM::VerPerfilDoctorM($tablaBD, $id);

		echo'

		<form method="post" enctype="multipart/form-data">

		<div class="row">

		<div class="col-md-6 col-xs-12">

		<h4>Nombre: </h4>
		<input type="text" class="input form-control" name="nombrePerfil" value="'.$resultado["nombre"].'">
		<input type="hidden" name="Did" value="'.$resultado["id"].'">

		<h4>Apellido: </h4>
		<input type="text" class="input form-control" name="apellidoPerfil" value="'.$resultado["apellido"].'">

		<h4>Usuario: </h4>
		<input type="text" class="input form-control" name="usuarioPerfil" value="'.$resultado["usuario"].'">

		<h4>Clave: </h4>
		<input type="text" class="input form-control" name="clavePerfil" value="'.$resultado["clave"].'">';


		$columna = "id";

		$valor = $resultado["id_consultorio"];

		$consultorio = ConsultoriosC::VerConsultoriosC($columna, $valor);

		echo'

		<h4>Consultorio:</h4>

		<select class="input form-control" name= "consultorioPerfil">

		<option selected value="'.$consultorio["id"].'">'.$consultorio["nombre"].'</option>

		';


		$columna = null;
		$valor = null;

		$consultorio = ConsultoriosC::VerConsultoriosC($columna, $valor);

		foreach ($consultorio as $key => $value) {

			echo'

			<option value="'.$value["id"].'">'.$value["nombre"].'</option>

			';

		}	
		echo'
		</select>


		<div class="form-group">

		<h4>Horario:</h4>
		Desde: <input type="time" class="input form-control" name="hePerfil" value="'.$resultado["horarioE"].'">
		Hasta: <input type="time" class="input form-control" name="hsPerfil" value="'.$resultado["horarioS"].'">

		</div>

		<div class="form-group">

		<h4>Horario:</h4>
		Color Cita: <input type="color" class="input form-control" name="colorCita" value="'.$resultado["colorCita"].'">


		</div>

		</div>

		<div class="col-md-6 col-xs-12">

		<br>
		<input type="file" name="imgPerfil" class="input form-control">
		<br>';

		if($resultado["foto"] == ""){

			echo '<img src="http://localhost/clinica/Vistas/img/defecto.png" class="img-responsive" width="150px">';

		}else{

			echo '<img src="http://localhost/clinica/'.$resultado["foto"].'" class="img-responsive" width="150px">';


		}


		echo '<input type="hidden" name="imgActual" value="'.$resultado["foto"].'">

		<br><br>

		<button type="submit" class="btn btn-success">Guardar Cambios</button>

		</div>

		</div>

		</form>	

		';

	}

	//actualizar perfil Doctor

	public function ActualizarPerfilDoctorC(){

		if(isset($_POST["Did"])){

			$rutaImg = $_POST["imgActual"];

			if(isset($_FILES["imgPerfil"]["tmp_name"]) && !empty($_FILES["imgPerfil"]["tmp_name"])){

				if(!empty($_POST["imgActual"])){

					unlink($_POST["imgActual"]);

				}

				if($_FILES["imgPerfil"]["type"] == "image/png"){

					$nombre = mt_rand(100,999);

					$rutaImg = "Vistas/img/Doctores/Doc-".$nombre.".png";

					$foto = imagecreatefrompng($_FILES["imgPerfil"]["tmp_name"]);

					imagepng($foto, $rutaImg);

				}

				if($_FILES["imgPerfil"]["type"] == "image/jpeg"){

					$nombre = mt_rand(100,999);

					$rutaImg = "Vistas/img/Doctores/Doc-".$nombre.".jpg";

					$foto = imagecreatefromjpeg($_FILES["imgPerfil"]["tmp_name"]);

					imagejpeg($foto, $rutaImg);

				}


			}

			$tablaBD = "doctores";

			$datosC = array("id"=>$_POST["Did"], "nombre"=>$_POST["nombrePerfil"], "apellido"=>$_POST["apellidoPerfil"], "usuario"=>$_POST["usuarioPerfil"], "clave"=>$_POST["clavePerfil"], "consultorio"=>$_POST["consultorioPerfil"], "horarioE"=>$_POST["hePerfil"], "horarioS"=>$_POST["hsPerfil"], "foto"=>$rutaImg, "colorCita" => $_POST["colorCita"]);

			$resultado = DoctoresM::ActualizarPerfilDoctorM($tablaBD, $datosC);

			if($resultado == true){

				echo'<script>
				window.location = "http://localhost/clinica/perfil-D/'.$resultado["id"].'";
				</script>';

			}
		}

	}
}
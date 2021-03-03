<?php

require_once "conexionDB.php";

class DoctoresM extends ConexionBD{

	//Crear Doctor
	static public function CrearDoctorM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD(apellido, nombre,cedula_doctor, sexo, id_consultorio,id_especialidad, usuario, clave, rol, colorCita) VALUES(:apellido, :nombre,:cedula_doctor , :sexo, :id_consultorio, :id_especialidad, :usuario, :clave, :rol, :colorCita)");

		$pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":cedula_doctor", $datosC["cedula_doctor"], PDO::PARAM_STR);
		$pdo -> bindParam(":sexo", $datosC["sexo"], PDO::PARAM_STR);
		$pdo -> bindParam(":id_consultorio", $datosC["id_consultorio"], PDO::PARAM_INT);
		$pdo -> bindParam(":id_especialidad", $datosC["id_especialidad"], PDO::PARAM_INT);
		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
		$pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
		$pdo -> bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);
		$pdo -> bindParam(":colorCita", $datosC["colorCita"], PDO::PARAM_STR);


		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}


	//Mostrar Doctores
	static public function VerDoctoresM($tablaBD, $columna, $valor){

		if($columna != null){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

			$pdo -> execute();

			return $pdo -> fetchAll();

		}else{

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");
			
			$pdo -> execute();

			return $pdo -> fetchAll();

		}

		$pdo -> close();

		$pdo = null;

	}

	//Editar Doctor
	static public function DoctorM($tablaBD, $columna, $valor){

		if($columna != null){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

			$pdo->execute();

			return $pdo -> fetch();

		}

		$pdo -> close();
		$pdo = null;

	}

	//Actualizar Doctores
	static public function ActualizarDoctorM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET apellido = :apellido, nombre = :nombre, cedula_doctor = :cedula_doctor  ,sexo = :sexo, usuario = :usuario, clave = :clave, colorCita = :colorCita, id_especialidad = :id_especialidad, id_consultorio = :id_consultorio WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
		$pdo -> bindParam(":cedula_doctor", $datosC["cedula_doctor"], PDO::PARAM_STR);
		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":sexo", $datosC["sexo"], PDO::PARAM_STR);
		$pdo -> bindParam(":id_consultorio", $datosC["id_consultorio"], PDO::PARAM_STR);
		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
		$pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
		$pdo -> bindParam(":colorCita", $datosC["colorCita"], PDO::PARAM_STR);
		$pdo -> bindParam(":id_especialidad", $datosC["id_especialidad"], PDO::PARAM_INT);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}


	//Eliminar Doctor
	static public function BorrarDoctorM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, pdo::PARAM_INT);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}

		//ingreso del doctor
	static public function IngresarDoctorM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE usuario = :usuario");

		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;

	}

	//Ver perfil Doctor

	static public function VerPerfilDoctorM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_STR);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;

	}


	//Actualizar Perfil Doctor
	static public function ActualizarPerfilDoctorM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET id_consultorio = :id_consultorio, apellido = :apellido, nombre = :nombre, foto = :foto, usuario = :usuario, clave = :clave, horarioE = :horarioE, horarioS = :horarioS, colorCita = :colorCita WHERE id = :id");


		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":id_consultorio", $datosC["consultorio"], PDO::PARAM_INT);
		$pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
		$pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
		$pdo -> bindParam(":foto", $datosC["foto"], PDO::PARAM_STR);
		$pdo -> bindParam(":horarioE", $datosC["horarioE"], PDO::PARAM_STR);
		$pdo -> bindParam(":horarioS", $datosC["horarioS"], PDO::PARAM_STR);
		$pdo -> bindParam(":colorCita", $datosC["colorCita"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}
}
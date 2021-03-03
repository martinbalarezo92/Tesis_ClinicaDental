<?php

require_once "conexionDB.php";

class EspecialidadesM extends conexionBD {

	//Crear Especialidades
	static public function CrearEspecialidadM($tablaBD, $especialidad){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (nombre_especialidad) VALUES (:nombre)");

		
		$pdo -> bindParam(":nombre", $especialidad["nombre_especialidad"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}else{
			return false;
		}

		$pdo -> close();
		$pdo = null;

	}

	//Ver Especialidades


	static public function VerEspecialidadesM($tablaBD, $columna, $valor){

		if($columna == null){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");

			$pdo -> execute();

			return $pdo -> fetchAll();

		}else{

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

			$pdo -> execute();

			return $pdo -> fetch();

		}

	}

	//Borrar Consultorio

	static public function BorrarEspecialidadM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id , PDO::PARAM_INT);

		if($pdo -> execute()){
			return true;
		}else{
			return false;
		}

		$pdo -> close();
		$pdo = null;




	}

	// Editar Consultorio

	static public function EditarEspecialidaM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id , PDO::PARAM_INT);

		$pdo -> execute();
		
		return $pdo -> fetch();

		$pdo -> close();

		$pdo = null;

	}


	//Actualizar Consultorio


	static public function ActualizarEspecialidadM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET nombre_especialidad = :nombre_especialidad WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"] , PDO::PARAM_INT);
		$pdo -> bindParam(":nombre_especialidad", $datosC["nombre_especialidad"] , PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}else{
			return false;
		}

		$pdo -> close();
		$pdo = null;

	}


}
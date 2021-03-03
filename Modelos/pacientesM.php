<?php

require_once "conexionDB.php";

class PacientesM extends ConexionBD{

	//Crear Pacientes	
	static public function CrearPacienteM($tablaBD, $datosC){
		
		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD(apellido, nombre, documento, usuario, clave, rol, telefono_01, telefono_02, direccion, e_mail, foto) VALUES (:apellido, :nombre, :documento, :usuario, :clave, :rol, :telefono_01, :telefono_02, :direccion, :e_mail, :foto)");

		$pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":documento", $datosC["documento"], PDO::PARAM_STR);
		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
		$pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
		$pdo -> bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);
		$pdo -> bindParam(":telefono_01", $datosC["telefono_01"], PDO::PARAM_STR);
		$pdo -> bindParam(":telefono_02", $datosC["telefono_02"], PDO::PARAM_STR);
		$pdo -> bindParam(":direccion", $datosC["direccion"], PDO::PARAM_STR);
		$pdo -> bindParam(":e_mail", $datosC["e_mail"], PDO::PARAM_STR);
		$pdo -> bindParam(":foto", $datosC["foto"], PDO::PARAM_STR);

		
				   
		//$pdo_2 = ConexionBD::cBD()->prepare("INSERT INTO historiaclinicatest(id_paciente) VALUES 9");

		if($pdo -> execute() ){
			return true;
		}

		$pdo -> close();
		//$pdo_2 -> close();
		
		$pdo = null;
		//$pdo_2 = null;


	}


	//Ver pacietnes

	static public function VerPacientesM($tablaBD, $columna, $valor){

		if($columna == null){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD ORDER BY apellido ASC");

			$pdo -> execute();

			return $pdo -> fetchALL();

		}else{

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna ORDER BY apellido ASC");

			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

			$pdo -> execute();

			return $pdo -> fetch();

		}

		$pdo -> close();
		$pdo = null;


	}

	//Borrar paciente

	static public function BorrarPacienteM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}  

	//Actualizar PAciente
	static public function ActualizarPacienteM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET apellido = :apellido, nombre = :nombre, documento = :documento, usuario = :usuario, clave = :clave, telefono_01 = :telefono_01, telefono_02 = :telefono_02, direccion = :direccion, e_mail = :e_mail WHERE id = :id");
		
		$pdo -> bindParam("id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam("apellido", $datosC["apellido"], PDO::PARAM_STR);
		$pdo -> bindParam("nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam("documento", $datosC["documento"], PDO::PARAM_STR);
		$pdo -> bindParam("usuario", $datosC["usuario"], PDO::PARAM_STR);
		$pdo -> bindParam("clave", $datosC["clave"], PDO::PARAM_STR);

		$pdo -> bindParam(":telefono_01", $datosC["telefono_01"], PDO::PARAM_STR);
		$pdo -> bindParam(":telefono_02", $datosC["telefono_02"], PDO::PARAM_STR);
		$pdo -> bindParam(":direccion", $datosC["direccion"], PDO::PARAM_STR);
		$pdo -> bindParam(":e_mail", $datosC["e_mail"], PDO::PARAM_STR);
		




		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;


	}

	// Ingreso de los pacietnes

	static public function IngresarPacienteM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("SELECT usuario, clave, apellido, nombre, documento, foto, rol , id FROM $tablaBD WHERE usuario = :usuario");

		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;

	}


	// ver perfil del pacietnes

	static public function VerPerfilPacienteM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("SELECT usuario, clave, apellido, nombre, documento, foto, rol , id FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;

	}


	// actualizar perfil del usuario

	static public function ActualizarPerfilPacienteM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET usuario = :usuario, clave = :clave, nombre = :nombre, apellido = :apellido, documento = :documento, foto = :foto WHERE id = :id");


		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
		$pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
		$pdo -> bindParam(":documento", $datosC["documento"], PDO::PARAM_STR);
		$pdo -> bindParam(":foto", $datosC["foto"], PDO::PARAM_STR);



		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;



	}


}
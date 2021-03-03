<?php

require_once "conexionDB.php";

class CitasM extends ConexionBD{

	//Pedir Citas Paciente

	static public function EnviarCitaM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD() -> prepare("INSERT INTO $tablaBD (id_doctor, id_consultorio, id_paciente, nyaP ,documento, inicio, fin) VALUES (:id_doctor, :id_consultorio, :id_paciente, :nyaP,:documento, :inicio, :fin)");


		$pdo -> bindParam("id_doctor", $datosC["Did"],PDO::PARAM_INT); 
		$pdo -> bindParam("id_consultorio", $datosC["Cid"],PDO::PARAM_INT);
		$pdo -> bindParam("id_paciente", $datosC["Pid"],PDO::PARAM_INT);
		$pdo -> bindParam("nyaP", $datosC["nyaC"],PDO::PARAM_STR);
		$pdo -> bindParam("documento", $datosC["documentoC"],PDO::PARAM_STR);
		$pdo -> bindParam("inicio", $datosC["fyhIC"],PDO::PARAM_STR);
		$pdo -> bindParam("fin", $datosC["fyhFC"],PDO::PARAM_STR);

		if($pdo -> execute()){

			return true;
		}
		

		$pdo -> close();
		$pdo = null;

	}

	static public function VerCitaM($tablaBD, $id_cita){

		$pdo = ConexionBD::cBD() -> prepare("SELECT * FROM $tablaBD WHERE id = $id_cita");

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;

	}

	static public function VerCitasM($tablaBD){

		$pdo = ConexionBD::cBD() -> prepare("SELECT * FROM $tablaBD");

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo -> close();
		$pdo = null;

	}

	//Pedir cita como doctor
	static public function PedirCitaDoctorM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_doctor, id_consultorio, id_paciente, nyaP, documento, inicio, fin, colorCita) VALUES (:id_doctor, :id_consultorio,:id_paciente, :nyaP, :documento, :inicio, :fin, :colorCita)");

		$pdo -> bindParam(":id_doctor", $datosC["Did"], PDO::PARAM_INT);
		$pdo -> bindParam(":id_consultorio", $datosC["Cid"], PDO::PARAM_INT);
		$pdo -> bindParam(":nyaP", $datosC["nombreP"], PDO::PARAM_STR);
		$pdo -> bindParam(":documento", $datosC["documentoP"], PDO::PARAM_STR);
		$pdo -> bindParam(":inicio", $datosC["fyhIC"], PDO::PARAM_STR);
		$pdo -> bindParam(":fin", $datosC["fyhFC"], PDO::PARAM_STR);
		$pdo -> bindParam(":id_paciente", $datosC["id_paciente"],PDO::PARAM_INT);
		$pdo -> bindParam(":colorCita", $datosC["colorCita"], PDO::PARAM_STR);

		if($pdo->execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}

	static public function ActualizarCitaM($tablaBD, $datosC){

		//$datosC = array("id" => $_POST["id_cita_Editar"], "id_doctor" => $_POST["id_doctor_Editar"], "id_paciente" => $_POST["id_paciente_Editar"], "nyaP" => $_POST["nombreP_Editar"], "observaciones" => $_POST["descripcion_Editar"], "inicio" => $_POST["fyhIC_Editar"], "fin" => $_POST["fyhFC_Editar"]);

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET id_doctor = :id_doctor, id_paciente = :id_paciente, nyaP = :nyaP, documento = :observaciones, inicio = :inicio, fin = :fin WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);

		$pdo -> bindParam(":id_doctor", $datosC["id_doctor"], PDO::PARAM_INT);
		$pdo -> bindParam(":id_paciente", $datosC["id_paciente"], PDO::PARAM_INT);
		$pdo -> bindParam(":nyaP", $datosC["nyaP"], PDO::PARAM_STR);
		$pdo -> bindParam(":observaciones", $datosC["observaciones"], PDO::PARAM_STR);
		$pdo -> bindParam(":inicio", $datosC["inicio"], PDO::PARAM_STR);
		$pdo -> bindParam(":fin", $datosC["fin"], PDO::PARAM_STR);

		if($pdo -> execute()){

			return true;

		}else{

			return false;

		}

		$pdo -> close();
		$pdo = null;


	}

}
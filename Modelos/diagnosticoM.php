<?php

require_once "conexionDB.php";

class DiagnosticoM extends ConexionBD{

	static public function VerDiagnosticosM($tablaBD, $id){

		$pdo = ConexionBD::cBD() -> prepare("SELECT * FROM $tablaBD WHERE id_paciente = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT); 

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();

		$pdo = null;

	}
}
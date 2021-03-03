<?php

require_once "conexionDB.php";

class TratamientosM extends ConexionBD{

	static public function VerTratamientosM($tablaBD, $id){

		$pdo = ConexionBD::cBD() -> prepare("SELECT * FROM $tablaBD WHERE id_paciente = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT); 

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();

		$pdo = null;

	}

	static public function VerDiagnosticosM($tablaBD, $id){

		$pdo = ConexionBD::cBD() -> prepare("SELECT * from $tablaBD where id_paciente = :id");
		
		//$pdo = ConexionBD::cBD() -> prepare("SELECT * FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT); 

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo -> close();

		$pdo = null;

	}

		static public function VerDiagnosticoDetalleM($tablaBD, $id){

		$pdo = ConexionBD::cBD() -> prepare("SELECT * FROM $tablaBD WHERE id_paciente = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT); 

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();

		$pdo = null;

	}


	
	static public function CrearTratamienetoM($tablaBD, $id_paciente){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO tratamientos (id_paciente, biometria, quimica_sanguinea, rayos_x, otros, planes_descripcion, fecha_apertura, fecha_control, profesional, codigo, firma, numero_hoja) VALUES ( :id_paciente, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, 0)");
		

		//$pdo = ConexionBD::cBD()->prepare("INSERT INTO tratamientos (id_paciente, diagnostico_y_complicaciones, procedimientos, fecha_tratamiento, prescripciones, codigo, firma) VALUES ( :id_paciente, 'DEFAULT', 'DEFAULT', 'DEFAULT', 'DEFAULT', 'DEFAULT', 'DEFAULT')");



		$pdo -> bindParam(":id_paciente", $id_paciente["id_paciente"], PDO::PARAM_INT);

		if($pdo -> execute()){
			return true;
		}

		//$pdo -> close();
		//$pdo = null;

	}

	static public function verTratamientoDetalleCountM($tablaBD, $id){

		$pdo = ConexionBD::cBD() -> prepare("SELECT id_paciente, count(id_paciente) as c from $tablaBD where id_paciente = :id");
		//$pdo = ConexionBD::cBD() -> prepare("SELECT * FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT); 

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();

		$pdo = null;

	}

	static public function verTratamientoDetalleM($tablaBD, $id){

		$pdo = ConexionBD::cBD() -> prepare("SELECT * from $tablaBD where id_paciente = :id");
		//$pdo = ConexionBD::cBD() -> prepare("SELECT * FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT); 

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo -> close();

		$pdo = null;

	}

	static public function crearTratamientoSesiontM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD(id_paciente, diagnostico_y_complicaciones, procedimientos, fecha_tratamiento, prescripciones, codigo , firma) VALUES(:id_paciente, :diagnostico_y_complicaciones, :procedimientos, :fecha_tratamiento, :prescripciones, :codigo, :firma)");

		//$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD(id_paciente, diagnostico_y_complicaciones, procedimientos, fecha_tratamiento, prescripciones, codigo , firma) VALUES(80, 'diagnostico_y_complicaciones', 'procedimientos', 'fecha_tratamiento', 'prescripciones', 'codigo', 'firma')");

		$pdo -> bindParam(":id_paciente", $datosC["id_paciente"], PDO::PARAM_INT);
		$pdo -> bindParam(":diagnostico_y_complicaciones", $datosC["diagnostico_y_complicaciones"], PDO::PARAM_STR);
		$pdo -> bindParam(":procedimientos", $datosC["procedimientos"], PDO::PARAM_STR);
		$pdo -> bindParam(":fecha_tratamiento", $datosC["fecha_tratamiento"], PDO::PARAM_STR);
		$pdo -> bindParam(":prescripciones", $datosC["prescripciones"], PDO::PARAM_STR);
		$pdo -> bindParam(":codigo", $datosC["codigo"], PDO::PARAM_STR);
		$pdo -> bindParam(":firma", $datosC["firma"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}

		//$pdo -> close();
		//$pdo = null;

	}


	static public function crearDiagnosticoM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD(id_paciente, diagnostico, cie, pre_def) VALUES(:id_paciente, :diagnostico, :cie, :pre_def)");

		//$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD(id_paciente, diagnostico_y_complicaciones, procedimientos, fecha_tratamiento, prescripciones, codigo , firma) VALUES(80, 'diagnostico_y_complicaciones', 'procedimientos', 'fecha_tratamiento', 'prescripciones', 'codigo', 'firma')");

		$pdo -> bindParam(":id_paciente", $datosC["id_paciente"], PDO::PARAM_INT);
		$pdo -> bindParam(":diagnostico", $datosC["diagnostico"], PDO::PARAM_STR);
		$pdo -> bindParam(":cie", $datosC["cie"], PDO::PARAM_STR);
		$pdo -> bindParam(":pre_def", $datosC["pre_def"], PDO::PARAM_STR);


		if($pdo -> execute()){
			return true;
		}

		//$pdo -> close();
		//$pdo = null;

	}

	//Borrar paciente

	static public function BorrarDiagnosticoM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}  

	static public function BorrarTratamientoSesionM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}  


	static public function ActualizarTratamientosM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET biometria = :biometria, quimica_sanguinea = :quimica_sanguinea, rayos_x = :rayos_x, otros = :otros, planes_descripcion = :planes_descripcion, fecha_apertura = :fecha_apertura, fecha_control = :fecha_control, profesional = :profesional, codigo = :codigo, firma = :firma  , numero_hoja = :numero_hoja WHERE id_paciente = :id");

		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);


		$pdo -> bindParam(":biometria", $datosC["biometria"], PDO::PARAM_INT);
		$pdo -> bindParam(":quimica_sanguinea", $datosC["quimica_sanguinea"], PDO::PARAM_INT);
		$pdo -> bindParam(":rayos_x", $datosC["rayos_x"], PDO::PARAM_INT);
		$pdo -> bindParam(":otros", $datosC["otros"], PDO::PARAM_INT);
		$pdo -> bindParam(":planes_descripcion", $datosC["planes_descripcion"], PDO::PARAM_STR);


		$pdo -> bindParam(":fecha_apertura", $datosC["fecha_apertura"], PDO::PARAM_STR);
		$pdo -> bindParam(":fecha_control", $datosC["fecha_control"], PDO::PARAM_STR);
		$pdo -> bindParam(":profesional", $datosC["profesional"], PDO::PARAM_STR);
		$pdo -> bindParam(":codigo", $datosC["codigo"], PDO::PARAM_STR);
		$pdo -> bindParam(":firma", $datosC["firma"], PDO::PARAM_STR);
		$pdo -> bindParam(":numero_hoja", $datosC["numero_hoja"], PDO::PARAM_STR);
		//$pdo -> bindParam(":planes_descripcion", $datosC["planes_descripcion"], PDO::PARAM_STR);



		if($pdo -> execute()){
			return true;
		}else{
			return false;
		}

		$pdo -> close();
		$pdo = null;

	}

	static public function ActualizarTratamientoSesionM($tablaBD, $datosC){

		//$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET diagnostico_y_complicaciones =  :diagnostico_y_complicaciones WHERE id = 14");


		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET diagnostico_y_complicaciones = :diagnostico_y_complicaciones, procedimientos = :procedimientos, fecha_tratamiento = :fecha_tratamiento, prescripciones = :prescripciones, codigo = :codigo, firma = :firma WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);

		//$pdo -> bindParam(":id_paciente", $datosC["id_paciente", PDO::PARAM_INT])
		$pdo -> bindParam(":diagnostico_y_complicaciones", $datosC["diagnostico_y_complicaciones"], PDO::PARAM_STR);
		$pdo -> bindParam(":procedimientos", $datosC["procedimientos"], PDO::PARAM_STR);
		$pdo -> bindParam(":fecha_tratamiento", $datosC["fecha_tratamiento"], PDO::PARAM_STR);
		$pdo -> bindParam(":prescripciones", $datosC["prescripciones"], PDO::PARAM_STR);
		$pdo -> bindParam(":codigo", $datosC["codigo"], PDO::PARAM_STR);
		$pdo -> bindParam(":firma", $datosC["firma"], PDO::PARAM_STR);



		if($pdo -> execute()){
			return true;
		}else{
			return false;
		}

		$pdo -> close();
		$pdo = null;

	}

	static public function ActualizarDiagnosticoM($tablaBD, $datosC){

		//$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET diagnostico_y_complicaciones =  :diagnostico_y_complicaciones WHERE id = 14");


		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET diagnostico = :diagnostico, cie = :cie, pre_def = :pre_def WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);

		//$pdo -> bindParam(":id_paciente", $datosC["id_paciente", PDO::PARAM_INT])
		$pdo -> bindParam(":diagnostico", $datosC["diagnostico"], PDO::PARAM_STR);
		$pdo -> bindParam(":cie", $datosC["cie"], PDO::PARAM_STR);
		$pdo -> bindParam(":pre_def", $datosC["pre_def"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}else{
			return false;
		}

		$pdo -> close();
		$pdo = null;

	}

	static public function VerTraramientoM($tablaBD, $id_tratamiento){

		$pdo = ConexionBD::cBD() -> prepare("SELECT * from $tablaBD where id = :id");
		//$pdo = ConexionBD::cBD() -> prepare("SELECT * FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id_tratamiento, PDO::PARAM_INT); 

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();

		$pdo = null;

	}


}
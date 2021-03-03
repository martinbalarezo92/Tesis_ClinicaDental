<?php 

class DiagnosticoC
{

	public function verDiagnosticosC()
	{

		$tablaBD = "diagnostico";

		$id = substr($_GET["url"], 13);

		$resultado = DiagnosticoM::VerDiagnosticosM($tablaBD, $id);		

		return $resultado;	

	}




	



}

?>
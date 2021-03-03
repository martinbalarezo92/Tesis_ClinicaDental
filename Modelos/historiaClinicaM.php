<?php

require_once "conexionDB.php";

class HistoriaClinicaM extends ConexionBD{

	static public function VerHistoriaClinicaM($tablaBD, $id){

		$pdo = ConexionBD::cBD() -> prepare("SELECT * FROM $tablaBD WHERE id_paciente = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT); 

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;

	}

	static public function CrearHistoriaClinicaM($tablaBD, $id_paciente){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO historiaclinicatest(establecimiento, id_paciente, nombre, apellido, sexo, edad, numero, menor_1_anio, 1_4_anios, 5_9_anios_prog, 5_14_anios_prog, 10_14_anios_prog, 5_a_19_anios, mayor_20_anios, embarazada, motivo_consulta, enfermedad_problema_actual, alergia_antibiotico, alergia_anestesia, hemorragias, vih_sida, tuberculosis, asma, diabetes, hipertension, enf_cardiaca, otro_antecedentes, especificaciones_antecedentes, presion_arterial, frecuencia_cardiaca, temperatura, f_respiratoria, observaciones_signos_vitales, labios, mejillas, maxilar_superior, maxilar_inferior, lengua, paladar, piso, carrillos, gandulas_salivales, oro_faringe, atm, ganglios, especificaciones_estomatognatico, observaciones_odontograma,l_sup_55, l_der_55, l_inf_55, l_izq_55, l_cen_55, l_sup_54, l_der_54, l_inf_54, l_izq_54, l_cen_54, l_sup_53, l_der_53, l_inf_53, l_izq_53, l_cen_53, l_sup_52, l_der_52, l_inf_52, l_cen_52, l_izq_52, l_sup_51, l_der_51, l_inf_51, l_izq_51, l_cen_51, l_sup_61, l_der_61, l_inf_61, l_izq_61, l_cen_61, l_sup_62, l_der_62, l_inf_62, l_izq_62, l_cen_62, l_sup_63, l_der_63, l_inf_63, l_izq_63, l_cen_63, l_sup_65, l_der_65, l_inf_65, l_izq_65, l_cen_65, l_sup_85, l_der_85, l_inf_85, l_izq_85, l_cen_85, l_sup_84, l_der_84, l_inf_84, l_izq_84, l_cen_84, l_sup_83, l_der_83, l_inf_83, l_izq_83, l_cen_83, l_sup_82, l_der_82, l_inf_82, l_izq_82, l_cen_82, l_sup_81, l_der_81, l_inf_81, l_izq_81, l_cen_81, l_sup_71, l_der_71, l_inf_71, l_izq_71, l_cen_71, l_sup_72, l_der_72, l_inf_72, l_izq_72, l_cen_72, l_sup_73, l_der_73, l_inf_73, l_izq_73, l_cen_73, l_sup_74, l_der_74, l_inf_74, l_izq_74, l_cen_74, l_sup_75, l_der_75, l_inf_75, l_izq_75, l_cen_75, l_sup_64, l_der_64, l_inf_64, l_izq_64, l_cen_64, v_sup_18, v_der_18, v_inf_18, v_izq_18, v_cen_18, v_sup_17, v_der_17, v_inf_17, v_izq_17, v_cen_17, v_sup_16, v_der_16, v_inf_16, v_izq_16, v_cen_16, v_sup_15, v_der_15, v_inf_15, v_izq_15, v_cen_15, v_sup_14, v_der_14, v_inf_14, v_izq_14, v_cen_14, v_sup_13, v_der_13, v_inf_13, v_izq_13, v_cen_13, v_sup_12, v_der_12, v_inf_12, v_izq_12, v_cen_12, v_sup_11, v_der_11, v_inf_11, v_izq_11, v_cen_11, v_sup_21, v_der_21, v_inf_21, v_izq_21, v_cen_21, v_sup_22, v_der_22, v_inf_22, v_izq_22, v_cen_22, v_sup_23, v_der_23, v_inf_23, v_izq_23, v_cen_23, v_sup_24, v_der_24, v_inf_24, v_izq_24, v_cen_24, v_sup_25, v_der_25, v_inf_25, v_izq_25, v_cen_25, v_sup_26, v_der_26, v_inf_26, v_izq_26, v_cen_26, v_sup_27, v_der_27, v_inf_27, v_izq_27, v_cen_27, v_sup_28, v_der_28, v_inf_28, v_izq_28, v_cen_28, v_sup_48, v_der_48, v_inf_48, v_izq_48, v_cen_48, v_sup_47, v_der_47, v_inf_47, v_izq_47, v_cen_47, v_sup_46, v_der_46, v_inf_46, v_izq_46, v_cen_46, v_sup_45, v_der_45, v_inf_45, v_izq_45, v_cen_45, v_sup_44, v_der_44, v_inf_44, v_izq_44, v_cen_44, v_sup_43, v_der_43, v_inf_43, v_izq_43, v_cen_43, v_sup_42, v_der_42, v_inf_42, v_izq_42, v_cen_42, v_sup_41, v_der_41, v_inf_41, v_izq_41, v_cen_41, v_sup_31, v_der_31, v_inf_31, v_izq_31, v_cen_31, v_sup_32, v_der_32, v_inf_32, v_izq_32, v_cen_32, v_sup_33, v_der_33, v_inf_33, v_izq_33, v_cen_33, v_sup_34, v_der_34, v_inf_34, v_izq_34, v_cen_34, v_sup_35, v_der_35, v_inf_35, v_izq_35, v_cen_35, v_sup_36, v_der_36, v_inf_36, v_izq_36, v_cen_36, v_sup_37, v_der_37, v_inf_37, v_izq_37, v_cen_37, v_sup_38, v_der_38, v_inf_38, v_izq_38, v_cen_38, recesion_1_01, recesion_1_02, recesion_1_03, recesion_1_04, recesion_1_05, recesion_1_06, recesion_1_07, recesion_1_08, recesion_1_09, recesion_1_10, recesion_1_11, recesion_1_12, recesion_1_13, recesion_1_14, recesion_1_15, recesion_1_16, recesion_2_01, recesion_2_02, recesion_2_03, recesion_2_04, recesion_2_05, recesion_2_06, recesion_2_07, recesion_2_08, recesion_2_09, recesion_2_10, recesion_2_11, recesion_2_12, recesion_2_13, recesion_2_14, recesion_2_15, recesion_2_16, movilidad_1_01, movilidad_1_02, movilidad_1_03, movilidad_1_04, movilidad_1_05, movilidad_1_06, movilidad_1_07, movilidad_1_08, movilidad_1_09, movilidad_1_10, movilidad_1_11, movilidad_1_12, movilidad_1_13, movilidad_1_14, movilidad_1_15, movilidad_1_16, movilidad_2_01, movilidad_2_02, movilidad_2_03, movilidad_2_04, movilidad_2_05, movilidad_2_06, movilidad_2_07, movilidad_2_08, movilidad_2_09, movilidad_2_10, movilidad_2_11, movilidad_2_12, movilidad_2_13, movilidad_2_14, movilidad_2_15, movilidad_2_16, pieza_dental_16, pieza_dental_17, pieza_dental_55, pieza_dental_11, pieza_dental_21, pieza_dental_51, pieza_dental_26, pieza_dental_27, pieza_dental_65, pieza_dental_36, pieza_dental_37, pieza_dental_75, pieza_dental_31, pieza_dental_41, pieza_dental_71, pieza_dental_46, pieza_dental_47, pieza_dental_85, placa_01, placa_02, placa_03, placa_04, placa_05, placa_06, placa_total, calculo_01, calculo_02, calculo_03, calculo_04, calculo_05, calculo_06, calculo_total, gingivitis_01, gingivitis_02, gingivitis_03, gingivitis_04, gingivitis_05, gingivitis_06, gingivitis_total, enf_periodontal_leve, enf_periodontal_moderada, enf_periodontal_severa, mal_oclusion_angleI, mal_oclusion_angleII, mal_oclusion_angleIII, fluorosis_leve, fluorosis_moderada, fluorosis_severa, indices_CPO_C, indices_CPO_P, indices_CPO_O, indices_ceo_c, indices_ceo_e, indices_ceo_o ) VALUES (DEFAULT, :id_paciente, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, 0, 0, 0, 0, 0, 0, 0, 0, DEFAULT, DEFAULT, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, DEFAULT, DEFAULT,'#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', '#9e978e', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)");
		
		$pdo -> bindParam(":id_paciente", $id_paciente["id_paciente"], PDO::PARAM_INT);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}

	static public function ActualizarHistoriaClinicaM($tablaBD, $datosC){

	//$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET establecimiento = :establecimiento, nombre = :nombre, apellido = :apellido, WHERE id = :id");
		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET establecimiento = :establecimiento, sexo = :sexo, edad = :edad, numero = :numero, menor_1_anio = :EE1, 1_4_anios = :EE2, 5_9_anios_prog = :EE3, 5_14_anios_prog = :EE4, 10_14_anios_prog = :EE5, 5_a_19_anios = :EE6, mayor_20_anios = :EE7, embarazada = :EE8, motivo_consulta = :motivo_consulta, enfermedad_problema_actual = :enfermedad_problema_actual, alergia_antibiotico = :EPA1, alergia_anestesia = :EPA2, hemorragias = :EPA3, vih_sida = :EPA4, tuberculosis = :EPA5, asma = :EPA6, diabetes = :EPA7, hipertension = :EPA8, enf_cardiaca = :EPA9, otro_antecedentes = :EPA10, especificaciones_antecedentes = :hc_epa_descripcion, presion_arterial = :presion_arterial, frecuencia_cardiaca = :frecuencia_cardiaca, temperatura = :temperatura, f_respiratoria = :f_respiratoria, observaciones_signos_vitales = :observaciones_signos_vitales, labios = :ESE1,  mejillas = :ESE2 , maxilar_superior = :ESE3 ,  maxilar_inferior = :ESE4 , lengua  = :ESE5 , paladar  = :ESE6 , piso  = :ESE7 , carrillos  = :ESE8 ,  gandulas_salivales = :ESE9 ,  oro_faringe   = :ESE10 ,atm = :ESE11 , ganglios = :ESE12 , especificaciones_estomatognatico = :especificaciones_estomatognatico,observaciones_odontograma = :observaciones_odontograma, recesion_1_01 = :recesion_1_01, recesion_1_02 = :recesion_1_02, recesion_1_03 = :recesion_1_03, recesion_1_04 = :recesion_1_04, recesion_1_05 = :recesion_1_05, recesion_1_06 = :recesion_1_06, recesion_1_07 = :recesion_1_07, recesion_1_08 = :recesion_1_08, recesion_1_09 = :recesion_1_09, recesion_1_10 = :recesion_1_10, recesion_1_11 = :recesion_1_11, recesion_1_12 = :recesion_1_12, recesion_1_13 = :recesion_1_13, recesion_1_14 = :recesion_1_14, recesion_1_15 = :recesion_1_15, recesion_1_16 = :recesion_1_16, recesion_2_01 = :recesion_2_01, recesion_2_02 = :recesion_2_02, recesion_2_03 = :recesion_2_03, recesion_2_04 = :recesion_2_04, recesion_2_05 = :recesion_2_05, recesion_2_06 = :recesion_2_06, recesion_2_07 = :recesion_2_07, recesion_2_08 = :recesion_2_08, recesion_2_09 = :recesion_2_09, recesion_2_10 = :recesion_2_10, recesion_2_11 = :recesion_2_11, recesion_2_12 = :recesion_2_12, recesion_2_13 = :recesion_2_13, recesion_2_14 = :recesion_2_14, recesion_2_15 = :recesion_2_15, recesion_2_16 = :recesion_2_16, movilidad_1_01 = :movilidad_1_01, movilidad_1_02 = :movilidad_1_02, movilidad_1_03 = :movilidad_1_03, movilidad_1_04 = :movilidad_1_04, movilidad_1_05 = :movilidad_1_05, movilidad_1_06 = :movilidad_1_06, movilidad_1_07 = :movilidad_1_07, movilidad_1_08 = :movilidad_1_08, movilidad_1_09 = :movilidad_1_09, movilidad_1_10 = :movilidad_1_10, movilidad_1_11 = :movilidad_1_11, movilidad_1_12 = :movilidad_1_12, movilidad_1_13 = :movilidad_1_13, movilidad_1_14 = :movilidad_1_14, movilidad_1_15 = :movilidad_1_15, movilidad_1_16 = :movilidad_1_16, movilidad_2_01 = :movilidad_2_01, movilidad_2_02 = :movilidad_2_02, movilidad_2_03 = :movilidad_2_03, movilidad_2_04 = :movilidad_2_04, movilidad_2_05 = :movilidad_2_05, movilidad_2_06 = :movilidad_2_06, movilidad_2_07 = :movilidad_2_07, movilidad_2_08 = :movilidad_2_08, movilidad_2_09 = :movilidad_2_09, movilidad_2_10 = :movilidad_2_10, movilidad_2_11 = :movilidad_2_11, movilidad_2_12 = :movilidad_2_12, movilidad_2_13 = :movilidad_2_13, movilidad_2_14 = :movilidad_2_14, movilidad_2_15 = :movilidad_2_15, movilidad_2_16 = :movilidad_2_16,      v_sup_18 = :hc_v_sup_18, v_der_18 = :hc_v_der_18, v_inf_18 = :hc_v_inf_18, v_izq_18 = :hc_v_izq_18, v_cen_18 = :hc_v_cen_18, v_sup_17 = :hc_v_sup_17, v_der_17 = :hc_v_der_17, v_inf_17 = :hc_v_inf_17, v_izq_17 = :hc_v_izq_17, v_cen_17 = :hc_v_cen_17, v_sup_16 = :hc_v_sup_16, v_der_16 = :hc_v_der_16, v_inf_16 = :hc_v_inf_16, v_izq_16 = :hc_v_izq_16, v_cen_16 = :hc_v_cen_16, v_sup_15 = :hc_v_sup_15, v_der_15 = :hc_v_der_15, v_inf_15 = :hc_v_inf_15, v_izq_15 = :hc_v_izq_15, v_cen_15 = :hc_v_cen_15, v_sup_14 = :hc_v_sup_14, v_der_14 = :hc_v_der_14, v_inf_14 = :hc_v_inf_14, v_izq_14 = :hc_v_izq_14, v_cen_14 = :hc_v_cen_14, v_sup_13 = :hc_v_sup_13, v_der_13 = :hc_v_der_13, v_inf_13 = :hc_v_inf_13, v_izq_13 = :hc_v_izq_13, v_cen_13 = :hc_v_cen_13, v_sup_12 = :hc_v_sup_12, v_der_12 = :hc_v_der_12, v_inf_12 = :hc_v_inf_12, v_izq_12 = :hc_v_izq_12, v_cen_12 = :hc_v_cen_12, v_sup_11 = :hc_v_sup_11, v_der_11 = :hc_v_der_11, v_inf_11 = :hc_v_inf_11, v_izq_11 = :hc_v_izq_11, v_cen_11 = :hc_v_cen_11, v_sup_21 = :hc_v_sup_21, v_der_21 = :hc_v_der_21, v_inf_21 = :hc_v_inf_21, v_izq_21 = :hc_v_izq_21, v_cen_21 = :hc_v_cen_21, v_sup_22 = :hc_v_sup_22, v_der_22 = :hc_v_der_22, v_inf_22 = :hc_v_inf_22, v_izq_22 = :hc_v_izq_22, v_cen_22 = :hc_v_cen_22, v_sup_23 = :hc_v_sup_23, v_der_23 = :hc_v_der_23, v_inf_23 = :hc_v_inf_23, v_izq_23 = :hc_v_izq_23, v_cen_23 = :hc_v_cen_23, v_sup_24 = :hc_v_sup_24, v_der_24 = :hc_v_der_24, v_inf_24 = :hc_v_inf_24, v_izq_24 = :hc_v_izq_24, v_cen_24 = :hc_v_cen_24, v_sup_25 = :hc_v_sup_25, v_der_25 = :hc_v_der_25, v_inf_25 = :hc_v_inf_25, v_izq_25 = :hc_v_izq_25, v_cen_25 = :hc_v_cen_25, v_sup_26 = :hc_v_sup_26, v_der_26 = :hc_v_der_26, v_inf_26 = :hc_v_inf_26, v_izq_26 = :hc_v_izq_26, v_cen_26 = :hc_v_cen_26, v_sup_27 = :hc_v_sup_27, v_der_27 = :hc_v_der_27, v_inf_27 = :hc_v_inf_27, v_izq_27 = :hc_v_izq_27, v_cen_27 = :hc_v_cen_27, v_sup_28 = :hc_v_sup_28, v_der_28 = :hc_v_der_28, v_inf_28 = :hc_v_inf_28, v_izq_28 = :hc_v_izq_28, v_cen_28 = :hc_v_cen_28, v_sup_48 = :hc_v_sup_48, v_der_48 = :hc_v_der_48, v_inf_48 = :hc_v_inf_48, v_izq_48 = :hc_v_izq_48, v_cen_48 = :hc_v_cen_48, v_sup_47 = :hc_v_sup_47, v_der_47 = :hc_v_der_47, v_inf_47 = :hc_v_inf_47, v_izq_47 = :hc_v_izq_47, v_cen_47 = :hc_v_cen_47, v_sup_46 = :hc_v_sup_46, v_der_46 = :hc_v_der_46, v_inf_46 = :hc_v_inf_46, v_izq_46 = :hc_v_izq_46, v_cen_46 = :hc_v_cen_46, v_sup_45 = :hc_v_sup_45, v_der_45 = :hc_v_der_45, v_inf_45 = :hc_v_inf_45, v_izq_45 = :hc_v_izq_45, v_cen_45 = :hc_v_cen_45, v_sup_44 = :hc_v_sup_44, v_der_44 = :hc_v_der_44, v_inf_44 = :hc_v_inf_44, v_izq_44 = :hc_v_izq_44, v_cen_44 = :hc_v_cen_44, v_sup_43 = :hc_v_sup_43, v_der_43 = :hc_v_der_43, v_inf_43 = :hc_v_inf_43, v_izq_43 = :hc_v_izq_43, v_cen_43 = :hc_v_cen_43, v_sup_42 = :hc_v_sup_42, v_der_42 = :hc_v_der_42, v_inf_42 = :hc_v_inf_42, v_izq_42 = :hc_v_izq_42, v_cen_42 = :hc_v_cen_42, v_sup_41 = :hc_v_sup_41, v_der_41 = :hc_v_der_41, v_inf_41 = :hc_v_inf_41, v_izq_41 = :hc_v_izq_41, v_cen_41 = :hc_v_cen_41, v_sup_31 = :hc_v_sup_31, v_der_31 = :hc_v_der_31, v_inf_31 = :hc_v_inf_31, v_izq_31 = :hc_v_izq_31, v_cen_31 = :hc_v_cen_31, v_sup_32 = :hc_v_sup_32, v_der_32 = :hc_v_der_32, v_inf_32 = :hc_v_inf_32, v_izq_32 = :hc_v_izq_32, v_cen_32 = :hc_v_cen_32, v_sup_33 = :hc_v_sup_33, v_der_33 = :hc_v_der_33, v_inf_33 = :hc_v_inf_33, v_izq_33 = :hc_v_izq_33, v_cen_33 = :hc_v_cen_33, v_sup_34 = :hc_v_sup_34, v_der_34 = :hc_v_der_34, v_inf_34 = :hc_v_inf_34, v_izq_34 = :hc_v_izq_34, v_cen_34 = :hc_v_cen_34, v_sup_35 = :hc_v_sup_35, v_der_35 = :hc_v_der_35, v_inf_35 = :hc_v_inf_35, v_izq_35 = :hc_v_izq_35, v_cen_35 = :hc_v_cen_35, v_sup_36 = :hc_v_sup_36, v_der_36 = :hc_v_der_36, v_inf_36 = :hc_v_inf_36, v_izq_36 = :hc_v_izq_36, v_cen_36 = :hc_v_cen_36, v_sup_37 = :hc_v_sup_37, v_der_37 = :hc_v_der_37, v_inf_37 = :hc_v_inf_37, v_izq_37 = :hc_v_izq_37, v_cen_37 = :hc_v_cen_37, v_sup_38 = :hc_v_sup_38, v_der_38 = :hc_v_der_38, v_inf_38 = :hc_v_inf_38, v_izq_38 = :hc_v_izq_38, v_cen_38 = :hc_v_cen_38, l_sup_55 = :hc_l_sup_55, l_der_55 = :hc_l_der_55, l_inf_55 = :hc_l_inf_55, l_izq_55 = :hc_l_izq_55, l_cen_55 = :hc_l_cen_55, l_sup_54 = :hc_l_sup_54, l_der_54 = :hc_l_der_54, l_inf_54 = :hc_l_inf_54, l_izq_54 = :hc_l_izq_54, l_cen_54 = :hc_l_cen_54, l_sup_53 = :hc_l_sup_53, l_der_53 = :hc_l_der_53, l_inf_53 = :hc_l_inf_53, l_izq_53 = :hc_l_izq_53, l_cen_53 = :hc_l_cen_53, l_sup_52 = :hc_l_sup_52, l_der_52 = :hc_l_der_52, l_inf_52 = :hc_l_inf_52, l_izq_52 = :hc_l_izq_52, l_cen_52 = :hc_l_cen_52, l_sup_51 = :hc_l_sup_51, l_der_51 = :hc_l_der_51, l_inf_51 = :hc_l_inf_51, l_izq_51 = :hc_l_izq_51, l_cen_51 = :hc_l_cen_51, l_sup_61 = :hc_l_sup_61, l_der_61 = :hc_l_der_61, l_inf_61 = :hc_l_inf_61, l_izq_61 = :hc_l_izq_61, l_cen_61 = :hc_l_cen_61, l_sup_62 = :hc_l_sup_62, l_der_62 = :hc_l_der_62, l_inf_62 = :hc_l_inf_62, l_izq_62 = :hc_l_izq_62, l_cen_62 = :hc_l_cen_62, l_sup_63 = :hc_l_sup_63, l_der_63 = :hc_l_der_63, l_inf_63 = :hc_l_inf_63, l_izq_63 = :hc_l_izq_63, l_cen_63 = :hc_l_cen_63, l_sup_64 = :hc_l_sup_64, l_der_64 = :hc_l_der_64, l_inf_64 = :hc_l_inf_64, l_izq_64 = :hc_l_izq_64, l_cen_64 = :hc_l_cen_64, l_sup_65 = :hc_l_sup_65, l_der_65 = :hc_l_der_65, l_inf_65 = :hc_l_inf_65, l_izq_65 = :hc_l_izq_65, l_cen_65 = :hc_l_cen_65, l_sup_85 = :hc_l_sup_85, l_der_85 = :hc_l_der_85, l_inf_85 = :hc_l_inf_85, l_izq_85 = :hc_l_izq_85, l_cen_85 = :hc_l_cen_85, l_sup_84 = :hc_l_sup_84, l_der_84 = :hc_l_der_84, l_inf_84 = :hc_l_inf_84, l_izq_84 = :hc_l_izq_84, l_cen_84 = :hc_l_cen_84, l_sup_83 = :hc_l_sup_83, l_der_83 = :hc_l_der_83, l_inf_83 = :hc_l_inf_83, l_izq_83 = :hc_l_izq_83, l_cen_83 = :hc_l_cen_83, l_sup_82 = :hc_l_sup_82, l_der_82 = :hc_l_der_82, l_inf_82 = :hc_l_inf_82, l_izq_82 = :hc_l_izq_82, l_cen_82 = :hc_l_cen_82, l_sup_81 = :hc_l_sup_81, l_der_81 = :hc_l_der_81, l_inf_81 = :hc_l_inf_81, l_izq_81 = :hc_l_izq_81, l_cen_81 = :hc_l_cen_81, l_sup_71 = :hc_l_sup_71, l_der_71 = :hc_l_der_71, l_inf_71 = :hc_l_inf_71, l_izq_71 = :hc_l_izq_71, l_cen_71 = :hc_l_cen_71, l_sup_72 = :hc_l_sup_72, l_der_72 = :hc_l_der_72, l_inf_72 = :hc_l_inf_72, l_izq_72 = :hc_l_izq_72, l_cen_72 = :hc_l_cen_72, l_sup_73 = :hc_l_sup_73, l_der_73 = :hc_l_der_73, l_inf_73 = :hc_l_inf_73, l_izq_73 = :hc_l_izq_73, l_cen_73 = :hc_l_cen_73, l_sup_74 = :hc_l_sup_74, l_der_74 = :hc_l_der_74, l_inf_74 = :hc_l_inf_74, l_izq_74 = :hc_l_izq_74, l_cen_74 = :hc_l_cen_74, l_sup_75 = :hc_l_sup_75, l_der_75 = :hc_l_der_75, l_inf_75 = :hc_l_inf_75, l_izq_75 = :hc_l_izq_75, l_cen_75 = :hc_l_cen_75, pieza_dental_16 = :isb_pd16, pieza_dental_17 = :isb_pd17, pieza_dental_55 = :isb_pd55, pieza_dental_11 = :isb_pd11, pieza_dental_21 = :isb_pd21, pieza_dental_51 = :isb_pd51, pieza_dental_26 = :isb_pd26, pieza_dental_27 = :isb_pd27, pieza_dental_65 = :isb_pd65, pieza_dental_36 = :isb_pd36, pieza_dental_37 = :isb_pd37, pieza_dental_75 = :isb_pd75, pieza_dental_31 = :isb_pd31, pieza_dental_41 = :isb_pd41, pieza_dental_71 = :isb_pd71, pieza_dental_46 = :isb_pd46, pieza_dental_47 = :isb_pd47, pieza_dental_85 = :isb_pd85, placa_01 = :placa_01, placa_02 = :placa_02, placa_03 = :placa_03, placa_04 = :placa_04, placa_05 = :placa_05, placa_06 = :placa_06, calculo_01 = :calculo_01, calculo_02 = :calculo_02, calculo_03 = :calculo_03, calculo_04 = :calculo_04, calculo_05 = :calculo_05, calculo_06 = :calculo_06, gingivitis_01 = :gingivitis_01, gingivitis_02 = :gingivitis_02, gingivitis_03 = :gingivitis_03, gingivitis_04 = :gingivitis_04, gingivitis_05 = :gingivitis_05, gingivitis_06 = :gingivitis_06, enf_periodontal_leve = :enf_periodontal_leve, enf_periodontal_moderada = :enf_periodontal_moderada, enf_periodontal_severa = :enf_periodontal_severa, mal_oclusion_angleI = :mal_oclusion_angleI, mal_oclusion_angleII = :mal_oclusion_angleII, mal_oclusion_angleIII = :mal_oclusion_angleIII, fluorosis_leve = :fluorosis_leve, fluorosis_moderada = :fluorosis_moderada, fluorosis_severa = :fluorosis_severa, indices_CPO_C = :indices_CPO_C, indices_CPO_P = :indices_CPO_P, indices_CPO_O = :indices_CPO_O, indices_ceo_c = :indices_ceo_c, indices_ceo_e = :indices_ceo_e, indices_ceo_o = :indices_ceo_o WHERE id_paciente = :id");

		$pdo -> bindParam("id", $datosC["id"], PDO::PARAM_INT);

	//DATOS PERSONALES
		$pdo -> bindParam(":establecimiento", $datosC["establecimiento"], PDO::PARAM_STR);
		$pdo -> bindParam(":sexo", $datosC["sexo"], PDO::PARAM_STR);
		$pdo -> bindParam(":edad", $datosC["edad"], PDO::PARAM_INT);
		$pdo -> bindParam(":numero", $datosC["numero"], PDO::PARAM_STR);


	//EDAD ESTIMADA
		$pdo -> bindParam(":EE1", $datosC["EE1"], PDO::PARAM_INT);
		$pdo -> bindParam(":EE2", $datosC["EE2"], PDO::PARAM_INT);
		$pdo -> bindParam(":EE3", $datosC["EE3"], PDO::PARAM_INT);
		$pdo -> bindParam(":EE4", $datosC["EE4"], PDO::PARAM_INT);
		$pdo -> bindParam(":EE5", $datosC["EE5"], PDO::PARAM_INT);
		$pdo -> bindParam(":EE6", $datosC["EE6"], PDO::PARAM_INT);
		$pdo -> bindParam(":EE7", $datosC["EE7"], PDO::PARAM_INT);
		$pdo -> bindParam(":EE8", $datosC["EE8"], PDO::PARAM_INT);

	//1 Motivo Consulta
		$pdo -> bindParam(":motivo_consulta", $datosC["hc-motivoConsulta"], PDO::PARAM_STR);

	//2 Enfermedad o Problema Actual
		$pdo -> bindParam(":enfermedad_problema_actual", $datosC["hc-enfermedad_problema_actual"], PDO::PARAM_STR);

	//3 ANTECEDENTES PERSONALES Y FAMILIARES
		$pdo -> bindParam(":EPA1", $datosC["EPA1"], PDO::PARAM_STR);
		$pdo -> bindParam(":EPA2", $datosC["EPA2"], PDO::PARAM_STR);
		$pdo -> bindParam(":EPA3", $datosC["EPA3"], PDO::PARAM_STR);
		$pdo -> bindParam(":EPA4", $datosC["EPA4"], PDO::PARAM_STR);
		$pdo -> bindParam(":EPA5", $datosC["EPA5"], PDO::PARAM_STR);
		$pdo -> bindParam(":EPA6", $datosC["EPA6"], PDO::PARAM_STR);
		$pdo -> bindParam(":EPA7", $datosC["EPA7"], PDO::PARAM_STR);
		$pdo -> bindParam(":EPA8", $datosC["EPA8"], PDO::PARAM_STR);
		$pdo -> bindParam(":EPA9", $datosC["EPA9"], PDO::PARAM_STR);
		$pdo -> bindParam(":EPA10", $datosC["EPA10"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_epa_descripcion", $datosC["hc_epa_descripcion"], PDO::PARAM_STR);

	//4 SIGNOS VITALES
		$pdo -> bindParam(":presion_arterial", $datosC["presion_arterial"], PDO::PARAM_STR);
		$pdo -> bindParam(":frecuencia_cardiaca", $datosC["frecuencia_cardiaca"], PDO::PARAM_STR);
		$pdo -> bindParam(":temperatura", $datosC["temperatura"], PDO::PARAM_STR);
		$pdo -> bindParam(":f_respiratoria", $datosC["f_respiratoria"], PDO::PARAM_STR);
		$pdo -> bindParam(":observaciones_signos_vitales", $datosC["observaciones_signos_vitales"], PDO::PARAM_STR);

	//5 EXAMEN DEL SISTEMA ESTOMATOGNÁTICO 
		$pdo -> bindParam(":ESE1", $datosC["ESE1"], PDO::PARAM_INT);
		$pdo -> bindParam(":ESE2", $datosC["ESE2"], PDO::PARAM_INT);
		$pdo -> bindParam(":ESE3", $datosC["ESE3"], PDO::PARAM_INT);
		$pdo -> bindParam(":ESE4", $datosC["ESE4"], PDO::PARAM_INT);
		$pdo -> bindParam(":ESE5", $datosC["ESE5"], PDO::PARAM_INT);
		$pdo -> bindParam(":ESE6", $datosC["ESE6"], PDO::PARAM_INT);
		$pdo -> bindParam(":ESE7", $datosC["ESE7"], PDO::PARAM_INT);
		$pdo -> bindParam(":ESE8", $datosC["ESE8"], PDO::PARAM_INT);
		$pdo -> bindParam(":ESE9", $datosC["ESE9"], PDO::PARAM_INT);
		$pdo -> bindParam(":ESE10", $datosC["ESE10"], PDO::PARAM_INT);
		$pdo -> bindParam(":ESE11", $datosC["ESE11"], PDO::PARAM_INT);
		$pdo -> bindParam(":ESE12", $datosC["ESE12"], PDO::PARAM_INT);
		$pdo -> bindParam(":especificaciones_estomatognatico", $datosC["especificaciones_estomatognatico"], PDO::PARAM_STR);

	//6 ODONTOGRAMA
		//recesion

		$pdo -> bindParam(":observaciones_odontograma", $datosC["observaciones_odontograma"], PDO::PARAM_STR);

		$pdo -> bindParam(":recesion_1_01", $datosC["recesion_1_01"], PDO::PARAM_INT);
		$pdo -> bindParam(":recesion_1_02", $datosC["recesion_1_02"], PDO::PARAM_INT);
		$pdo -> bindParam(":recesion_1_03", $datosC["recesion_1_03"], PDO::PARAM_INT);
		$pdo -> bindParam(":recesion_1_04", $datosC["recesion_1_04"], PDO::PARAM_INT);
		$pdo -> bindParam(":recesion_1_05", $datosC["recesion_1_05"], PDO::PARAM_INT);
		$pdo -> bindParam(":recesion_1_06", $datosC["recesion_1_06"], PDO::PARAM_INT);
		$pdo -> bindParam(":recesion_1_07", $datosC["recesion_1_07"], PDO::PARAM_INT);
		$pdo -> bindParam(":recesion_1_08", $datosC["recesion_1_08"], PDO::PARAM_INT);
		$pdo -> bindParam(":recesion_1_09", $datosC["recesion_1_09"], PDO::PARAM_INT);
		$pdo -> bindParam(":recesion_1_10", $datosC["recesion_1_10"], PDO::PARAM_INT);
		$pdo -> bindParam(":recesion_1_11", $datosC["recesion_1_11"], PDO::PARAM_INT);
		$pdo -> bindParam(":recesion_1_12", $datosC["recesion_1_12"], PDO::PARAM_INT);
		$pdo -> bindParam(":recesion_1_13", $datosC["recesion_1_13"], PDO::PARAM_INT);
		$pdo -> bindParam(":recesion_1_14", $datosC["recesion_1_14"], PDO::PARAM_INT);
		$pdo -> bindParam(":recesion_1_15", $datosC["recesion_1_15"], PDO::PARAM_INT);
		$pdo -> bindParam(":recesion_1_16", $datosC["recesion_1_16"], PDO::PARAM_INT);

		$pdo -> bindParam(":recesion_2_01", $datosC["recesion_2_01"], PDO::PARAM_INT);
		$pdo -> bindParam(":recesion_2_02", $datosC["recesion_2_02"], PDO::PARAM_INT);
		$pdo -> bindParam(":recesion_2_03", $datosC["recesion_2_03"], PDO::PARAM_INT);
		$pdo -> bindParam(":recesion_2_04", $datosC["recesion_2_04"], PDO::PARAM_INT);
		$pdo -> bindParam(":recesion_2_05", $datosC["recesion_2_05"], PDO::PARAM_INT);
		$pdo -> bindParam(":recesion_2_06", $datosC["recesion_2_06"], PDO::PARAM_INT);
		$pdo -> bindParam(":recesion_2_07", $datosC["recesion_2_07"], PDO::PARAM_INT);
		$pdo -> bindParam(":recesion_2_08", $datosC["recesion_2_08"], PDO::PARAM_INT);
		$pdo -> bindParam(":recesion_2_09", $datosC["recesion_2_09"], PDO::PARAM_INT);
		$pdo -> bindParam(":recesion_2_10", $datosC["recesion_2_10"], PDO::PARAM_INT);
		$pdo -> bindParam(":recesion_2_11", $datosC["recesion_2_11"], PDO::PARAM_INT);
		$pdo -> bindParam(":recesion_2_12", $datosC["recesion_2_12"], PDO::PARAM_INT);
		$pdo -> bindParam(":recesion_2_13", $datosC["recesion_2_13"], PDO::PARAM_INT);
		$pdo -> bindParam(":recesion_2_14", $datosC["recesion_2_14"], PDO::PARAM_INT);
		$pdo -> bindParam(":recesion_2_15", $datosC["recesion_2_15"], PDO::PARAM_INT);
		$pdo -> bindParam(":recesion_2_16", $datosC["recesion_2_16"], PDO::PARAM_INT);

		//movilidad
		$pdo -> bindParam(":movilidad_1_01", $datosC["movilidad_1_01"], PDO::PARAM_INT);
		$pdo -> bindParam(":movilidad_1_02", $datosC["movilidad_1_02"], PDO::PARAM_INT);
		$pdo -> bindParam(":movilidad_1_03", $datosC["movilidad_1_03"], PDO::PARAM_INT);
		$pdo -> bindParam(":movilidad_1_04", $datosC["movilidad_1_04"], PDO::PARAM_INT);
		$pdo -> bindParam(":movilidad_1_05", $datosC["movilidad_1_05"], PDO::PARAM_INT);
		$pdo -> bindParam(":movilidad_1_06", $datosC["movilidad_1_06"], PDO::PARAM_INT);
		$pdo -> bindParam(":movilidad_1_07", $datosC["movilidad_1_07"], PDO::PARAM_INT);
		$pdo -> bindParam(":movilidad_1_08", $datosC["movilidad_1_08"], PDO::PARAM_INT);
		$pdo -> bindParam(":movilidad_1_09", $datosC["movilidad_1_09"], PDO::PARAM_INT);
		$pdo -> bindParam(":movilidad_1_10", $datosC["movilidad_1_10"], PDO::PARAM_INT);
		$pdo -> bindParam(":movilidad_1_11", $datosC["movilidad_1_11"], PDO::PARAM_INT);
		$pdo -> bindParam(":movilidad_1_12", $datosC["movilidad_1_12"], PDO::PARAM_INT);
		$pdo -> bindParam(":movilidad_1_13", $datosC["movilidad_1_13"], PDO::PARAM_INT);
		$pdo -> bindParam(":movilidad_1_14", $datosC["movilidad_1_14"], PDO::PARAM_INT);
		$pdo -> bindParam(":movilidad_1_15", $datosC["movilidad_1_15"], PDO::PARAM_INT);
		$pdo -> bindParam(":movilidad_1_16", $datosC["movilidad_1_16"], PDO::PARAM_INT);

		$pdo -> bindParam(":movilidad_2_01", $datosC["movilidad_2_01"], PDO::PARAM_INT);
		$pdo -> bindParam(":movilidad_2_02", $datosC["movilidad_2_02"], PDO::PARAM_INT);
		$pdo -> bindParam(":movilidad_2_03", $datosC["movilidad_2_03"], PDO::PARAM_INT);
		$pdo -> bindParam(":movilidad_2_04", $datosC["movilidad_2_04"], PDO::PARAM_INT);
		$pdo -> bindParam(":movilidad_2_05", $datosC["movilidad_2_05"], PDO::PARAM_INT);
		$pdo -> bindParam(":movilidad_2_06", $datosC["movilidad_2_06"], PDO::PARAM_INT);
		$pdo -> bindParam(":movilidad_2_07", $datosC["movilidad_2_07"], PDO::PARAM_INT);
		$pdo -> bindParam(":movilidad_2_08", $datosC["movilidad_2_08"], PDO::PARAM_INT);
		$pdo -> bindParam(":movilidad_2_09", $datosC["movilidad_2_09"], PDO::PARAM_INT);
		$pdo -> bindParam(":movilidad_2_10", $datosC["movilidad_2_10"], PDO::PARAM_INT);
		$pdo -> bindParam(":movilidad_2_11", $datosC["movilidad_2_11"], PDO::PARAM_INT);
		$pdo -> bindParam(":movilidad_2_12", $datosC["movilidad_2_12"], PDO::PARAM_INT);
		$pdo -> bindParam(":movilidad_2_13", $datosC["movilidad_2_13"], PDO::PARAM_INT);
		$pdo -> bindParam(":movilidad_2_14", $datosC["movilidad_2_14"], PDO::PARAM_INT);
		$pdo -> bindParam(":movilidad_2_15", $datosC["movilidad_2_15"], PDO::PARAM_INT);
		$pdo -> bindParam(":movilidad_2_16", $datosC["movilidad_2_16"], PDO::PARAM_INT);



	// VESTIBULARES
	// VESTIBULAR 18
		$pdo -> bindParam(":hc_v_sup_18", $datosC["hc_v_sup_18"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_der_18", $datosC["hc_v_der_18"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_inf_18", $datosC["hc_v_inf_18"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_izq_18", $datosC["hc_v_izq_18"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_cen_18", $datosC["hc_v_cen_18"], PDO::PARAM_STR);
	// VESTIBULAR 17
		$pdo -> bindParam(":hc_v_sup_17", $datosC["hc_v_sup_17"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_der_17", $datosC["hc_v_der_17"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_inf_17", $datosC["hc_v_inf_17"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_izq_17", $datosC["hc_v_izq_17"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_cen_17", $datosC["hc_v_cen_17"], PDO::PARAM_STR);
	// VESTIBULAR 16
		$pdo -> bindParam(":hc_v_sup_16", $datosC["hc_v_sup_16"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_der_16", $datosC["hc_v_der_16"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_inf_16", $datosC["hc_v_inf_16"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_izq_16", $datosC["hc_v_izq_16"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_cen_16", $datosC["hc_v_cen_16"], PDO::PARAM_STR);
	// VESTIBULAR 15
		$pdo -> bindParam(":hc_v_sup_15", $datosC["hc_v_sup_15"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_der_15", $datosC["hc_v_der_15"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_inf_15", $datosC["hc_v_inf_15"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_izq_15", $datosC["hc_v_izq_15"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_cen_15", $datosC["hc_v_cen_15"], PDO::PARAM_STR);
	// VESTIBULAR 14
		$pdo -> bindParam(":hc_v_sup_14", $datosC["hc_v_sup_14"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_der_14", $datosC["hc_v_der_14"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_inf_14", $datosC["hc_v_inf_14"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_izq_14", $datosC["hc_v_izq_14"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_cen_14", $datosC["hc_v_cen_14"], PDO::PARAM_STR);
	// VESTIBULAR 13
		$pdo -> bindParam(":hc_v_sup_13", $datosC["hc_v_sup_13"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_der_13", $datosC["hc_v_der_13"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_inf_13", $datosC["hc_v_inf_13"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_izq_13", $datosC["hc_v_izq_13"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_cen_13", $datosC["hc_v_cen_13"], PDO::PARAM_STR);
	// VESTIBULAR 12
		$pdo -> bindParam(":hc_v_sup_12", $datosC["hc_v_sup_12"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_der_12", $datosC["hc_v_der_12"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_inf_12", $datosC["hc_v_inf_12"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_izq_12", $datosC["hc_v_izq_12"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_cen_12", $datosC["hc_v_cen_12"], PDO::PARAM_STR);
	// VESTIBULAR 11
		$pdo -> bindParam(":hc_v_sup_11", $datosC["hc_v_sup_11"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_der_11", $datosC["hc_v_der_11"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_inf_11", $datosC["hc_v_inf_11"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_izq_11", $datosC["hc_v_izq_11"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_cen_11", $datosC["hc_v_cen_11"], PDO::PARAM_STR);

	// VESTIBULAR 21
		$pdo -> bindParam(":hc_v_sup_21", $datosC["hc_v_sup_21"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_der_21", $datosC["hc_v_der_21"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_inf_21", $datosC["hc_v_inf_21"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_izq_21", $datosC["hc_v_izq_21"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_cen_21", $datosC["hc_v_cen_21"], PDO::PARAM_STR);
	// VESTIBULAR 22
		$pdo -> bindParam(":hc_v_sup_22", $datosC["hc_v_sup_22"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_der_22", $datosC["hc_v_der_22"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_inf_22", $datosC["hc_v_inf_22"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_izq_22", $datosC["hc_v_izq_22"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_cen_22", $datosC["hc_v_cen_22"], PDO::PARAM_STR);
	// VESTIBULAR 23
		$pdo -> bindParam(":hc_v_sup_23", $datosC["hc_v_sup_23"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_der_23", $datosC["hc_v_der_23"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_inf_23", $datosC["hc_v_inf_23"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_izq_23", $datosC["hc_v_izq_23"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_cen_23", $datosC["hc_v_cen_23"], PDO::PARAM_STR);
	// VESTIBULAR 24
		$pdo -> bindParam(":hc_v_sup_24", $datosC["hc_v_sup_24"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_der_24", $datosC["hc_v_der_24"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_inf_24", $datosC["hc_v_inf_24"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_izq_24", $datosC["hc_v_izq_24"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_cen_24", $datosC["hc_v_cen_24"], PDO::PARAM_STR);
	// VESTIBULAR 25
		$pdo -> bindParam(":hc_v_sup_25", $datosC["hc_v_sup_25"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_der_25", $datosC["hc_v_der_25"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_inf_25", $datosC["hc_v_inf_25"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_izq_25", $datosC["hc_v_izq_25"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_cen_25", $datosC["hc_v_cen_25"], PDO::PARAM_STR);
	// VESTIBULAR 26
		$pdo -> bindParam(":hc_v_sup_26", $datosC["hc_v_sup_26"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_der_26", $datosC["hc_v_der_26"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_inf_26", $datosC["hc_v_inf_26"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_izq_26", $datosC["hc_v_izq_26"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_cen_26", $datosC["hc_v_cen_26"], PDO::PARAM_STR);
	// VESTIBULAR 27
		$pdo -> bindParam(":hc_v_sup_27", $datosC["hc_v_sup_27"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_der_27", $datosC["hc_v_der_27"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_inf_27", $datosC["hc_v_inf_27"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_izq_27", $datosC["hc_v_izq_27"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_cen_27", $datosC["hc_v_cen_27"], PDO::PARAM_STR);
	// VESTIBULAR 28
		$pdo -> bindParam(":hc_v_sup_28", $datosC["hc_v_sup_28"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_der_28", $datosC["hc_v_der_28"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_inf_28", $datosC["hc_v_inf_28"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_izq_28", $datosC["hc_v_izq_28"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_cen_28", $datosC["hc_v_cen_28"], PDO::PARAM_STR);


	// VESTIBULAR 48
		$pdo -> bindParam(":hc_v_sup_48", $datosC["hc_v_sup_48"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_der_48", $datosC["hc_v_der_48"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_inf_48", $datosC["hc_v_inf_48"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_izq_48", $datosC["hc_v_izq_48"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_cen_48", $datosC["hc_v_cen_48"], PDO::PARAM_STR);
	// VESTIBULAR 47
		$pdo -> bindParam(":hc_v_sup_47", $datosC["hc_v_sup_47"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_der_47", $datosC["hc_v_der_47"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_inf_47", $datosC["hc_v_inf_47"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_izq_47", $datosC["hc_v_izq_47"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_cen_47", $datosC["hc_v_cen_47"], PDO::PARAM_STR);
	// VESTIBULAR 46
		$pdo -> bindParam(":hc_v_sup_46", $datosC["hc_v_sup_46"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_der_46", $datosC["hc_v_der_46"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_inf_46", $datosC["hc_v_inf_46"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_izq_46", $datosC["hc_v_izq_46"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_cen_46", $datosC["hc_v_cen_46"], PDO::PARAM_STR);
	// VESTIBULAR 45
		$pdo -> bindParam(":hc_v_sup_45", $datosC["hc_v_sup_45"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_der_45", $datosC["hc_v_der_45"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_inf_45", $datosC["hc_v_inf_45"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_izq_45", $datosC["hc_v_izq_45"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_cen_45", $datosC["hc_v_cen_45"], PDO::PARAM_STR);
	// VESTIBULAR 44
		$pdo -> bindParam(":hc_v_sup_44", $datosC["hc_v_sup_44"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_der_44", $datosC["hc_v_der_44"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_inf_44", $datosC["hc_v_inf_44"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_izq_44", $datosC["hc_v_izq_44"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_cen_44", $datosC["hc_v_cen_44"], PDO::PARAM_STR);
	// VESTIBULAR 43
		$pdo -> bindParam(":hc_v_sup_43", $datosC["hc_v_sup_43"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_der_43", $datosC["hc_v_der_43"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_inf_43", $datosC["hc_v_inf_43"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_izq_43", $datosC["hc_v_izq_43"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_cen_43", $datosC["hc_v_cen_43"], PDO::PARAM_STR);
	// VESTIBULAR 42
		$pdo -> bindParam(":hc_v_sup_42", $datosC["hc_v_sup_42"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_der_42", $datosC["hc_v_der_42"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_inf_42", $datosC["hc_v_inf_42"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_izq_42", $datosC["hc_v_izq_42"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_cen_42", $datosC["hc_v_cen_42"], PDO::PARAM_STR);
	// VESTIBULAR 41
		$pdo -> bindParam(":hc_v_sup_41", $datosC["hc_v_sup_41"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_der_41", $datosC["hc_v_der_41"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_inf_41", $datosC["hc_v_inf_41"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_izq_41", $datosC["hc_v_izq_41"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_cen_41", $datosC["hc_v_cen_41"], PDO::PARAM_STR);

	// VESTIBULAR 31
		$pdo -> bindParam(":hc_v_sup_31", $datosC["hc_v_sup_31"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_der_31", $datosC["hc_v_der_31"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_inf_31", $datosC["hc_v_inf_31"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_izq_31", $datosC["hc_v_izq_31"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_cen_31", $datosC["hc_v_cen_31"], PDO::PARAM_STR);
	// VESTIBULAR 33
		$pdo -> bindParam(":hc_v_sup_32", $datosC["hc_v_sup_32"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_der_32", $datosC["hc_v_der_32"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_inf_32", $datosC["hc_v_inf_32"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_izq_32", $datosC["hc_v_izq_32"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_cen_32", $datosC["hc_v_cen_32"], PDO::PARAM_STR);
	// VESTIBULAR 33
		$pdo -> bindParam(":hc_v_sup_33", $datosC["hc_v_sup_33"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_der_33", $datosC["hc_v_der_33"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_inf_33", $datosC["hc_v_inf_33"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_izq_33", $datosC["hc_v_izq_33"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_cen_33", $datosC["hc_v_cen_33"], PDO::PARAM_STR);
	// VESTIBULAR 34
		$pdo -> bindParam(":hc_v_sup_34", $datosC["hc_v_sup_34"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_der_34", $datosC["hc_v_der_34"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_inf_34", $datosC["hc_v_inf_34"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_izq_34", $datosC["hc_v_izq_34"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_cen_34", $datosC["hc_v_cen_34"], PDO::PARAM_STR);
	// VESTIBULAR 35
		$pdo -> bindParam(":hc_v_sup_35", $datosC["hc_v_sup_35"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_der_35", $datosC["hc_v_der_35"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_inf_35", $datosC["hc_v_inf_35"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_izq_35", $datosC["hc_v_izq_35"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_cen_35", $datosC["hc_v_cen_35"], PDO::PARAM_STR);
	// VESTIBULAR 36
		$pdo -> bindParam(":hc_v_sup_36", $datosC["hc_v_sup_36"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_der_36", $datosC["hc_v_der_36"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_inf_36", $datosC["hc_v_inf_36"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_izq_36", $datosC["hc_v_izq_36"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_cen_36", $datosC["hc_v_cen_36"], PDO::PARAM_STR);
	// VESTIBULAR 37
		$pdo -> bindParam(":hc_v_sup_37", $datosC["hc_v_sup_37"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_der_37", $datosC["hc_v_der_37"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_inf_37", $datosC["hc_v_inf_37"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_izq_37", $datosC["hc_v_izq_37"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_cen_37", $datosC["hc_v_cen_37"], PDO::PARAM_STR);
	// VESTIBULAR 38
		$pdo -> bindParam(":hc_v_sup_38", $datosC["hc_v_sup_38"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_der_38", $datosC["hc_v_der_38"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_inf_38", $datosC["hc_v_inf_38"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_izq_38", $datosC["hc_v_izq_38"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_v_cen_38", $datosC["hc_v_cen_38"], PDO::PARAM_STR);

	// VESTIBULAR 55
		$pdo -> bindParam(":hc_l_sup_55", $datosC["hc_l_sup_55"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_der_55", $datosC["hc_l_der_55"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_inf_55", $datosC["hc_l_inf_55"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_izq_55", $datosC["hc_l_izq_55"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_cen_55", $datosC["hc_l_cen_55"], PDO::PARAM_STR);
	// VESTIBULAR 54
		$pdo -> bindParam(":hc_l_sup_54", $datosC["hc_l_sup_54"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_der_54", $datosC["hc_l_der_54"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_inf_54", $datosC["hc_l_inf_54"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_izq_54", $datosC["hc_l_izq_54"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_cen_54", $datosC["hc_l_cen_54"], PDO::PARAM_STR);
	// VESTIBULAR 53
		$pdo -> bindParam(":hc_l_sup_53", $datosC["hc_l_sup_53"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_der_53", $datosC["hc_l_der_53"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_inf_53", $datosC["hc_l_inf_53"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_izq_53", $datosC["hc_l_izq_53"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_cen_53", $datosC["hc_l_cen_53"], PDO::PARAM_STR);
	// VESTIBULAR 52
		$pdo -> bindParam(":hc_l_sup_52", $datosC["hc_l_sup_52"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_der_52", $datosC["hc_l_der_52"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_inf_52", $datosC["hc_l_inf_52"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_izq_52", $datosC["hc_l_izq_52"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_cen_52", $datosC["hc_l_cen_52"], PDO::PARAM_STR);
	// VESTIBULAR 51
		$pdo -> bindParam(":hc_l_sup_51", $datosC["hc_l_sup_51"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_der_51", $datosC["hc_l_der_51"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_inf_51", $datosC["hc_l_inf_51"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_izq_51", $datosC["hc_l_izq_51"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_cen_51", $datosC["hc_l_cen_51"], PDO::PARAM_STR);
	// VESTIBULAR 61
		$pdo -> bindParam(":hc_l_sup_61", $datosC["hc_l_sup_61"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_der_61", $datosC["hc_l_der_61"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_inf_61", $datosC["hc_l_inf_61"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_izq_61", $datosC["hc_l_izq_61"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_cen_61", $datosC["hc_l_cen_61"], PDO::PARAM_STR);
	// VESTIBULAR 62
		$pdo -> bindParam(":hc_l_sup_62", $datosC["hc_l_sup_62"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_der_62", $datosC["hc_l_der_62"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_inf_62", $datosC["hc_l_inf_62"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_izq_62", $datosC["hc_l_izq_62"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_cen_62", $datosC["hc_l_cen_62"], PDO::PARAM_STR);
	// VESTIBULAR 63
		$pdo -> bindParam(":hc_l_sup_63", $datosC["hc_l_sup_63"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_der_63", $datosC["hc_l_der_63"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_inf_63", $datosC["hc_l_inf_63"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_izq_63", $datosC["hc_l_izq_63"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_cen_63", $datosC["hc_l_cen_63"], PDO::PARAM_STR);
	// VESTIBULAR 64
		$pdo -> bindParam(":hc_l_sup_64", $datosC["hc_l_sup_64"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_der_64", $datosC["hc_l_der_64"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_inf_64", $datosC["hc_l_inf_64"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_izq_64", $datosC["hc_l_izq_64"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_cen_64", $datosC["hc_l_cen_64"], PDO::PARAM_STR);
	// VESTIBULAR 65
		$pdo -> bindParam(":hc_l_sup_65", $datosC["hc_l_sup_65"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_der_65", $datosC["hc_l_der_65"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_inf_65", $datosC["hc_l_inf_65"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_izq_65", $datosC["hc_l_izq_65"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_cen_65", $datosC["hc_l_cen_65"], PDO::PARAM_STR);
	// VESTIBULAR 85
		$pdo -> bindParam(":hc_l_sup_85", $datosC["hc_l_sup_85"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_der_85", $datosC["hc_l_der_85"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_inf_85", $datosC["hc_l_inf_85"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_izq_85", $datosC["hc_l_izq_85"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_cen_85", $datosC["hc_l_cen_85"], PDO::PARAM_STR);
	// VESTIBULAR 84
		$pdo -> bindParam(":hc_l_sup_84", $datosC["hc_l_sup_84"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_der_84", $datosC["hc_l_der_84"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_inf_84", $datosC["hc_l_inf_84"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_izq_84", $datosC["hc_l_izq_84"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_cen_84", $datosC["hc_l_cen_84"], PDO::PARAM_STR);
	// VESTIBULAR 83
		$pdo -> bindParam(":hc_l_sup_83", $datosC["hc_l_sup_83"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_der_83", $datosC["hc_l_der_83"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_inf_83", $datosC["hc_l_inf_83"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_izq_83", $datosC["hc_l_izq_83"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_cen_83", $datosC["hc_l_cen_83"], PDO::PARAM_STR);
	// VESTIBULAR 82
		$pdo -> bindParam(":hc_l_sup_82", $datosC["hc_l_sup_82"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_der_82", $datosC["hc_l_der_82"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_inf_82", $datosC["hc_l_inf_82"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_izq_82", $datosC["hc_l_izq_82"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_cen_82", $datosC["hc_l_cen_82"], PDO::PARAM_STR);
	// VESTIBULAR 81
		$pdo -> bindParam(":hc_l_sup_81", $datosC["hc_l_sup_81"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_der_81", $datosC["hc_l_der_81"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_inf_81", $datosC["hc_l_inf_81"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_izq_81", $datosC["hc_l_izq_81"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_cen_81", $datosC["hc_l_cen_81"], PDO::PARAM_STR);
	// VESTIBULAR 71
		$pdo -> bindParam(":hc_l_sup_71", $datosC["hc_l_sup_71"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_der_71", $datosC["hc_l_der_71"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_inf_71", $datosC["hc_l_inf_71"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_izq_71", $datosC["hc_l_izq_71"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_cen_71", $datosC["hc_l_cen_71"], PDO::PARAM_STR);
	// VESTIBULAR 72
		$pdo -> bindParam(":hc_l_sup_72", $datosC["hc_l_sup_72"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_der_72", $datosC["hc_l_der_72"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_inf_72", $datosC["hc_l_inf_72"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_izq_72", $datosC["hc_l_izq_72"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_cen_72", $datosC["hc_l_cen_72"], PDO::PARAM_STR);
	// VESTIBULAR 73
		$pdo -> bindParam(":hc_l_sup_73", $datosC["hc_l_sup_73"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_der_73", $datosC["hc_l_der_73"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_inf_73", $datosC["hc_l_inf_73"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_izq_73", $datosC["hc_l_izq_73"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_cen_73", $datosC["hc_l_cen_73"], PDO::PARAM_STR);
	// VESTIBULAR 74
		$pdo -> bindParam(":hc_l_sup_74", $datosC["hc_l_sup_74"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_der_74", $datosC["hc_l_der_74"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_inf_74", $datosC["hc_l_inf_74"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_izq_74", $datosC["hc_l_izq_74"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_cen_74", $datosC["hc_l_cen_74"], PDO::PARAM_STR);
	// VESTIBULAR 75
		$pdo -> bindParam(":hc_l_sup_75", $datosC["hc_l_sup_75"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_der_75", $datosC["hc_l_der_75"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_inf_75", $datosC["hc_l_inf_75"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_izq_75", $datosC["hc_l_izq_75"], PDO::PARAM_STR);
		$pdo -> bindParam(":hc_l_cen_75", $datosC["hc_l_cen_75"], PDO::PARAM_STR);



	//7 INDICADORES DE SALUD BUCAL
		$pdo -> bindParam(":isb_pd16", $datosC["isb_pd16"], PDO::PARAM_INT);
		$pdo -> bindParam(":isb_pd17", $datosC["isb_pd17"], PDO::PARAM_INT);
		$pdo -> bindParam(":isb_pd55", $datosC["isb_pd55"], PDO::PARAM_INT);
		$pdo -> bindParam(":isb_pd11", $datosC["isb_pd11"], PDO::PARAM_INT);
		$pdo -> bindParam(":isb_pd21", $datosC["isb_pd21"], PDO::PARAM_INT);
		$pdo -> bindParam(":isb_pd51", $datosC["isb_pd51"], PDO::PARAM_INT);
		$pdo -> bindParam(":isb_pd26", $datosC["isb_pd26"], PDO::PARAM_INT);
		$pdo -> bindParam(":isb_pd27", $datosC["isb_pd27"], PDO::PARAM_INT);
		$pdo -> bindParam(":isb_pd65", $datosC["isb_pd65"], PDO::PARAM_INT);
		$pdo -> bindParam(":isb_pd36", $datosC["isb_pd36"], PDO::PARAM_INT);
		$pdo -> bindParam(":isb_pd37", $datosC["isb_pd37"], PDO::PARAM_INT);
		$pdo -> bindParam(":isb_pd75", $datosC["isb_pd75"], PDO::PARAM_INT);
		$pdo -> bindParam(":isb_pd31", $datosC["isb_pd31"], PDO::PARAM_INT);
		$pdo -> bindParam(":isb_pd41", $datosC["isb_pd41"], PDO::PARAM_INT);
		$pdo -> bindParam(":isb_pd71", $datosC["isb_pd71"], PDO::PARAM_INT);
		$pdo -> bindParam(":isb_pd46", $datosC["isb_pd46"], PDO::PARAM_INT);
		$pdo -> bindParam(":isb_pd47", $datosC["isb_pd47"], PDO::PARAM_INT);
		$pdo -> bindParam(":isb_pd85", $datosC["isb_pd85"], PDO::PARAM_INT);


		$pdo -> bindParam(":placa_01", $datosC["placa_01"], PDO::PARAM_INT);
		$pdo -> bindParam(":calculo_01", $datosC["calculo_01"], PDO::PARAM_INT);
		$pdo -> bindParam(":gingivitis_01", $datosC["gingivitis_01"], PDO::PARAM_INT);
		$pdo -> bindParam(":placa_02", $datosC["placa_02"], PDO::PARAM_INT);
		$pdo -> bindParam(":calculo_02", $datosC["calculo_02"], PDO::PARAM_INT);
		$pdo -> bindParam(":gingivitis_02", $datosC["gingivitis_02"], PDO::PARAM_INT);
		$pdo -> bindParam(":placa_03", $datosC["placa_03"], PDO::PARAM_INT);
		$pdo -> bindParam(":calculo_03", $datosC["calculo_03"], PDO::PARAM_INT);
		$pdo -> bindParam(":gingivitis_03", $datosC["gingivitis_03"], PDO::PARAM_INT);
		$pdo -> bindParam(":placa_04", $datosC["placa_04"], PDO::PARAM_INT);
		$pdo -> bindParam(":calculo_04", $datosC["calculo_04"], PDO::PARAM_INT);
		$pdo -> bindParam(":gingivitis_04", $datosC["gingivitis_04"], PDO::PARAM_INT);
		$pdo -> bindParam(":placa_05", $datosC["placa_05"], PDO::PARAM_INT);
		$pdo -> bindParam(":calculo_05", $datosC["calculo_05"], PDO::PARAM_INT);
		$pdo -> bindParam(":gingivitis_05", $datosC["gingivitis_05"], PDO::PARAM_INT);
		$pdo -> bindParam(":placa_06", $datosC["placa_06"], PDO::PARAM_INT);
		$pdo -> bindParam(":calculo_06", $datosC["calculo_06"], PDO::PARAM_INT);
		$pdo -> bindParam(":gingivitis_06", $datosC["gingivitis_06"], PDO::PARAM_INT);



		$pdo -> bindParam(":enf_periodontal_leve", $datosC["enf_periodontal_leve"], PDO::PARAM_INT);
		$pdo -> bindParam(":enf_periodontal_moderada", $datosC["enf_periodontal_moderada"], PDO::PARAM_INT);
		$pdo -> bindParam(":enf_periodontal_severa", $datosC["enf_periodontal_severa"], PDO::PARAM_INT);
		$pdo -> bindParam(":mal_oclusion_angleI", $datosC["mal_oclusion_angleI"], PDO::PARAM_INT);
		$pdo -> bindParam(":mal_oclusion_angleII", $datosC["mal_oclusion_angleII"], PDO::PARAM_INT);
		$pdo -> bindParam(":mal_oclusion_angleIII", $datosC["mal_oclusion_angleIII"], PDO::PARAM_INT);
		$pdo -> bindParam(":fluorosis_leve", $datosC["fluorosis_leve"], PDO::PARAM_INT);
		$pdo -> bindParam(":fluorosis_moderada", $datosC["fluorosis_moderada"], PDO::PARAM_INT);
		$pdo -> bindParam(":fluorosis_severa", $datosC["fluorosis_severa"], PDO::PARAM_INT);




		$pdo -> bindParam(":indices_CPO_C", $datosC["indices_CPO_C"], PDO::PARAM_INT);
		$pdo -> bindParam(":indices_CPO_P", $datosC["indices_CPO_P"], PDO::PARAM_INT);
		$pdo -> bindParam(":indices_CPO_O", $datosC["indices_CPO_O"], PDO::PARAM_INT);
		$pdo -> bindParam(":indices_ceo_c", $datosC["indices_ceo_c"], PDO::PARAM_INT);
		$pdo -> bindParam(":indices_ceo_e", $datosC["indices_ceo_e"], PDO::PARAM_INT);
		$pdo -> bindParam(":indices_ceo_o", $datosC["indices_ceo_o"], PDO::PARAM_INT);







		if($pdo -> execute()){
			return true;
		}else{
			return false;
		}

		$pdo -> close();
		$pdo = null;
		

	}

}
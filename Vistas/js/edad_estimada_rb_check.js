
        function OnChangeRadio_EdadEstimada1 (radio) { 
            document.getElementById("EE1").value = "1";
            document.getElementById("EE2").value = "0";
            document.getElementById("EE3").value = "0";
            document.getElementById("EE4").value = "0";
            document.getElementById("EE5").value = "0";
            document.getElementById("EE6").value = "0";
            document.getElementById("EE7").value = "0";
           
        }
  

	
        function OnChangeRadio_EdadEstimada2 (radio) { 
            document.getElementById("EE1").value = "0";
            document.getElementById("EE2").value = "1";
            document.getElementById("EE3").value = "0";
            document.getElementById("EE4").value = "0";
            document.getElementById("EE5").value = "0";
            document.getElementById("EE6").value = "0";
            document.getElementById("EE7").value = "0";
           
        }
  

	
        function OnChangeRadio_EdadEstimada3 (radio) { 
            document.getElementById("EE1").value = "0";
            document.getElementById("EE2").value = "0";
            document.getElementById("EE3").value = "1";
            document.getElementById("EE4").value = "0";
            document.getElementById("EE5").value = "0";
            document.getElementById("EE6").value = "0";
            document.getElementById("EE7").value = "0";
           
        }
  

    
        function OnChangeRadio_EdadEstimada4 (radio) { 
            document.getElementById("EE1").value = "0";
            document.getElementById("EE2").value = "0";
            document.getElementById("EE3").value = "0";
            document.getElementById("EE4").value = "1";
            document.getElementById("EE5").value = "0";
            document.getElementById("EE6").value = "0";
            document.getElementById("EE7").value = "0";
           
        }
  

    
        function OnChangeRadio_EdadEstimada5 (radio) { 
            document.getElementById("EE1").value = "0";
            document.getElementById("EE2").value = "0";
            document.getElementById("EE3").value = "0";
            document.getElementById("EE4").value = "0";
            document.getElementById("EE5").value = "1";
            document.getElementById("EE6").value = "0";
            document.getElementById("EE7").value = "0";
           
        }
  

    
        function OnChangeRadio_EdadEstimada6 (radio) { 
            document.getElementById("EE1").value = "0";
            document.getElementById("EE2").value = "0";
            document.getElementById("EE3").value = "0";
            document.getElementById("EE4").value = "0";
            document.getElementById("EE5").value = "0";
            document.getElementById("EE6").value = "1";
            document.getElementById("EE7").value = "0";
           
        }
  

    
        function OnChangeRadio_EdadEstimada7 (radio) { 
            document.getElementById("EE1").value = "0";
            document.getElementById("EE2").value = "0";
            document.getElementById("EE3").value = "0";
            document.getElementById("EE4").value = "0";
            document.getElementById("EE5").value = "0";
            document.getElementById("EE6").value = "0";
            document.getElementById("EE7").value = "1";
           
        }


//Edad Estimada  
        function embarazadaCheck() {
          var checkBox = document.getElementById("embarazada");
          var text = document.getElementById("text");
          if (checkBox.checked == true){
            document.getElementById("EE8").value = "1";
          } else {
             document.getElementById("EE8").value = "0";
          }
        }
          


//3 ANTECEDENTES PERSONALES Y FAMILIARES 
        function epa1Check() {
          var checkBox = document.getElementById("alergia_antibiotico");
          var text = document.getElementById("text");
          if (checkBox.checked == true){
            document.getElementById("EPA1").value = "1";
          } else {
             document.getElementById("EPA1").value = "0";
          }
        }

        function epa2Check() {
          var checkBox = document.getElementById("alergia_anestesia");
          if (checkBox.checked == true){
            document.getElementById("EPA2").value = "1";
          } else {
             document.getElementById("EPA2").value = "0";
          }
        }

        function epa3Check() {
          var checkBox = document.getElementById("hemorragias");
          if (checkBox.checked == true){
            document.getElementById("EPA3").value = "1";
          } else {
             document.getElementById("EPA3").value = "0";
          }
        }

        function epa4Check() {
          var checkBox = document.getElementById("vih_sida");
          if (checkBox.checked == true){
            document.getElementById("EPA4").value = "1";
          } else {
             document.getElementById("EPA4").value = "0";
          }
        }

        function epa5Check() {
          var checkBox = document.getElementById("tuberculosis");
          if (checkBox.checked == true){
            document.getElementById("EPA5").value = "1";
          } else {
             document.getElementById("EPA5").value = "0";
          }
        }

        function epa6Check() {
          var checkBox = document.getElementById("asma");
          if (checkBox.checked == true){
            document.getElementById("EPA6").value = "1";
          } else {
             document.getElementById("EPA6").value = "0";
          }
        }

        function epa7Check() {
          var checkBox = document.getElementById("diabetes");
          if (checkBox.checked == true){
            document.getElementById("EPA7").value = "1";
          } else {
             document.getElementById("EPA7").value = "0";
          }
        }

        function epa8Check() {
          var checkBox = document.getElementById("hipertension");
          if (checkBox.checked == true){
            document.getElementById("EPA8").value = "1";
          } else {
             document.getElementById("EPA8").value = "0";
          }
        }

        function epa9Check() {
          var checkBox = document.getElementById("enf_cardiaca");
          if (checkBox.checked == true){
            document.getElementById("EPA9").value = "1";
          } else {
             document.getElementById("EPA9").value = "0";
          }
        }

        function epa10Check() {
          var checkBox = document.getElementById("otro_antecedentes");
          if (checkBox.checked == true){
            document.getElementById("EPA10").value = "1";
          } else {
             document.getElementById("EPA10").value = "0";
          }
        }


// 5 EXAMEN DEL SISTEMA ESTOMATOGNÁTICO 
    


        function ese1Check() {
          var checkBox = document.getElementById("labios");
          if (checkBox.checked == true){
            document.getElementById("ESE1").value = "1";
          } else {
             document.getElementById("ESE1").value = "0";
          }
        }

        function ese2Check() {
          var checkBox = document.getElementById("mejillas");
          if (checkBox.checked == true){
            document.getElementById("ESE2").value = "1";
          } else {
             document.getElementById("ESE2").value = "0";
          }
        }

        function ese3Check() {
          var checkBox = document.getElementById("maxilar_superior");
          if (checkBox.checked == true){
            document.getElementById("ESE3").value = "1";
          } else {
             document.getElementById("ESE3").value = "0";
          }
        }

        function ese4Check() {
          var checkBox = document.getElementById("maxilar_inferior");
          if (checkBox.checked == true){
            document.getElementById("ESE4").value = "1";
          } else {
             document.getElementById("ESE4").value = "0";
          }
        }

        function ese5Check() {
          var checkBox = document.getElementById("lengua");
          if (checkBox.checked == true){
            document.getElementById("ESE5").value = "1";
          } else {
             document.getElementById("ESE5").value = "0";
          }
        }

        function ese6Check() {
          var checkBox = document.getElementById("paladar");
          if (checkBox.checked == true){
            document.getElementById("ESE6").value = "1";
          } else {
             document.getElementById("ESE6").value = "0";
          }
        }

        function ese7Check() {
          var checkBox = document.getElementById("piso");
          if (checkBox.checked == true){
            document.getElementById("ESE7").value = "1";
          } else {
             document.getElementById("ESE7").value = "0";
          }
        }

        function ese8Check() {
          var checkBox = document.getElementById("carrillos");
          if (checkBox.checked == true){
            document.getElementById("ESE8").value = "1";
          } else {
             document.getElementById("ESE8").value = "0";
          }
        }

        function ese9Check() {
          var checkBox = document.getElementById("gandulas_salivales");
          if (checkBox.checked == true){
            document.getElementById("ESE9").value = "1";
          } else {
             document.getElementById("ESE9").value = "0";
          }
        }

        function ese10Check() {
          var checkBox = document.getElementById("oro_faringe");
          if (checkBox.checked == true){
            document.getElementById("ESE10").value = "1";
          } else {
             document.getElementById("ESE10").value = "0";
          }
        }

        function ese11Check() {
          var checkBox = document.getElementById("atm");
          if (checkBox.checked == true){
            document.getElementById("ESE11").value = "1";
          } else {
             document.getElementById("ESE11").value = "0";
          }
        }

        function ese12Check() {
          var checkBox = document.getElementById("ganglios");
          if (checkBox.checked == true){
            document.getElementById("ESE12").value = "1";
          } else {
             document.getElementById("ESE12").value = "0";
          }
        }

//7 INDICADORES DE SALUD BUCAL

        function isb_pd16Check() {
          var checkBox = document.getElementById("pieza-dental-16");
          if (checkBox.checked == true){
            document.getElementById("isb_pd16").value = "1";
          } else {
             document.getElementById("isb_pd16").value = "0";
          }
        }

        function isb_pd17Check() {
          var checkBox = document.getElementById("pieza-dental-17");
          if (checkBox.checked == true){
            document.getElementById("isb_pd17").value = "1";
          } else {
             document.getElementById("isb_pd17").value = "0";
          }
        }

        function isb_pd55Check() {
          var checkBox = document.getElementById("pieza-dental-55");
          if (checkBox.checked == true){
            document.getElementById("isb_pd55").value = "1";
          } else {
             document.getElementById("isb_pd55").value = "0";
          }
        }

        function isb_pd11Check() {
          var checkBox = document.getElementById("pieza-dental-11");
          if (checkBox.checked == true){
            document.getElementById("isb_pd11").value = "1";
          } else {
             document.getElementById("isb_pd11").value = "0";
          }
        }

        function isb_pd21Check() {
          var checkBox = document.getElementById("pieza-dental-21");
          if (checkBox.checked == true){
            document.getElementById("isb_pd21").value = "1";
          } else {
             document.getElementById("isb_pd21").value = "0";
          }
        }

        function isb_pd51Check() {
          var checkBox = document.getElementById("pieza-dental-51");
          if (checkBox.checked == true){
            document.getElementById("isb_pd51").value = "1";
          } else {
             document.getElementById("isb_pd51").value = "0";
          }
        }

        function isb_pd26Check() {
          var checkBox = document.getElementById("pieza-dental-26");
          if (checkBox.checked == true){
            document.getElementById("isb_pd26").value = "1";
          } else {
             document.getElementById("isb_pd26").value = "0";
          }
        }

        function isb_pd27Check() {
          var checkBox = document.getElementById("pieza-dental-27");
          if (checkBox.checked == true){
            document.getElementById("isb_pd27").value = "1";
          } else {
             document.getElementById("isb_pd27").value = "0";
          }
        }

        function isb_pd65Check() {
          var checkBox = document.getElementById("pieza-dental-65");
          if (checkBox.checked == true){
            document.getElementById("isb_pd65").value = "1";
          } else {
             document.getElementById("isb_pd65").value = "0";
          }
        }

        function isb_pd36Check() {
          var checkBox = document.getElementById("pieza-dental-36");
          if (checkBox.checked == true){
            document.getElementById("isb_pd36").value = "1";
          } else {
             document.getElementById("isb_pd36").value = "0";
          }
        }

        function isb_pd37Check() {
          var checkBox = document.getElementById("pieza-dental-37");
          if (checkBox.checked == true){
            document.getElementById("isb_pd37").value = "1";
          } else {
             document.getElementById("isb_pd37").value = "0";
          }
        }

        function isb_pd75Check() {
          var checkBox = document.getElementById("pieza-dental-75");
          if (checkBox.checked == true){
            document.getElementById("isb_pd75").value = "1";
          } else {
             document.getElementById("isb_pd75").value = "0";
          }
        }

        function isb_pd31Check() {
          var checkBox = document.getElementById("pieza-dental-31");
          if (checkBox.checked == true){
            document.getElementById("isb_pd31").value = "1";
          } else {
             document.getElementById("isb_pd31").value = "0";
          }
        }

        function isb_pd41Check() {
          var checkBox = document.getElementById("pieza-dental-41");
          if (checkBox.checked == true){
            document.getElementById("isb_pd41").value = "1";
          } else {
             document.getElementById("isb_pd41").value = "0";
          }
        }

        function isb_pd71Check() {
          var checkBox = document.getElementById("pieza-dental-71");
          if (checkBox.checked == true){
            document.getElementById("isb_pd71").value = "1";
          } else {
             document.getElementById("isb_pd71").value = "0";
          }
        }

        function isb_pd46Check() {
          var checkBox = document.getElementById("pieza-dental-46");
          if (checkBox.checked == true){
            document.getElementById("isb_pd46").value = "1";
          } else {
             document.getElementById("isb_pd46").value = "0";
          }
        }

        function isb_pd47Check() {
          var checkBox = document.getElementById("pieza-dental-47");
          if (checkBox.checked == true){
            document.getElementById("isb_pd47").value = "1";
          } else {
             document.getElementById("isb_pd47").value = "0";
          }
        }

        function isb_pd85Check() {
          var checkBox = document.getElementById("pieza-dental-85");
          if (checkBox.checked == true){
            document.getElementById("isb_pd85").value = "1";
          } else {
             document.getElementById("isb_pd85").value = "0";
          }
        }


        //ENFERMEDAD PERIODONTAL
        function OnChangeRadio_isb_enf_p_leve (radio) {
           document.getElementById("enf_periodontal_leve").value = "1";
           document.getElementById("enf_periodontal_moderada").value = "0";
           document.getElementById("enf_periodontal_severa").value = "0";
        }

        function OnChangeRadio_isb_enf_p_moderada (radio) {
           document.getElementById("enf_periodontal_leve").value = "0";
           document.getElementById("enf_periodontal_moderada").value = "1";
           document.getElementById("enf_periodontal_severa").value = "0";
        }

        function OnChangeRadio_isb_enf_p_severa (radio) {
           document.getElementById("enf_periodontal_leve").value = "0";
           document.getElementById("enf_periodontal_moderada").value = "0";
           document.getElementById("enf_periodontal_severa").value = "1";
        }




        //MAL OCLUSION
        function OnChangeRadio_isb_mal_o_angleI() {
           document.getElementById("mal_oclusion_angleI").value = "1";
           document.getElementById("mal_oclusion_angleII").value = "0";
           document.getElementById("mal_oclusion_angleIII").value = "0";
        }

        function OnChangeRadio_isb_mal_o_angleII() {
           document.getElementById("mal_oclusion_angleI").value = "0";
           document.getElementById("mal_oclusion_angleII").value = "1";
           document.getElementById("mal_oclusion_angleIII").value = "0";
        }

        function OnChangeRadio_isb_mal_o_angleIII() {
           document.getElementById("mal_oclusion_angleI").value = "0";
           document.getElementById("mal_oclusion_angleII").value = "0";
           document.getElementById("mal_oclusion_angleIII").value = "1";
        }




        //FLUOROSIS
        function OnChangeRadio_isb_fluorosis_leve() {
           document.getElementById("fluorosis_leve").value = "1";
           document.getElementById("fluorosis_moderada").value = "0";
           document.getElementById("fluorosis_severa").value = "0";
        }

        function OnChangeRadio_isb_fluorosis_moderada() {
           document.getElementById("fluorosis_leve").value = "0";
           document.getElementById("fluorosis_moderada").value = "1";
           document.getElementById("fluorosis_severa").value = "0";
        }

        function OnChangeRadio_isb_fluorosis_severa() {
           document.getElementById("fluorosis_leve").value = "0";
           document.getElementById("fluorosis_moderada").value = "0";
           document.getElementById("fluorosis_severa").value = "1";
        }
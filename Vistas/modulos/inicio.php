<?php
// Turn off all error reporting
error_reporting(0);
?>    
    
<style type="text/css">

  #calendar .fc-agenda-axis, #calendar .fc-widget-header{
    background-color: #C2E6FF;
    border-color: #AED0EA;
    font-weight: normal;
    padding: 3px;
    border-radius: 3px;



  }

  #calendar .fc-agenda-axis, #calendar .fc-widget-header{
    background-color: #D6EEFF;
    border-color: #AED0EA;
    font-weight: normal;
    padding: 3px;
    border-radius: 3px;
    
  } 
  .fc-widget-content{
    cursor: pointer;
  }

  .fc-today {
    background: #D6EEFF !important;

  } 


  .fc-addEventButton-button {
    background-color: green;
    color: green;
  }



</style>  

<script type="text/javascript">


  function fechayhoraOC() {

    var fecha = document.getElementById("fechaC").value;

    var hora_i = document.getElementById("horaC").value;

    h1 = hora_i.split(":");

    h1 = parseFloat(h1[0]);

    hora_f = h1+1;


    $('.hinicio').val(fecha + ' ' +  hora_i );
    $('.hfin').val(fecha + ' ' +  hora_f+':00' );
    $('#horaCF').val(h1+1+":00")

  }

  function fechayhoraFINOC() {

    var fecha = document.getElementById("fechaC").value;
    var hora_i = document.getElementById("horaC").value;
    var hora_f = document.getElementById("horaCF").value;

    $('.hfin').val(fecha + ' ' +  hora_f )

  }


  function validarFecha(){
    var fecha = document.getElementById("fechaC").value;
    var hora_i = document.getElementById("horaC").value;
    var hora_f = document.getElementById("horaCF").value;

    h1 = hora_i.split(":");
    h1 = parseFloat(h1[0]);

    h2 = hora_f.split(":");
    h2 = parseFloat(h2[0]);

    hora_mas_uno = h1+1;

    if (h1>h2)
    {
      alert("La hora final no puede ser inferior a la hora inicial");

      if (hora_mas_uno >= 10) {$("#horaCF").val(hora_mas_uno+":00");}

      if (hora_mas_uno < 10) {$("#horaCF").val("0"+hora_mas_uno+":00");}

      $('.hfin').val(fecha + ' ' +  hora_mas_uno + ":00");
    }

  }


</script>





<div class="content-wrapper">

  <section class="content-header">




  </section>

  <section class="content">

    <div class="box" > 

      <div class="box-body" >

        <div id="calendar" ></div>

      </div>

    </div>

  </section>

</div>

<div class="modal fade" rol="dialog" id="CitaModal">

  <div class="modal-dialog">

    <div class="modal-content">

      <form method="post">

        <div class="modal-body">

          <div class="box-body">

            <?php

            $columna = "id";

            $valor = substr($_GET["url"], 6);

            $resultado = DoctoresC::DoctorC($columna, $valor);

              /*echo '<div class="form-group">      

                <input type="hidden" name="Did" value="'.$resultado["id"].'">

                </div>'; */     

  /*
                $columna = "id";
               
                $valor = 8;//$resultado["id_consultorio"];

                $consultorio = ConsultoriosC::VerConsultoriosC($columna, $valor);

                echo '<div class="form-group">
                
                    <input type="text" name="Cid" value="'.$consultorio["id"].'">

                    </div>';*/

                    ?>


                    <div class="form-group">

                      <h4>Seleccionar Paciente:</h4>


                      <select class="form-control input pacientes" name="nombreP" required="">

                      <option value="" disabled selected> Paciente... </option>
                      <?php



                      $columna = null;
                      $valor = null;

                      $resultado = PacientesC::VerPacientesC($columna, $valor);

                      foreach ($resultado as $key => $value) {

                        echo '<option id_paciente="'.$value["id"].'" value="'.$value["nombre"].' '.$value["apellido"].'">'.$value["apellido"].' '.$value["nombre"].'</option>';

                      }

                      ?>


                    </select>


                    <input type="hidden" id="Pid" class="Pid" name="Pid" value="">


                    <script type="text/javascript">

                      const selectElementPaciente = document.querySelector('.pacientes');

                      selectElementPaciente.addEventListener('change', (event) => {

                        const id_paciente = document.getElementById("Pid");


                        id_paciente.value = $(".pacientes option:selected").attr("id_paciente");


                      });

                    </script>



                  </div>


                  <div class="form-group">

                    <h4>Seleccionar Doctor:</h4>
                    
                    <select class="form-control input doctores" name="nombreD" required>
                    
                    <option value="" disabled selected>Doctor...</option>
                    <?php

                    $columna = null;
                    $valor = null;

                    $resultado = DoctoresC::VerDoctoresC($columna, $valor);

                    foreach ($resultado as $key => $value) {

                      echo '<option color_doctor="'.$value["colorCita"].'" id_consultorio="'.$value["id_consultorio"].'" doc_id="'.$value["id"].'" value="'.$value["nombre"].' '.$value["apellido"].'">'.$value["apellido"].' '.$value["nombre"].'</option>';


                    }


                    ?>


                  </select>


                  <input type="hidden" id="doc_id" class="doc_id" name="Did" value="">

                  <input type="hidden" id="colorCita" class="colorCita"  name="colorCita">

                  <input type="hidden" id="Cid" class="Cid" name="Cid" value="">


                  <script type="text/javascript">

                    const selectElement = document.querySelector('.doctores');

                    selectElement.addEventListener('change', (event) => {

                      const id_doctor = document.getElementById("doc_id");

                      const colorCita = document.getElementById("colorCita");

                      const id_consultorio = document.getElementById("Cid");


                      id_doctor.value = $(".doctores option:selected").attr("doc_id");

                      colorCita.value = $(".doctores option:selected").attr("color_doctor");

                      id_consultorio.value = $(".doctores option:selected").attr("id_consultorio");

                    });

                  </script>

  <!--  Seleccionar atributo customizada

                <label>Elija un sabor de nieve:
                    <select class="nieve" name="nieve">
                        <option myTag="a" value="1">Seleccione Uno …</option>
                        <option myTag="choc" value="c">Chocolate</option>
                        <option myTag="sard" value="s">Sardina</option>
                        <option myTag="vain" value="v">Vainilla</option>
                    </select>
                </label>

              


                value del select: <br>
                <input class="value_sel" type="text" name="value_sel" id="value_sel">

                <br>
                text del select: <br>
                <input class="text_sel" type="text" name="text_sel" id="text_sel">

                <br>
                customTag del select: <br>
                <input class="ctag" type="text" name="ctag" id="ctag">



                <script type="text/javascript">
                  
                  const selectElement = document.querySelector('.nieve');

                  selectElement.addEventListener('change', (event) => {
                      const resultado = document.querySelector('.resultado');
                      const val = document.getElementById("value_sel");
                      const sel = document.getElementById("text_sel");
                      const ctag = document.getElementById("ctag");


                      val.value = event.target.value;

                      sel.value = $(".nieve option:selected").text();

                      ctag.value = $(".nieve option:selected").attr("myTag");



                  });

                </script>

              -->


            </div>



            <div class="form-group">


              <h4>Detalles: </h4>  
              <textarea rows="8" type="text" placeholder="Detalles de la Cita" class="form-control input" name="documentoP" value=""></textarea>



            </div>

            <div class="form-group">

              <h4>Fecha: </h4>  

              <input type="date" onchange="fechayhoraOC()" class="form-control input" id="fechaC" required="true">
              


            </div>

            <div class="form-group">

              <h4>Hora Inicio</h4>

              <input type="time" onchange="fechayhoraOC()" class="form-control input" id="horaC" required="true">

              <h4>Hora Fin</h4>

              <input type="time" onchange="fechayhoraFINOC()" onfocusout="validarFecha()" class="form-control input" id="horaCF" required="true">





            </div>

            <div class="form-group">

              <input type="hidden" class="hinicio form-control input" name="fyhIC" id="fyhIC" value="">

              <input type="hidden" class="hfin form-control input" name="fyhFC" id="fyhFC" value="">

            </div>


          </div>

        </div>

        <div class="modal-footer">

          <button type="submint" class="btn btn-primary">Pedir cita</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

        </div>

        <?php

        $enviarC = new CitasC();
        $enviarC -> PedirCitaDoctorC();

        ?>

      </form>



    </div>

  </div>

</div>



  <!-- 

    <div class="content-wrapper">
     
      <section class="content">

      
        <div class="box">

          <?php/* 

          $inicio = new InicioC();
          $inicio -> MostrarInicioC();

          if($_SESSION["rol"] == "Administrador"){

            echo'
            <div class="box-footer">

              <a href="inicio-editar">
                  
                  <button class="btn btn-success btn-lg">Editar</button>

              </a>

            </div>
            ';

          }

           */?>
          
     
         
        </div>
    

      </section>
   
    </div> -->
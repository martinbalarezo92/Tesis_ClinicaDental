<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Clínica Médica</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">



  <!-- Bootstrap 3.3.7 -->
  
<link rel="stylesheet" href="http://localhost/clinica/Vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <!-- 
  <link rel="stylesheet" href="http://localhost/clinica/Vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
-->
  

  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://localhost/clinica/Vistas/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="http://localhost/clinica/Vistas/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="http://localhost/clinica/Vistas/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="http://localhost/clinica/Vistas/dist/css/skins/_all-skins.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="http://localhost/clinica/Vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
  <link rel="stylesheet" href="http://localhost/clinica/Vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <!-- FullCalendar -->
  <link rel="stylesheet" href="http://localhost/clinica/Vistas/bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="http://localhost/clinica/Vistas/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">



  <!-- DataTimePicker -->

 <link rel="stylesheet" href="http://localhost/clinica/Vistas/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css">
 <link rel="stylesheet" href="http://localhost/clinica/Vistas/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css">  


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini login-page">
<!-- Site wrapper -->


<?php

if(isset($_SESSION["Ingresar"]) && $_SESSION["Ingresar"] == true){

echo '<div class="wrapper">';

include "modulos/cabecera.php";

if($_SESSION["rol"] == "Secretaria"){

  include "modulos/menuSecretaria.php";

} else if ($_SESSION["rol"] == "Paciente") {

  include "modulos/menuPaciente.php";
  
} else if ($_SESSION["rol"] == "Doctor") {

  include "modulos/menuDoctor.php";
  
} else if ($_SESSION["rol"] == "Administrador") {

  include "modulos/menuAdmin.php";
  
}



$url = array();

if(isset($_GET["url"])){
  
  $url = explode("/", $_GET["url"]);

  if ($url[0] == "inicio" || $url[0] == "salir" || $url[0] == "perfil-Secretaria" || $url[0] == "perfil-S" || $url[0] == "consultorios" || $url[0] == "E-C" || $url[0] == "doctores" || $url[0] == "pacientes" || $url[0] == "perfil-Paciente" || $url[0] == "perfil-P" || $url[0] == "Ver-consultorios" || $url[0] == "Doctor" || $url[0] == "historial" || $url[0] == "perfil-Doctor" || $url[0] == "perfil-D" || $url[0] == "Citas" || $url[0] == "perfil-Administrador" || $url[0] == "perfil-A" || $url[0] == "secretarias" || $url[0] == "inicio-editar" || $url[0] == "historiaClinica" || $url[0] == "hc-paciente" || $url[0] == "tratamientos" || $url[0] == "tratamientos-sesion" || $url[0] == "editar-tratamiento" || $url[0] == "editar-diagnostico" || $url[0] == "nuevo-diagnostico" || $url[0] == "eliminar-diagnostico"   ||  $url[0] == "eliminar-tratamientoSesion" || $url[0] == "EditarCita" || $url[0] == "especialidades" || $url[0] == "editar-especialidad" || $url[0] == "editar-secretaria") 
  {

    include "modulos/".$url[0].".php";
 
   } 

  }  else {
    
    include "modulos/inicio.php";
  
  }


  echo '</div>';

} else if (isset($_GET["url"])) {
  
  if($_GET["url"] == "home"){
   
    include "modulos/home.php";
  
  }else if($_GET["url"] == "ingreso-Secretaria"){

      include "modulos/ingreso-Secretaria.php";

  }

  else if($_GET["url"] == "ingreso-Paciente"){

      include "modulos/ingreso-Paciente.php";

  }
  else if($_GET["url"] == "ingreso-Doctor"){

      include "modulos/ingreso-Doctor.php";

  }
  else if($_GET["url"] == "ingreso-Administrador"){

      include "modulos/ingreso-Administrador.php";

  }


}else {
  include "modulos/home.php";
}








?>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->


  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
 
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="http://localhost/clinica/Vistas/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="http://localhost/clinica/Vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="http://localhost/clinica/Vistas/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="http://localhost/clinica/Vistas/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->

<script src="http://localhost/clinica/Vistas/dist/js/adminlte.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="http://localhost/clinica/Vistas/dist/js/demo.js"></script>

<!-- DataTables-->

<script src="http://localhost/clinica/Vistas/bower_components/datatables.net/js/jquery.dataTables.js"></script>

<script src="http://localhost/clinica/Vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>

<script src="http://localhost/clinica/Vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>

<script src="http://localhost/clinica/Vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>



<script src="http://localhost/clinica/Vistas/js/doctores7.js"></script>

<script src="http://localhost/clinica/Vistas/js/pacientes.js"></script>

<script src="http://localhost/clinica/Vistas/js/secretarias.js"></script>



<!-- fullCalendar -->

<script src="http://localhost/clinica/Vistas/bower_components/moment/moment.js"></script>
<script src="http://localhost/clinica/Vistas/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="http://localhost/clinica/Vistas/bower_components/fullcalendar/dist/locale/es.js"></script>


<!-- timePicker -->

<script src="http://localhost/clinica/Vistas/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>

<script src="http://localhost/clinica/Vistas/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>



<script>


  /*
    $(document).ready(function() {
      $('.DT').DataTable( {
          "order": [[ 1, "desc" ]]
          } );
    } );
*/

  $(document).ready(function () {
    $('.sidebar-menu').tree()
  });





  var date = new Date()
  var d    = date.getDate(),
      m    = date.getMonth(),
      y    = date.getFullYear()






 $('#calendar').fullCalendar({
      
//hiddenDays: [0,6],

hiddenHours:[10,11,12],
      
      locale:"es",

       defaultView: 'agendaWeek',
       scrollTime: "08:00:00",
          minTime: "08:00:00",
          maxTime: "20:00:00",


      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay, addEventButton'
      },
      buttonText: {
        today: 'Hoy',
        month: 'Mes',
        week : 'Semana',
        day  : 'Día'
      },


      eventMouseover: function(calEvent, jsEvent) {
          
         if (calEvent.especialidad == "SE" ) {
          
           var tooltip = 
          '<div class="tooltipevent" style="width:200px;height:auto;background:#AED0EA;border-radius:6px ; box-shadow: 5px 10px #cccccc99; border: 1px solid; position:absolute;z-index:10001;">' + 
          
        
         '<strong>Doctor(a): </strong>' + calEvent.doctor + '<br>' +
         
         

         '<strong> Especialidad:  <div class="alert-sm alert-warning" style="text-align:center"> <i class="fa fa-warning"></i> Sin especialidad</div></strong>' +
         '<strong> Paciente:  </strong> ' + calEvent.paciente + '<br>' +


         '<strong>Descripción: </strong>' + calEvent.desc + '<br>' +

          '<br></div>';
          var $tooltip = $(tooltip).appendTo('body');


          $(this).css('color','#000');

          $(this).mouseover(function(e) {

              $(this).css('z-index', 10000);
              $tooltip.fadeIn('500');
              $tooltip.fadeTo('10', 1.9);
          }).mousemove(function(e) {
              $tooltip.css('top', e.pageY + 10);
              $tooltip.css('left', e.pageX + 20);
          });
         }


         if (calEvent.doctor == "SD-SD" ) {
           var tooltip = 
          '<div class="tooltipevent" style="width:200px;height:auto;background:#AED0EA;border-radius:6px ; box-shadow: 5px 10px #cccccc99; border: 1px solid; position:absolute;z-index:10001;">' + 
          
        
         '<strong>Doctor(a): </strong> <div class="alert-sm alert-warning" style="text-align:center"> <i class="fa fa-warning"></i> Sin Doctor</div></strong> <br>' +
         
         

         '<strong> Especialidad:  </strong> N/A <br>' +
         '<strong> Paciente:  </strong> ' + calEvent.paciente + '<br>' +


         '<strong>Descripción: </strong>' + calEvent.desc + '<br>' +

          '<br></div>';
          var $tooltip = $(tooltip).appendTo('body');


          $(this).css('color','#000');

          $(this).mouseover(function(e) {

              $(this).css('z-index', 10000);
              $tooltip.fadeIn('500');
              $tooltip.fadeTo('10', 1.9);
          }).mousemove(function(e) {
              $tooltip.css('top', e.pageY + 10);
              $tooltip.css('left', e.pageX + 20);
          });
         }


        if (calEvent.especialidad != "SE") {
           var tooltip = 
          '<div class="tooltipevent" style="width:200px;height:auto;background:#AED0EA;border-radius:6px ; box-shadow: 5px 10px #cccccc99; border: 1px solid; position:absolute;z-index:10001;">' + 
          
        
         '<strong>Doctor(a): </strong>' + calEvent.doctor + '<br>' +
         
         

         '<strong> Especialidad:  </strong> ' + calEvent.especialidad + '<br>' +
         '<strong> Paciente:  </strong> ' + calEvent.paciente + '<br>' +


         '<strong>Descripción: </strong>' + calEvent.desc + '<br>' +

          '<br></div>';
          var $tooltip = $(tooltip).appendTo('body');


          $(this).css('color','#000');

          $(this).mouseover(function(e) {

              $(this).css('z-index', 10000);
              $tooltip.fadeIn('500');
              $tooltip.fadeTo('10', 1.9);
          }).mousemove(function(e) {
              $tooltip.css('top', e.pageY + 10);
              $tooltip.css('left', e.pageX + 20);
          });
         }

         
      },

      eventMouseout: function(calEvent, jsEvent) {
          $(this).css('z-index', 8);
          $('.tooltipevent').remove();
          $(this).css('color','white');
      },



      allDaySlot: false,
    
      eventColor: '#909090',
  
      events    : [
      <?php

      $resultado = CitasC::VerCitasC();

    
        foreach ($resultado as $key => $value) {
                
                if(substr($_GET["url"], 0) == "inicio"){

                  echo'

                  {

                    id: '.$value["id"].',';

                    
                    $id_paciente = $value["id_paciente"];

                    $resultado_paciente = PacientesC::VerPacientesC("id", $id_paciente);

                    $id_doctor = $value["id_doctor"];

                    $resultado_doctor = DoctoresC::DoctorC("id", $id_doctor);

                    $id_especialidad = $resultado_doctor["id_especialidad"];

                    $especialidad = EspecialidadesC::VerEspecialidadesC("id", $id_especialidad);


                    if (empty($resultado_doctor["nombre"]) && empty($resultado_doctor["apellido"]) ) {

                        echo'doctor: "SD-SD",';

                    }else{

                       echo'

                        doctor: "'.$resultado_doctor["nombre"].' '.$resultado_doctor["apellido"].'",

                         ';

                    }

                   
                    

                    if (empty($especialidad["nombre_especialidad"]) == 1) {

                      echo ' especialidad: "SE",';

                    } else{

                      echo 'especialidad: "'.$especialidad["nombre_especialidad"].'",';
                    }



                    echo'
                    title: "Paciente: '.$value["nyaP"].' - Dr(a). '.$resultado_doctor["nombre"].' '.$resultado_doctor["apellido"].' ",
                   
                    paciente: "'.$value["nyaP"].'",
                    start: "'.$value["inicio"].'",
                    end: "'.$value["fin"].'",
                    desc: "'.$value["documento"].' ",

                    ';



                    echo'

                    color: "'.$resultado_doctor["colorCita"].'"

                  },';

                }

                else if($value["id_doctor"] == substr($_GET["url"], 6)){

                  echo'

                  {
                    ';

                    $id_doctor = $value["id_doctor"];

                    $resultado_doctor = DoctoresC::DoctorC("id", $id_doctor);

                    echo'

                    id: '.$value["id"].',
                    title: "Paciente: '.$value["nyaP"].' - Dr(a). '.$resultado_doctor["nombre"].' '.$resultado_doctor["apellido"].' ",
                    doctor: "'.$resultado_doctor["nombre"].' '.$resultado_doctor["apellido"].'",
                    paciente: "'.$value["nyaP"].'",
                    start: "'.$value["inicio"].'",
                    end: "'.$value["fin"].'",
                    desc: "'.$value["documento"].' ",

                    ';

                    

                    echo'

                    color: "'.$resultado_doctor["colorCita"].'"


                  },';

                }

              }      

      ?>



    ],

      customButtons: {
        addEventButton: {
          text: 'Nueva Cita',

          click: function () {

            $('#CitaModal').modal();
          }
        }
  },

      eventAfterRender: function(event, element, view) {

                      
                      $(element).css('cursor','pointer');
                   
                    },


      eventClick:function(calEvent, jsEvent, view){
        console.log(calEvent)
        console.log(jsEvent)
        window.location = "/clinica/EditarCita/"+calEvent.id; 
        
    
      },



      dayClick: function(date, jsEvent, view){

     //   alert(date.format());

      $('#CitaModal').modal();

      var fecha = date.format();
      var hora2 = ("01:00:00").split(":");

      fecha = fecha.split("T");


      var dia = fecha[0];

      var hora = (fecha[1].split(":"));

      var h1 = parseFloat(hora[0]);

      var h2 = parseFloat(hora2[0])

      var horaFinal = h1+h2;


      $('#fechaC').val(dia);



      

      if (h1<9) {
        $('#horaC').val("0"+h1+":00");
        $('#horaCF').val("0"+horaFinal+":00");
        $('#fyhIC').val(fecha[0]+" 0"+h1+":00");

      }

      if (h1==9) {
        $('#horaC').val("0"+h1+":00");
        $('#horaCF').val(horaFinal+":00");
        $('#fyhIC').val(fecha[0]+" 0"+h1+":00");

      }

      if (h1>9) {
        $('#horaC').val(h1+":00");
        $('#horaCF').val(horaFinal+":00");
        $('#fyhIC').val(fecha[0]+" "+h1+":00");
      }
      

      $('#fyhFC').val(fecha[0]+" "+horaFinal+":00");



    },
    
      
    })



   
  

</script>




</body>


</html>

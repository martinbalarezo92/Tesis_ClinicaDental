
$(".DT").on("click",".EditarDoctor", function(){

	var Did = $(this).attr("Did");
	var datos = new FormData();

	datos.append("Did", Did);

	$.ajax({

		url: "Ajax/doctoresA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		contentType: false,
		cache: false,
		processData: false,

		success: function(resultado){

			$("#Did").val(resultado["id"]);
			$("#apellidos").val(resultado["apellido"]);
			$("#cedulaE").val(resultado["cedula_doctor"]);
			$("#nombreE").val(resultado["nombre"]);
			$("#usuarioE").val(resultado["usuario"]);
			$("#claveE").val(resultado["clave"]);

			$("#especialidadE").val(resultado["id_especialidad"]);

			//$("#especialidadE").html(resultado["id_especialidad"]);

			$("#sexoE").html(resultado["sexo"]);
			$("#sexoE").val(resultado["sexo"]);

			$("#colorE").val(resultado["colorCita"]);
			$("#colorE").html(resultado["colorCita"]);
			

						

		}

	})

})



$(".DT").on("click", ".EliminarDoctor", function(){

	var Did = $(this).attr("Did");
	var imgD = $(this).attr("imgD");

	window.location = "index.php?url=doctores&Did="+Did+"&imgD="+imgD;

})




$(".DT").DataTable({


	"language":{


		"sSearch": "Buscsssar:",
		"sEmptyTable": "No hay datos",
		"sZeroRecords": "No se encontraron resultados",
		"sInfo" : "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
		"sInfoEmpty": "Mostrando registros de 0 al 0 de un total de 0",
		"sInfoFiltered": "(Filtando de un total de _MAX_ registros)",
		"oPaginate":{

			"sFirst": "Primero",
			"sLast": "Último",
			"sNext": "Siguiente",
			"sPrevious": "Anterior"

		},

		"sLoadingRecords": "Cargando . . .",
		"sLengthMenu": "Mostrar _MENU_ registros"

	}

})

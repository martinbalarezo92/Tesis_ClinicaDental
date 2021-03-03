<?php

require_once "Controladores/plantillaC.php";

require_once "Controladores/secretariasC.php";
require_once "Modelos/secretariasM.php";

require_once "Controladores/consultoriosC.php";
require_once "Modelos/consultoriosM.php";

require_once "Controladores/doctoresC.php";
require_once "Modelos/doctoresM.php";

require_once "Controladores/pacientesC.php";
require_once "Modelos/pacientesM.php";

require_once "Controladores/citasC.php";
require_once "Modelos/citasM.php";

require_once "Controladores/adminC.php";
require_once "Modelos/adminM.php";

require_once "Controladores/inicioC.php";
require_once "Modelos/inicioM.php";

require_once "Controladores/historiaClinicaC.php";
require_once "Modelos/historiaClinicaM.php";

require_once "Controladores/tratamientosC.php";
require_once "Modelos/tratamientosM.php";

require_once "Controladores/diagnosticoC.php";
require_once "Modelos/diagnosticoM.php";

require_once "Controladores/especialidadesC.php";
require_once "Modelos/especialidadesM.php";



/*require_once "Controladores/tratamientosSesionC.php";
require_once "Modelos/tratamientosSesionM.php";*/

$plantilla = new Plantilla();
$plantilla -> llamarPlantilla();
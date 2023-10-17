<?php
require_once '../class/inscripcion.php';
$person = new Inscripcion();
$datos = $person->datatable();
return json_encode($datos);
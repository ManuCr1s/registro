<?php
require_once '../class/inscripcion.php';
$person = new Inscripcion();
$hora=date('G');
$datos = $person->datatable($hora);
return json_encode($datos);
<?php
require_once '../class/inscripcion.php';
$person = new Inscripcion();
$hora=date('H');
$datos = $person->datatable($hora);
return json_encode($datos);
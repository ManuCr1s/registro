<?php
require_once '../class/inscripcion.php';
$person = new Inscripcion();
$datos = $person->read();
return json_encode($datos);
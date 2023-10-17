<?php
require_once '../class/inscripcion.php';
$person = new Inscripcion();
$datos = $person->show($_POST['dni']);
if($datos){
	echo json_encode($datos);
}else{
	$token = 'apis-token-5911.FDxtPxTphSDLaVa2jeSajYH4TkYXMBp3';
	$dni = $_POST['dni'];
	$persona = $person->query($dni,$token);
	echo json_encode($persona);
}

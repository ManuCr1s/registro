<?php
require_once '../class/inscripcion.php';
$person = new Inscripcion();
$time_register = date('H:i:s');
$datos = $person->time($time_register,$_POST['id']);
if($datos){
    $response = array('status'=>true,'message'=>'Se ah registrado Exitosamente');
}else{  
    $response = array('status'=>false,'message'=>'Vuelva a intentarlo en un momento');
}
echo json_encode($response);
<?php
require_once '../class/inscripcion.php';
$person = new Inscripcion();
$datos = $person->time($_POST['time'],$_POST['id']);
if($datos){
    $response = array('status'=>true,'message'=>'Se ah registrado Exitosamente');
}else{  
    $response = array('status'=>false,'message'=>'Vuelva a intentarlo en un momento');
}
echo json_encode($response);
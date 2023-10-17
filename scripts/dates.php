<?php
require_once '../class/inscripcion.php';
$partes = explode(' ',$_POST['nombre']);
$nombre = $partes[0];
$apellidos = $partes[1];
$person = new Inscripcion();
$datos = $person->store($_POST['procedencia'],$_POST['entrada'],$_POST['oficina'],$_POST['dni'],$nombre,$apellidos);
$reponse = [];
if($datos){
      $reponse = ['status'=>true,'message' => 'Ha registrado exitosamente'];
}else{
      $reponse = ['status'=>false,'message' => 'Vuelva a intentarlo'];
}
echo json_encode($reponse);
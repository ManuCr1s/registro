<?php
require_once '../class/inscripcion.php';
if (isset($_POST)){
	$dni = $_POST['dni'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$provincia = $_POST['provincia'];
	$distrito = $_POST['distrito'];
	$asociacion = $_POST['asociacion'];
	$cargo = $_POST['cargo'];
	$gradoInstruccion = $_POST['gradoInstruccion'];
	$profesión = $_POST['profesión'];
	$fNacimiento = $_POST['fNacimiento'];
	$inscrito = new Inscripcion();
	if($inscrito->show($_POST['dni'])){
		$datos = ['status'=>false, 'message'=>'El usuario ya se encuentra registrado'];
		echo json_encode($datos);
	}else{
		$valor = $inscrito->store($dni,$nombre,$apellido,$provincia,$distrito,$asociacion,$cargo,$gradoInstruccion,$profesión,$fNacimiento);
		if($valor){
			$datos = ['status'=>true, 'message'=>'Usted se ha registrado Satisfactoriamente'];
			echo json_encode($datos);
		}else{
			$datos = ['status'=>false, 'message'=>'Intente su registro en un momento por favor'];
			echo json_encode($datos);
		}
	}
}else{
	$datos = ['status'=>false, 'message'=>'Ingrese Datos al formulario'];
	echo json_encode($datos);
}

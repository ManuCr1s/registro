<?php
require_once '../class/inscripcion.php';
$conexion = new Inscripcion();
echo $conexion->read();
/*
$db = new mysqli("localhost", "root", "", "gobpasco");
if ($db->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $db->connect_errno . ") " . $mysqli->connect_error;
}
*/
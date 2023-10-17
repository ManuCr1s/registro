<?php
require_once 'conexion.php';
$key = 2;
$datos = array();
$query = "SELECT nombre FROM distritos WHERE id_provincias = '$key'";
$result = $db->query($query);
while($fila = $result->fetch_assoc()){
    $datos[] = $fila;
}
echo json_encode($datos);

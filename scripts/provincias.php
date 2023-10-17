<?php
  require_once 'conexion.php';
  $query="SELECT
  nombre
  FROM
  provincias";
  $result=$db->query($query);
  while($fila = $result->fetch_assoc()){
    $datos = ['nombre'=> $fila['nombre']];
    echo json_encode($datos);
  }
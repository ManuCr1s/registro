<?php

$key='72647100';
$datos = file_get_contents('https://dniruc.apisperu.com/api/v1/dni/'.$key.'?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImpvaGFubmVzdmM1QGdtYWlsLmNvbSJ9.z0XDnPGLK81EXms1XO4KLFRF40MJrSjE0ixb7xj9Hpw');

print_r($datos);

?>
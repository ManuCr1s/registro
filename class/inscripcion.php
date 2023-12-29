<?php
require 'database.php';
use Class\Database;
class Inscripcion{
    public $database;
    public $conexion;

    public function connect(){
        $this->database = new Database();
        $this->conexion = $this->database->getConexion();
        return $this->conexion;
    }

    public function office(){
        $query = 'select id_oficina,nombre from offices';
        $this->response = $this->connect()->prepare($query);
        $this->response->execute();
        $fila = $this->response->fetchAll(PDO::FETCH_ASSOC);
        $this->response = null;
        echo json_encode($fila);     
    }

    public function read(){
        $fecha = date('Y-m-d');
        $query = "select count(*) as numero from registers where fecha = '$fecha'";
        $this->response = $this->connect()->prepare($query);
        $this->response->execute();
        $fila = $this->response->fetch(PDO::FETCH_ASSOC);
        $this->response = null;
        echo json_encode($fila);     
    }
    public function person_read($dni){
        $query = "select count(*) as numero from person where id_person = :dni";
        $this->response = $this->connect()->prepare($query);
        $this->response->bindParam(':dni', $dni);
        $this->response->execute();
        $fila = $this->response->fetch(PDO::FETCH_ASSOC);
        $this->response = null;
        return ($fila['numero'] > 0);     
    }

    public function show($dni){
        $query = "select id_person as numeroDocumento,nombre as nombres,apellidos as apellidoPaterno from person where id_person = :dni";
        $this->response = $this->connect()->prepare($query);
        $this->response->execute([':dni'=>$dni]);
        $fila = $this->response->fetch(PDO::FETCH_ASSOC);
        $this->response = null;
        if($fila){
            $fila['status'] = true;
            $fila['apellidoMaterno'] = '';
            return $fila;
        }else{
            return false;
        }
       
    }
    public function time($time,$id){
        $query = "UPDATE registers SET hora_end = :tiempo WHERE id_register = :id";
        try {
            $this->response = $this->connect()->prepare($query);
            $this->response->bindParam(':tiempo', $time);
            $this->response->bindParam(':id', $id);
            $this->response->execute();
            return ($this->response->rowCount() > 0);
        } catch (PDOException $e) {
            error_log("Error en la actualización de tiempo: " . $e->getMessage());
            return false;
        } finally {
            $this->response = null;
        }
    }


    public function person($id_person,$nombre,$apellidos){
        $query = "INSERT INTO person(id_person,nombre,apellidos) VALUES (:id_person,:nombre,:apellidos)";
        try {
            $this->response = $this->connect()->prepare($query);
            $this->response->bindParam(':id_person', $id_person);
            $this->response->bindParam(':nombre', $nombre);
            $this->response->bindParam(':apellidos', $apellidos);
            $this->response->execute();
            return ($this->response->rowCount() > 0);
        } catch (PDOException $e) {
            return false;
        } finally {
            $this->response = null;
        }
    }

    public function query($dni,$token){
            $curl = curl_init();
            // Buscar dni
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.apis.net.pe/v2/reniec/dni?numero=' . $dni,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 2,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Referer: https://apis.net.pe/consulta-dni-api',
                'Authorization: Bearer ' . $token
            ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            if($response == null){
                return ['status'=>false, 'message' => 'Compruebe su conexion a internet'];
            }
            $person = json_decode($response);
            if(property_exists($person,'message')){
                $person->status=false;
            }else{
                self::person($person->numeroDocumento,$person->nombres,$person->apellidoPaterno.' '.$person->apellidoMaterno);
                $person->status=true;
            }
            return $person;
    }

    public function store($institucion,$hora_start,$id_oficina,$id_person,$nombre,$apellidos){
        $fecha = date('Y-m-d');
        if(!(self::person_read($id_person))){
            self::person($id_person,$nombre,$apellidos);
        }
        $query = "INSERT INTO registers(institucion,fecha,hora_start,id_oficina,id_person) VALUES (:institucion,:fecha,:hora_start,:id_oficina,:id_person)";
        try {
            $this->response = $this->connect()->prepare($query);
            $this->response->bindParam(':institucion', $institucion);
            $this->response->bindParam(':fecha', $fecha);
            $this->response->bindParam(':hora_start', $hora_start);
            $this->response->bindParam(':id_oficina', $id_oficina);
            $this->response->bindParam(':id_person', $id_person);
            $this->response->execute();
            return ($this->response->rowCount() > 0);
        } catch (PDOException $e) {
            return false;
        } finally {
            $this->response = null;
        }
    }
    public function datatable(){
        $fecha = date('H');
        $hora_start = 13;
        $hora_end = 24;
        if($hora_now>=1 && $hora_now<=12){
            $hora_start = 1;
            $hora_end = 12;
        }
        $query =    "SELECT id_register as id,CONCAT(pe.nombre,pe.apellidos) as nombre,pe.id_person as dni,re.hora_start as entrada,re.institucion as entidad,of.nombre as oficina, re.hora_end as salida  FROM registers re
                    INNER JOIN offices of ON of.id_oficina = re.id_oficina
                    INNER JOIN person pe ON pe.id_person = re.id_person
                    WHERE re.fecha = '$fecha' AND re.hora_start BETWEEN '$hora_start' AND '$hora_end'";
        $this->response = $this->connect()->prepare($query);
        $this->response->execute();
        $fila = $this->response->fetchAll(PDO::FETCH_ASSOC);
        $this->response = null;
        echo json_encode($fila); 
    }
}
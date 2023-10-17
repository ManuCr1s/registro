<?php
namespace Class;
use PDO;
class Database{
    private $name_database = 'registro';
    private $server = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $conexion;
    public function __construct() {
        $this->conexion = $this->createConexion();
    }
    private function createConexion(){

        $dsn = "mysql:host={$this->server};dbname={$this->name_database}";
        try {
            $this->conexion = new PDO($dsn, $this->user, $this->pass);   
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conexion;
        } catch (PDOException $e) {
            throw new Exception("Error al conectar a la base de datos: " . $e->getMessage());
        }
        return $conexion;
    }
    public function getConexion(){
          return $this->conexion;
    }
}
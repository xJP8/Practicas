<?php
    require_once 'Database.php';

    class MySql extends Database{
        private $host = "localhost"; // Dirección Host
        private $dbname = "muebles_posada"; // Nombre Base de Datos
        private $user = "root"; // Nombre Usuario
        private $pass = "root"; // Contraseña Usuario

        public function __construct() {
            try {
                $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->user, $this->pass);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Error en la conexión: " . $e->getMessage());
            }
        }
    }
?>
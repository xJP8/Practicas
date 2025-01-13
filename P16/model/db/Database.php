<?php
    class Database{
        private $host = "localhost"; // Dirección Host
        private $dbname = "muebles_posada"; // Nombre Base de Datos
        private $user = "root"; // Nombre Usuario
        private $pass = "root"; // Contraseña Usuario
        private $conn;

        public function __construct() {
            try {
                $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->user, $this->pass);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Error en la conexión: " . $e->getMessage());
            }
        }

        public function __destruct() {
            $this->disconnect();
        }

        public function disconnect() {
            $this->conn = null;
        }

        public function getMuebles() {
            $sql = "SELECT nombre, precio FROM Mueble";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getPiezas() {
            $sql = "SELECT nombre FROM Pieza";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>
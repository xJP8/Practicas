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

        

        public function getPiezas() {
            $sql = "SELECT nombre FROM Pieza";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getUser($user, $pass){
            $sql = "SELECT user FROM Usuario WHERE user = ? AND pass = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$user, $pass]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getExistencia($pieza) {
            $sql = "SELECT P.nombre, sum(E.unidades) FROM Pieza P, Estante E WHERE P.cod = E.cod_pieza AND P.nombre = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($pieza);
            $stmt->fetchAll(PDO::FETCH_ASSOC);
            return null;
        }
    }
?>
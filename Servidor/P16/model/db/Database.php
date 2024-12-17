<?php
    class Database{
        private $host = "sql7.freemysqlhosting.net"; // Dirección Host
        private $dbname = "sql7751449"; // Nombre Base de Datos
        private $user = "sql7751449"; // Nombre Usuario
        private $pass = "VGD4EMEjQA"; // Contraseña Usuario
        private $pdo;

        public function __construct() {
            try {
                $this->pdo = new PDO(
                    "mysql:host={$this->host};dbname={$this->dbname}",
                    $this->user,
                    $this->pass
                );
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Error en la conexión: " . $e->getMessage());
            }
        }
    
        public function getConnection() {
            return $this->pdo;
        }
    }
?>
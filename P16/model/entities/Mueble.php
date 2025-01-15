<?php
    require_once __DIR__ . "/../model/db/Database.php";
    class Mueble{

        private $db;
        
        public function __construct() {
            $this->db = new Database();
        }

        public function getMuebles() {
            $sql = "SELECT nombre, precio FROM Mueble";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>
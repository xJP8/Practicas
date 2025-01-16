<?php
    require_once __DIR__ . "/../db/Database.php";
    class Pieza{
        private $db;

        public function __construct() {
            $this->db = new Database();
        }

        public function getPiezas() {
            $sql = "SELECT nombre FROM Pieza";
            $stmt = $this->db->getConn()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>
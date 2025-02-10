<?php
    require_once __DIR__ . "/../db/Database.php";
    class Mueble{

        private $db;
        
        public function __construct() {
            $this->db = new Database();
        }

        public function getMuebles($pagina) {
            $MAX_MUEBLES = 10;
            $offset = ($pagina - 1) * $MAX_MUEBLES;
            $sql = "SELECT nombre, precio FROM Mueble LIMIT $MAX_MUEBLES OFFSET $offset";
            $stmt = $this->db->getConn()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getNumPaginas() {
            $sql = "SELECT COUNT(*) as numMuebles FROM Mueble";
            $stmt = $this->db->getConn()->prepare($sql);
            $stmt->execute();
            $numMuebles = $stmt->fetch(PDO::FETCH_ASSOC);
            return ceil($numMuebles['numMuebles'] / 10);
        }
    }
?>
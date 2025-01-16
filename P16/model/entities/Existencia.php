<?php
    require_once __DIR__ . "/../db/Database.php";
    class Existencia{
        private $db;
        
        public function __construct() {
            $this->db = new Database();
        }

        public function getExistencia($pieza) {
            $sql = "SELECT P.nombre AS nombre, SUM(E.unidades) AS total_unidades FROM Pieza P, Estante E WHERE P.cod = E.cod_pieza AND P.nombre = ? GROUP BY P.nombre";
            $stmt = $this->db->getConn()->prepare($sql);
            $stmt->execute([$pieza]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
?>
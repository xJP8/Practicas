<?php
    require_once "../model/db/DAO.php";
    require_once "../model/db/MySql.php";
    require_once "../model/db/Database.php";
    require_once "../model/session/Session.php";

    class ExistenciaViewController {
        private DAO $db;
        private Session $session;

        public function __construct() {
            $this->db = new MySql();
            $this->session = new Session();
        }

        public function checkSession() {
            if (!$this->session->isActive()) {
                header("Location: login.php");
                exit();
            }
        }

        public function getExistencias(Pieza $pieza) {
            $sql = "SELECT P.nombre, sum(E.unidades) FROM Pieza P, Estante E WHERE P.cod = E.cod_pieza AND P.nombre = ?";
            $stmt = $this->db->query($sql, [$pieza]);
            return $stmt->fetch(PDO::FETCH_ASSOC); 
        }

        public function __toString(){
            $msg = "";
            $result = $this->getExistencias($_POST["pieza"]); //TODO por arreglar 
            if ($result) {
                $msg = "Existencias encontradas: " . $result['nombre'] . " - " . $result['sum(E.unidades)'] . " unidades.";
            } else {
                $msg = "No encontrada";
            }
            return $msg;
        }
    }
?>
<?php
    require_once "../model/db/DAO.php";
    require_once "../model/db/MySql.php";
    require_once "../model/db/Database.php";
    require_once "../model/session/Session.php";

    class PiezaViewController {
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

        public function getPiezas() {
            $sql = "SELECT nombre FROM Pieza";
            $stmt = $this->db->query($sql);
            return $stmt->fetch(PDO::FETCH_ASSOC); 
        }

        public function __toString(){
            $msg = "";
            $result = $this->getPiezas();
            if ($result) {
                $msg = "<OPTION>".$result['nombre']."</OPTION>";
            } else {
                $msg = "<OPTION>No hay piezas disponibles</OPTION>";
            }
            return $msg;
          
        }
    }
?>
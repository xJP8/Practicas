<?php
    require_once "../model/db/DAO.php";
    require_once "../model/db/MySql.php";
    require_once "../model/db/Database.php";
    require_once "../model/session/Session.php";

    class MuebleViewController {
        private DAO $db;

        public function __construct() {
            $this->db = new MySql();
        }

        public function getMuebles() {
            $sql = "SELECT nombre, precio FROM Mueble";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC); 
        }

        public function __toString(){
            $msg = "";
            $muebles = $this->getMuebles();
            if ($muebles) {
                foreach($muebles as $mueble) {
                    $msg .= "<TR>
                            <TD ALIGN='CENTER'>" . $mueble["nombre"] . "</TD>
                            <TD ALIGN='CENTER'>" . number_format($mueble["precio"], 2) . " €</TD>
                            </TR>";
               }
            } else {
                $msg = "<TR>
                        <TD ALIGN='CENTER' COLSPAN=2>No hay muebles en la base de datos</TD>
                        </TR>";
            }
            return $msg;
          
        }
    }
?>
<?php
    require_once __DIR__ . "/../db/Database.php";
    class User {
        private $db;

        public function __construct() {
            $this->db = new Database();
        }

        public function getUser($user, $pass){
            $sql = "SELECT user FROM Usuario WHERE user = ? AND pass = ?";
            $stmt = $this->db->getConn()->prepare($sql);
            $stmt->execute([$user, $pass]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>
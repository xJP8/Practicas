<?php
    require_once 'DAO.php';
    abstract class Database implements DAO{
        protected $conn;

        public function __destruct() {
            $this->disconnect();
        }

        public function disconnect() {
            $this->conn = null;
        }

        public function query($sql, $params = []) {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        }

        public function getConn() {
            return $this->conn;
        }
    }
?>
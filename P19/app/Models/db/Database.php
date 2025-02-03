<?php

namespace App\Models\db;

use Illuminate\Database\Eloquent\Model;
use PDO;
use PDOException;

    class Database{
        private $conn;

        public function __construct() {
            $host = getenv('DB_HOST');
            $dbname = getenv('DB_DATABASE');
            $user = getenv('DB_USERNAME');
            $pass = getenv('DB_PASSWORD');

            try {
                $this->conn = new PDO("mysql:host={$host};dbname={$dbname}", $user, $pass);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Error en la conexión: " . $e->getMessage());
            }
        }

        public function __destruct() {
            $this->disconnect();
        }

        public function disconnect() {
            $this->conn = null;
        }

        public function getConn(){
            return $this->conn;
        }
    }
?>

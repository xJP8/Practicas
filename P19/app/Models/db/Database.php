<?php

namespace App\Models\db;

use Illuminate\Database\Eloquent\Model;
use PDO;

class Database extends Model {
    
    private $conn;
    
    public function __construct() {
        $host = getenv('DB_HOST');
        $dbname = getenv('DB_DATABASE');
        $username = getenv('DB_USERNAME');
        $password = getenv('DB_PASSWORD');
        
        $this->conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    }
    
    public function getConn() {
        return $this->conn;
    }
}

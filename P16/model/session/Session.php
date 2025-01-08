<?php
    class Session{
        public function __construct() {
            session_start();
        }

        public function __destruct() {
            $this->close();
        }

        public function start($name) {
            $_SESSION["name"] = $name;
        }

        public function close() {
            session_destroy();
        }

        public function isActive():bool {
            return isset($_SESSION["name"]);
        }

        public function redirect($ruta):void {
            header("Location: " . $ruta);
            exit();
        }
    }
?>
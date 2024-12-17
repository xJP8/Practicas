<?php
    class Session{
        public static function start() {
            session_start();
        }

        public static function close() {
            session_destroy();
        }

        public static function isStarted() {
            return isset($_SESSION["user"]);
        }

        public static function redirect($ruta) {
            header("Location: " . $ruta);
            exit();
        }
    }
?>
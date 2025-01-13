<?php
    class Session{
        public function __construct(){
            session_start();
        }

        public function isAutenticated(){
            return isset($_SESSION['user']);
        }


        public function haveAccess($controller){
            $isAutenticated = $this->isAutenticated();
            $accessList = [
                'any' => ['Inicio', 'Mueble'],
                'anonymous' => ['UserLogin'],
                'user' => ['Existencia', 'Pieza', 'UserPage', 'Logout']
            ];
            if (in_array($controller, $accessList['any'])) {
                return true;
            } else if ($isAutenticated && in_array($controller, $accessList['user'])) {
                return true;
            } else if (!$isAutenticated && in_array($controller, $accessList['anonymous'])) {
                return true;
            }
            return false;
        }
    }
?>
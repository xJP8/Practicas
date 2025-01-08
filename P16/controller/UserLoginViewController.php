<?php
    require_once "../model/db/DAO.php";
    require_once "../model/db/MySql.php";
    require_once "../model/db/Database.php";
    require_once "../model/session/Session.php";

    class UserLoginViewController {
        private DAO $db;
        private Session $session;

        public function __construct() {
            $this->db = new MySql();
            $this->session = new Session();
        }

        public function checkSession() {
            if ($this->session->isActive()) {
                header("Location: UserPageView.php");
                exit();
            }
        }

        public function login($name, $password) {
            $sql = "SELECT * FROM usuario WHERE user = ? AND pass = ?";
            $user = $this->db->query($sql, [$name, $password]);
            if ($user) {
                $this->session->start($name);
                echo "Bienvenido $name";
                // header("Location: UserPageView.php");
                // exit();
            } else {
                echo "Usuario o contraseña incorrectos";
                // header("Location: UserLoginView.php");
                // exit();
            }
        }
    }
?>
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

        public function createUser() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $username = $_POST['user'];
                $password = $_POST['pass'];
    
                // Validar datos (puedes añadir más validaciones)
                if (empty($username) || empty($password)) {
                    die("Todos los campos son obligatorios.");
                }
                $user = new User($username, $password);
                $this->login($user);
            } else {
                die("Método no permitido.");
            }
        }

        public function login(User $user) {
            $sql = "SELECT * FROM usuario WHERE user = ? AND pass = ?";
            $user = $this->db->query($sql, [$user->getName(), $user->getPassword()]);
            if ($user) {
                $this->session->start($user->getName());
                echo "Bienvenido $user->getName()";
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
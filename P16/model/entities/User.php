<?php
    class User{
        private String $name;
        private String $password;

        public function __construct($name, $password){
            $this->name = $name;
            $this->password = $password;
        }

        // Getters y Setters //

        public function getName(){
            return $this->name;
        }

        public function getPassword(){
            return $this->password;
        }

        public function setName($name){
            $this->name = $name;
        }

        public function setPassword($password){
            $this->password = $password;
        }

        
        // Otros Métodos //

        public function __toString(){
            return $this->name;
        }
    }
?>
<?php
    class Pieza{
        private int $id;
        private String $nombre;
        private String $descripcion;

        public function __construct($id, $nombre, $descripcion){
            $this->id = $id;
            $this->nombre = $nombre;
            $this->descripcion = $descripcion;
        }

        // Getters y Setters //

        public function getId(){
            return $this->id;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function getDescripcion(){
            return $this->descripcion;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
        }


        // Otros Métodos //

        public function __toString(){
            return $this->nombre;
        }
    }

?>
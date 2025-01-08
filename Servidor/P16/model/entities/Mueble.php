<?php
    class Mueble{
        private int $id;
        private String $nombre;
        private float $precio;

        public function __construct($id, $nombre, $precio){
            $this->id = $id;
            $this->nombre = $nombre;
            $this->precio = $precio;
        }

        // Getters y Setters //

        public function getId(){
            return $this->id;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function getPrecio(){
            return $this->precio;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function setPrecio($precio){
            $this->precio = $precio;
        }


        // Otros Métodos //

        public function __toString(){
            return $this->nombre;
        }
    }
?>
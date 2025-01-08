<?php
    class Formado{  
        private Mueble $mueble;
        private Pieza $pieza;
        private int $cantidad;

        public function __construct($mueble, $pieza, $cantidad){
            $this->mueble = $mueble;
            $this->pieza = $pieza;
            $this->cantidad = $cantidad;
        }

        // Getters y Setters //

        public function getMueble(){
            return $this->mueble;
        }

        public function getPieza(){
            return $this->pieza;
        }

        public function getCantidad(){
            return $this->cantidad;
        }

        public function setMueble($mueble){
            $this->mueble = $mueble;
        }

        public function setPieza($pieza){
            $this->pieza = $pieza;
        }

        public function setCantidad($cantidad){
            $this->cantidad = $cantidad;
        }


        // Otros Métodos //

        public function __toString(){
            return $this->mueble . " - " . $this->pieza . " - " . $this->cantidad;
        }
    }
?>
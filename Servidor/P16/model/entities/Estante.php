<?php
    class Estante {
        private int $pasillo;
        private float $altura;
        private Pieza $pieza;
        private int $unidades;

        public function __construct($pasillo, $altura, $pieza, $unidades){
            $this->pasillo = $pasillo;
            $this->altura = $altura;
            $this->pieza = $pieza;
            $this->unidades = $unidades;
        }

        // Getters y Setters //

        public function getPasillo(){
            return $this->pasillo;
        }

        public function getAltura(){
            return $this->altura;
        }

        public function getPieza(){
            return $this->pieza;
        }

        public function getUnidades(){
            return $this->unidades;
        }

        public function setPasillo($pasillo){
            $this->pasillo = $pasillo;
        }

        public function setAltura($altura){
            $this->altura = $altura;
        }

        public function setPieza($pieza){
            $this->pieza = $pieza;
        }

        public function setUnidades($unidades){
            $this->unidades = $unidades;
        }


        // Otros Métodos //

        public function __toString(){
            return $this->pasillo . " - " . $this->altura . " - " . $this->pieza . " - " . $this->unidades;
        }
    }
?>
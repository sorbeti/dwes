<?php

    class Partida {
        protected $id;
        protected $nombre;
        protected $fechaCreacion;
        protected $fechaInicio;
        protected $idJuego;
        protected $username;
        protected $finalizada;
        protected $duracion;
        protected $num_equipospartida;

        public function getid() {return $this->id;}
        public function getnombre() {return $this->nombre;}
        public function getfechaCreacion() {return $this->fechaCreacion;}
        public function getfechaInicio() {return $this->fechaInicio;}
        public function getidJuego() {return $this->idJuego;}
        public function getusername() {return $this->username;}
        public function getfinalizada() {return $this->finalizada;}
        public function getduracion() {return $this->duracion;}
        public function getnum_equipospartida() {return $this->num_equipospartida;}
        
        public function __construct($row) {
            $this->id = $row['id'];
            $this->nombre = $row['nombre'];
            $this->fechaCreacion = $row['fechaCreacion'];
            $this->fechaInicio = $row['fechaInicio'];
            $this->idJuego = $row['idJuego'];
            $this->username = $row['username'];
            $this->finalizada = $row['finalizada'];
            $this->duracion = $row['duracion']; 
            $this->num_equipospartida = $row['num_equipospartida'];   
        }
    }

?>


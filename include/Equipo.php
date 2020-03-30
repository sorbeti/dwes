<?php

    class Equipo {
        protected $id;
        protected $codigo;
        protected $nombre;
        protected $tiempo;
        protected $idPartida;
        protected $num_equipos;

        public function getid() {return $this->id;}
        public function getcodigo() {return $this->codigo;}
        public function getnombre() {return $this->nombre;} 
        public function gettiempo() {return $this->tiempo;}
        public function getidPartida() {return $this->idPartida;}
        public function getnum_equipos() {return $this->num_equipos;}

        public function __construct($row) {
            $this->id = $row['id'];
            $this->codigo = $row['codigo'];
            $this->nombre = $row['nombre'];
            $this->tiempo = $row['tiempo'];
            $this->idPartida = $row['idPartida'];
            $this->username = $row['username'];
            $this->num_equipos = $row['num_equipos'];       
        }
    }

?>


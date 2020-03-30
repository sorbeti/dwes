<?php

class Partidapag4 {
    protected $id_juego4;
    protected $nombre_juego4;
    protected $duracion4;
    protected $id_equipo4;
    protected $nombre_equipo4;
    protected $codigo4;
    protected $id_partida4;
    protected $nombre_partida4;
        
    public function getid_juego4() {return $this->id_juego4; }
    public function getnombre_juego4() {return $this->nombre_juego4; }
    public function getduracion4() {return $this->duracion4; }
    public function getid_equipo4() {return $this->id_equipo4; }
    public function getnombre_equipo4() {return $this->nombre_equipo4; }
    public function getcodigo4() {return $this->codigo4; }
    public function getid_partida4() {return $this->id_partida4; }
    public function getnombre_partida4() {return $this->nombre_partida4; }
    
    public function __construct($row) {
        $this->id_juego4 = $row['id_juego'];
        $this->nombre_juego4 = $row['nombre_juego'];
        $this->duracion4 = $row['duracion'];
        $this->id_equipo4 = $row['id_equipo'];
        $this->nombre_equipo4 = $row['nombre_equipo'];
        $this->codigo4 = $row['codigo_4'];
        $this->id_partida4 = $row['id_partida'];
        $this->nombre_partida4 = $row['nombre_partida'];
    }
}

?>

<?php

class Juego {
    protected $id;
    protected $nombre;
    protected $descExtendida;
    protected $descBreve;
    protected $fechaCreacion;
    protected $username;
    protected $num_pru;
    
    public function getid() {return $this->id; }
    public function getnombre() {return $this->nombre; }
    public function getdescExtendida() {return $this->descExtendida; }
    public function getdescBreve() {return $this->descBreve; }
    public function getfechaCreacion() {return $this->fechaCreacion; }
    public function getusername() {return $this->username; }
    public function getnum_pru() {return $this->num_pru; }
    
    public function __construct($row) {
        $this->id = $row['id'];
        $this->nombre = $row['nombre'];
        $this->descExtendida = $row['descExtendida'];
        $this->descBreve = $row['descBreve'];
        $this->fechaCreacion = $row['fechaCreacion'];
        $this->username = $row['username'];
        $this->num_pru = $row['num_pru'];
        
    }
}

?>

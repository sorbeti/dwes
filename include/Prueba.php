<?php

class Prueba {
    protected $id;
    protected $nombre;
    protected $descExtendida;
    protected $descBreve;
    protected $url;
    protected $tipo;
    protected $dificultad;
    protected $ayudaFinal;
    protected $username;
    protected $respuestas=[];
    
    public function getid() {return $this->id; }
    public function getnombre() {return $this->nombre; }
    public function getdescExtendida() {return $this->descExtendida; }
    public function getdescBreve() {return $this->descBreve; }
    public function geturl() {return $this->url; }
    public function gettipo() {return $this->tipo; }
    public function getdificultad() {return $this->dificultad; }
    //public function getayudaFinal() {return $this->ayudaFinal; }
    public function getusername() {return $this->username; }
    public function getrespuestas() {return $this->respuestas; }
    public function putrespuesta($valor) { $respuestas[] = $valor; }
    
    public function __construct($row) {
        if(isset($row['id']))//si existe el numero de pruebas para el constructor actualiza la varibale si no no hace nada 
            {
                $this->id = $row['id'];
            }        
        $this->nombre = $row['nombre'];
        $this->descExtendida = $row['descExtendida'];
        $this->descBreve = $row['descBreve'];
        $this->url = $row['url'];
        $this->tipo = $row['tipo'];
        $this->dificultad = $row['dificultad'];
        //$this->ayudaFinal = $row['ayudaFinal'];
        $this->username = $row['username'];       
        
    }

    public function cargaRespuestas($valorRespuestas){
        $this->respuestas= $valorRespuestas; 
    }
}

?>

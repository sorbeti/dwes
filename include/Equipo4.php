<?php

    class Equipo4 {
        
        protected $codigo4;
        protected $nombre4;

        
        public function getcodigo4() {return $this->codigo4;}
        public function getnombre4() {return $this->nombre4;} 

        public function __construct($row) {
            $this->codigo4 = $row['codigo4'];
            $this->nombre4 = $row['nombre4'];                 
        }
    }

?>


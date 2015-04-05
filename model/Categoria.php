<?php

class Categoria {
	var $idCategoria;
    var $nombreCategoria;
	var $activoCategoria;
    
    /*function __construct($nombre,$activo) {
        $this->nombreCategoria = $nombre;
        $this->activoCategoria = $activo;
    }*/
    function __construct($id,$nombre,$activo) {
        $this->idCategoria     = $id;
        $this->nombreCategoria = $nombre;
        $this->activoCategoria = $activo;
    }
    
    function getIdCategoria     (){ return $this->idCategoria;      }
    function getNombreCategoria (){ return $this->nombreCategoria;  }
    function getActivoCategoria (){ return $this->activoCategoria;  }
    function getCategoria       (){ return $this;                   }
}

?>

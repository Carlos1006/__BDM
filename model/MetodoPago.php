<?php

class MetodoPago {
    var $idMetodoPago;
    var $nombreMetodoPago;
    var $activoMetodoPago;

    function  __construct($nombre,$activo) {
        $this->nombreMetodoPago = $nombre;
        $this->activoMetodoPago = $activo;
    }
    function  setIdMetodoPago($id) {
        $this->idMetodoPago = $id;
    }

    function getIdMetodoPago        (){ return $this->idMetodoPago;     }
    function getNombreMetodoPago    (){ return $this->nombreMetodoPago; }
    function getActivoMetodoPago    (){ return $this->activoMetodoPago; }
    function getMetodoPago          (){ return $this;                   }
}

?>
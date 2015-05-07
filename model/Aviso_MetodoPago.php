<?php

class Aviso_MetodoPago {
    var $idAviso;
    var $idMetodoPago;

    function setIdAviso($idAviso) {
        $this->idAviso      = $idAviso;
    }
    function setIdMetodoPago($idMetodoPago) {
        $this->idMetodoPago = $idMetodoPago;
    }

    function getIdMetodoPago_AM (){ return $this->idMetodoPago;     }
    function getIdAvisoPago_AM  (){ return $this->idAviso;          }
}

?>
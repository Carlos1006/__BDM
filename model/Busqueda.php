<?php

class Busqueda {
    var $barraBuscadora;
    var $texto;
    var $fecha;
    var $nickname;
    var $fechaRangos;
    var $precioRangos;
    var $top;

    function setAvanzada($texto,$fecha,$nickname,$fechaRangos,$precioRangos) {
        $this->texto            = $texto;
        $this->fecha            = $fecha;
        $this->nickname         = $nickname ;
        $this->fechaRangos      = $fechaRangos;
        $this->precioRangos     = $precioRangos;
    }

    function setBarraBuscadora($barraBuscadora) {
        $this->barraBuscadora = $barraBuscadora;
    }

    function setTop($top) {
        $this->top = $top;
    }

    function getTop()            { return $this->top;            }
    function getBarraBuscadora() { return $this->barraBuscadora; }
    function getTexto()          { return $this->texto;          }
    function getFecha()          { return $this->fecha;          }
    function getNickname()       { return $this->nickname;       }
    function getFechaRangos ()   { return $this->fechaRangos;    }
    function getPrecioRangos ()  { return $this->precioRangos;   }
}
?>
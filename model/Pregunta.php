<?php

class Pregunta{
    var $idPregunta;
    var $descripcionPregunta;
    var $fechaPregunta;
    var $horaPregunta;
    
    var $usuario;
    var $aviso;
    
    function __construct($descripcion,$fecha,$hora) {
		$this->descripcionPregunta 	= $descripcion;
		$this->fechaPregunta 		= $fecha;
		$this->horaPregunta 		= $hora;
    }
    
    function setIdPregunta($id) {
    	$this->idPregunta 			= $id;
    }

    function setUsuarioPregunta($usuario) {
        $this->usuario = $usuario;
    }

    function setAvisoPregunta($aviso) {
        $this->aviso = $aviso;
    }
    
    function getIdPregunta          () { return $this->idPregunta; 			}
    function getDescripcionPregunta () { return $this->descripcionPregunta; }
    function getFechaPregunta       () { return $this->fechaPregunta; 		}
    function getHoraPregunta        () { return $this->horaPregunta; 		}
    function getUsuarioPregunta     () { return $this->usuario; 			}
    function getAvisoPregunta       () { return $this->aviso; 				}
    function getPregunta            () { return $this; 						}
}

?>
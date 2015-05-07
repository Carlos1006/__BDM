<?php

class Respuesta{
	var $idRespuesta;
    var $descripcionRespuesta;
    var $fechaRespuesta;
	var $horaRespuesta;
    
	var $pregunta;

	function __construct($descripcion,$fecha,$hora) {
		$this->descripcionRespuesta = $descripcion;
		$this->fechaRespuesta 		= $fecha;
		$this->horaRespuesta 		= $hora;
	}

    function setIdRespuesta($id) {
        $this->idRespuesta = $id;
    }

    function setPreguntaRespuesta($pregunta) {
        $this->pregunta = $pregunta;
    }

    function getIdRespuesta				() { return $this->idRespuesta; 		 }
    function getDescripcionRespuesta	() { return $this->descripcionRespuesta; }
    function getFechaRespuesta			() { return $this->fechaRespuesta; 		 }
    function getHoraRespuesta			() { return $this->horaRespuesta; 		 }
    function getPreguntaRespuesta		() { return $this->pregunta; 			 }
	function getRespuesta				() { return $this; 						 }
    
}

?>
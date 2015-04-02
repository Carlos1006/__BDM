<?php

include_once "Pregunta.php";
class Respuesta{
	var $idRespuesta;
    var $descripcionRespuesta;
    var $fechaRespuesta;
	var $horaRespuesta;
    
	var $pregunta;
	
	function __construct($id,$descripcion,$fecha,$hora,$pregunta) {
		$this->idRespuesta 			= $id;
		$this->descripcionRespuesta = $descripcion;
		$this->fechaRespuesta 		= $fecha;
		$this->horaRespuesta 		= $hora;
		
		$this->pregunta = new Pregunta(	$pregunta->idPregunta,
										$pregunta->fechaPregunta,
										$pregunta->horaPregunta,
										$pregunta->aviso);
	}
	
	function __construct($descripcion,$fecha,$hora,$pregunta) {
		$this->descripcionRespuesta = $descripcion;
		$this->fechaRespuesta 		= $fecha;
		$this->horaRespuesta 		= $hora;
		
		$this->pregunta = new Pregunta(	$pregunta->idPregunta,
										$pregunta->fechaPregunta,
										$pregunta->horaPregunta,
										$pregunta->aviso);
	}
    
    function getIdRespuesta				() { return $this->idRespuesta; 		 }
    function getDescripcionRespuesta	() { return $this->descripcionRespuesta; }
    function getFechaRespuesta			() { return $this->fechaRespuesta; 		 }
    function getHoraRespuesta			() { return $this->horaRespuesta; 		 }
    function getPreguntaRespuesta		() { return $this->pregunta; 			 }
	function getRespuesta				() { return $this; 						 }
    
}

?>
<?php

include_once "Producto.php";
class Video {
    var $idVideo;
    var $pathVideo;
    var $activoVideo;
    
    var $producto;
	
	function setIdVideo($id) {
		$this->idVideo 		= $id;
    }
	
	function __construct($path,$activo) {
		$this->pathVideo 	= $path;
		$this->activoVideo 	= $activo;
	}

    function setProductoVideo($producto) {
        $this->producto = $producto;
    }
    
    function getIdVideo			() { return $this->idVideo;	 	}
    function getPathVideo		() { return $this->pathVideo;	}
    function getActivoVideo		() { return $this->activoVideo; } 
    function getProductoVideo	() { return $this->producto;	}
	function getVideo			() { return $this;				}
}

?>
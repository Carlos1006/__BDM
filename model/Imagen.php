<?php

include_once "Producto.php";
class Imagen {
    var $idImagen;
    var $pathImagen;
    var $activoImagen;
    
    var $producto;
	
	function setIdImagen($id) {
		$this->idImagen 	= $id;
	}
	
	function __construct($path,$activo) {
		$this->pathImagen 	= $path;
		$this->activoImagen = $activo;
	}

    function setProductoImagen($producto) {
        $this->producto = $producto;
    }
    
    function getIdImagen		() { return $this->idImagen;	 }
    function getPathImagen		() { return $this->pathImagen;	 }
    function getActivoImagen	() { return $this->activoImagen; } 
    function getProductoImagen	() { return $this->producto;	 }
	function getImagen			() { return $this;				 }
}

?>
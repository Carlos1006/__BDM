<?php

include_once "Producto.php";
class Imagen {
    var $idImagen;
    var $pathImagen;
    var $activoImagen;
    
    var $producto;
	
	function __construct($id,$path,$activo,$producto) {
		$this->idImagen 	= $id;
		$this->pathImagen 	= $path;
		$this->activoImagen = $activo;
		
		$this->producto = new Producto(	$producto->idProducto,
										$producto->nombreProducto,
										$producto->descripcionProducto,
										$producto->precioProducto,
										$producto->existenciaProducto,
										$producto->vigenciaProducto,
										$producto->caracteristicaProducto,
										$producto->fechaProducto,
										$producto->horaProducto,
										$producto->activoProducto,
										$producto->usuario);
	}
	
	function __construct($path,$activo,$producto) {
		$this->pathImagen 	= $path;
		$this->activoImagen = $activo;
		
		$this->producto = new Producto(	$producto->idProducto,
										$producto->nombreProducto,
										$producto->descripcionProducto,
										$producto->precioProducto,
										$producto->existenciaProducto,
										$producto->vigenciaProducto,
										$producto->caracteristicaProducto,
										$producto->fechaProducto,
										$producto->horaProducto,
										$producto->activoProducto,
										$producto->usuario);
	}
    
    function getIdImagen		() { return $this->idImagen;	 }
    function getPathImagen		() { return $this->pathImagen;	 }
    function getActivoImagen	() { return $this->activoImagen; } 
    function getProductoImagen	() { return $this->producto;	 }
	function getImagen			() { return $this;				 }
}

?>
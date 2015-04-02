<?php

include_once "Producto.php";
class Video {
    var $idVideo;
    var $pathVideo;
    var $activoVideo;
    
    var $producto;
	
	function __construct($id,$path,$activo,$producto) {
		$this->idVideo 		= $id;
		$this->pathVideo 	= $path;
		$this->activoVideo 	= $activo;
		
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
		$this->pathVideo 	= $path;
		$this->activoVideo 	= $activo;
		
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
    
    function getIdVideo			() { return $this->idVideo;	 	}
    function getPathVideo		() { return $this->pathVideo;	}
    function getActivoVideo		() { return $this->activoVideo; } 
    function getProductoVideo	() { return $this->producto;	}
	function getVideo			() { return $this;				}
}

?>
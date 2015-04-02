<?php
include_once "Subcategoria.php";
include_once "Producto.php";

class Aviso {
    var $idAviso;
    var $cantidadAviso;
    var $descripcionAviso;
    var $fechaAviso;
    var $horaAviso;
    var $activoAviso;
    
    var $subcategoria;
    var $producto;
    
	function __construct($cantida,$descripcion,$fecha,$hora,$activo,$subcategoria,$producto) {
		$this->cantidadAviso 	= $cantida;
		$this->descripcionAviso = $descripcion;
		$this->fecha 			= $fecha;
		$this->hora 			= $hora;
		$this->activoAviso 		= $activo;
		
		$subcategoria = new Subcategoria();
		$producto = new Producto();
		
		$this->subcategoria = new Subcategoria(	$subcategoria->idSubcategoria,
												$subcategoria->nombreSubcategoria,
												$subcategoria->activoSubcategoria,
												$subcategoria->categoria);
		
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

	function __construct($id,$cantida,$descripcion,$fecha,$hora,$activo,$subcategoria,$producto) {
		$this->idAviso 			= $id;
		$this->cantidadAviso 	= $cantida;
		$this->descripcionAviso = $descripcion;
		$this->fecha 			= $fecha;
		$this->hora 			= $hora;
		$this->activoAviso 		= $activo;
		
		$subcategoria = new Subcategoria();
		$producto = new Producto();
		
		$this->subcategoria = new Subcategoria(	$subcategoria->idSubcategoria,
												$subcategoria->nombreSubcategoria,
												$subcategoria->activoSubcategoria,
												$subcategoria->categoria);
		
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
    
    function getIdAviso             () { return $this->idAviso;				}
	function getCantidadAviso       () { return $this->cantidadAviso;		}
    function getDescripcionAviso    () { return $this->descripcionAviso;	}
    function getFechaAviso          () { return $this->fecha;				}
    function getHoraAviso           () { return $this->hora;				}
    function getActivoAviso         () { return $this->activoAviso;			}
    function getSubcategoriaAviso   () { return $this->subcategoria;		}	
    function getProductoAviso       () { return $this->producto;			}
    function getAviso               () { return $this;						}
}

?>
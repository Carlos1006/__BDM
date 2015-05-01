<?php

class Producto{
	var $idProducto = null;
    var $pathThumbnail;
    var $nombreProducto;
    var $descripcionProducto;
    var $precioProducto;
    var $existenciaProducto;
    var $vigenciaProducto;
    var $caracteristicaProducto;
    var $fechaProducto;
    var $horaProducto;
    var $activoProducto;
    
    var $usuario;
    
	function __construct($pathThumbnail,$nombre,$descripcion,$precio,$existencia,$vigencia,$caracteristica,$fecha,$hora,$activo) {
		$this->pathThumbnail          = $pathThumbnail;
		$this->nombreProducto         = $nombre;
		$this->descripcionProducto    = $descripcion;
		$this->precioProducto         = $precio;
		$this->existenciaProducto     = $existencia;
		$this->vigenciaProducto       = $caracteristica;
		$this->fechaProducto          = $fecha;
		$this->horaProducto           = $hora;
		$this->activoProducto         = $activo;
	}

	function setIdProducto($id) {
		$this->idProducto = $id;
	}

    function setUsuarioProducto($usuario) {
        $this->usuario = $usuario;
    }
    
    function getIdProducto          () { return $this->idProducto;			}
    function getNombreProducto      () { return $this->nombreProducto;		}
    function getDescripcionProducto () { return $this->descripcionProducto;	}
    function getPrecioProducto      () { return $this->precioProducto;		}
    function getExistenciaProducto  () { return $this->existenciaProducto;	}
    function getVigenciaProducto    () { return $this->vigenciaProducto;	}
    function getFechaProducto       () { return $this->fechaProducto;		}
    function getHoraProducto        () { return $this->horaProducto;		}
    function getActivoProducto      () { return $this->activoProducto;		}
    function getUsuarioProducto     () { return $this->usuario;				}
    function getPathThumbnail       () { return $this->pathThumbnail;	    }
    function getProducto            () { return $this;						}
}

?>
<?php

include "Usuario.php";

class Producto{
	var $idProducto;
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
    
	function __construct($nombre,$descripcion,$precio,$existencia,$vigencia,$caracteristica,$fecha,$hora,$activo,$usuario) {
		$this->nombreProducto         = $nombre;
		$this->descripcionProducto    = $descripcion;
		$this->precioProducto         = $precio;
		$this->existenciaProducto     = $existencia;
		$this->vigenciaProducto       = $caracteristica;
		$this->fechaProducto          = $fecha;
		$this->horaProducto           = $hora;
		$this->activoProducto         = $activo;
		$this->usuario = new Usuario(	$usuario->idUsuario,
										$usuario->emailUsuario,
										$usuario->passwordUsuario,
										$usuario->nicknameUsuario,
										$usuario->apellidoUsuario,
										$usuario->nombreUsuario,
										$usuario->telefonoUsuario,
										$usuario->avatarUsuario,
										$usuario->confirmadoUsuario,
										$usuario->activoUsuario
									);
	}
	function __construct($id,$nombre,$descripcion,$precio,$existencia,$vigencia,$caracteristica,$fecha,$hora,$activo,$usuario) {
		$this->idProducto 			  = $id;
		$this->nombreProducto         = $nombre;
		$this->descripcionProducto    = $descripcion;
		$this->precioProducto         = $precio;
		$this->existenciaProducto     = $existencia;
		$this->vigenciaProducto       = $caracteristica;
		$this->fechaProducto          = $fecha;
		$this->horaProducto           = $hora;
		$this->activoProducto         = $activo;
		$this->usuario = new Usuario(	$usuario->idUsuario,
										$usuario->emailUsuario,
										$usuario->passwordUsuario,
										$usuario->nicknameUsuario,
										$usuario->apellidoUsuario,
										$usuario->nombreUsuario,
										$usuario->telefonoUsuario,
										$usuario->avatarUsuario,
										$usuario->confirmadoUsuario,
										$usuario->activoUsuario
									);
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
    function getProducto            () { return $this;						}
}

?>
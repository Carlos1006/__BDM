<?php
class Aviso {
    var $idAviso = null;
    var $pathThumbnail;
    var $cantidadAviso;
    var $descripcionAviso;
    var $fechaAviso;
    var $horaAviso;
    var $activoAviso;

    var $precioAviso;
    var $descripcionLarga;

    var $subcategoria   = null;
    var $producto       = null;
    var $usuario        = null;
    
	function __construct($thumbnail,$cantida,$descripcion,$fecha,$hora,$activo,$precio,$descripcionLarga) {
        $this->pathThumbnail = $thumbnail;
        $this->cantidadAviso = $cantida;
        $this->descripcionAviso = $descripcion;
        $this->fechaAviso = $fecha;
        $this->horaAviso = $hora;
        $this->activoAviso = $activo;
        $this->precioAviso = $precio;
        $this->descripcionLarga = $descripcionLarga;
    }

    function setIdAviso($id) {
        $this->idAviso = $id;
    }

    function setSubcategoria($data) {
        $this->subcategoria = $data;
    }
    function setProducto($data) {
        $this->producto = $data;
    }
    function setUsuario($data) {
        $this->usuario = $data;
    }

    function getPathThumbnail           () { return $this->pathThumbnail;       }
    function getIdAviso                 () { return $this->idAviso;				}
	function getCantidadAviso           () { return $this->cantidadAviso;		}
    function getDescripcionAviso        () { return $this->descripcionAviso;	}
    function getFechaAviso              () { return $this->fechaAviso;		    }
    function getHoraAviso               () { return $this->horaAviso;			}
    function getActivoAviso             () { return $this->activoAviso;			}
    function getSubcategoriaAviso       () { return $this->subcategoria;		}
    function getPrecioAviso             () { return $this->precioAviso;         }
    function getDescripcionLargaAviso   () { return $this->descripcionLarga;    }
    function getUsuarioAviso            () { return $this->usuario;             }
    function getProductoAviso           () { return $this->producto;            }
    function getAviso                   () { return $this;						}
}

?>
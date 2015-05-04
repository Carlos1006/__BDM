<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/mysql.php";
class Venta{
	var $idVenta;
    var $confirmadaVenta;
	var $cantidadVenta;
    var $fechaVenta;
    var $horaVenta;

    var $precio;
    var $aviso;
    var $usuario;
    var $metodoPago;
    var $producto;
    
    function __construct($confirmada,$cantidad,$fecha,$hora) {
		$this->confirmadaVenta 	= $confirmada;
		$this->cantidadVenta 	= $cantidad;
		$this->fechaVenta 	    = $fecha;
		$this->horaVenta 	    = $hora;
    }

    function setIdVenta($id) {
        $this->idVenta 			= $id;
    }

    function setAvisoVenta($aviso){
        $this->aviso = $aviso;
    }

    function setUsuarioVenta($usuario){
        $this->usuario = $usuario;
    }

    function setMetodoPagoVenta($metodoPago){
        $this->metodoPago = $metodoPago;
    }

    function setProductoVenta($producto){
        $this->producto = $producto;
    }

    function setPrecioVenta($precio){
        $this->precio = $precio;
    }

    function getSubtotal() {
        return mysql::moneyFormat($this->getPrecioVenta()*$this->getCantidadVenta());
    }

	function getIdVenta() 				{ return $this->idVenta; 			}
    function getConfirmadaVenta() 		{ return $this->confirmadaVenta; 	}
    function getCantidadVenta() 		{ return $this->cantidadVenta; 	    }
    function getAvisoVenta() 			{ return $this->aviso; 			    }
    function getUsuarioVenta() 			{ return $this->usuario; 			}
    function getMetodoPagoElegidoVenta(){ return $this->metodoPago; 		}
    function getVenta() 				{ return $this; 					}
    function getFechaVenta() 			{ return $this->fechaVenta; 		}
    function getHoraVenta() 			{ return $this->horaVenta; 			}
    function getProductoVenta() 		{ return $this->producto; 			}
    function getPrecioVenta() 			{ return $this->precio; 			}
}


?>
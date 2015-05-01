<?php
class Venta{
	var $idVenta;
    var $confirmadaVenta;
	var $cantidadVenta;
    
    var $aviso;
    var $usuario;
    var $metodoPago;
    
    function __construct($confirmada,$cantidad) {
		$this->confirmadaVenta 	= $confirmada;
		$this->cantidadVenta 	= $cantidad;
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

	function getIdVenta() 					{ return $this->idVenta; 			}
    function getConfirmadaVenta() 			{ return $this->confirmadaVenta; 	}
    function getCantidasVenta() 			{ return $this->cantidadVenta; 	    }
    function getAvisoVenta() 				{ return $this->aviso; 			    }
    function getUsuarioVenta() 				{ return $this->usuario; 			}
    function getMetodoPagoElegidoVenta() 	{ return $this->metodoPago; 		}
    function getVenta() 					{ return $this; 					}
}


?>
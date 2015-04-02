<?php

include_once "Aviso.php";
include_once "Usuario.php";
include_once "MetodoPago.php";
class Venta{
	var $idVenta;
    var $confirmadaVenta;
	var $cantidadVenta;
    
    var $aviso;
    var $usuario;
    var $metodoPago;
    
    function __construct($id,$confirmada,$cantidad,$aviso,$usuario,$metodoPago) {
    	$this->idVenta 			= $id;
		$this->confirmadaVenta 	= $confirmada;
		$this->cantidadVenta 	= $cantidad;
		
		$this->aviso = new Aviso(	$aviso->idAviso,
									$aviso->descripcionAviso,
									$aviso->fechaAviso,
                                    $aviso->horaAviso,
                                    $aviso->subcategoria,
                                    $aviso->producto);
		
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
		
		$this->metodoPago = new MetodoPago(	$metodoPago->idMetodoPago,
											$metodoPago->nombreMetodoPago,
											$metodoPago->activoMetodoPago);
    }
    
    function __construct($confirmada,$cantidad,$aviso,$usuario,$metodoPago) {
		$this->confirmadaVenta 	= $confirmada;
		$this->cantidadVenta 	= $cantidad;
		
		$this->aviso = new Aviso(	$aviso->idAviso,
									$aviso->descripcionAviso,
									$aviso->fechaAviso,
                                    $aviso->horaAviso,
                                    $aviso->subcategoria,
                                    $aviso->producto);
		
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
		
		$this->metodoPago = new MetodoPago(	$metodoPago->idMetodoPago,
											$metodoPago->nombreMetodoPago,
											$metodoPago->activoMetodoPago);
    }
	
	function getIdVenta() 					{ return $this->$idVenta; 			}
    function getConfirmadaVenta() 			{ return $this->$confirmadaVenta; 	}
    function getCantidasVenta() 			{ return $this->$cantidadVenta; 	}
    function getAvisoVenta() 				{ return $this->$aviso; 			}
    function getUsuarioVenta() 				{ return $this->$usuario; 			}
    function getMetodoPagoElegidoVenta() 	{ return $this->$metodoPago; 		}
    function getVenta() 					{ return $this; 					}
}


?>
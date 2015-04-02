<?php

include_once "Aviso.php";
include_once "Usuario.php";

class Pregunta{
    var $idPregunta;
    var $descripcionPregunta;
    var $fechaPregunta;
    var $horaPregunta;
    
    var $usuario;
    var $aviso;
    
    function __construct($descripcion,$fecha,$hora,$usuario,$aviso) {
		$this->descripcionPregunta 	= $descripcion;
		$this->fechaPregunta 		= $fecha;
		$this->horaPregunta 		= $hora;
		
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
		$this->aviso = new Aviso(	$aviso->idAviso,
									$aviso->descripcionAviso,
									$aviso->fechaAviso,
                                    $aviso->horaAviso,
                                    $aviso->subcategoria,
                                    $aviso->producto);
    }
    
    function __construct($id,$descripcion,$fecha,$hora,$usuario,$aviso) {
    	$this->idPregunta 			= $id;
		$this->descripcionPregunta 	= $descripcion;
		$this->fechaPregunta 		= $fecha;


		$this->horaPregunta = $hora;
		
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
		$this->aviso = new Aviso(	$aviso->idAviso,
									$aviso->descripcionAviso,
									$aviso->fechaAviso,
                                    $aviso->horaAviso,
                                    $aviso->subcategoria,
                                    $aviso->producto);
    }
    
    function getIdPregunta          () { return $this->idPregunta; 			}
    function getDescripcionPregunta () { return $this->descripcionPregunta; }
    function getFechaPregunta       () { return $this->fechaPregunta; 		}
    function getHoraPregunta        () { return $this->horaPregunta; 		}
    function getUsuarioPregunta     () { return $this->usuario; 			}
    function getAvisoPregunta       () { return $this->aviso; 				}
    function getPregunta            () { return $this; 						}
}

?>
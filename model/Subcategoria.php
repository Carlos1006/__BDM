<?php

include_once "Categoria.php";

class Subcategoria {
    var $idSubcategoria;
    var $nombreSubcategoria;
    var $activoSubcategoria;

    var $categoria;

    function __construct($nombre,$activo,$categoria) {
        $this->nombreSubcategoria =$nombre;
        $this->activoSubcategoria =$activo;
        $this->categoria = new Categoria($categoria->idCategoria,$categoria->nombreCategoria,$categoria->activoCategoria);
    }

    function __construct($id,$nombre,$activo,$categoria) {
        $this->idSubcategoria 	  =$id;
        $this->nombreSubcategoria =$nombre;
        $this->activoSubcategoria =$activo;
        $this->categoria = new Categoria($categoria->idCategoria,$categoria->nombreCategoria,$categoria->activoCategoria);
    }

    function getIdSubcategoria			(){ return $this->idSubcategoria; 		}
    function getnombreSubcategoria		(){ return $this->nombreSubcategoria; 	}
    function getactivoSubcategoria		(){ return $this->activoSubcategoria; 	}
    function getCategoriaSubcategoria	(){ return $this->categoria; 			}
    function getSubcategoria			(){ return $this; 						}
}

?>
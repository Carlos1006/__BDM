<?php
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Subcategoria.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/mysql.php";
    class SubcategoriaDao {
        static function outSubcategorias($id) {
            $id     = (INT)$id;
            $query  = "CALL todasSubcategorias($id)";
            $result = mysqli_query(mysql::getConexion(),$query);
            $subcategorias = array();
            while($row = mysqli_fetch_object($result)) {
                $subcategoria = new Subcategoria($row->nombreSubcategoria,$row->activoSubcategoria,$row->idCategoriaSubcategoria);
                $subcategoria->setIdSubcategoria($row->idSubcategoria);
                array_push($subcategorias,$subcategoria);
            }
            return $subcategorias;
        }
    }
?>
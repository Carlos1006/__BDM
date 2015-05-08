<?php
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Categoria.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/mysql.php";
    class categoriaDao {

        static function outCategories() {
            $query  = "CALL todasCategorias";
            $result = mysqli_query(mysql::getConexion(),$query);
            $categorias = array();
            while($row = mysqli_fetch_object($result)) {
                $categoria = new Categoria($row->idCategoria,$row->nombreCategoria,$row->activoCategoria);
                array_push($categorias,$categoria);
            }
            return $categorias;
        }

        static function getCategoria($idSubcategoria) {
            $query      = "CALL categoria($idSubcategoria)";
            $result     = mysqli_query(mysql::getConexion(),$query);
            $nombreCat  = null;
            while($row  = mysqli_fetch_object($result)) {
                $nombreCat = $row->nombreCategoria;
            }
            return $nombreCat;
        }

    }
?>
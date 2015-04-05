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

    }
?>
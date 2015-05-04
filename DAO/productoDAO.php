<?php
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Producto.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/mysql.php";

    class productoDAO {
        static function getMisProductos($id) {
            $query = "CALL misProductos($id)";
            return productoDAO::execProductoQuery($query);
        }

        private static function execProductoQuery($query) {
            $result     = mysqli_query(mysql::getConexion(),$query);
            $productos  = array();
            while($row = mysqli_fetch_object($result)) {
                $producto = new Producto($row->pathImagen,$row->nombreProducto,$row->descripcionProducto,mysql::moneyFormat($row->precioProducto),$row->existenciaProducto,mysql::dateToString($row->vigenciaProducto),$row->caracteristicaProducto,$row->fechaProducto,$row->horaProducto,$row->activoProducto);
                $producto->setIdProducto($row->idProducto);
                $producto->setUsuarioProducto($row->nicknameUsuario);
                array_push($productos,$producto);
            }
            return $productos;
        }
    }
?>
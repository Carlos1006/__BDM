<?php
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Venta.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/mysql.php";

    class ventaDAO{
        static function getMisSolicitudes($id){
            $query = "CALL solicitudVentas($id)";
            return ventaDAO::execVentaQuery($query);
        }

        static function getTotalVentas($id) {
            $query = "CALL totalVentas($id)";
            $result = mysqli_query(mysql::getConexion(),$query);
            $totalVentas = 0;
            while($row = mysqli_fetch_object($result)) {
                $totalVentas = $row->subtotal;
            }
            return mysql::moneyFormat($totalVentas);
        }

        static function getMisVentas($id){
            $query = "CALL misVentas($id)";
            return ventaDAO::execVentaQuery($query);
        }

        private static function execVentaQuery($query){
            $result = mysqli_query(mysql::getConexion(),$query);
            $ventas = array();
            while($row = mysqli_fetch_object($result)) {
                $venta = new Venta($row->confirmadaVenta,$row->cantidadCompradaVenta,$row->fechaVenta,$row->horaVenta);
                $venta->setAvisoVenta($row->descripcionAviso);
                $venta->setIdVenta($row->idVenta);
                $venta->setMetodoPagoVenta($row->nombreMetodoPago);
                $venta->setUsuarioVenta($row->comprador);
                $venta->setProductoVenta($row->nombreProducto);
                $venta->setPrecioVenta(mysql::moneyFormat($row->precioAviso));
                array_push($ventas,$venta);
            }
            return $ventas;
        }

        static function setVenta($idVenta) {
            $query = "CALL confirmarVenta($idVenta)";
            mysqli_query(mysql::getConexion(),$query);
        }

        static function getStock($id) {
            $query  = "CALL stockVenta($id)";
            $result = mysqli_query(mysql::getConexion(),$query);
            $stock  = 0;
            while($row = mysqli_fetch_object($result)) {
                $stock = $row->cantidadCompradaVenta;
            }
            return $stock;
        }

        static function setSolicitud($venta) {
            $cantidad  = $venta->getCantidadVenta();
            $idAviso   = $venta->getAvisoVenta();
            $idUsuario = $venta->getUsuarioVenta();
            $idMetodo  = $venta->getMetodoPagoElegidoVenta();
            $fecha     = $venta->getFechaVenta();
            $hora      = $venta->getHoraVenta();
            $query = "CALL altaVenta(0,$cantidad,$idAviso,$idUsuario,$idMetodo,'$fecha','$hora')";
            mysqli_query(mysql::getConexion(),$query);
        }

        static function deleteSolicitud($idVenta) {
            $query = "CALL borraSolicitud($idVenta)";
            mysqli_query(mysql::getConexion(),$query);
        }

    }

?>
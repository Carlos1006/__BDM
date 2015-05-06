<?php
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/mysql.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/MetodoPago.php";
    class metodoPagoDAO {
        static function getMetodosPago() {
            $query  = "CALL todosMetodosPago()";
            $result = mysqli_query(mysql::getConexion(),$query);
            $metodosPago = array();
            while($row = mysqli_fetch_object($result)) {
                $metodo = new MetodoPago($row->nombreMetodoPago,$row->activoMetodoPago);
                $metodo->setIdMetodoPago($row->idMetodoPago);
                array_push($metodosPago,$metodo);
            }
            return $metodosPago;
        }
    }
?>
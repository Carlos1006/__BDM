<?php
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/mysql.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Aviso_MetodoPago.php";
    class aviso_metodoPagoDAO {

        static function setEnlaceAvisoMetodo($arrayAM) {
            foreach($arrayAM as $avisoMetodoPago) {
                $idAviso    = $avisoMetodoPago->getIdAvisoPago_AM();
                $idMetodo   = $avisoMetodoPago->getIdMetodoPago_AM();
                $query = "CALL altaAvisoMetodoPago($idAviso,$idMetodo)";
                mysqli_query(mysql::getConexion(),$query);
            }
        }

        static function unsetEnlaceAvisoMetodo($idAviso) {
            $query = "CALL borraAvisoMetodoPago($idAviso)";
            mysqli_query(mysql::getConexion(),$query);
        }

    }
?>
<?php
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Aviso.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Busqueda.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/mysql.php";
    class avisoDao {

        static function getAvisosRecientes() {
            $query  = "CALL recientesAvisos()";
            $result = mysqli_query(mysql::getConexion(),$query);
            $avisos = array();
            while($row = mysqli_fetch_object($result)) {
                $aviso = new Aviso($row->pathImagen,$row->cantidadAviso,$row->descripcionCortaAviso,mysql::dateToString($row->fechaAviso),$row->horaAviso,$row->activoAviso,$row->precioAviso,$row->descripcionAviso);
                $aviso->setIdAviso($row->idAviso);
                $aviso->setProducto($row->idProductoAviso);
                $aviso->setUsuario($row->nicknameUsuario);
                array_push($avisos,$aviso);
            }
            return $avisos;
        }

        static function getAvisosCaros() {

        }

        static function getAvisosComentados() {

        }

        static function getAvisosVendidos() {

        }

        static function getAvisosBusqueda($busqueda) {

        }

        static function getAvisosBusquedaAvanzada($busqueda) {

        }

        static function getAvisosTop($busqueda) {

        }

    }
?>
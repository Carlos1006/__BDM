<?php
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Aviso.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Busqueda.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/MetodoPago.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/mysql.php";

    class avisoDao {

        static function getAvisosRecientes() {
            $query  = "CALL recientesAvisos()";
            return avisoDao::execAvisosQuery($query);
        }

        static function getAvisosCaros() {
            $query  = "CALL preciosAvisos()";
            return avisoDao::execAvisosQuery($query);
        }

        static function getAvisosComentados() {
            $query  = "CALL comentadosAvisos()";
            return avisoDao::execAvisosQuery($query);
        }

        static function getAvisosVendidos() {
            $query  = "CALL vendidosAvisos()";
            return avisoDao::execAvisosQuery($query);
        }

        static function getAvisosBusqueda($busqueda) {
            $barra = $busqueda->getBarraBuscadora();
            $query = "CALL busquedaAvisos('$barra',null,null,null,null,null,null)";
            return avisoDao::execAvisosQuery($query);
        }

        static function getAvisosBusquedaAvanzada($busqueda) {
            $null = "null";
            is_null($busqueda->getTexto()            )?  $texto          = $null :  $texto          = "'".$busqueda->getTexto()."'";
            is_null($busqueda->getFecha()            )?  $fecha          = $null :  $fecha          =     $busqueda->getFecha();
            is_null($busqueda->getNickname()         )?  $nickname       = $null :  $nickname       = "'".$busqueda->getNickname()."'";
            is_null($busqueda->getFechaRangos()[0]   )?  $fechaRango1    = $null :  $fechaRango1    =     $busqueda->getFechaRangos()[0];
            is_null($busqueda->getFechaRangos()[1]   )?  $fechaRango2    = $null :  $fechaRango2    =     $busqueda->getFechaRangos()[1];
            is_null($busqueda->getPrecioRangos()[0]  )?  $precioRango1   = $null :  $precioRango1   = "'".$busqueda->getPrecioRangos()[0]."'";
            is_null($busqueda->getPrecioRangos()[1]  )?  $precioRango2   = $null :  $precioRango2   = "'".$busqueda->getPrecioRangos()[1]."'";

            strcmp($fechaRango1,$null)==0 ? $fechaRango1 = $null :$fechaRango1 = "'".mysql::stringToDate($fechaRango1)."'";
            strcmp($fechaRango2,$null)==0 ? $fechaRango2 = $null :$fechaRango2 = "'".mysql::stringToDate($fechaRango2)."'";
            strcmp($fecha      ,$null)==0 ? $fecha       = $null :$fecha       = "'".mysql::stringToDate($fecha      )."'";

            $query = "CALL busquedaAvisos($texto,$fecha,$nickname,$fechaRango1,$fechaRango2,$precioRango1,$precioRango2)";
            echo $query;
            return avisoDao::execAvisosQuery($query);
        }

        static function getAvisosSubcategoria($busqueda) {
            $idSubcategoria = $busqueda->getIdSubcategoria();
            $query = "CALL subcategoriaAvisos($idSubcategoria)";
            echo($query);
            return avisoDao::execAvisosQuery($query);
        }

        static function getAvisosTop($busqueda) {
            $devolver = null;
            switch($busqueda->getTop()) {
                case "recientes":   $devolver = avisoDao::getAvisosRecientes();   break;
                case "vendidos":    $devolver = avisoDao::getAvisosVendidos();    break;
                case "comentarios": $devolver = avisoDao::getAvisosComentados();  break;
                case "caros":       $devolver = avisoDao::getAvisosCaros();       break;
            }
            return $devolver;
        }

        private static function execAvisosQuery($query) {
            $result = mysqli_query(mysql::getConexion(),$query);
            $avisos = array();
            while($row = mysqli_fetch_object($result)) {
                $aviso = new Aviso($row->pathImagen,$row->cantidadAviso,$row->descripcionCortaAviso,mysql::dateToString($row->fechaAviso),$row->horaAviso,$row->activoAviso,mysql::moneyFormat($row->precioAviso),$row->descripcionAviso);
                $aviso->setIdAviso($row->idAviso);
                $aviso->setProducto($row->idProductoAviso);
                $aviso->setUsuario($row->nicknameUsuario);
                if(isset($row->vigenciaAviso)) {
                    $aviso->setVigenciaAviso(mysql::dateToString($row->vigenciaAviso));
                }
                array_push($avisos,$aviso);
            }
            return $avisos;
        }


        static function getMisAvisos($id) {
            $query = "CALL misAvisos($id)";
            return avisoDao::execAvisosQuery($query);
        }

        static function getAviso($id) {
            $query  = "CALL detalleAviso($id)";
            $result = mysqli_query(mysql::getConexion(),$query);
            $aviso  = null;
            while($row = mysqli_fetch_object($result)) {
                $id             = $row->idAviso;
                $cantida        = $row->cantidadAviso;
                $precio         = $row->precioAviso;
                $corta          = $row->descripcionCortaAviso;
                $larga          = $row->descripcionAviso;
                $vigencia       = mysql::dateToString($row->vigenciaAviso);
                $idCategoria    = $row->idCategoriaSubcategoria;
                $idSubcategoria = $row->idSubcategoriaAviso;
                $idProducto     = $row->idProductoAviso;
                $activo         = $row->activoAviso;
                $nombreSub      = $row->nombreSubcategoria;
                $idUsuario      = $row->idUsuario;
                $aviso          = new Aviso(null,$cantida,$corta,null,null,$activo,$precio,$larga);
                $aviso->setProducto($idProducto);
                $aviso->setSubcategoria($idSubcategoria);
                $aviso->setNombreSub($nombreSub);
                $aviso->setCategoria($idCategoria);
                $aviso->setVigenciaAviso($vigencia);
                $aviso->setIdAviso($id);
                $aviso->setUsuario($idUsuario);
            }

            $query   = "CALL metodosPagoAviso($id)";
            $result  = mysqli_query(mysql::getConexion(),$query);
            $metodos = array();
            while($row = mysqli_fetch_object($result)) {
                $id     = $row->idMetodoPago;
                $nombre = $row->nombreMetodoPago;
                $activo = $row->activoMetodoPago;
                $metodo = new MetodoPago($nombre,$activo);
                $metodo->setIdMetodoPago($id);
                array_push($metodos,$metodo);
            }
            $aviso->setMetodosPago($metodos);
            return $aviso;
        }

        static function setAviso($aviso) {
            $cantidad       = $aviso->getCantidadAviso();
            $precio         = $aviso->getPrecioAviso();
            $corta          = $aviso->getDescripcionAviso();
            $fecha          = $aviso->getFechaAviso();
            $hora           = $aviso->getHoraAviso();
            $idSubcategoria = $aviso->getSubcategoriaAviso();
            $idProducto     = $aviso->getProductoAviso();
            $activo         = $aviso->getActivoAviso();
            $vigencia       = $aviso->getVigenciaAviso();
            $larga          = $aviso->getDescripcionLargaAviso();
            $query  = "CALL altaAviso($cantidad,$precio,'$larga','$fecha','$hora',$idSubcategoria,$idProducto,$activo,'$vigencia','$corta')";
            $result = mysqli_query(mysql::getConexion(),$query);
            $idAviso = 0;
            while($row = mysqli_fetch_object($result)) {
                $idAviso = $row->ultimoId;
            }
            return $idAviso;
        }

        static function resetAviso($aviso) {
            $idAviso        = $aviso->getIdAviso();
            $cantidad       = $aviso->getCantidadAviso();
            $precio         = $aviso->getPrecioAviso();
            $corta          = $aviso->getDescripcionAviso();
            $idSubcategoria = $aviso->getSubcategoriaAviso();
            $idProducto     = $aviso->getProductoAviso();
            $vigencia       = $aviso->getVigenciaAviso();
            $larga          = $aviso->getDescripcionLargaAviso();
            $query = "CALL cambioAviso($idAviso,$cantidad,$precio,'$larga',$idSubcategoria,$idProducto,'$vigencia','$corta')";
            mysqli_query(mysql::getConexion(),$query);
        }

        static function bajaAviso($id) {
            $query = "CALL bajaAviso($id)";
            mysqli_query(mysql::getConexion(),$query);
        }

    }
?>
<?php
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Producto.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Video.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Imagen.php";
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

        static function getProducto($id) {
            $imagenFill = new Imagen("/__BDM/img/404/dino.png",1);
            $imagenFill->setIdImagen(0);

            $videoFill = new Video("/__BDM/img/404/dino.png",1);
            $videoFill->setIdVideo(0);

            $query    = "CALL detalleProducto($id)";
            $result   = mysqli_query(mysql::getConexion(),$query);
            $producto = null;
            while($row = mysqli_fetch_object($result)) {
                $producto = new Producto(null,$row->nombreProducto,$row->descripcionProducto,mysql::moneyFormat($row->precioProducto),$row->existenciaProducto,mysql::dateToString($row->vigenciaProducto),$row->caracteristicaProducto,$row->fechaProducto,$row->horaProducto,$row->activoProducto);
                $producto->setIdProducto($row->idProducto);
            }

            $query      =   "CALL todasImagenesProducto($id)";
            $result     = mysqli_query(mysql::getConexion(),$query);
            $imagenes   = array();
            while($row = mysqli_fetch_object($result)) {
                if(file_exists( $_SERVER["DOCUMENT_ROOT"].$row->pathImagen )) {
                    $url = $row->pathImagen;
                } else {
                    $url = "/__BDM/img/404/dino.png";
                }
                $imagen = new Imagen($url,$row->activoImagen);
                $imagen->setIdImagen($row->idImagen);
                $imagen->setProductoImagen($row->idProductoImagen);
                array_push($imagenes,$imagen);
            }

            $query      =   "CALL todosVideosProducto($id)";
            $result     = mysqli_query(mysql::getConexion(),$query);
            $videos   = array();
            while($row = mysqli_fetch_object($result)) {
                if(file_exists ( $_SERVER["DOCUMENT_ROOT"].$row->pathVideo )) {
                    $url = $row->pathVideo;
                } else {
                    $url = "/__BDM/img/404/404.mp4";
                }
                $video = new Video($url,$row->activoVideo);
                $video->setIdVideo($row->idVideo);
                $video->setProductoVideo($row->idProductoVideo);
                array_push($videos,$video);
            }

            $cImg = count($imagenes);
            if($cImg == 0) {
                array_push($imagenes,$imagenFill,$imagenFill,$imagenFill,$imagenFill);
            } else if($cImg == 1) {
                array_push($imagenes,$imagenFill,$imagenFill,$imagenFill);
            } else if($cImg == 2) {
                array_push($imagenes,$imagenFill,$imagenFill);
            }else if($cImg == 3) {
                array_push($imagenes,$imagenFill);
            }

            $cVid = count($videos);
            if($cVid == 0) {
                array_push($videos,$videoFill,$videoFill);
            } else if($cVid == 1){
                array_push($videos,$videoFill);
            }

            $producto->setImagenesProducto($imagenes);
            $producto->setVideosProducto($videos);

            return $producto;
        }

        static function setProducto($producto) {
            $nombre     = $producto->getNombreProducto();
            $corta      = $producto->getDescripcionProducto();
            $precio     = $producto->getPrecioProducto();
            $existencia = $producto->getExistenciaProducto();
            $vigencia   = $producto->getVigenciaProducto();
            $larga      = $producto->getCaracteristicaProducto();
            $fecha      = $producto->getFechaProducto();
            $hora       = $producto->getHoraProducto();
            $idUsuario  = $producto->getUsuarioProducto();

            $query  = "CALL altaProducto('$nombre','$corta',$precio,$existencia,'$vigencia','$larga','$fecha','$hora',$idUsuario,1)";
            $result = mysqli_query(mysql::getConexion(),$query);
            $idProducto = 0;

            while($row = mysqli_fetch_object($result)) {
                $idProducto = $row->ultimoId;
            }

            foreach($producto->getImagenesProducto() as $imagen) {
                $path = $imagen->getPathImagen();
                $queryImg = "CALL altaImagen('$path',$idProducto)";
                mysqli_query(mysql::getConexion(),$queryImg);
                echo $queryImg;
            }

            foreach($producto->getVideosProducto() as $video) {
                $path = $video->getPathVideo();
                $queryVid = "CALL altaVideo('$path',$idProducto)";
                mysqli_query(mysql::getConexion(),$queryVid);
            }
        }

        static function resetProducto($producto) {
            $id         = $producto->getIdProducto();
            $nombre     = $producto->getNombreProducto();
            $corta      = $producto->getDescripcionProducto();
            $precio     = $producto->getPrecioProducto();
            $existencia = $producto->getExistenciaProducto();
            $vigencia   = $producto->getVigenciaProducto();
            $larga      = $producto->getCaracteristicaProducto();
            $query = "CALL cambioProducto($id,'$nombre','$corta',$precio,$existencia,'$vigencia','$larga')";
            mysqli_query(mysql::getConexion(),$query);

            foreach($producto->getImagenesProducto() as $imagen) {
                $path     = $imagen->getPathImagen();
                $idImagen = $imagen->getIdImagen();
                $queryImg = "CALL cambioImagen('$path',$idImagen,$id)";
                mysqli_query(mysql::getConexion(),$queryImg);
                echo $queryImg;
            }

            foreach($producto->getVideosProducto() as $video) {
                $path     = $video->getPathVideo();
                $idVideo  = $video->getIdVideo();
                $queryVid = "CALL cambioVideo('$path',$idVideo,$id)";
                mysqli_query(mysql::getConexion(),$queryVid);
            }
        }

        static function getStock($id) {
            $query  = "CALL stockProducto($id)";
            $result = mysqli_query(mysql::getConexion(),$query);
            $stock  = 0;
            while($row = mysqli_fetch_object($result)) {
                $stock = $row->existenciaProducto;
            }
            return $stock;
        }

        static function getStock_Aviso($id) {
            $query  = "CALL stockProductoAviso($id)";
            $result = mysqli_query(mysql::getConexion(),$query);
            $stock  = 0;
            $idProducto = 0;
            while($row = mysqli_fetch_object($result)) {
                $stock = $row->existenciaProducto;
                $idProducto = $row->idProducto;
            }
            $producto = new Producto(null,null,null,null,$stock,null,null,null,null,null,1);
            $producto->setIdProducto($idProducto);
            return $producto;
        }

        static function setNewStock($id,$newStock) {
            $query  = "CALL cambioStock($id,$newStock)";
            mysqli_query(mysql::getConexion(),$query);
        }

        static function bajaProducto($id) {
            $query = "CALL bajaProducto($id)";
            mysqli_query(mysql::getConexion(),$query);
        }
    }
?>
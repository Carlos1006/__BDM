<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Video.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Imagen.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/mysql.php";

class mediaDAO {
    static function getVideosAviso($id) {
        $query  = "CALL todosVideosAviso($id)";
        $result = mysqli_query(mysql::getConexion(),$query);
        $videos = array();
        while($row = mysqli_fetch_object($result)) {
            if(file_exists( $_SERVER["DOCUMENT_ROOT"].$row->pathVideo )) {
                $url = $row->pathVideo;
            } else {
                $url = "/__BDM/img/404/404.mp4";
            }
            $video = new Video($url,1);
            $video->setIdVideo($row->idVideo);
            array_push($videos,$video);
        }
        return $videos;
    }

    static function getImagenesAviso($id) {
        $query    = "CALL todasImagenesAviso($id)";
        $result   = mysqli_query(mysql::getConexion(),$query);
        $imagenes = array();
        while($row = mysqli_fetch_object($result)) {
            if(file_exists( $_SERVER["DOCUMENT_ROOT"].$row->pathImagen )) {
                $url = $row->pathImagen;
            } else {
                $url = "/__BDM/img/404/dino.png";
            }
            $imagen = new Imagen($url,1);
            $imagen->setIdImagen($row->idImagen);
            array_push($imagenes,$imagen);
        }
        return $imagenes;
    }
}

?>
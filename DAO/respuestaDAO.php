<?php
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/mysql.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Respuesta.php";

    class respuestaDAO {

        static function setRespuesta($respuesta) {
            $descripcion    = $respuesta->getDescripcionRespuesta();
            $fecha          = $respuesta->getFechaRespuesta();
            $hora           = $respuesta->getHoraRespuesta();
            $idPregunta     = $respuesta->getPreguntaRespuesta();
            $query = "CALL altaRespuesta('$descripcion','$fecha','$hora',$idPregunta)";
            mysqli_query(mysql::getConexion(),$query);
        }

    }
?>
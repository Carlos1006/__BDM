<?php
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Pregunta.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/mysql.php";

    class preguntaDAO {
        static function getMisPreguntas($id) {
            $query = "CALL misPreguntas_3($id)";
            return preguntaDAO::execPreguntaQuery($query);
        }

        static function getPreguntasAviso($id) {
            $query = "CALL misPreguntas_2($id)";
            return preguntaDAO::execPreguntaQuery($query);
        }

        private static function execPreguntaQuery($query) {
            $result     = mysqli_query(mysql::getConexion(),$query);
            $preguntas  = array();
            while($row = mysqli_fetch_object($result)) {
                $pregunta = new Pregunta($row->descripcionPregunta,$row->fechaPregunta,$row->horaPregunta);
                $pregunta->setIdPregunta($row->idPregunta);
                $pregunta->setAvisoPregunta($row->descripcionCortaAviso);
                $pregunta->setUsuarioPregunta($row->nicknameUsuario);
                $pregunta->setRespuesta($row->descripcionRespuesta);
                array_push($preguntas,$pregunta);
            }
            return $preguntas;
        }
    }
?>


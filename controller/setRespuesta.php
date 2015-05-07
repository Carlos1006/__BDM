<?php
    session_start();
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/respuestaDAO.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/mysql.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Respuesta.php";

    $idPregunta  = $_POST["idPregunta"];
    $descripcion = $_POST["respuesta"];
    $fecha  = getdate();
    $nowTime    = $fecha["hours"].":".$fecha["minutes"].":".$fecha["seconds"];
    $nowDate    = $fecha["year"]."-".$fecha["mon"]."-".$fecha["mday"];

    $respuesta   = new Respuesta($descripcion,$nowDate,$nowTime);
    $respuesta->setPreguntaRespuesta($idPregunta);

    respuestaDAO::setRespuesta($respuesta);
    header('Location: /__BDM/controller/getProfile.php');
?>
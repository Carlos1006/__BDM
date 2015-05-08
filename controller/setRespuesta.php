<?php
    session_start();
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/respuestaDAO.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/avisoDAO.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/usuarioDAO.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/mysql.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Respuesta.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Usuario.php";

    $idPregunta  = $_POST["idPregunta"];
    $descripcion = $_POST["respuesta"];
    $fecha  = getdate();
    $nowTime    = $fecha["hours"].":".$fecha["minutes"].":".$fecha["seconds"];
    $nowDate    = $fecha["year"]."-".$fecha["mon"]."-".$fecha["mday"];

    $respuesta   = new Respuesta($descripcion,$nowDate,$nowTime);
    $respuesta->setPreguntaRespuesta($idPregunta);

    respuestaDAO::setRespuesta($respuesta);


    //mi usuario
    $usuario = unserialize($_SESSION["sesion"]);
    $nicknameSesion = $usuario->getNicknameUsuario();
    //email que pregunto
    $usuarioPregunto = usuarioDAO::getUsuarioPregunta($idPregunta);
    $emailPregunto  = $usuarioPregunto->getEmailUsuario();
    $nicknamePregunto = $usuarioPregunto->getNicknameUsuario();
    //aviso de pregunta
    $avisoPregunta  = avisoDao::getAvisoPregunta($idPregunta);
    $descripcionAvisoPregunta = $avisoPregunta->getDescripcionAviso();

    $url            = "http://52.24.38.113/__BDM/controller/root.php";
    $headerMail = "Te hicieron una pregunta";
    $msg = "contesto en tu aviso en tu aviso (";
    mysql::sendEmail_2( $nicknameSesion,
                        $descripcionAvisoPregunta,
                        $url,
                        "Te respondieron tu pregunta",
                        $emailPregunto,
                        $nicknamePregunto,
                        $headerMail,
                        $msg
    );


    header('Location: /__BDM/controller/getProfile.php');
?>
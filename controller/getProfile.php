<?php
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Usuario.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/mysql.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/avisoDAO.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/productoDAO.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/preguntaDAO.php";
    session_start();
    $usuarioSesion = unserialize($_SESSION["sesion"]);

    $misAvisos = avisoDao::getMisAvisos($usuarioSesion->getIdUsuario());
    $misProductos = productoDAO::getMisProductos($usuarioSesion->getIdUsuario());
    $misPreguntas = preguntaDAO::getMisPreguntas($usuarioSesion->getIdUsuario());

    

?>
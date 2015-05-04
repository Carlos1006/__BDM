<?php
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Usuario.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/mysql.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/avisoDAO.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/productoDAO.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/preguntaDAO.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/ventaDAO.php";
    session_start();
    $usuarioSesion = unserialize($_SESSION["sesion"]);

    $misAvisos      = avisoDao::getMisAvisos($usuarioSesion->getIdUsuario());
    $misProductos   = productoDAO::getMisProductos($usuarioSesion->getIdUsuario());
    $misPreguntas   = preguntaDAO::getMisPreguntas($usuarioSesion->getIdUsuario());
    $misSolicitudes = ventaDAO::getMisSolicitudes($usuarioSesion->getIdUsuario());
    $misVentas      = ventaDAO::getMisVentas($usuarioSesion->getIdUsuario());
    $miTotalVentas  = ventaDAO::getTotalVentas($usuarioSesion->getIdUsuario());

    $_SESSION["misAvisos"]      = serialize($misAvisos);
    $_SESSION["misProductos"]   = serialize($misProductos);
    $_SESSION["misPreguntas"]   = serialize($misPreguntas);
    $_SESSION["misSolicitudes"] = serialize($misSolicitudes);
    $_SESSION["misVentas"]      = serialize($misVentas);
    $_SESSION["totalVentas"]    = $miTotalVentas;

    header('Location: /__BDM/view/profile.php');
?>
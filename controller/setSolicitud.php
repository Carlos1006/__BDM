<?php
    session_start();
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/ventaDAO.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Aviso.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Usuario.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Venta.php";
    $idMetodoPago   = $_POST["metodo"];
    $cantidad       = $_POST["cantidad"];

    $usuario = unserialize($_SESSION["sesion"]);
    $idUsuario = $usuario->getIdUsuario();

    $aviso = unserialize($_SESSION["avisoVer"]);
    $idAviso = $aviso->getIdAviso();

    $fecha  = getdate();
    $nowTime    = $fecha["hours"].":".$fecha["minutes"].":".$fecha["seconds"];
    $nowDate    = $fecha["year"]."-".$fecha["mon"]."-".$fecha["mday"];

    $venta = new Venta(0,$cantidad,$nowDate,$nowTime);
    $venta->setAvisoVenta($idAviso);
    $venta->setUsuarioVenta($idUsuario);
    $venta->setMetodoPagoVenta($idMetodoPago);
    ventaDAO::setSolicitud($venta);
    header('Location: /__BDM/controller/getProfile.php');
?>
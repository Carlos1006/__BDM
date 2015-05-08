<?php
    session_start();
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/ventaDAO.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/avisoDAO.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/mysql.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Venta.php";
    $idVenta = $_POST["idVenta"];

    $stockVenta = ventaDAO::getStock($idVenta);

    $aviso  = avisoDao::getStock_Venta($idVenta);
    $stockAviso = $aviso->getCantidadAviso();
    $idAviso = $aviso->getIdAviso();

    $newStock = $stockAviso - $stockVenta;
    avisoDao::setNewStock($idAviso,$newStock);
    ventaDAO::setVenta($idVenta);
    header('Location: /__BDM/controller/getProfile.php');
?>
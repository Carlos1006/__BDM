<?php
    session_start();
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/ventaDAO.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/avisoDAO.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/mysql.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Venta.php";
    $idVenta = $_POST["idVenta"];
    ventaDAO::deleteSolicitud($idVenta);
    header('Location: /__BDM/controller/getProfile.php');
?>
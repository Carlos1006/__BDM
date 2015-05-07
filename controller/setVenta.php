<?php
    session_start();
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/ventaDAO.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/mysql.php";
    $idVenta = $_POST["idVenta"];
    ventaDAO::setVenta($idVenta);
    header('Location: /__BDM/controller/getProfile.php');
?>
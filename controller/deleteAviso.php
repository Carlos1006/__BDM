<?php
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/avisoDAO.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/productoDAO.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/mediaDAO.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Aviso.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Producto.php";
    session_start();
    $idAviso = $_POST["idAviso"];

    $stockAviso     = avisoDao::getStock($idAviso);
    $producto       = productoDAO::getStock_Aviso($idAviso);
    $stockProducto  = $producto->getExistenciaProducto();
    $idProducto     = $producto->getIdProducto();

    $newStock = $stockAviso + $stockProducto;
    productoDAO::setNewStock($idProducto,$newStock);

    avisoDao::bajaAviso($idAviso);
    header('Location: /__BDM/controller/getProfile.php');
?>
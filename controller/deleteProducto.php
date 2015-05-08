<?php
    session_start();
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/productoDAO.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Producto.php";
    $idProducto = $_POST["idProducto"];
    productoDAO::bajaProducto($idProducto);
?>
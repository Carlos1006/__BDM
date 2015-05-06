<?php
    session_start();
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/productoDAO.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Producto.php";

    echo json_encode( productoDAO::getProducto($_POST["idProducto"]) );
?>
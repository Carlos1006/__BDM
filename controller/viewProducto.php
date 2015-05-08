<?php
    session_start();
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/productoDAO.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Producto.php";
    $idProducto = $_POST["idProducto"];
    $producto = productoDAO::getProducto($idProducto);
    $_SESSION["productoVer"] = serialize($producto);
    header('Location: /__BDM/view/product.php');
?>
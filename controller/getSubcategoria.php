<?php
    header('Content-Type: application/json');
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/categoriaDAO.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/subcategoriaDAO.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Categoria.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Subcategoria.php";

    $idCategoria    = $_POST["idCategoria"];
    $subcategorias  = subcategoriaDAO::outSubcategorias($idCategoria);
    echo json_encode($subcategorias);
?>
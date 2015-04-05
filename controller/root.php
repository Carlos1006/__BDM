<?php
    session_start();
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/categoriaDAO.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/mysql.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Categoria.php";

    $_SESSION['raiz']       = $_SERVER["DOCUMENT_ROOT"];
    $_SESSION['categoria']  = serialize(categoriaDao::outCategories());

    var_dump( $_SESSION['categoria']);

    header('Location: /__BDM/view/main.php');
?>
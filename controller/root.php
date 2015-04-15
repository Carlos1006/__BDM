<?php
    session_start();
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/categoriaDAO.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/avisoDAO.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/mysql.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Categoria.php";

    $_SESSION['raiz']       = $_SERVER["DOCUMENT_ROOT"];
    $_SESSION['categoria']  = serialize(categoriaDao::outCategories());
    $_SESSION['aviso']      = null;
    $_SESSION['aviso']      = serialize(avisoDao::getAvisosRecientes());
    $_SESSION['default']    = serialize(avisoDao::getAvisosRecientes());

    header('Location: /__BDM/view/main.php');
?>
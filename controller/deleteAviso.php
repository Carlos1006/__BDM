<?php
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/avisoDAO.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/mediaDAO.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Aviso.php";
    session_start();
    $idAviso = $_POST["idAviso"];
    avisoDao::bajaAviso($idAviso);
?>
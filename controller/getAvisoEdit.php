<?php
    session_start();
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/avisoDAO.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Aviso.php";
    echo json_encode( avisoDao::getAviso($_POST["idAviso"]) );
?>
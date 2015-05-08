<?php
    session_start();
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Usuario.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/mysql.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/usuarioDAO.php";
    $usuario = unserialize($_SESSION["sesion"]);
    $idUsuario = $usuario->getIdUsuario();
    unset($_SESSION["sesion"]);
    usuarioDAO::deleteUsuario($idUsuario);
    header('Location: /__BDM/controller/root.php');
?>
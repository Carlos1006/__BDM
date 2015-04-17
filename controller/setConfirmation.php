<?php
    session_start();
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/usuarioDAO.php";
    $idUsuario = $_GET["email"];
    $resultado = usuarioDAO::setUsuarioConfirmacion($idUsuario);

    if($resultado) {
        $_SESSION['insercion'] = 2;
    } else {
        $_SESSION['insercion'] = 3;
    }
    header('Location: /__BDM/view/mail.php');
?>
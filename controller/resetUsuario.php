<?php
    session_start();
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Usuario.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/mysql.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/usuarioDAO.php";

    $usuario = new Usuario( $_POST['updateEmail'],
                            $_POST['updatePassword'],
                            $_POST['updateNickname'],
                            $_POST['updateApellido'],
                            $_POST['updateNombre'],
                            $_POST['updateTelefono'],
                            $_FILES['file'],
                            0,
                            1
                         );
    $usuario->setIdUsuario($_POST['updateId']);
    var_dump($usuario);
    usuarioDAO::resetUsuario($usuario);
    //header('Location: /__BDM/view/main.php');
?>
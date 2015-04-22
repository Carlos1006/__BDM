<?php
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Usuario.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/UsuarioDAO.php";

    $login = new Login($_POST['password']);

    if(isset($_POST['mail'])) {
        $login->setEmail($_POST['mail']);
    }else if(isset($_POST['user'])) {
        $login->setUsername($_POST['user']);
    }

    $usuario = UsuarioDao::getUsuarioLoginExist($login);

    echo json_encode($usuario);
?>

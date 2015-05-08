<?php
    session_start();
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Usuario.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/mysql.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/usuarioDAO.php";

    $usuario = new Usuario( $_POST['registroEmail'],
                            $_POST['registroPassword'],
                            $_POST['registroNickname'],
                            $_POST['registroApellido'],
                            $_POST['registroNombre'],
                            $_POST['registroTelefono'],
                            $_FILES['file'],
                            0,
                            1
                          );

    $resultadoUsuario   = usuarioDAO::setUsuario($usuario);
    $resultadoMail      = mysql::sendEmail(  "Entra en el enlace para confirmar tu usuario",
    //mysql::createGetLink(array("email"=>$resultadoUsuario),"http://localhost/__BDM/controller/setConfirmation.php"),
    mysql::createGetLink(array("email"=>$resultadoUsuario),"http://52.24.38.113/__BDM/controller/setConfirmation.php"),
    "Confirmar email",
    $usuario->getEmailUsuario(),
    "Nuevo Usuario"
);

    if($resultadoUsuario != 0 && $resultadoMail) {
        $_SESSION['insercion'] = 1;
    } else {
        $_SESSION['insercion'] = 0;
    }

    header('Location: /__BDM/view/mail.php');
?>
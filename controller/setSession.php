<?php
    session_start();
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Usuario.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/UsuarioDAO.php";

    $login = new Login($_POST['password']);

    if(isset($_POST['mail'])) {
        $login->setEmail($_POST['mail']);
    }else if(isset($_POST['user'])) {
        $login->setUsername($_POST['user']);
    }

    $_SESSION["sesion"] = serialize(UsuarioDao::getUsuarioLogin($login));

    header('Location: /__BDM/view/main.php');
?>
<!--<img src="data:image/png;base64,<?php echo $_SESSION["sesion"]->getAvatarUsuario();?>" alt="photo" download="imagen">-->
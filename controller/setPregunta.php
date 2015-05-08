<?php
    session_start();
    include_once $_SESSION['raiz']."/__BDM/model/Usuario.php";
    include_once $_SESSION['raiz']."/__BDM/model/Aviso.php";
    include_once $_SESSION['raiz']."/__BDM/model/Pregunta.php";
    include_once $_SESSION['raiz']."/__BDM/DAO/preguntaDAO.php";
    include_once $_SESSION['raiz']."/__BDM/DAO/usuarioDAO.php";
    include_once $_SESSION['raiz']."/__BDM/DAO/mysql.php";
    $descripcion = $_POST["pregunta"];
    $usuario   = unserialize($_SESSION["sesion"]  );
    $aviso     = unserialize($_SESSION["avisoVer"]);

    $idUsuario  = $usuario->getIdUsuario();
    $idAviso    = $aviso->getIdAviso();

    $fecha  = getdate();
    $nowTime    = $fecha["hours"].":".$fecha["minutes"].":".$fecha["seconds"];
    $nowDate    = $fecha["year"]."-".$fecha["mon"]."-".$fecha["mday"];

    $pregunta = new Pregunta($descripcion,$nowDate,$nowTime);
    $pregunta->setAvisoPregunta($idAviso);
    $pregunta->setUsuarioPregunta($idUsuario);
    preguntaDAO::altaPregunta($pregunta);

    $usuarioAviso   = usuarioDAO::getUsuarioAviso($idAviso);
    $user           = $usuario->getNicknameUsuario();
    $ad             = $aviso->getDescripcionAviso();
    //$url            = "http://localhost/__BDM/controller/root.php";
    $url            = "http://52.24.38.113/__BDM/controller/root.php";
    $emailEnviar    = $usuarioAviso->getEmailUsuario();
    $usuarioEnviar  = $usuarioAviso->getNicknameUsuario();
    $headerMail = "Te hicieron una pregunta";
    $msg = "pregunto en tu aviso (";
    mysql::sendEmail_2( $user,
                        $ad,
                        $url,
                        "Te hicieron una pregunta",
                        $emailEnviar,
                        $usuarioEnviar,
                        $headerMail,
                        $msg
                    );

    header('Location: /__BDM/view/ad.php');
?>
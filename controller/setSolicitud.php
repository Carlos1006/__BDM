<?php
    session_start();
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/ventaDAO.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/usuarioDAO.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Aviso.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Usuario.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Venta.php";
    $idMetodoPago   = $_POST["metodo"];
    $cantidad       = $_POST["cantidad"];

    $usuario = unserialize($_SESSION["sesion"]);
    $idUsuario = $usuario->getIdUsuario();

    $aviso = unserialize($_SESSION["avisoVer"]);
    $idAviso = $aviso->getIdAviso();

    $fecha  = getdate();
    $nowTime    = $fecha["hours"].":".$fecha["minutes"].":".$fecha["seconds"];
    $nowDate    = $fecha["year"]."-".$fecha["mon"]."-".$fecha["mday"];

    $venta = new Venta(0,$cantidad,$nowDate,$nowTime);
    $venta->setAvisoVenta($idAviso);
    $venta->setUsuarioVenta($idUsuario);
    $venta->setMetodoPagoVenta($idMetodoPago);
    ventaDAO::setSolicitud($venta);

    //mi usuario
    $nicknameUsuario = $usuario->getNicknameUsuario();
    //email de vendedor de aviso
    $usuarioAviso   = usuarioDAO::getUsuarioAviso($idAviso);
    $emailEnviar    = $usuarioAviso->getEmailUsuario();
    $nicknameEnviar = $usuarioAviso->getNicknameUsuario();
    //aviso de vendedor
    $descripcionAviso = $aviso->getDescripcionAviso();

    $url            = "http://52.24.38.113/__BDM/controller/root.php";
    $headerMail = "Quieren comprar un producto";
    $msg = "quiere comprar de este aviso (";
    mysql::sendEmail_2( $nicknameUsuario,
                        $descripcionAviso,
                        $url,
                        "Quieren comprar un producto",
                        $emailEnviar,
                        $nicknameEnviar,
                        $headerMail,
                        $msg
                    );

    header('Location: /__BDM/controller/getProfile.php');
?>
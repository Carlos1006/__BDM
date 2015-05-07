<?php
    session_start();
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/avisoDAO.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/productoDAO.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/aviso_metodoPagoDAO.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/mysql.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Aviso.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Producto.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Aviso_MetodoPago.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/MetodoPago.php";
    $idAviso        = $_POST["upIdAviso"];
    $cantidad       = $_POST["upCantidad"];
    $precio         = $_POST["upPrecio"];
    $vigencia       = mysql::stringToDate($_POST["upVigencia"]);
    $corta          = $_POST["upCorta"];
    $larga          = $_POST["upLarga"];
    $idProducto     = $_POST["upProductoAviso"];
    $idSubcategoria = $_POST["upSubcategoria"];
    $metodosPago    = $_POST["upMetodoPago"]; //array;

    $fecha  = getdate();
    $nowTime    = $fecha["hours"].":".$fecha["minutes"].":".$fecha["seconds"];
    $nowDate    = $fecha["year"]."-".$fecha["mon"]."-".$fecha["mday"];

    $aviso = new Aviso(null,$cantidad,$corta,$nowDate,$nowTime,1,$precio,$larga);
    $aviso->setSubcategoria($idSubcategoria);
    $aviso->setVigenciaAviso($vigencia);
    $aviso->setProducto($idProducto);

    if($idAviso == 0) {
        //insert
        $idAviso = avisoDao::setAviso($aviso);

        $metodosAviso = array();
        foreach($metodosPago as $idMetodo) {
            $metodoPago = new Aviso_MetodoPago();
            $metodoPago->setIdAviso($idAviso);
            $metodoPago->setIdMetodoPago($idMetodo);
            array_push($metodosAviso,$metodoPago);
        }
        aviso_metodoPagoDAO::setEnlaceAvisoMetodo($metodosAviso);

        $oldStock = productoDAO::getStock($idProducto);
        $newStock = $oldStock - $cantidad;
        productoDAO::setNewStock($idProducto,$newStock);

    } else {
        //update
        $stockOrigen = $_POST["oldStock"];


        $aviso->setIdAviso($idAviso);
        avisoDao::resetAviso($aviso);

        aviso_metodoPagoDAO::unsetEnlaceAvisoMetodo($idAviso);
        $metodosAviso = array();
        foreach($metodosPago as $idMetodo) {
            $metodoPago = new Aviso_MetodoPago();
            $metodoPago->setIdAviso($idAviso);
            $metodoPago->setIdMetodoPago($idMetodo);
            array_push($metodosAviso,$metodoPago);
        }
        aviso_metodoPagoDAO::setEnlaceAvisoMetodo($metodosAviso);

        $oldStock   = productoDAO::getStock($idProducto);
        $finalStock = 0;
        if($stockOrigen == $cantidad) {
            $finalStock = $oldStock;
        } else if($stockOrigen > $cantidad) {
            $finalStock = $oldStock + ($stockOrigen - $cantidad);

        } else if($stockOrigen < $cantidad) {
            $finalStock = $oldStock - ($cantidad - $stockOrigen);
        }
        productoDAO::setNewStock($idProducto,$finalStock);
    }

    header('Location: /__BDM/controller/getProfile.php');
?>
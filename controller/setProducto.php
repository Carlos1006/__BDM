<?php
    session_start();
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/productoDAO.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/mysql.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Producto.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Video.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Imagen.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Usuario.php";

    $nombre     = $_POST["upName"];
    $precio     = $_POST["upPrice"];
    $vigencia   = mysql::stringToDate($_POST["upDate"]);
    $existencia = $_POST["upStock"];
    $larga      = $_POST["upLong"];
    $corta      = $_POST["upShort"];

    $fecha  = getdate();
    $nowTime    = $fecha["hours"].":".$fecha["minutes"].":".$fecha["seconds"];
    $nowDate    = $fecha["year"]."-".$fecha["mon"]."-".$fecha["mday"];

    $img1 = $_FILES["fileU1"];
    $img2 = $_FILES["fileU2"];
    $img3 = $_FILES["fileU3"];
    $img4 = $_FILES["fileU4"];
    $vid1 = $_FILES["fileU5"];
    $vid2 = $_FILES["fileU6"];

    $id1 = $_POST["upIdImg_1"];
    $id2 = $_POST["upIdImg_2"];
    $id3 = $_POST["upIdImg_3"];
    $id4 = $_POST["upIdImg_4"];
    $id5 = $_POST["upIdVid_1"];
    $id6 = $_POST["upIdVid_2"];

    $producto = new Producto("",$nombre,$corta,$precio,$existencia,$vigencia,$larga,$nowDate,$nowTime,1);

    $imagenes = array();
    $videos   = array();

    $bImg1 = null;
    $bImg2 = null;
    $bImg3 = null;
    $bImg4 = null;
    $bVid1 = null;
    $bVid2 = null;

    $urlBase    = "/__BDM/img/products/";
    $timeName   = time();
    if($img1["size"] > 0) {
        $ext    = pathinfo($img1["name"], PATHINFO_EXTENSION);
        $name   = $timeName."_1.".$ext;
        $img1["name"] = $urlBase.$name;

        $bImg1 = new Imagen($img1["name"],1);
        $bImg1->setIdImagen($id1);
        array_push($imagenes,$bImg1);

        move_uploaded_file($img1["tmp_name"], $_SERVER["DOCUMENT_ROOT"].$img1["name"]);
    }
    if($img2["size"] > 0) {
        $ext    = pathinfo($img2["name"], PATHINFO_EXTENSION);
        $name   = $timeName."_2.".$ext;
        $img2["name"] = $urlBase.$name;

        $bImg2 = new Imagen($img2["name"],1);
        $bImg2->setIdImagen($id2);
        array_push($imagenes,$bImg2);

        move_uploaded_file($img2["tmp_name"], $_SERVER["DOCUMENT_ROOT"].$img2["name"]);
    }
    if($img3["size"] > 0) {
        $ext    = pathinfo($img3["name"], PATHINFO_EXTENSION);
        $name   = $timeName."_3.".$ext;
        $img3["name"] = $urlBase.$name;

        $bImg3 = new Imagen($img3["name"],1);
        $bImg3->setIdImagen($id3);
        array_push($imagenes,$bImg3);

        move_uploaded_file($img3["tmp_name"], $_SERVER["DOCUMENT_ROOT"].$img3["name"]);
    }
    if($img4["size"] > 0) {
        $ext    = pathinfo($img4["name"], PATHINFO_EXTENSION);
        $name   = $timeName."_4.".$ext;
        $img4["name"] = $urlBase.$name;

        $bImg4 = new Imagen($img4["name"],1);
        $bImg4->setIdImagen($id4);
        array_push($imagenes,$bImg4);

        move_uploaded_file($img4["tmp_name"], $_SERVER["DOCUMENT_ROOT"].$img4["name"]);
    }
    if($vid1["size"] > 0) {
        $ext    = pathinfo($vid1["name"], PATHINFO_EXTENSION);
        $name   = $timeName."_5.".$ext;
        $vid1["name"] = $urlBase.$name;

        $bVid1 = new Video($vid1["name"],1);
        $bVid1->setIdVideo($id5);
        array_push($videos,$bVid1);

        move_uploaded_file($vid1["tmp_name"], $_SERVER["DOCUMENT_ROOT"].$vid1["name"]);
    }
    if($vid2["size"] > 0) {
        $ext    = pathinfo($vid2["name"], PATHINFO_EXTENSION);
        $name   = $timeName."_6.".$ext;
        $vid2["name"] = $urlBase.$name;

        $bVid2 = new Video($vid2["name"],1);
        $bVid2->setIdVideo($id6);
        array_push($videos,$bVid2);

        move_uploaded_file($vid2["tmp_name"], $_SERVER["DOCUMENT_ROOT"].$vid2["name"]);
    }

    $producto->setImagenesProducto($imagenes);
    $producto->setVideosProducto($videos);

    $userSesion = unserialize($_SESSION["sesion"]);
    $idSesion   = $userSesion->getIdUsuario();

    $producto->setUsuarioProducto($idSesion);


    if($_POST['upId'] == 0) {
        productoDAO::setProducto($producto);
    } else {
        $producto->setIdProducto($_POST["upId"]);
        productoDAO::resetProducto($producto);
        echo "update";
    }


    header('Location: /__BDM/controller/getProfile.php');
?>
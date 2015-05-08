<?php
    session_start();
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/avisoDAO.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/mediaDAO.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/preguntaDAO.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/categoriaDAO.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Aviso.php";
    $idAviso    = $_POST["idAviso"];
    $aviso      = avisoDao::getAviso($idAviso);
    $imagenes   = mediaDAO::getImagenesAviso($idAviso);
    $videos     = mediaDAO::getVideosAviso($idAviso);
    $preguntas  = preguntaDAO::getPreguntasAviso($idAviso);
    $aviso->setVideosAviso($videos);
    $aviso->setImagenesAviso($imagenes);
    $aviso->setPreguntasAviso($preguntas);

    $nombreCat = categoriaDao::getCategoria($aviso->getSubcategoriaAviso());
    $aviso->setNombreCat($nombreCat);
    $_SESSION["avisoVer"] = serialize($aviso);
    header('Location: /__BDM/view/ad.php');
?>
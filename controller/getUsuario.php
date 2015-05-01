<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Usuario.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/UsuarioDAO.php";

$idAviso = $_POST["idAviso"];
echo json_encode(UsuarioDao::getUsuarioAviso($idAviso));

?>
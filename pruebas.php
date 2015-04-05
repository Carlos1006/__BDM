<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "tienda_bdm";
$link     = mysqli_connect($host,$user,$password,$database) or die("Conexion erronea");
$id = 1;
$query  = "CALL todasSubcategorias($id)";
$result = mysqli_query($link,$query);
while($row = mysqli_fetch_object($result)) {
    var_dump($row);

}

?>
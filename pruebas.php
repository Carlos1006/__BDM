<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "tienda_bdm";
$link     = mysqli_connect($host,$user,$password,$database) or die("Conexion erronea");
$id = 1;
$query  = "SELECT idAviso FROM Aviso";
$result = mysqli_query($link,$query);
while($row = mysqli_fetch_object($result)) {
    $id = $row->idAviso;
    $fecha = rand(1999,2014)."-".rand(1,12)."-".rand(1,28);
    $Q= "UPDATE Aviso SET fechaAviso = '$fecha' WHERE idAviso = $id;";
    echo $Q."<br>";
}

?>
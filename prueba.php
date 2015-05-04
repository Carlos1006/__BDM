<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/mysql.php";
//mysql::sendEmail("Entra en el enlace para confirmar tu usuario","https://wwww.facebook.com/naker21","Confirmar email","cdgl_06charly@hotmail.com", "Nuevo Usuario");

echo mysql::moneyFormat(1250)."<br>";
echo mysql::moneyFormat(1250.5)."<br>";
echo mysql::moneyFormat(1250.55)."<br>";
echo mysql::moneyFormat(1250.156)."<br>";
echo mysql::moneyFormat("1250")."<br>";

?>

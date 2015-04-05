<?php

    class MySQL {

        static function getConexion() {
            $host       = "localhost";
            $user       = "root";
            $password   = "";
            $database   = "tienda_bdm";
            $link       = mysqli_connect($host,$user,$password,$database) or die("Conexion erronea");
            return $link;
        }

    }

?>
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

        static function dateToString($date) {
            $dateArray = explode("-",$date);
            $dateNewArray = array();
            $dateNewArray[0] = $dateArray[2];
            $dateNewArray[1] = mysql::getMonth_Name($dateArray[1]);
            $dateNewArray[2] = $dateArray[0];
            $string = implode("/",$dateNewArray);
            return $string;
        }

        static function stringToDate($string) {
            $dateArray = explode("/",$string);
            $dateNewArray = array();
            $dateNewArray[0] = $dateArray[2];
            $dateNewArray[1] = mysql::getMonth_Number($dateArray[1]);
            $dateNewArray[2] = $dateArray[0];
            $date = implode("-",$dateNewArray);
            return $date;
        }

        private static function getMonth_Name($number) {
            $name = null;
            switch($number) {
                case 1:  $name = "Enero";       break;
                case 2:  $name = "Febrero";     break;
                case 3:  $name = "Marzo";       break;
                case 4:  $name = "Abril";       break;
                case 5:  $name = "Mayo";        break;
                case 6:  $name = "Junio";       break;
                case 7:  $name = "Julio";       break;
                case 8:  $name = "Agosto";      break;
                case 9:  $name = "Septiembre";  break;
                case 10: $name = "Octubre";     break;
                case 11: $name = "Noviembre";   break;
                case 12: $name = "Diciembre";   break;
            }
            return $name;
        }

        private static function getMonth_Number($name) {
            $number = null;
            switch($name) {
                case "Enero":       $number = 1;    break;
                case "Febrero":     $number = 2;    break;
                case "Marzo":       $number = 3;    break;
                case "Abril":       $number = 4;    break;
                case "Mayo":        $number = 5;    break;
                case "Junio":       $number = 6;    break;
                case "Julio":       $number = 7;    break;
                case "Agosto":      $number = 8;    break;
                case "Septiembre":  $number = 9;    break;
                case "Octubre":     $number = 10;   break;
                case "Noviembre":   $number = 11;   break;
                case "Diciembre":   $number = 12;   break;
            }
            return $number;
        }

        static function verifySet($var) {
            strcmp(trim($var),'') != 0 ? $devolver = $var : $devolver = null;
            return $devolver;
        }

    }

?>
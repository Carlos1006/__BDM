<?php
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/mailSender/class.phpmailer.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/mailSender/class.smtp.php";

    class MySQL {

        static function getConexion() {
            $host       = "localhost";
            $user       = "root";
            $password   = "";
            $database   = "tienda_bdm";
            $link       = mysqli_connect($host,$user,$password,$database) or die("Conexion erronea");
            return $link;
        }

        static function getConexionPDO() {
            return new PDO("mysql:host=localhost;dbname=tienda_bdm", 'root', '');
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
        
        private static function createEmailMessage($mensaje,$enlace) {
            $content = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/__BDM/resources/html/confirmation.html");
            $dom = new DOMDocument();
            $dom->loadHTML($content);
            $dom->getElementById("mensaje")->appendChild( $dom->createTextNode($mensaje) );
            $dom->getElementById("link")->setAttribute("href",$enlace);
            $html = $dom->saveHTML();
            return $html;
        }

        static function createGetLink($valores,$enlace) {
            $final = $enlace;
            if(isset($valores) && count($valores) > 0) {
                $final .= "?";
            }
            foreach($valores as $nombre => $valor) {
                $final .= $nombre."=".$valor."&";
            }
            return $final;
        }

        static function sendEmail($mensaje,$enlace,$asunto,$destino,$nombreDestino) {
            $devolver = null;
            $mail 				= new PHPMailer();
            $mail->IsSMTP();
            $mail->SMTPAuth 	= true;
            $mail->SMTPSecure 	= "ssl";
            $mail->Host 		= "smtp.gmail.com";
            $mail->Port 		= 465;
            $mail->Username 	= "cdgzz19@gmail.com";
            $mail->Password 	= "carlos06";
            $mail->From 		= "cdgzz19@gmail.com";
            $mail->FromName 	= "Carlos Daniel";
            $mail->Subject 		= $asunto;
            $mail->AltBody 		= mysql::createEmailMessage($mensaje,$enlace);
            $mail->MsgHTML(mysql::createEmailMessage($mensaje,$enlace));
            $mail->AddAddress($destino,$nombreDestino);
            $mail->IsHTML(true);

            if(!$mail->Send()) {
                $devolver = false;
            }else {
                $devolver = true;
            }
            return $devolver;
        }

        static function moneyFormat($float) {
            return number_format($float, 2, '.', '');
        }

        static function sendEmail_2($aviso,$usuarioPregunta,$enlace,$asunto,$destino,$nombreDestino,$headerMail,$mensaje) {
            $devolver = null;
            $mail 				= new PHPMailer();
            $mail->IsSMTP();
            $mail->SMTPAuth 	= true;
            $mail->SMTPSecure 	= "ssl";
            $mail->Host 		= "smtp.gmail.com";
            $mail->Port 		= 465;
            $mail->Username 	= "cdgzz19@gmail.com";
            $mail->Password 	= "carlos06";
            $mail->From 		= "cdgzz19@gmail.com";
            $mail->FromName 	= "Carlos Daniel";
            $mail->Subject 		= $asunto;
            $mail->AltBody 		= mysql::createEmailMessage_2($aviso,$usuarioPregunta,$enlace,$headerMail,$mensaje);
            $mail->MsgHTML(mysql::createEmailMessage_2($aviso,$usuarioPregunta,$enlace,$headerMail,$mensaje));
            $mail->AddAddress($destino,$nombreDestino);
            $mail->IsHTML(true);

            if(!$mail->Send()) {
                $devolver = false;
            }else {
                $devolver = true;
            }
            return $devolver;
        }

        private static function createEmailMessage_2($usuario,$aviso,$enlace,$headerMail,$mensaje) {
            $content = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/__BDM/resources/html/question.html");
            $dom = new DOMDocument();
            $dom->loadHTML($content);
            $dom->getElementById("user")->appendChild( $dom->createTextNode($usuario) );
            $dom->getElementById("ad")->appendChild( $dom->createTextNode($aviso) );
            $dom->getElementById("header")->appendChild( $dom->createTextNode($headerMail) );
            $dom->getElementById("mensaje")->appendChild( $dom->createTextNode($mensaje) );
            $dom->getElementById("link")->setAttribute("href",$enlace);
            $html = $dom->saveHTML();
            return $html;
        }

    }

?>
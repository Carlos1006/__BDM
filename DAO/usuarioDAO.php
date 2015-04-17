<?php
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Usuario.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/mysql.php";

    class usuarioDAO {
        static function setUsuario($usuario) {
            $devolver = 0;
            $usuarioAvatar = $usuario->getAvatarUsuario();
            if(is_uploaded_file($usuarioAvatar["tmp_name"]) && getimagesize($usuarioAvatar["tmp_name"])!= false) {

                $imgfp      = fopen($usuarioAvatar["tmp_name"],'rb');
                $maxsize    = 99999999;

                if($usuarioAvatar['size'] < $maxsize) {
                    $nombre     = $usuario->getNombreUsuario();
                    $apellido   = $usuario->getApellidoUsuario();
                    $email      = $usuario->getEmailUsuario();
                    $telefono   = $usuario->getTelefonoUsuario();
                    $nickname   = $usuario->getNicknameUsuario();
                    $password   = $usuario->getPasswordUsuario();
                    $activo     = $usuario->getActivoUsuario();
                    $confirmado = $usuario->getConfirmadoUsuario();

                    $dbh    = mysql::getConexionPDO();
                    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $query  = "CALL altaUsuario(?,?,?,?,?,?,?,?,?)";
                    $stmt   = $dbh->prepare($query);
                    $stmt->bindParam(1,$email);
                    $stmt->bindParam(2,$password);
                    $stmt->bindParam(3,$nickname);
                    $stmt->bindParam(4,$nombre);
                    $stmt->bindParam(5,$apellido);
                    $stmt->bindParam(6,$telefono);
                    $stmt->bindParam(7,$imgfp, PDO::PARAM_LOB);
                    $stmt->bindParam(8,$confirmado);
                    $stmt->bindParam(9,$activo);
                    $stmt->execute();

                    $stmt = $dbh->query("CALL obtenerUltimoId()");
                    $lastId = $stmt->fetch(PDO::FETCH_NUM);
                    $lastId = $lastId[0];
                    $devolver = $lastId;
                }
            }
            return $devolver;
        }


        static function setUsuarioConfirmacion($idUsuario) {
            $devolver = false;
            $query = "CALL confirmarUsuario($idUsuario)";
            $con    = mysql::getConexion();
            mysqli_query($con,$query);
            $resultado = mysqli_affected_rows($con);
            mysqli_close($con);
            if ($resultado != 0) {
                $devolver = true;
            }
            return $devolver;
        }
    }
?>
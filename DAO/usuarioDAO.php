<?php
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Usuario.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Login.php";
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

        static function resetUsuario($usuario) {
            $usuarioAvatar = $usuario->getAvatarUsuario();

            if(is_uploaded_file($usuarioAvatar["tmp_name"]) && getimagesize($usuarioAvatar["tmp_name"])!= false) {
                $imgfp = fopen($usuarioAvatar["tmp_name"], 'rb');
            } else {
                $imgfp = NULL;
            }

            $id         = $usuario->getIdUsuario();
            $nombre     = $usuario->getNombreUsuario();
            $apellido   = $usuario->getApellidoUsuario();
            $email      = $usuario->getEmailUsuario();
            $telefono   = $usuario->getTelefonoUsuario();
            $nickname   = $usuario->getNicknameUsuario();
            $password   = $usuario->getPasswordUsuario();

            $dbh = mysql::getConexionPDO();
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "CALL editaUsuario(?,?,?,?,?,?,?,?)";
            $stmt = $dbh->prepare($query);
            $stmt->bindParam(1, $id);
            $stmt->bindParam(2, $email);
            $stmt->bindParam(3, $password);
            $stmt->bindParam(4, $nickname);
            $stmt->bindParam(5, $nombre);
            $stmt->bindParam(6, $apellido);
            $stmt->bindParam(7, $telefono);
            if(is_null($imgfp)) {
                $stmt->bindParam(8, $imgfp);
            } else {
                $stmt->bindParam(8, $imgfp, PDO::PARAM_LOB);
            }
            $stmt->execute();
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
            mysqli_close($con);
            return $devolver;
        }

        static function getUsuarioLogin($login) {
            $nick    = $login->getUsernameLogin();
            $email   = $login->getEmailLogin();
            $pass    = $login->getPasswordLogin();

            is_null($email) ? $email    = "null" : $email = "'".$email."'";
            is_null($nick)  ? $nick     = "null" : $nick  = "'".$nick."'";

            $query   = "CALL sesionUsuario($nick,$email,'$pass')";
            $con     = mysql::getConexion();
            $result  = mysqli_query($con,$query);
            $usuario = null;
            while($row = mysqli_fetch_object($result)) {
                $usuario = new Usuario( $row->emailUsuario,
                                        $row->passwordUsuario,
                                        $row->nicknameUsuario,
                                        $row->apellidoUsuario,
                                        $row->nombreUsuario,
                                        $row->telefonoUsuario,
                                        base64_encode($row->avatarUsuario),
                                        $row->confirmadoUsuario,
                                        $row->activoUsuario
                                       );
                $usuario->setIdUsuario($row->idUsuario);
            }
            return $usuario;
        }

        static function getUsuarioLoginExist($login) {
            $nick    = $login->getUsernameLogin();
            $email   = $login->getEmailLogin();
            $pass    = $login->getPasswordLogin();

            is_null($email) ? $email = "null" : $email = "'".$email."'";
            is_null($nick)  ? $nick  = "null" : $nick  = "'".$nick."'";

            $query   = "CALL sesionUsuario($nick,$email,'$pass')";
            $result  = mysqli_query(mysql::getConexion(),$query);
            $usuarioExiste = mysqli_num_rows($result);

            $retorno = false;

            if($usuarioExiste > 0) {
                $retorno = true;
            }
            return $retorno;
        }

        static function getUsuarioAviso($idAviso) {
            $query   = "CALL usuarioAviso($idAviso)";
            $con     = mysql::getConexion();
            $result  = mysqli_query($con,$query);
            $usuario = null;
            while($row = mysqli_fetch_object($result)) {
                $usuario = new Usuario( $row->emailUsuario,
                    $row->passwordUsuario,
                    $row->nicknameUsuario,
                    $row->apellidoUsuario,
                    $row->nombreUsuario,
                    $row->telefonoUsuario,
                    base64_encode($row->avatarUsuario),
                    $row->confirmadoUsuario,
                    $row->activoUsuario
                );
                $usuario->setIdUsuario($row->idUsuario);
            }
            return $usuario;
        }

        static function deleteUsuario($id) {
            $query = "CALL bajaUsuario($id)";
            mysqli_query(mysql::getConexion(),$query);
        }
    }
?>